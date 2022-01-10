@extends('admin.layouts.pdf')

@section('title') @lang('operational_maintenance_report.operational_maintenance_report') {{ $operational_maintenance_report->tracking_no }} @endsection

{{--@section('header')
    <table style="border: 2px solid #fff; height: 100%">
        <tr>
            <td class="gtc"><p style=" font-size: 15px; padding-top: 50px;">@lang('operational_maintenance_report.Government of the People Republic of Bangladesh')</p>
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-left text-uppercase">
                {{ $operational_maintenance_report->fromFireStation->bn_name }}<>
            </td>
        </tr>

        <tr>
            <td class="bb-none bl-none text-left text-uppercase">
                {{ $operational_maintenance_report->fromFireStation->thana->bn_name}}<br>
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-left text-uppercase">
                {{ $operational_maintenance_report->fromdistrict->bn_name }}<br>
            </td>
        </tr>
    </table>

@endsection--}}

@section('content')
    <table style="border: 2px solid #fff; padding-bottom: 45px;">
        <tr style="border: 2px solid #fff;">
            <td class="gtc"><p style=" font-size: 15px;">@lang('operational_maintenance_report.Government of the People Republic of Bangladesh')</p>
                {{ $operational_maintenance_report->fromFireStation->bn_name }}<br>
                {{ $operational_maintenance_report->fromFireStation->thana->bn_name}},
                {{ $operational_maintenance_report->fromdistrict->bn_name }}<br>
                {{ $operational_maintenance_report->fromFireStation->email }}
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-right">@lang('common.date') {{ \App\Helpers\ENTOBN::convert_to_bangla(\Carbon\Carbon::parse($operational_maintenance_report->created_at)->format('d-m-Y')) }} খ্রিঃ
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-left text-uppercase">
                @lang('operational_maintenance_report.memorandum_no')
                -{{$operational_maintenance_report->fromFireStation->memorandum_no}}/
                {{$operational_maintenance_report->memorandum_no_extension}}
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-left text-uppercase">
                @lang('operational_maintenance_report.to_designation_id')
                -{{$operational_maintenance_report->toDesignation->bn_name}}
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-left text-uppercase">
                @lang('operational_maintenance_report.to_fire_station_id')
                -{{$operational_maintenance_report->toFireStation->bn_name}}
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-left text-uppercase">
                @lang('operational_maintenance_report.to_district_id')
                -{{$operational_maintenance_report->toDistrict->bn_name}}
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-left text-uppercase">
                @lang('operational_maintenance_report.subject')
                {{$operational_maintenance_report->month_name}}/2021 খ্রিঃ
                @lang('operational_maintenance_report.About Send Monthly Operational Working Information.')
            </td>
        </tr>
        <tr>
            <td>
                <p>@lang('operational_maintenance_report.In the light of the appropriate subject, it is politely informed that,'){{$operational_maintenance_report->fromFireStation->bn_name}}
                    @lang('operational_maintenance_report.Its Under Cover')
                      {{$operational_maintenance_report->month_name}}/2021 খ্রিঃ @lang('operational_maintenance_report.Reports of fires and accidents occurring during the month that is taking part in operational activities are kindly sent for your kind information.')
                </p>
            </td>
        </tr>

    </table>

    <br><br>

    <table style="border: 2px solid #000; height: 900px;">
        <tr>
            <td> @lang('common.serial') </td>
            <td>@lang('operational_maintenance_report.date') </td>
            <td>@lang('operational_maintenance_report.fire_accident_place')</td>
            <td>@lang('operational_maintenance_report.fire_accident_reason_id')</td>
            <td>@lang('operational_maintenance_report.damaged_property_id')</td>
            <td>@lang('operational_maintenance_report.probable_damage_amount')</td>
            <td>@lang('operational_maintenance_report.probable_rescue_amount')</td>
            <td>@lang('operational_maintenance_report.people_injury')</td>
            <td>@lang('operational_maintenance_report.people_died')</td>
            <td>@lang('operational_maintenance_report.animals_injury')</td>
            <td>@lang('operational_maintenance_report.animals_died')</td>
            <td>@lang('operational_maintenance_report.employee_injury')</td>
            <td>@lang('operational_maintenance_report.employee_died')</td>
            <td>@lang('operational_maintenance_report.assigned_vehicle_id')</td>
            <td>@lang('operational_maintenance_report.comment')</td>
        </tr>
        @foreach($operational_maintenance_report->operationalMaintenanceDetails as $key => $operational_maintenance_report_detail)
            <tr>
                <td class="text-center" style="width: 15px;">{{ \App\Helpers\ENTOBN::convert_to_bangla($loop->iteration) }}.</td>
                <td class="">{{ $operational_maintenance_report_detail->date }}</td>
                <td class="">{{ $operational_maintenance_report_detail->fire_accident_place }}</td>
                <td class="">{{ $operational_maintenance_report_detail->fire_accident_reason_id }}</td>
                <td class="">{{ $operational_maintenance_report_detail->damaged_property_id }}</td>
                <td class="">{{ $operational_maintenance_report_detail->probable_damage_amount }}</td>
                <td class="">{{ $operational_maintenance_report_detail->probable_rescue_amount }}</td>
                <td class="">{{ $operational_maintenance_report_detail->people_injury }}</td>
                <td class="">{{ $operational_maintenance_report_detail->people_died }}</td>
                <td class="">{{ $operational_maintenance_report_detail->animals_injury }}</td>
                <td class="">{{ $operational_maintenance_report_detail->animals_died }}</td>
                <td class="">{{ $operational_maintenance_report_detail->employee_injury }}</td>
                <td class="">{{ $operational_maintenance_report_detail->employee_died }}</td>
                <td class="">{{ $operational_maintenance_report_detail->assigned_vehicle_id }}</td>
                <td class="">{{ $operational_maintenance_report_detail->comment }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    <table class="" style="border: 2px solid #fff;">
        <tr>
            <td style="text-align: right">
                {{ $operational_maintenance_report->fromEmployee->bn_name }}<br>
                {{ $operational_maintenance_report->fromDesignation->bn_name }}<br>
                {{ $operational_maintenance_report->fromFireStation->bn_name }}<br>
                {{ $operational_maintenance_report->fromFireStation->thana->bn_name}},
                {{ $operational_maintenance_report->fromdistrict->bn_name }}
            </td>
        </tr>
    </table>
@endsection
