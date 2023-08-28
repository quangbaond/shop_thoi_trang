<?php

namespace App\Services;

use App\Repository\Eloquent\VehicleRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VehicleService
{
    protected VehicleRepository $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * @throws Exception
     */
    public function search($request): array
    {
        try {
            $list = $this->vehicleRepository->pagination(requester: $request);

            $tableCrud = [
                'headers' => [
                    [
                        'text' => 'Mã SP',
                        'key' => 'code',
                    ],
                    [
                        'text' => 'Tên SP',
                        'key' => 'name',
                    ],
                    [
                        'text' => 'Hình Ảnh',
                        'key' => 'image',
                        'img' => [
                            'url' => 'asset/client/images/products/vehicle/',
                            'style' => 'width: 100px;'
                        ],
                    ],
                    [
                        'text' => 'Loại Xe',
                        'key' => 'type',
                    ],
                    [
                        'text' => 'Giá',
                        'key' => 'price_sell',
                        'format' => true,
                    ],
                    [
                        'text' => 'Trạng Thái',
                        'key' => 'status',
                        'status' => [
                            [
                                'text' => 'Hoạt động',
                                'value' => 1,
                                'class' => 'badge badge-success'
                            ],
                            [
                                'text' => 'Tạm dừng',
                                'value' => 0,
                                'class' => 'badge badge-danger'
                            ],
                        ],
                    ],
                ],
                'actions' => [
                    'text'          => "Thao Tác",
                    'create'        => true,
                    'createExcel'   => false,
                    'edit'          => true,
                    'deleteAll'     => true,
                    'delete'        => true,
                    'viewDetail'    => false,
                ],
                'routes' => [
                    'create' => 'admin.vehicles.create',
                    'delete' => 'admin.vehicles.delete',
                    'edit' => 'admin.vehicles.edit',
                    'show' => 'admin.vehicles.show',
                ],
                'list' => $list,
            ];
            return [
                'title' => TextLayoutTitle("vehicle"),
                'tableCrud' => $tableCrud,
            ];
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param $request
     * @return Model
     * @throws Exception
     */
    public function create($request): Model
    {
        $data = $request;
        $data['slug'] = Str::slug($request['name']);
        $data['code'] = $this->generateCode($request);
        return $this->vehicleRepository->create($data);
    }

    private function generateCode($request): string
    {
       return 'SP-' . rand(1000, 9999);
    }

    public function delete($id): bool
    {
        $vehicle = $this->vehicleRepository->find($id);
        return $this->vehicleRepository->delete($vehicle);
    }

    public function find($id): ?Model
    {
        return $this->vehicleRepository->find($id);
    }

    public function update($request, $id): bool
    {
        $data = $request;
        $data['slug'] = Str::slug($request['name']);
        $vehicle = $this->vehicleRepository->find($id);
        return $this->vehicleRepository->update($vehicle, $data);
    }

    public function findBySlug($slug): ?Model
    {
        return $this->vehicleRepository->findBySlug($slug);
    }
}
