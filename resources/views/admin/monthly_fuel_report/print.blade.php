@extends('admin.layouts.pdf')

@section('title') @lang('monthly_fuel_report.monthly_fuel_report') {{ $monthly_fuel_report->tracking_no }} @endsection

@section('header')
    <table style="border: 2px solid #fff; height: 100%; font-size: 18px;">
        <tr>
            <td class="bb-none bl-none text-center ">
                {{ $monthly_fuel_report->assignedVehicle->model->bn_name }}
                {{ $monthly_fuel_report->assignedVehicle->brand->bn_name}}
                {{ $monthly_fuel_report->assignedVehicle->category->bn_name }}
                {{ $monthly_fuel_report->assignedVehicle->type->bn_name }}
                @lang('monthly_fuel_report.Expensive diesel cost statement for the month:')
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-center">
                {{$monthly_fuel_report->fireStation->bn_name}}/
                {{$monthly_fuel_report->month_name}}/2021 খ্রিঃ
                @lang('monthly_fuel_report.Expensive diesel cost statement for the month:')
            </td>
        </tr>
    </table>

@endsection

@section('content')

    <br><br> <br> <br>
    <table style="border: 2px solid #000; height: 900px;">
        <tr>
            <td> @lang('common.serial') </td>
            <td>@lang('monthly_fuel_report.work_type_place') </td>
            <td>@lang('monthly_fuel_report.fuel_type')</td>
            <td>@lang('monthly_fuel_report.meter_reading')</td>
            <td>@lang('monthly_fuel_report.total_fuel_cost')</td>
            <td>@lang('monthly_fuel_report.comment')</td>
        </tr>
        @foreach($monthly_fuel_report->MonthlyFuelReportDetails as $key => $monthly_fuel_report_detail)
            <tr>
                <td class="text-center" style="width: 15px;">{{ \App\Helpers\ENTOBN::convert_to_bangla($loop->iteration) }}.</td>
                <td class="">{{ $monthly_fuel_report_detail->work_type_place }}</td>
                <td class="">{{ $monthly_fuel_report_detail->fuel_type }}</td>
                <td class="">{{ $monthly_fuel_report_detail->meter_reading }}</td>
                <td class="">{{ $monthly_fuel_report_detail->total_fuel_cost }}</td>
                <td class="">{{ $monthly_fuel_report_detail->comment }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    <table class="" style="border: 2px solid #fff; font-size: 18px;">
        <tr>
            <td style="text-align: right">
                {{ $monthly_fuel_report->employee->bn_name }}<br>
                {{ $monthly_fuel_report->designation->bn_name }}<br>
                {{ $monthly_fuel_report->fireStation->bn_name }}<br>
                {{ $monthly_fuel_report->fireStation->thana->bn_name}},
                {{ $monthly_fuel_report->fireStation->district->bn_name }}
            </td>
        </tr>
    </table>
@endsection
