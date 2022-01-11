@extends('admin.layouts.pdf')

@section('title') @lang('octane_cost_report.octane_cost_report') {{ $octane_cost_report->tracking_no }} @endsection

@section('header')
    <table style="border: 2px solid #fff; height: 100%; font-size: 18px; text-align: center">
        <tr>
            <td class="bb-none bl-none text-center">
                {{$octane_cost_report->fireStation->bn_name}}/
                {{$octane_cost_report->month_name}}/2021 খ্রিঃ
                @lang('octane_cost_report.Monthly octane cost statement:')
            </td>
        </tr>
    </table>

@endsection

@section('content')

    <br><br> <br> <br>
    <table style="border: 2px solid #000; height: 900px; width: 100%;">
        <tr>
            <th style="font-size: 20px;" colspan="24" span="12"  class="p-2 text-center bg-info font-size-14 text-white">
                @lang('octane_cost_report.octane_cost_reports')
            </th>
        </tr>
        <tr>
            <th>#</th>
            <td>@lang('octane_cost_report.previous_report')</td>
            <td>@lang('octane_cost_report.purchase_formula')</td>
            <td>@lang('octane_cost_report.purchase_source')</td>
            <td>@lang('octane_cost_report.purchase_date')</td>
            <td>@lang('octane_cost_report.purchase_amount_liters')</td>
            <td>@lang('octane_cost_report.total_amount_liters')</td>
            <td>@lang('octane_cost_report.issue_date')</td>
            <td>@lang('octane_cost_report.godiva_pump')</td>
            <td>@lang('octane_cost_report.angus_pump')</td>
            <td>@lang('octane_cost_report.firman_generator')</td>
            <td>@lang('octane_cost_report.honda_generator')</td>
            <td>@lang('octane_cost_report.smoke_ejector')</td>
            <td>@lang('octane_cost_report.rotary_rescue_saw')</td>
            <td>@lang('octane_cost_report.eli_generator')</td>
            <td>@lang('octane_cost_report.two_wheeler')</td>
            <td>@lang('octane_cost_report.maintenance_work_issue')</td>
            <td>@lang('octane_cost_report.others')</td>
            <td>@lang('octane_cost_report.operational_work_issue')</td>
            <td>@lang('octane_cost_report.administrative_work_issue')</td>
            <td>@lang('octane_cost_report.total_cost_issue')</td>
            <td>@lang('octane_cost_report.remaining')</td>
            <td>@lang('octane_cost_report.comment')</td>
            <td>@lang('octane_cost_report.power_unit')</td>
        </tr>
        @foreach($octane_cost_report->octaneCostReportDetails as $key => $octane_cost_report_detail)
            <tr>
                <td class="text-center" style="width: 15px;">{{ \App\Helpers\ENTOBN::convert_to_bangla($loop->iteration) }}.</td>
                <td class="">{{ $octane_cost_report_detail->previous_report }}</td>
                <td class="">{{ $octane_cost_report_detail->purchase_formula }}</td>
                <td class="">{{ $octane_cost_report_detail->purchase_source }}</td>
                <td class="">{{ $octane_cost_report_detail->purchase_date }}</td>
                <td class="">{{ $octane_cost_report_detail->purchase_amount_liters }}</td>
                <td class="">{{ $octane_cost_report_detail->total_amount_liters }}</td>
                <td class="">{{ $octane_cost_report_detail->issue_date }}</td>
                <td class="">{{ $octane_cost_report_detail->godiva_pump }}</td>
                <td class="">{{ $octane_cost_report_detail->angus_pump }}</td>
                <td class="">{{ $octane_cost_report_detail->firman_generator }}</td>
                <td class="">{{ $octane_cost_report_detail->honda_generator }}</td>
                <td class="">{{ $octane_cost_report_detail->smoke_ejector }}</td>
                <td class="">{{ $octane_cost_report_detail->rotary_rescue_saw }}</td>
                <td class="">{{ $octane_cost_report_detail->eli_generator }}</td>

                <td class="">{{ $octane_cost_report_detail->two_wheeler }}</td>
                <td class="">{{ $octane_cost_report_detail->maintenance_work_issue }}</td>
                <td class="">{{ $octane_cost_report_detail->others }}</td>
                <td class="">{{ $octane_cost_report_detail->operational_work_issue }}</td>
                <td class="">{{ $octane_cost_report_detail->administrative_work_issue }}</td>
                <td class="">{{ $octane_cost_report_detail->total_cost_liter }}</td>
                <td class="">{{ $octane_cost_report_detail->remaining }}</td>
                <td class="">{{ $octane_cost_report_detail->comment }}</td>
            </tr>
        @endforeach
        <td>
            @foreach($octane_cost_report->octaneCostPowerUnit as $key => $octane_cost_power_unit)
                {{ $octane_cost_power_unit->power_unit }},
            @endforeach
        </td>
    </table>

    <br>
    <br>
    <br>
@endsection

@section('footer')
    <table class="" style="border: 2px solid #fff; font-size: 18px;">
        <tr>
            <td style="text-align: right">
                {{ $octane_cost_report->employee->bn_name }}<br>
                {{ $octane_cost_report->designation->bn_name }}<br>
                {{ $octane_cost_report->fireStation->bn_name }}<br>
                {{ $octane_cost_report->fireStation->thana->bn_name}},
                {{ $octane_cost_report->fireStation->district->bn_name }}
            </td>
        </tr>
    </table>
@endsection
