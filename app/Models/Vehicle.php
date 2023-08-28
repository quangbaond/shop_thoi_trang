<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';
    protected $fillable = [
        'code',
        'image',
        'name',
        'slug',
        'model',
        'price_import',
        'price_sell',
        'color',
        'type',
        'status',
        'description',
        'self_weight',
        'length_x_width_x_height',
        'wheelbase',
        'saddle_height',
        'ground_clearance',
        'fuel_tank_capacity',
        'size_of_front_tire',
        'front_shock_absorber',
        'rear_shock_absorber',
        'engine_type',
        'maximum_capacity',
        'engine_oil_capacity',
        'fuel_consumption',
        'transmission_type',
        'starting_system',
        'maximum_moment',
        'cylinder_capacity',
        'diameter_x_piston_stroke',
        'compression_ratio'
    ];
}
