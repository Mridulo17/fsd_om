<?php

namespace App\Http\Requests\Admin;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MonthlyFuelReportRequest extends FormRequest
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
            'fire_station_id' => 'required',
            'employee_id' => 'required',
            'designation_id' => 'required',
            'assigned_vehicle_id' => 'required',
            'monthly_fuel_reports.*.work_type_place' => 'nullable',
            'monthly_fuel_reports.*.fuel_type' => 'nullable',
            'monthly_fuel_reports.*.meter_reading' => 'nullable',
            'monthly_fuel_reports.*.distance_per_liter' => 'nullable',
            'monthly_fuel_reports.*.total_fuel_cost' => 'nullable',
            'monthly_fuel_reports.*.comment' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'fire_station_id' => trans('monthly_fuel_report.fire_station_id'),
            'employee_id' => trans('monthly_fuel_report.employee_id'),
            'designation_id' => trans('monthly_fuel_report.designation_id'),
            'assigned_vehicle_id' => trans('monthly_fuel_report.assigned_vehicle_id'),
            'work_type_place' => trans('monthly_fuel_report.work_type_place'),
            'fuel_type' => trans('monthly_fuel_report.fuel_type'),
            'meter_reading' => trans('monthly_fuel_report.meter_reading'),
            'distance_per_liter' => trans('monthly_fuel_report.distance_per_liter'),
            'total_fuel_cost' => trans('monthly_fuel_report.total_fuel_cost'),
            'comment' => trans('monthly_fuel_report.comment'),

        ];
    }
}
