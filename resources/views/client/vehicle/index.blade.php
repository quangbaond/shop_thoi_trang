@extends('layouts.client')
@section('content-client')
    <div class="container_fullwidth">
        <div class="container shopping-cart">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title" style="border-bottom: 2px solid #8b4093;">
                        Lựa Chọn Phong Cách Riêng Của Bạn
                    </h3>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="hot-products">
                <ul>
                    <li>
                        <div class="row">
                            @foreach ($vehicles as $vehicle)
                                <div class="col-md-4 col-sm-6">
                                    <div class="products">
{{--                                        <div class="offer">- %20</div>--}}
                                        <div class="thumbnail"><a href="{{ route('user.products_vehicle_detail', $vehicle->slug) }}"><img src="{{ asset("asset/client/images/products/vehicle/" . $vehicle->image ) }}" alt="{{ $vehicle->name }}"></a></div>
                                        <div class="productname">{{ $vehicle->name }}</div>
                                        <h4 class="price">{{ format_number_to_money($vehicle->price_sell) }}</h4>
                                        <div class="button_group">
                                            <button class="button add-cart" type="button">Thêm Vào Giỏ Hàng</button>
                                            <button class="button compare" type="button"><a style="color: #000" href="{{ route('user.products_vehicle_detail', $vehicle->slug) }}">Xem chi tiết</a></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div style="display: flex; justify-content: center">
                {{ $vehicles->withQueryString()->links('vendor.pagination.default')}}
            </div>

        </div>
@endsection
