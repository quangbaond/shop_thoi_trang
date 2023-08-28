<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TextSystemConst;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateVehicleRequest;
use App\Services\VehicleService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleController extends Controller
{
    protected VehicleService $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     * @throws Exception
     */
    public function index(Request $request): Application|Factory|View
    {

        try {
            $params = $request->all();
            $params['all'] = true;
            $params['orderBy'] = 'desc'; // 'asc
            $params['orderByColumn'] = ['created_at'];
            $vehicles = $this->vehicleService->search($params);
            $tableCrud = $vehicles['tableCrud'];
            $title = $vehicles['title'];
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return view('admin.vehicle.index', compact('tableCrud', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $title = "Thêm mới phương tiện";
        return view('admin.vehicle.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateVehicleRequest $request
     * @throws Exception
     */
    public function store(CreateVehicleRequest $request): RedirectResponse
    {
        $data = $request->all();
        try {

            if($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '-'.  $image->getClientOriginalName();
                $image->move(public_path('asset/client/images/products/vehicle'), $name);
                $data['image'] = $name;
            }
            $this->vehicleService->create($data);
            return redirect()->route('admin.vehicles.index')->with('success', 'Thêm mới phương tiện thành công');
        } catch (Exception $e) {
            return redirect()->route('admin.vehicles.index')->with('error', 'Thêm mới phương tiện thất bại')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $vehicle = $this->vehicleService->find($id);
        $title = "Chỉnh sửa phương tiện";
        return view('admin.vehicle.edit', compact('vehicle', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {

            try {
                $data = $request->all();
                if($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time() . '-'.  $image->getClientOriginalName();
                    $image->move(public_path('asset/client/images/products/vehicle'), $name);
                    $data['image'] = $name;
                }
                $this->vehicleService->update($data, $id);
                return redirect()->route('admin.vehicles.index')->with('success', 'Cập nhật phương tiện thành công');
            } catch (Exception $e) {
                return redirect()->route('admin.vehicles.index')->with('error', 'Cập nhật phương tiện thất bại')->withInput();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        //
    }

    public function delete(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->vehicleService->delete($request->id);
            return response()->json(['status' => 'success', 'message' => TextSystemConst::DELETE_SUCCESS], 200);
        } catch (Exception $e) {
            return response()->json(['status' => 'failed', 'message' => TextSystemConst::DELETE_FAILED], 200);
        }
    }
}
