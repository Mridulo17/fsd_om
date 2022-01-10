<?php

namespace App\Http\Requests\Admin;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class OperationalMaintenanceReportRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    protected function withValidator(Validator $validator)
    {
        $messages = $validator->messages();

        foreach ($messages->all() as $message)
        {
            Toastr::error($message, trans('settings.failed'), ['timeOut' => 10000]);
        }

        return $validator->errors()->all();
    }

    public function rules()
    {
        return [
            'to_fire_station_id' => 'required',
            'from_fire_station_id' => 'required',
            'memorandum_no_extension' => 'nullable',
            'to_employee_id' => 'required',
            'from_employee_id' => 'required',
            'to_designation_id' => 'required',
            'from_designation_id' => 'required',
            'to_district_id' => 'required',
            'from_district_id' => 'required',
            'operational_maintenance_orders.*.date' => 'nullable|date_format:d-m-Y',
            'operational_maintenance_orders.*.fire_accident_place' => 'nullable',
            'operational_maintenance_orders.*.fire_accident_reason_id' => 'required',
            'operational_maintenance_orders.*.damaged_property_id' => 'required',
            'operational_maintenance_orders.*.probable_damage_amount' => 'nullable',
            'operational_maintenance_orders.*.probable_rescue_amount' => 'nullable',
            'operational_maintenance_orders.*.people_injury' => 'nullable',
            'operational_maintenance_orders.*.people_died' => 'nullable',
            'operational_maintenance_orders.*.animals_injury' => 'nullable',
            'operational_maintenance_orders.*.animals_died' => 'nullable',
            'operational_maintenance_orders.*.employee_injury' => 'nullable',
            'operational_maintenance_orders.*.employee_died' => 'nullable',
            'operational_maintenance_orders.*.assigned_vehicle_id' => 'required',
            'operational_maintenance_orders.*.comment' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'to_fire_station_id' => trans('operational_maintenance_order.to_fire_station_id'),
            'from_fire_station_id' => trans('operational_maintenance_order.from_fire_station_id'),
            'to_employee_id' => trans('operational_maintenance_order.to_employee_id'),
            'from_employee_id' => trans('operational_maintenance_order.from_employee_id'),
            'to_designation_id' => trans('operational_maintenance_order.to_designation_id'),
            'from_designation_id' => trans('operational_maintenance_order.from_designation_id'),
            'to_district_id' => trans('operational_maintenance_order.to_district_id'),
            'from_district_id' => trans('operational_maintenance_order.from_district_id'),
            'date' => trans('operational_maintenance_order.date'),
            'fire_accident_place' => trans('operational_maintenance_order.fire_accident_place'),
            'fire_accident_reason_id' => trans('operational_maintenance_order.fire_accident_reason_id'),
            'damaged_property_id' => trans('operational_maintenance_order.damaged_property_id'),
            'probable_damage_amount' => trans('operational_maintenance_order.probable_damage_amount'),
            'probable_rescue_amount' => trans('operational_maintenance_order.probable_rescue_amount'),
            'people_injury' => trans('operational_maintenance_order.people_injury'),
            'people_died' => trans('operational_maintenance_order.people_died'),
            'animals_injury' => trans('operational_maintenance_order.animals_injury'),
            'animals_died' => trans('operational_maintenance_order.animals_died'),
            'employee_injury' => trans('operational_maintenance_order.employee_injury'),
            'employee_died' => trans('operational_maintenance_order.employee_died'),
            'assigned_vehicle_id' => trans('operational_maintenance_order.assigned_vehicle_id'),
            'comment' => trans('operational_maintenance_order.comment'),

        ];
    }
}
