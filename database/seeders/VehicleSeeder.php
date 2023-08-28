<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // delete all
        \App\Models\Vehicle::truncate();
        for ($i = 0; $i < 20 ; $i++){
            \App\Models\Vehicle::create([
                'code' => 'SP00' . $i,
                'image' => 'xe.png',
                'name' => 'Exciter 155 VVA' . $i,
                'slug' =>  Str::slug('Exciter 155 VVA' . $i),
                'model' => '2020',
                'price_import' => '50000000',
                'price_sell' => '60000000',
                'color' => '#ffff',
                'type' => 'Xe số',
                'status' => '1',
                'description' => "<h5 style='font-family: Helvetica; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-weight: 700; color: rgb(33, 33, 33); font-size: 18px; font-stretch: normal;'>Đặc điểm</h5><p class='text-justify' style='font-family: Helvetica; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: left; font-size: 14px; font-stretch: normal; line-height: 1.43; color: rgb(33, 33, 33); padding-right: 50px;'>Kế thừa tinh hoa của dòng xe SH với những đường nét thanh lịch, sang trọng mang hơi thở Châu Âu cùng động cơ cải tiến đột phá và công nghệ tiên tiến, SH160i/125i mới sở hữu diện mạo đầy ấn tượng và nổi bật.</p>",
                'self_weight' => '117',
                'length_x_width_x_height' => '1990 x 725 x 1040',
                'wheelbase' => '1325',
                'saddle_height' => '790',
                'ground_clearance' => '155',
                'fuel_tank_capacity' => '4.2',
                'size_of_front_tire' => '70/90-17M/C 38P',
                'front_shock_absorber' => 'Telescopic',
                'rear_shock_absorber' => 'Monoshock',
                'engine_type' => 'SOHC, 4 van, làm mát bằng dung dịch',
                'maximum_capacity' => '155',
                'engine_oil_capacity' => '1.15',
                'fuel_consumption' => '1.5',
                'transmission_type' => '6 số',
                'starting_system' => 'Điện',
                'maximum_moment' => '13.8',
                'cylinder_capacity' => '155',
                'diameter_x_piston_stroke' => '58.0 x 58.7',
                'compression_ratio' => '11.6:1'
            ]);
        }

    }
}
