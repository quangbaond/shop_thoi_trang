<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string('image')->nullable();
            $table->string("name");
            $table->string("slug");
            $table->string("model");
            $table->bigInteger("price_import");
            $table->bigInteger("price_sell");
            $table->string("color");
            $table->integer("type");
            $table->tinyInteger("status")->default(1);
            $table->longText("description")->nullable();
            $table->string("self_weight")->nullable();
            //Dài x Rộng x Cao
            $table->string("length_x_width_x_height")->nullable();
            //Khoảng cách trục bánh xe
            $table->string("wheelbase")->nullable();
            // Độ cao yên
            $table->string("saddle_height")->nullable();
            //Khoảng sáng gầm xe
            $table->string("ground_clearance")->nullable();
            //Dung tích bình xăng
            $table->string("fuel_tank_capacity")->nullable();
            // Kích cỡ lớp trước/ sau
            $table->string("size_of_front_tire")->nullable();
            // Phuộc trước
            $table->string("front_shock_absorber")->nullable();
            //Phuộc sau
            $table->string("rear_shock_absorber")->nullable();
            // Loại động cơ
            $table->string("engine_type")->nullable();
            //Công suất tối đa
            $table->string("maximum_capacity")->nullable();
            //Dung tích nhớt máy
            $table->string("engine_oil_capacity")->nullable();
            //Mức tiêu thụ nhiên liệu
            $table->string("fuel_consumption")->nullable();
            // Loại truyền động
            $table->string("transmission_type")->nullable();
            //Hệ thống khởi động
            $table->string("starting_system")->nullable();
            //Moment cực đại
            $table->string("maximum_moment")->nullable();
            // Dung tích xy-lanh
            $table->string("cylinder_capacity")->nullable();
            //Đường kính x Hành trình pít tông
            $table->string("diameter_x_piston_stroke")->nullable();
            // Tỷ số nén
            $table->string("compression_ratio")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
