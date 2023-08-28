<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Models\Vehicle;

class VehicleRepository extends BaseRepository
{

    /**
     * @param Vehicle $vehicle
     */
    public function __construct(Vehicle $vehicle)
    {
        parent::__construct($vehicle);
    }

}
