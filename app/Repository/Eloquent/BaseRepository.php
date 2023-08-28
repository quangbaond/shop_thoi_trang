<?php

namespace App\Repository\Eloquent;

use App\Repository\BaseRepositoryInterface;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class BaseRepository
 * @package App\Repositories\Eloquent
 */
class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * create the model in the database.
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->query()->create($attributes);
    }

    /**
     * Update the model in the database.
     * @param array $attributes
     *
     * @return bool
     */
    public function update(Model $model, array $attributes): bool
    {
        return $model->update($attributes);
    }

    /**
     * Find the models for the given IDs
     * @param $id
     *
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->query()->findOrFail($id);
    }

    /**
     * Destroy the models for the given IDs.
     * @param $ids
     * @return int
     */
    public function destroy($ids): int
    {
        return $this->model->destroy($ids);
    }

    /**
     * Get all from the database
     */
    public function all()
    {
        return $this->model->all();
    }

     /**
     * Delete the models for database.
     * @return bool
     */
    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    /**
     * Get all of the users from the database
     */
    public function where($attributes)
    {
        return $this->model->where($attributes)->get();
    }

    /**
     * Get all of the users from the database
     */
    public function whereFirst($attributes)
    {
        return $this->model->where($attributes)->first();
    }

    /**
     * @param array $requester
     * @param array $columnCanSearchKeyword
     * @return Builder
     * @throws Exception
     */
    public function search(array $requester = [], array $columnCanSearchKeyword = []): Builder
    {
        $query = $this->model->query();
        collect($requester)->each(
            callback: fn($value, $key) => match ($key) {
                'keyword' => $query->when(
                    value: $value,
                    callback: fn($query)
                    => $query->where(
                        fn($query) =>
                        collect($columnCanSearchKeyword)->each(
                            callback: fn($column) => $this->queryLike(column: $column, value: $value, query: $query)
                        ),
                    )
                ),
                'select' => $this->querySelect(query: $query, columns: $value),
                'orderByColumn' => collect($value)->each(callback: fn($column, $k) => $this->queryOrderByColumn(column: $column, direction: $requester['orderBy'], query: $query)),
                'orderBy', 'page', 'limit', 'all' => $query,
                default => !is_null($value) ? $this->queryDefault(column: $key, value: $value, query: $query) : $query,
            });
        return $query;
    }


    /**
     * @param int $limit
     * @param array $requester
     * @param array $columnCanSearchKeyword
     * @param null $relationship
     * @return array|Collection|LengthAwarePaginator
     * @throws Exception
     */
    public function pagination(int $limit = 6, array $requester = [], array $columnCanSearchKeyword = [], $relationship = null): array|Collection|LengthAwarePaginator
    {
        if (!is_null($relationship)) {
            $this->search($requester, $columnCanSearchKeyword)->with($relationship);
        }
        return isset($requester['all']) && $requester['all']
            ? $this->search($requester, $columnCanSearchKeyword)->get()
            : $this->search($requester, $columnCanSearchKeyword)->paginate($limit);
    }


    /**
     * @param string $column
     * @param string $value
     * @param Builder $query
     * @return Builder
     * @throws Exception
     */
    public function queryDefault(string $column, string $value, Builder $query): Builder
    {
        // if not exit $column throw error
        if (!in_array($column, $this->model->getFillable())) {
            return !env('APP_DEBUG')
                ? $query
                : throw new Exception(message: 'Column ' . $column . ' not exist in table ' . $this->model->getTable(), code: 500);
        }

        return $query->when(!is_null($value), function ($q) use ($column, $value) {
            return $q->where($column, $value);
        }, function ($q) use ($column) {
            return $q->whereNull($column);
        });

    }

    /**
     * @param string $column
     * @param string $direction
     * @param Builder $query
     * @return Builder
     */
    public function queryOrderByColumn(string $column, string $direction, Builder $query): Builder
    {
        $typeDirection = $direction === 'asc' ? 'asc' : 'desc';
        return $query->orderBy(column: $column, direction: $typeDirection);
    }

    /**
     * @param string $column
     * @param string $value
     * @param Builder $query
     * @return Builder
     */
    public function queryLike(string $column, string $value, Builder $query): Builder
    {
        return $query->orWhere($column, 'like', "%$value%");
    }


    /**
     * @param Builder $query
     * @param array|string $columns
     * @return Builder
     * @throws Exception
     */
    public function querySelect(Builder $query, array|string $columns = ['*']): Builder
    {
        if($columns === ['*']) return $query->addSelect($columns);
        if(is_string($columns)) $columns = explode(',', $columns);
        // if not exit $column throw error
        collect($columns)->each(
            callback: fn($column)
            => (in_array($column, $this->model->getFillable())
                ? $query->addSelect($column) : !env('APP_DEBUG')) ? $query
                : throw new Exception(message: 'Column ' . $column . ' not exist in table ' . $this->model->getTable(), code: 500)
        );
        return $query;
    }

    public function relationship($relationship = null): Model|Builder
    {
        if (is_null($relationship)) {
            return $this->model;
        }
        return $this->model->with($relationship);
    }

    public function findBySlug($slug): ?Model
    {
        return $this->model->query()->where('slug', $slug)->first();
    }
}
