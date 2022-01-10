@extends('admin.layouts.pdf')

@section('title') @lang('master_roll_report.master_roll_report') {{ $master_roll_report->tracking_no }} @endsection



@section('content')
    <table style="border: 2px solid #fff; padding-bottom: 45px;">
        <tr style="border: 2px solid #fff;">
            <td class="gtc"><p style=" font-size: 15px;">@lang('master_roll_report.Government of the People Republic of Bangladesh')</p>
                {{ $master_roll_report->fromFireStation->bn_name }}<br>
                {{ $master_roll_report->fromFireStation->thana->bn_name}},
                {{ $master_roll_report->fromdistrict->bn_name }}<br>
                {{ $master_roll_report->fromFireStation->email }}
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-right">@lang('common.date') {{ \App\Helpers\ENTOBN::convert_to_bangla(\Carbon\Carbon::parse($master_roll_report->created_at)->format('d-m-Y')) }} খ্রিঃ
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-left text-uppercase">
                @lang('master_roll_report.memorandum_no')
                -{{$master_roll_report->fromFireStation->memorandum_no}}/
                {{$master_roll_report->memorandum_no_extension}}
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-left text-uppercase">
                @lang('master_roll_report.to_designation_id')
                -{{$master_roll_report->toDesignation->bn_name}}
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-left text-uppercase">
                @lang('master_roll_report.to_fire_station_id')
                -{{$master_roll_report->toFireStation->bn_name}}
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-left text-uppercase">
                @lang('master_roll_report.to_district_id')
                -{{$master_roll_report->toDistrict->bn_name}}
            </td>
        </tr>
        <tr>
            <td class="bb-none bl-none text-left text-uppercase">
                @lang('master_roll_report.subject')
                {{$master_roll_report->month_name}}/2022 খ্রিঃ
                @lang('master_roll_report.Send About Monthly Master Roll.')
            </td>
        </tr>
        <tr>
            <td>
                <p>@lang('master_roll_report.In the light of the appropriate subject, it is politely informed that,'){{$master_roll_report->fromFireStation->bn_name}}
                    @lang('master_roll_report.Its officers/employees')
                      {{$master_roll_report->month_name}}/2022 @lang('master_roll_report.month Master Roll Sent for your kind information.')
                </p>
            </td>
        </tr>

    </table>

    <br><br>

    <table style="border: 2px solid #000; height: 900px;">
        <tr>
            <td> @lang('common.serial') </td>
            <td>@lang('master_roll_report.employee_id') </td>
            <td>@lang('master_roll_report.designation_id')</td>
            <td>@lang('master_roll_report.total_attendance_days')</td>
            <td>@lang('master_roll_report.total_absent_days')</td>
            <td>@lang('master_roll_report.ml_el')</td>
            <td>@lang('master_roll_report.rl')</td>
            <td>@lang('master_roll_report.salary_workday')</td>
            <td>@lang('master_roll_report.comment')</td>
        </tr>
        @foreach($master_roll_report->masterRollReportDetails as $key => $master_roll_report_detail)
            <tr>
                <td class="text-center" style="width: 15px;">{{ \App\Helpers\ENTOBN::convert_to_bangla($loop->iteration) }}.</td>
                <td class="">{{ $master_roll_report_detail->employee->bn_name }}</td>
                <td class="">{{ $master_roll_report_detail->designation->bn_name }}</td>
                <td class="">{{ $master_roll_report_detail->total_attendance_days }}</td>
                <td class="">{{ $master_roll_report_detail->total_absent_days }}</td>
                <td class="">{{ $master_roll_report_detail->ml_el }}</td>
                <td class="">{{ $master_roll_report_detail->rl }}</td>
                <td class="">{{ $master_roll_report_detail->salary_workday }}</td>
                <td class="">{{ $master_roll_report_detail->comment }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    <table class="" style="border: 2px solid #fff;">
        <tr>
            <td style="text-align: right">
                {{ $master_roll_report->fromEmployee->bn_name }}<br>
                {{ $master_roll_report->fromDesignation->bn_name }}<br>
                {{ $master_roll_report->fromFireStation->bn_name }}<br>
                {{ $master_roll_report->thana->bn_name}},
                {{ $master_roll_report->fromdistrict->bn_name }}
            </td>
        </tr>
    </table>
@endsection
