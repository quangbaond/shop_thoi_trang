@extends('layouts.client')
@section('content-client')
    <div class="container_fullwidth">
        <div class="container shopping-cart">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title" style="border-bottom: 2px solid #8b4093; padding: 10px 0;">
                        Sản Phầm Chính Hãng
                    </h3>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-md-6">
                <h1 style="color: #8b4093; margin: 10px 0; font-weight: 700">{{ $vehicle->name }}</h1>
                <h3 style="font-weight: 700">Giá từ: {{ format_number_to_money($vehicle->price_sell) }}</h3>
                <div class="description" style="margin: 20px 0;">
                    {!!  $vehicle->description !!}
                </div>
            </div>
            <div class="col-md-6" style="margin: 20px 0;">
                <img src="{{ asset("asset/client/images/products/vehicle/" . $vehicle->image ) }}" alt="{{ $vehicle->name }}">
            </div>
        </div>
    </div>
    <div class="container_fullwidth">
        <div class="container shopping-cart">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title" style="border-bottom: 2px solid #8b4093; padding: 10px 0;">
                        Thông số kĩ thuật
                    </h3>
                    <div class="clearfix"></div>
                    <div class="container" style="background: #f3f3f3">
                        <div class="parameter" style="margin: 50px; background: #f3f3f3">
                            <div class="row" style="background: #fff; padding: 20px;">
                                <div class="col-md-6">
                                    <h5>Khối lượng bản thân</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->self_weight }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px;">
                                <div class="col-md-6">
                                    <h5>Dài x Rộng x Cao</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->length_x_width_x_height }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px; background: #fff">
                                <div class="col-md-6">
                                    <h5>Độ cao yên</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->saddle_height }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px;">
                                <div class="col-md-6">
                                    <h5>Khoảng sáng gầm xe</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->ground_clearance }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px; background: #fff">
                                <div class="col-md-6">
                                    <h5>Dung tích bình xăng</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->fuel_tank_capacity }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px;">
                                <div class="col-md-6">
                                    <h5>Kích cỡ lớp trước/ sau</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->size_of_front_tire }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px; background: #fff">
                                <div class="col-md-6">
                                    <h5>Phuộc trước</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->front_shock_absorber }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px;">
                                <div class="col-md-6">
                                    <h5>Phuộc sau</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->rear_shock_absorber }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px; background: #fff">
                                <div class="col-md-6">
                                    <h5>Loại động cơ</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->engine_type }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px;">
                                <div class="col-md-6">
                                    <h5>Công suất tối đa</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->maximum_capacity }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px; background: #fff">
                                <div class="col-md-6">
                                    <h5>Dung tích nhớt máy</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->engine_oil_capacity }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px;">
                                <div class="col-md-6">
                                    <h5>Mức tiêu thụ nhiên liệu</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->fuel_consumption }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px; background: #fff">
                                <div class="col-md-6">
                                    <h5>Loại truyền động</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->transmission_type }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px;">
                                <div class="col-md-6">
                                    <h5>Hệ thống khởi động</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->starting_system }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px; background: #fff">
                                <div class="col-md-6">
                                    <h5>Moment cực đại</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->maximum_moment }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px;">
                                <div class="col-md-6">
                                    <h5>Dung tích xy-lanh</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->cylinder_capacity }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px; background: #fff">
                                <div class="col-md-6">
                                    <h5>Đường kính x Hành trình pít tông</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->diameter_x_piston_stroke }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px;">
                                <div class="col-md-6">
                                    <h5>Tỷ số nén</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->compression_ratio }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px;background: #fff">
                                <div class="col-md-6">
                                    <h5>Khoảng cách trục bánh xe</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 style="font-weight: 700">{{ $vehicle->wheelbase }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('style')
    <style>
        body {
            background: #ffffff !important;
        }
    </style>
@stop
