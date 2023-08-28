<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required||string|max:255|unique:vehicles,name',
            'model' => 'required|string|max:255',
            'price_import' => 'required|integer',
            'price_sell' => 'required|integer',
            'color' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'self_weight' => 'required|integer',
            'length_x_width_x_height' => 'required|string|max:255',
            'wheelbase' => 'required|string|max:255',
            'saddle_height' => 'required|string|max:255',
            'ground_clearance' => 'required|string|max:255',
            'fuel_tank_capacity' => 'required|string|max:255',
            'size_of_front_tire' => 'required|string|max:255',
            'front_shock_absorber' => 'required|string|max:255',
            'rear_shock_absorber' => 'required|string|max:255',
            'engine_type' => 'required|string|max:255',
            'maximum_capacity' => 'required|string|max:255',
            'engine_oil_capacity' => 'required|string|max:255',
            'fuel_consumption' => 'required|string|max:255',
            'transmission_type' => 'required|string|max:255',
            'starting_system' => 'required|string|max:255',
            'maximum_moment' => 'required|string|max:255',
            'cylinder_capacity' => 'required|string|max:255',
            'diameter_x_piston_stroke' => 'required|string|max:255',
            'compression_ratio' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Hình ảnh không được để trống',
            'name.required' => 'Tên xe không được để trống',
            'name.unique' => 'Tên xe đã tồn tại',
            'name.max' => 'Tên xe không được quá 255 ký tự',
            'model.required' => 'Model không được để trống',
            'model.max' => 'Model không được quá 255 ký tự',
            'model.string' => 'Model phải là chuỗi ký tự',
            'price_import.required' => 'Giá nhập không được để trống',
            'price_import.integer' => 'Giá nhập phải là số',
            'price_sell.required' => 'Giá bán không được để trống',
            'price_sell.integer' => 'Giá bán phải là số',
            'color.required' => 'Màu sắc không được để trống',
            'color.string' => 'Màu sắc phải là chuỗi ký tự',
            'type.required' => 'Loại xe không được để trống',
            'type.string' => 'Loại xe phải là chuỗi ký tự',
            'description.required' => 'Mô tả không được để trống',
            'description.string' => 'Mô tả phải là chuỗi ký tự',
            'self_weight.required' => 'Trọng lượng không được để trống',
            'self_weight.integer' => 'Trọng lượng phải là số',
            'length_x_width_x_height.required' => 'Kích thước không được để trống',
            'length_x_width_x_height.string' => 'Kích thước phải là chuỗi ký tự',
            'length_x_width_x_height.max' => 'Kích thước không được quá 255 ký tự',
            'wheelbase.required' => 'Chiều dài cơ sở không được để trống',
            'wheelbase.string' => 'Chiều dài cơ sở phải là chuỗi ký tự',
            'wheelbase.max' => 'Chiều dài cơ sở không được quá 255 ký tự',
            'saddle_height.required' => 'Chiều cao yên không được để trống',
            'saddle_height.string' => 'Chiều cao yên phải là chuỗi ký tự',
            'saddle_height.max' => 'Chiều cao yên không được quá 255 ký tự',
            'ground_clearance.required' => 'Khoảng sáng gầm không được để trống',
            'ground_clearance.string' => 'Khoảng sáng gầm phải là chuỗi ký tự',
            'ground_clearance.max' => 'Khoảng sáng gầm không được quá 255 ký tự',
            'fuel_tank_capacity.required' => 'Dung tích bình xăng không được để trống',
            'fuel_tank_capacity.string' => 'Dung tích bình xăng phải là chuỗi ký tự',
            'fuel_tank_capacity.max' => 'Dung tích bình xăng không được quá 255 ký tự',
            'size_of_front_tire.required' => 'Kích thước lốp trước không được để trống',
            'size_of_front_tire.string' => 'Kích thước lốp trước phải là chuỗi ký tự',
            'size_of_front_tire.max' => 'Kích thước lốp trước không được quá 255 ký tự',
            'front_shock_absorber.required' => 'Giảm sóc trước không được để trống',
            'front_shock_absorber.string' => 'Giảm sóc trước phải là chuỗi ký tự',
            'front_shock_absorber.max' => 'Giảm sóc trước không được quá 255 ký tự',
            'rear_shock_absorber.required' => 'Giảm sóc sau không được để trống',
            'rear_shock_absorber.string' => 'Giảm sóc sau phải là chuỗi ký tự',
            'rear_shock_absorber.max' => 'Giảm sóc sau không được quá 255 ký tự',
            'engine_type.required' => 'Loại động cơ không được để trống',
            'engine_type.string' => 'Loại động cơ phải là chuỗi ký tự',
            'engine_type.max' => 'Loại động cơ không được quá 255 ký tự',
            'maximum_capacity.required' => 'Công suất tối đa không được để trống',
            'maximum_capacity.string' => 'Công suất tối đa phải là chuỗi ký tự',
            'maximum_capacity.max' => 'Công suất tối đa không được quá 255 ký tự',
            'engine_oil_capacity.required' => 'Dung tích nhớt không được để trống',
            'engine_oil_capacity.string' => 'Dung tích nhớt phải là chuỗi ký tự',
            'engine_oil_capacity.max' => 'Dung tích nhớt không được quá 255 ký tự',
            'fuel_consumption.required' => 'Mức tiêu thụ nhiên liệu không được để trống',
            'fuel_consumption.string' => 'Mức tiêu thụ nhiên liệu phải là chuỗi ký tự',
            'fuel_consumption.max' => 'Mức tiêu thụ nhiên liệu không được quá 255 ký tự',
            'transmission_type.required' => 'Loại hộp số không được để trống',
            'transmission_type.string' => 'Loại hộp số phải là chuỗi ký tự',
            'transmission_type.max' => 'Loại hộp số không được quá 255 ký tự',
            'starting_system.required' => 'Hệ thống khởi động không được để trống',
            'starting_system.string' => 'Hệ thống khởi động phải là chuỗi ký tự',
            'starting_system.max' => 'Hệ thống khởi động không được quá 255 ký tự',
        ];
    }
}
