@extends('admin.layouts.master')

@section('title') @lang('common.view',['model' => trans('situation_report.situation_report')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('situation_report.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('situation_report.situation_report')])@endslot
        @slot('li_2')@lang('common.view',['model' => trans('situation_report.situation_report')])@endslot
        @slot('title')@lang('common.view',['model' => trans('situation_report.situation_report')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th span="8" colspan="16" class="p-2 text-center bg-secondary font-size-14 text-white text-uppercase">
                                {{ $situation_report->tracking_no }} @lang('situation_report.situation_reports')
                            </th>
                        </tr>
                        </thead>
                        <tbody class="thead-dark">
                            <tr>
                                <th>@lang('situation_report.months')</th>
                                <td class="text-uppercase">{{ $situation_report->month_name }}</td>
                                <th>@lang('situation_report.to_employee_id')</th>
                                <td class="text-uppercase">{{ $situation_report->toEmployee->bn_name }} [{{ $situation_report->toEmployee->old_pin }}]  [{{ $situation_report->toEmployee->new_pin }}]</td>
                                <th>@lang('situation_report.to_designation_id')</th>
                                <td class="text-uppercase">{{ $situation_report->toDesignation->bn_name }}</td>
                                <th>@lang('situation_report.to_fire_station_id')</th>
                                <td class="text-uppercase">
                                    {{ $situation_report->toFireStation->bn_name }}
                                    [{{ $situation_report->toFireStation->code }}]
                                </td>
                                <th>@lang('situation_report.to_district_id')</th>
                                <td class="text-uppercase">{{ $situation_report->toDistrict->bn_name }}</td>

                            </tr>
                            <tr>
                                <th>@lang('situation_report.from_employee_id')</th>
                                <td class="text-uppercase">{{ $situation_report->fromEmployee->bn_name }} [{{ $situation_report->fromEmployee->old_pin }}]  [{{ $situation_report->fromEmployee->new_pin }}]</td>
                                <th>@lang('situation_report.from_designation_id')</th>
                                <td class="text-uppercase">{{ $situation_report->fromDesignation->bn_name }}</td>
                                <th>@lang('situation_report.from_fire_station_id')</th>
                                <td class="text-uppercase">
                                    {{ $situation_report->fromFireStation->bn_name }}
                                    [{{ $situation_report->fromFireStation->code }}]
                                </td>
                                <td class="text-uppercase">
                                    {{ $situation_report->fromFireStation->memorandum_no }}
                                    [{{ $situation_report->memorandum_no_extension }}]
                                </td>
                                <th>@lang('situation_report.from_district_id')</th>
                                <td class="text-uppercase">{{ $situation_report->fromDistrict->bn_name }}</td>
                                <th>@lang('thana.thana')</th>
                                <td class="text-uppercase">{{ $situation_report->thana->bn_name }}</td>
                            </tr>

                        </tbody>
                    </table>

                    <table class="table table-bordered table-hover dt-responsive nowrap w-100" style="background-color: #e4e4e4">
                        <tbody>


                        </tbody>
                    </table>
                    <table class="table table-bordered table-hover dt-responsive nowrap w-100">
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

                    <table class="table table-bordered table-hover dt-responsive nowrap w-100">
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

                    <table class="table table-bordered table-hover dt-responsive nowrap w-100">
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


                </div>
            </div>
        </div>
    </div>

@endsection
