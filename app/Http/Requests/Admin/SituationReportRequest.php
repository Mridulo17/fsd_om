<?php

namespace App\Http\Requests\Admin;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SituationReportRequest extends FormRequest
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
            'from_fire_station_id' => 'required',
            'memorandum_no_extension' => 'nullable',
            'to_employee_id' => 'required',
            'to_fire_station_id' => 'required',
            'to_designation_id' => 'required',
            'to_district_id' => 'required',
            'from_employee_id' => 'required',
            'from_designation_id' => 'required',
            'from_district_id' => 'required',
            'thana_id' => 'required',
//            'date' => 'nullable|date_format:d-m-Y',
            'administrative_situations.*.fire_station_id' => 'required',
            'administrative_situations.*.situation_report_problems' => 'nullable',
            'administrative_situations.*.recipient_system' => 'nullable',
            'administrative_situations.*.next_activities_responsibility' => 'nullable',
            'administrative_situations.*.comment' => 'nullable',

            'operation_situations.*.fire_station_id' => 'required',
            'operation_situations.*.situation_report_problems' => 'nullable',
            'operation_situations.*.recipient_system' => 'nullable',
            'operation_situations.*.next_activities_responsibility' => 'nullable',
            'operation_situations.*.comment' => 'nullable',

            'development_training_situations.*.fire_station_id' => 'required',
            'development_training_situations.*.situation_report_problems' => 'nullable',
            'development_training_situations.*.recipient_system' => 'nullable',
            'development_training_situations.*.next_activities_responsibility' => 'nullable',
            'development_training_situations.*.comment' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [

            'to_fire_station_id' => trans('master_roll_report.to_fire_station_id'),
            'from_fire_station_id' => trans('master_roll_report.from_fire_station_id'),
            'memorandum_no_extension' => trans('master_roll_report.memorandum_no_extension'),
            'to_employee_id' => trans('master_roll_report.to_employee_id'),
            'from_employee_id' => trans('master_roll_report.from_employee_id'),
            'to_designation_id' => trans('master_roll_report.to_designation_id'),
            'from_designation_id' => trans('master_roll_report.from_designation_id'),
            'to_district_id' => trans('master_roll_report.to_district_id'),
            'from_district_id' => trans('master_roll_report.from_district_id'),
            'thana_id' => trans('master_roll_report.thana_id'),
//            'date' => trans('master_roll_report.date'),

            'administrative_situations.*.fire_station_id' => trans('master_roll_report.fire_station_id'),
            'administrative_situations.*.situation_report_problems' => trans('master_roll_report.situation_report_problems'),
            'administrative_situations.*.recipient_system' => trans('master_roll_report.recipient_system'),
            'administrative_situations.*.next_activities_responsibility' => trans('master_roll_report.next_activities_responsibility'),
            'administrative_situations.*.comment' => trans('master_roll_report.comment'),

            'operation_situations.*.fire_station_id' => trans('master_roll_report.fire_station_id'),
            'operation_situations.*.situation_report_problems' => trans('master_roll_report.situation_report_problems'),
            'operation_situations.*.recipient_system' => trans('master_roll_report.recipient_system'),
            'operation_situations.*.next_activities_responsibility' => trans('master_roll_report.next_activities_responsibility'),
            'operation_situations.*.comment' => trans('master_roll_report.comment'),

            'development_training_situations.*.fire_station_id' => trans('master_roll_report.fire_station_id'),
            'development_training_situations.*.situation_report_problems' => trans('master_roll_report.situation_report_problems'),
            'development_training_situations.*.recipient_system' => trans('master_roll_report.recipient_system'),
            'development_training_situations.*.next_activities_responsibility' => trans('master_roll_report.next_activities_responsibility'),
            'development_training_situations.*.comment' => trans('master_roll_report.comment'),



        ];
    }
}
