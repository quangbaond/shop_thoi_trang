<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\VehicleService;
use Exception;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    protected VehicleService $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    /**
     * @throws Exception
     */
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $params = $request->all();
        $params['orderBy'] = 'desc'; // 'asc
        $params['orderByColumn'] = ['created_at'];
        $data = $this->vehicleService->search($params);
        $vehicles = $data['tableCrud']['list'];
        $title = $data['title'];
        return view('client.vehicle.index', compact('vehicles', 'title'));
    }

    public function detail(string $slug, Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $vehicle = $this->vehicleService->findBySlug($slug);
        if (!$vehicle) {
            abort(404);
        }
        return view('client.vehicle.detail', compact('vehicle'));
    }
}
