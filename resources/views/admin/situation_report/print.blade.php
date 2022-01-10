@extends('admin.layouts.pdf')

@section('title') @lang('situation_report.situation_report') {{ $situation_report->tracking_no }} @endsection



    @section('content')
        <table class="my-table" style="border: 2px solid #fff;">
            <tr style="border: 2px solid #fff;">
                <td class="gtc"><p style=" font-size: 15px;">@lang('situation_report.Government of the People Republic of Bangladesh')</p>
                    {{ $situation_report->fromFireStation->bn_name }}<br>
                    {{ $situation_report->thana->bn_name}},
                    {{ $situation_report->fromdistrict->bn_name }}<br>
                    {{ $situation_report->fromFireStation->email }}
                </td>
            </tr>
            <tr>
                <td class="bb-none bl-none text-right">@lang('common.date') {{ \App\Helpers\ENTOBN::convert_to_bangla(\Carbon\Carbon::parse($situation_report->created_at)->format('d-m-Y')) }} খ্রিঃ
                </td>
            </tr>
            <tr>
                <td class="bb-none bl-none text-left text-uppercase">
                    @lang('situation_report.memorandum_no')
                    -{{$situation_report->fromFireStation->memorandum_no}}/
                    {{$situation_report->memorandum_no_extension}}
                </td>
            </tr>
            <tr>
                <td class="bb-none bl-none">
                    @lang('situation_report.To:')<br>
                        {{ $situation_report->toDesignation->bn_name }}<br>
                        {{ $situation_report->toFireStation->bn_name }}<br>
                        {{ $situation_report->toDistrict->bn_name }} ।
                </td>
            </tr>
            <tr>
                <td class="bb-none bl-none text-left text-uppercase">
                    @lang('situation_report.subject')
                    {{$situation_report->month_name}}/2022 খ্রিঃ
                    @lang('situation_report.SITUATION REPORT Its Monthly Sending report.')
                </td>
            </tr>
            <tr>
                <td>
                    <p>@lang('situation_report.In the light of the appropriate subject, it is politely informed that,')
                        @lang('situation_report.According to the joint order of the Fire Service and the Department of Civil Defense')
                        {{$situation_report->fromFireStation->bn_name}}
                        @lang('situation_report.By')
                        {{$situation_report->month_name}}/2022
                        @lang('situation_report.SITUATION REPORT Its Monthly report')
                        @lang('situation_report.month Master Roll Sent for your kind information.')
                    </p>
                </td>
            </tr>

        </table>

        <br>
        <table class="my-table ">
            <thead>
            <tr>
                <th colspan="16" span="8" class="p-2 text-center bg-info font-size-14
                                text-white">@lang('situation_report.Administrative_Branch')
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>#</th>
                <th>@lang('situation_report.fire_station_id')</th>
                <th>@lang('situation_report.situation_report_problems')</th>
                <th>@lang('situation_report.recipient_system')</th>
                <th>@lang('situation_report.next_activities_responsibility')</th>
                <th>@lang('situation_report.comment')</th>
            </tr>
            @foreach($situation_report->administrativeSituation as $key => $administrative_situation)
                <tr>
                    <td lang="bang">{{ $key+1 }}</td>
                    <td>{{ $administrative_situation->fireStation->bn_name }}</td>
                    <td>{{ $administrative_situation->situation_report_problems }}</td>
                    <td>{{ $administrative_situation->recipient_system }}</td>
                    <td>{{ $administrative_situation->next_activities_responsibility }}</td>
                    <td>{{ $administrative_situation->comment }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <table class="my-table ">
            <thead>
            <tr>
                <th colspan="16" span="8" class="p-2 text-center bg-info font-size-14
                                text-white">@lang('situation_report.Operational_Branch')
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>#</th>
                <th>@lang('situation_report.fire_station_id')</th>
                <th>@lang('situation_report.situation_report_problems')</th>
                <th>@lang('situation_report.recipient_system')</th>
                <th>@lang('situation_report.next_activities_responsibility')</th>
                <th>@lang('situation_report.comment')</th>
            </tr>
            @foreach($situation_report->operationSituation as $key => $operational_branch)
                <tr>
                    <td lang="bang">{{ $key+1 }}</td>
                    <td>{{ $operational_branch->fireStation->bn_name }}</td>
                    <td>{{ $operational_branch->situation_report_problems }}</td>
                    <td>{{ $operational_branch->recipient_system }}</td>
                    <td>{{ $operational_branch->next_activities_responsibility }}</td>
                    <td>{{ $operational_branch->comment }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <table class="my-table ">
            <thead>
            <tr>
                <th colspan="16" span="8" class="p-2 text-center bg-info font-size-14
                                text-white">@lang('situation_report.development_training_Branch')
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>#</th>
                <th>@lang('situation_report.fire_station_id')</th>
                <th>@lang('situation_report.situation_report_problems')</th>
                <th>@lang('situation_report.recipient_system')</th>
                <th>@lang('situation_report.next_activities_responsibility')</th>
                <th>@lang('situation_report.comment')</th>
            </tr>
            @foreach($situation_report->developmentTrainingSituation as $key => $development_training_branch)
                <tr>
                    <td lang="bang">{{ $key+1 }}</td>
                    <td>{{ $development_training_branch->fireStation->bn_name }}</td>
                    <td>{{ $development_training_branch->situation_report_problems }}</td>
                    <td>{{ $development_training_branch->recipient_system }}</td>
                    <td>{{ $development_training_branch->next_activities_responsibility }}</td>
                    <td>{{ $development_training_branch->comment }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <br>

    @endsection
    @section('footer')
        <table class="" style="border: 2px solid #fff;">
            <tr>
                <td style="text-align: right">
                    {{ $situation_report->fromEmployee->bn_name }}<br>
                    {{ $situation_report->fromDesignation->bn_name }}<br>
                    {{ $situation_report->fromFireStation->bn_name }}<br>
                    {{ $situation_report->thana->bn_name}},
                    {{ $situation_report->fromdistrict->bn_name }}
                </td>
            </tr>
        </table>


    @endsection
