<?php

namespace App\Http\Requests\Admin;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MasterRollReportRequest extends FormRequest
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
            'thana_id' => 'required',
            'date' => 'nullable|date_format:d-m-Y',
            'master_roll_reports.*.total_attendance_days' => 'nullable',
            'master_roll_reports.*.total_absent_days' => 'required',
            'master_roll_reports.*.ml_el' => 'nullable',
            'master_roll_reports.*.rl' => 'nullable',
            'master_roll_reports.*.salary_workday' => 'nullable',
            'master_roll_reports.*.comment' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'to_fire_station_id' => trans('master_roll_report.to_fire_station_id'),
            'from_fire_station_id' => trans('master_roll_report.from_fire_station_id'),
            'to_employee_id' => trans('master_roll_report.to_employee_id'),
            'from_employee_id' => trans('master_roll_report.from_employee_id'),
            'to_designation_id' => trans('master_roll_report.to_designation_id'),
            'from_designation_id' => trans('master_roll_report.from_designation_id'),
            'to_district_id' => trans('master_roll_report.to_district_id'),
            'from_district_id' => trans('master_roll_report.from_district_id'),
            'thana_id' => trans('master_roll_report.thana_id'),
            'date' => trans('master_roll_report.date'),
            'total_attendance_days' => trans('master_roll_report.total_attendance_days'),
            'total_absent_days' => trans('master_roll_report.total_absent_days'),
            'ml_el' => trans('master_roll_report.ml_el'),
            'rl' => trans('master_roll_report.rl'),
            'salary_workday' => trans('master_roll_report.salary_workday'),
            'comment' => trans('master_roll_report.comment'),

        ];
    }
}
