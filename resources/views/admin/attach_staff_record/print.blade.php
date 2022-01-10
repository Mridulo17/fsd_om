@extends('admin.layouts.pdf')

@section('title') @lang('attach_staff_record.attach_staff_record') {{ $attach_staff_record->tracking_no }} @endsection



{{--<div class="print-top">--}}
    @section('content')
        <table class="my-table" style="border: 2px solid #fff;">
            <tr style="border: 2px solid #fff;">
                <td class="gtc"><p style=" font-size: 15px;">@lang('attach_staff_record.Government of the People Republic of Bangladesh')</p>
                    {{ $attach_staff_record->fromFireStation->bn_name }}<br>
                    {{ $attach_staff_record->thana->bn_name}},
                    {{ $attach_staff_record->fromdistrict->bn_name }}<br>
                    {{ $attach_staff_record->fromFireStation->email }}
                </td>
            </tr>
            <tr>
                <td class="bb-none bl-none text-right">@lang('common.date') {{ \App\Helpers\ENTOBN::convert_to_bangla(\Carbon\Carbon::parse($attach_staff_record->created_at)->format('d-m-Y')) }} খ্রিঃ
                </td>
            </tr>
            <tr>
                <td class="bb-none bl-none text-left text-uppercase">
                    @lang('attach_staff_record.memorandum_no')
                    -{{$attach_staff_record->fromFireStation->memorandum_no}}/
                    {{$attach_staff_record->memorandum_no_extension}}
                </td>
            </tr>
            <tr>
                <td class="bb-none bl-none text-left text-uppercase">
                    {{$attach_staff_record->date  ? date('d-m-Y',strtotime($attach_staff_record->date)) : ''}}খ্রিঃ
                </td>
            </tr>
            <tr>
                <td class="bb-none bl-none">
                    @lang('attach_staff_record.To:')<br>
                    @foreach($attach_staff_record->toAttachStaff as $key => $to_attach_staff)
                        {{ $key+1}}.
                        {{ $to_attach_staff->toDesignation->bn_name }},
                        {{ $to_attach_staff->toFireStation->bn_name }},
                        {{ $to_attach_staff->toDistrict->bn_name }} ।
                    @endforeach
                </td>
            </tr>
            <tr>
                <td class="bb-none bl-none text-left text-uppercase">
                    @lang('attach_staff_record.subject')
                    {{$attach_staff_record->fromFireStation->bn_name}}
                    @lang('attach_staff_record.Its connected employees from different stations')
                    {{$attach_staff_record->month_name}}/2022 খ্রিঃ
                    @lang('attach_staff_record.Send About Monthly Master Roll.')
                </td>
            </tr>
            <tr>
                <td>
                    <p>@lang('attach_staff_record.In the light of the appropriate subject, it is politely informed that,')
                        @lang('attach_staff_record.According to the joint order of the Fire Service and the Department of Civil Defense')
                        {{$attach_staff_record->fromFireStation->bn_name}}
                        @lang('attach_staff_record.The following employees connected from its various stations')
                        {{$attach_staff_record->month_name}}/2022 @lang('attach_staff_record.month Master Roll Sent for your kind information.')
                    </p>
                </td>
            </tr>

        </table>

        <br><br>

        <table class="my-table" style="border: 2px solid #000; height: 900px;">
            <tr>
                <td> @lang('common.serial') </td>
                <td>@lang('attach_staff_record.employee_id') </td>
                <td>@lang('attach_staff_record.designation_id')</td>
                <td>@lang('attach_staff_record.main_fire_station_id')</td>
                <td>@lang('attach_staff_record.attach_fire_station_id')</td>
                <td>@lang('attach_staff_record.total_attendance_days')</td>
                <td>@lang('attach_staff_record.total_absent_days')</td>
                <td>@lang('attach_staff_record.ml_el_rl')</td>
                <td>@lang('attach_staff_record.salary_workday')</td>
                <td>@lang('attach_staff_record.comment')</td>
            </tr>
            @foreach($attach_staff_record->attachStaffRecordDetails as $key => $attach_staff_record_detail)
                <tr>
                    <td class="text-center" style="width: 15px;">{{ \App\Helpers\ENTOBN::convert_to_bangla($loop->iteration) }}.</td>
                    <td class="">{{ $attach_staff_record_detail->employee->bn_name }}</td>
                    <td class="">{{ $attach_staff_record_detail->designation->bn_name }}</td>
                    <td class="">{{ $attach_staff_record_detail->mainFireStation->bn_name }}</td>
                    <td class="">{{ $attach_staff_record_detail->attachFireStation->bn_name }}</td>
                    <td class="">{{ $attach_staff_record_detail->total_attendance_days }}</td>
                    <td class="">{{ $attach_staff_record_detail->total_absent_days }}</td>
                    <td class="">{{ $attach_staff_record_detail->ml_el_rl }}</td>
                    <td class="">{{ $attach_staff_record_detail->salary_workday }}</td>
                    <td class="">{{ $attach_staff_record_detail->comment }}</td>
                </tr>
            @endforeach

        </table>
    @endsection
{{--</div>--}}

{{--<div class="print-bottom">--}}
    @section('footer')
        <table class="my-table" style="border: 2px solid #fff;">
            <tr>
                <td style="text-align: right" class="bb-none bl-none text-left text-uppercase">
                    {{ $attach_staff_record->fromEmployee->bn_name }}<br>
                    {{ $attach_staff_record->fromDesignation->bn_name }}<br>
                    {{ $attach_staff_record->fromFireStation->bn_name }}<br>
                    {{ $attach_staff_record->thana->bn_name}},
                    {{ $attach_staff_record->fromdistrict->bn_name }} <br>
                    @lang('attach_staff_record.date'):-
                </td>
            </tr>
        </table>
        <table class="" style="border: 2px solid #fff;">
            <tr>
                <td style="text-align: left" class="bb-none bl-none text-left text-uppercase">
                    @lang('attach_staff_record.memorandum_no')
                    {{$attach_staff_record->fromFireStation->memorandum_no}}<br>
                    @lang('attach_staff_record.Sent for your kind information.')
                </td>
            </tr>
            <tr>
                <td class="bb-none bl-none">
                    @foreach($attach_staff_record->toAttachStaff as $key => $to_attach_staff)
                        {{ $key+1}}.
                        {{ $to_attach_staff->toDesignation->bn_name }},
                        {{ $to_attach_staff->toFireStation->bn_name }},
                        {{ $to_attach_staff->toDistrict->bn_name }} ।<br>
                    @endforeach
                </td>

            </tr>
        </table>
        <table class="" style="border: 2px solid #fff;">
            <tr>
                <td style="text-align: right">
                    {{ $attach_staff_record->fromEmployee->bn_name }}<br>
                    {{ $attach_staff_record->fromDesignation->bn_name }}<br>
                    {{ $attach_staff_record->fromFireStation->bn_name }}<br>
                    {{ $attach_staff_record->thana->bn_name}},
                    {{ $attach_staff_record->fromdistrict->bn_name }}
                </td>
            </tr>
        </table>


    @endsection
{{--</div>--}}
