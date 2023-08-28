@extends('layouts.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form class="row" action="{{route('admin.vehicles.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin cơ bản</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="card-body row">
                                        <x-admin-input-prepend label="Tên Sản Phẩm" width="auto" col="col-6">
                                            <input
                                                id="name"
                                                type="text"
                                                name="name"
                                                value="{{ old('name') ?? '' }}"
                                                class="form-control">
                                            @error('name')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Tên hãng phương tiện" width="auto" col="col-6">
                                            <input
                                                id="model"
                                                type="text"
                                                name="model"
                                                value="{{ old('model') ?? '' }}"
                                                class="form-control">
                                            @error('model')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>

                                        <x-admin-input-prepend label="Giá Nhập" col="col-6" width="auto">
                                            <input
                                                id="price_import"
                                                type="number"
                                                min="1"
                                                name="price_import"
                                                value="{{ old('price_import') ?? '' }}"
                                                class="form-control">
                                            @error('price_import')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Giá Bán" col="col-6" width="auto">
                                            <input
                                                id="price_sell"
                                                type="number"
                                                name="price_sell"
                                                value="{{ old('price_sell') ?? '' }}"
                                                class="form-control">
                                            @error('price_sell')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Màu phương tiện" width="auto" col="col-6">
                                            <input
                                                id="color"
                                                type="color"
                                                name="color"
                                                value="{{ old('color') ?? '' }}"
                                                class="form-control">
                                            @error('color')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Kiểu phương tiện" width="auto" col="col-6">
                                            <input
                                                id="type"
                                                type="text"
                                                name="type"
                                                class="form-control"
                                                value="{{ old('type') ?? '' }}"
                                                placeholder="Mô tô, ô tô, xe máy"
                                            >
                                            @error('type')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <div class="card card-outline card-info col-12">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Mô Tả Sản Phẩm
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                  <textarea id="summernote" name="description">{{ old('description') ?? '' }}</textarea>
                                                @error('description')
                                                <div style="color: red; width: 100%;"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card-body row">
                                        <x-admin-input-prepend label="Trọng lượng" width="auto" col="col-6">
                                            <input
                                                id="self_weight"
                                                type="number"
                                                name="self_weight"
                                                class="form-control"
                                                value="{{ old('self_weight') ?? '' }}"
                                            >
                                            @error('self_weight')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Kích thước" width="auto" col="col-6">
                                            <input
                                                id="length_x_width_x_height"
                                                type="text"
                                                name="length_x_width_x_height"
                                                value="{{ old('length_x_width_x_height') ?? '' }}"
                                                class="form-control">
                                            @error('length_x_width_x_height')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Chiều dài cơ sở" width="auto" col="col-6">
                                            <input
                                                id="wheelbase"
                                                type="text"
                                                name="wheelbase"
                                                value="{{ old('wheelbase') ?? '' }}"
                                                class="form-control">
                                            @error('wheelbase')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Chiều cao yên xe" width="auto" col="col-6">
                                            <input
                                                id="saddle_height"
                                                type="text"
                                                name="saddle_height"
                                                value="{{ old('saddle_height') ?? '' }}"
                                                class="form-control">
                                            @error('saddle_height')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Khoảng sáng gầm xe" width="auto" col="col-6">
                                            <input
                                                id="ground_clearance"
                                                type="text"
                                                name="ground_clearance"
                                                value="{{ old('ground_clearance') ?? '' }}"
                                                class="form-control">
                                            @error('ground_clearance')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Dung tích bình xăng" width="auto" col="col-6">
                                            <input
                                                id="fuel_tank_capacity"
                                                type="text"
                                                name="fuel_tank_capacity"
                                                value="{{ old('fuel_tank_capacity') ?? '' }}"
                                                class="form-control">
                                            @error('fuel_tank_capacity')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Kích thước lốp trước" width="auto" col="col-6">
                                            <input
                                                id="size_of_front_tire"
                                                type="text"
                                                name="size_of_front_tire"
                                                value="{{ old('size_of_front_tire') ?? '' }}"
                                                class="form-control">
                                            @error('size_of_front_tire')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Phuộc trước" width="auto" col="col-6">
                                            <input
                                                id="front_shock_absorber"
                                                type="text"
                                                name="front_shock_absorber"
                                                value="{{ old('front_shock_absorber') ?? '' }}"
                                                class="form-control">
                                            @error('front_shock_absorber')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Phuộc sau" width="auto" col="col-6">
                                            <input
                                                id="rear_shock_absorber"
                                                type="text"
                                                name="rear_shock_absorber"
                                                value="{{ old('rear_shock_absorber') ?? '' }}"
                                                class="form-control">
                                            @error('rear_shock_absorber')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Loại động cơ" width="auto" col="col-6">
                                            <input
                                                id="engine_type"
                                                type="text"
                                                name="engine_type"
                                                value="{{ old('engine_type') ?? '' }}"
                                                class="form-control">
                                            @error('engine_type')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Dung tích tối đa" width="auto" col="col-6">
                                            <input
                                                id="maximum_capacity"
                                                type="text"
                                                name="maximum_capacity"
                                                value="{{ old('maximum_capacity') ?? '' }}"
                                                class="form-control">
                                            @error('maximum_capacity')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Dung tích nhớt máy" width="auto" col="col-6">
                                            <input
                                                id="engine_oil_capacity"
                                                type="text"
                                                name="engine_oil_capacity"
                                                value="{{ old('engine_oil_capacity') ?? '' }}"
                                                class="form-control">
                                            @error('engine_oil_capacity')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Mức tiêu hao nhiên liệu" width="auto" col="col-6">
                                            <input
                                                id="fuel_consumption"
                                                type="text"
                                                name="fuel_consumption"
                                                value="{{ old('fuel_consumption') ?? '' }}"
                                                class="form-control">
                                            @error('fuel_consumption')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Loại hộp số" width="auto" col="col-6">
                                            <input
                                                id="transmission_type"
                                                type="text"
                                                name="transmission_type"
                                                value="{{ old('transmission_type') ?? '' }}"
                                                class="form-control">
                                            @error('transmission_type')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Hệ thống khởi động" width="auto" col="col-6">
                                            <input
                                                id="starting_system"
                                                type="text"
                                                name="starting_system"
                                                value="{{ old('starting_system') ?? '' }}"
                                                class="form-control">
                                            @error('starting_system')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Moment cực đại" width="auto" col="col-6">
                                            <input
                                                id="maximum_moment"
                                                type="text"
                                                name="maximum_moment"
                                                value="{{ old('maximum_moment') ?? '' }}"
                                                class="form-control">
                                            @error('maximum_moment')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Dung tích xy-lanh" width="auto" col="col-6">
                                            <input
                                                id="cylinder_capacity"
                                                type="text"
                                                name="cylinder_capacity"
                                                value="{{ old('cylinder_capacity') ?? '' }}"
                                                class="form-control">
                                            @error('cylinder_capacity')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Đường kính x Hành trình pít tông" width="auto" col="col-6">
                                            <input
                                                id="diameter_x_piston_stroke"
                                                type="text"
                                                name="diameter_x_piston_stroke"
                                                value="{{ old('diameter_x_piston_stroke') ?? '' }}"
                                                class="form-control">
                                            @error('diameter_x_piston_stroke')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <x-admin-input-prepend label="Tỷ số nén" width="auto" col="col-6">
                                            <input
                                                id="compression_ratio"
                                                type="text"
                                                name="compression_ratio"
                                                value="{{ old('compression_ratio') ?? '' }}"
                                                class="form-control">
                                            @error('compression_ratio')
                                            <div style="color: red; width: 100%;"> {{ $message }}</div>
                                            @enderror
                                        </x-admin-input-prepend>
                                        <div class="col-12">
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="preview">
                                                        <img id="img-preview" src="" />
                                                        <label for="file-input">Chọn Hình Ảnh</label>
                                                        <input hidden accept="image/*" type="file" id="file-input" name="image"/>
                                                        @error('image')
                                                        <div style="color: red; width: 100%;"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 text-center" style="padding-bottom: 10px;">
                                    <button class="btn btn-success" type="submit">THÊM MỚI</button>
                                    <button class="btn btn-danger" type="button"><a href="{{ \Illuminate\Support\Facades\URL::previous() }}"></a>HỦY</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <script>
    </script>
    @vite(
    [
      'resources/admin/js/user-create.js',
      'resources/admin/js/product.js',
      'resources/admin/css/product.css',
      'resources/admin/css/form-edit.css',
      'resources/common/js/form.js',
    ])
@endsection
