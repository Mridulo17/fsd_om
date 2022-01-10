<?php

namespace App\Http\Requests\Admin;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class OctaneCostReportRequest extends FormRequest
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
            'octane_cost_reports.*.previous_report' => 'nullable',
            'octane_cost_reports.*.purchase_formula' => 'nullable',
            'octane_cost_reports.*.purchase_Source' => 'nullable',
            'octane_cost_reports.*.purchase_date' => 'nullable',
            'octane_cost_reports.*.purchase_amount_liters' => 'nullable',
            'octane_cost_reports.*.total_amount_liters' => 'nullable',
            'octane_cost_reports.*.issue_date' => 'nullable',
            'octane_cost_reports.*.godiva_pump' => 'nullable',
            'octane_cost_reports.*.angus_pump' => 'nullable',
            'octane_cost_reports.*.firman_generator' => 'nullable',
            'octane_cost_reports.*.honda_generator' => 'nullable',
            'octane_cost_reports.*.smoke_ejector' => 'nullable',
            'octane_cost_reports.*.rotary_rescue_saw' => 'nullable',
            'octane_cost_reports.*.eli_generator' => 'nullable',
            'octane_cost_reports.*.maintenance_work_issue' => 'nullable',
            'octane_cost_reports.*.others' => 'nullable',
            'octane_cost_reports.*.operational_work_issue' => 'nullable',
            'octane_cost_reports.*.administrative_work_issue' => 'nullable',
            'octane_cost_reports.*.total_cost_issue' => 'nullable',
            'octane_cost_reports.*.remaining' => 'nullable',
            'octane_cost_reports.*.comment' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'fire_station_id' => trans('octane_cost_report.fire_station_id'),
            'employee_id' => trans('octane_cost_report.employee_id'),
            'designation_id' => trans('octane_cost_report.designation_id'),

            'previous_report' => trans('octane_cost_report.previous_report'),
            'purchase_formula' => trans('octane_cost_report.purchase_formula'),
            'purchase_Source' => trans('octane_cost_report.purchase_Source'),
            'purchase_date' => trans('octane_cost_report.purchase_date'),
            'purchase_amount_liters' => trans('octane_cost_report.purchase_amount_liters'),
            'total_amount_liters' => trans('octane_cost_report.total_amount_liters'),
            'issue_date' => trans('octane_cost_report.issue_date'),
            'godiva_pump' => trans('octane_cost_report.godiva_pump'),
            'angus_pump' => trans('octane_cost_report.angus_pump'),
            'firman_generator' => trans('octane_cost_report.firman_generator'),
            'honda_generator' => trans('octane_cost_report.honda_generator'),
            'smoke_ejector' => trans('octane_cost_report.smoke_ejector'),
            'rotary_rescue_saw' => trans('octane_cost_report.rotary_rescue_saw'),
            'eli_generator' => trans('octane_cost_report.eli_generator'),
            'maintenance_work_issue' => trans('octane_cost_report.maintenance_work_issue'),
            'others' => trans('octane_cost_report.others'),
            'operational_work_issue' => trans('octane_cost_report.operational_work_issue'),
            'administrative_work_issue' => trans('octane_cost_report.administrative_work_issue'),
            'total_cost_issue' => trans('octane_cost_report.total_cost_issue'),
            'remaining' => trans('octane_cost_report.remaining'),
            'comment' => trans('octane_cost_report.comment'),

        ];
    }
}
