@extends('admin.layouts.master')

@section('title') @lang('common.view',['model' => trans('master_roll_report.master_roll_report')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('master_roll_report.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('master_roll_report.master_roll_report')])@endslot
        @slot('li_2')@lang('common.view',['model' => trans('master_roll_report.master_roll_report')])@endslot
        @slot('title')@lang('common.view',['model' => trans('master_roll_report.master_roll_report')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th span="8" colspan="16" class="p-2 text-center bg-secondary font-size-14 text-white text-uppercase">
                                {{--{{ $master_roll_report->tracking_no }}--}} @lang('master_roll_report.master_roll_reports')
                            </th>
                        </tr>
                        </thead>
                        <tbody class="thead-dark">
                            <tr>
                                <th>@lang('master_roll_report.date')</th>
                                <td>
                                    {{ $master_roll_report->date ? date('d-m-Y',strtotime($master_roll_report->date)) : ''}}
                                </td>
                                <th>@lang('master_roll_report.to_fire_station_id')</th>
                                <td class="text-uppercase">{{ $master_roll_report->toFireStation->bn_name }} [{{ $master_roll_report->toFireStation->code }}]</td>
                                <th>@lang('master_roll_report.to_employee_id')</th>
                                <td class="text-uppercase">{{ $master_roll_report->toEmployee->bn_name }} [{{ $master_roll_report->toEmployee->old_pin }}]  [{{ $master_roll_report->toEmployee->new_pin }}]</td>
                                <th>@lang('master_roll_report.to_designation_id')</th>
                                <td class="text-uppercase">{{ $master_roll_report->toDesignation->bn_name }}</td>
                                <th>@lang('master_roll_report.to_district_id')</th>
                                <td class="text-uppercase">{{ $master_roll_report->toDistrict->bn_name }}</td>
                                <th>@lang('master_roll_report.months')</th>
                                <td class="text-uppercase">{{ $master_roll_report->month_name }}</td>
                            </tr>
                            <tr>
                                <th>@lang('master_roll_report.from_fire_station_id')</th>
                                <td class="text-uppercase">
                                    {{ $master_roll_report->fromFireStation->bn_name }}
                                    [{{ $master_roll_report->fromFireStation->code }}]
                                </td>
                                <td class="text-uppercase">
                                    {{ $master_roll_report->fromFireStation->memorandum_no }}
                                    [{{ $master_roll_report->memorandum_no_extension }}]
                                </td>
                                <th>@lang('master_roll_report.from_employee_id')</th>
                                <td class="text-uppercase">{{ $master_roll_report->fromEmployee->bn_name }} [{{ $master_roll_report->fromEmployee->old_pin }}]  [{{ $master_roll_report->fromEmployee->new_pin }}]</td>
                                <th>@lang('master_roll_report.from_designation_id')</th>
                                <td class="text-uppercase">{{ $master_roll_report->fromDesignation->bn_name }}</td>
                                <th>@lang('master_roll_report.from_district_id')</th>
                                <td class="text-uppercase">{{ $master_roll_report->fromDistrict->bn_name }}</td>
                                <th>@lang('thana.thana')</th>
                                <td class="text-uppercase">{{ $master_roll_report->thana->bn_name }}</td>
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
                                text-white">@lang('master_roll_report.master_roll_reports')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>@lang('master_roll_report.employee_id')</th>
                                <th>@lang('master_roll_report.designation_id')</th>
                                <th>@lang('master_roll_report.total_attendance_days')</th>
                                <th>@lang('master_roll_report.total_absent_days')</th>
                                <th>@lang('master_roll_report.ml_el')</th>
                                <th>@lang('master_roll_report.rl')</th>
                                <th>@lang('master_roll_report.salary_workday')</th>
                                <th>@lang('master_roll_report.comment')</th>
                            </tr>
                            @foreach($master_roll_report->masterRollReportDetails as $key => $master_roll_report)
                                <tr>
                                    <td lang="bang">{{ $key+1 }}</td>
                                    <td class="text-uppercase">{{ $master_roll_report->employee->bn_name }} [{{ $master_roll_report->employee->old_pin }}]  [{{ $master_roll_report->employee->new_pin }}]</td>
                                    <td>{{ $master_roll_report->designation->bn_name }}</td>
                                    <td>{{ $master_roll_report->total_attendance_days }}</td>
                                    <td>{{ $master_roll_report->total_absent_days }}</td>
                                    <td>{{ $master_roll_report->ml_el }}</td>
                                    <td>{{ $master_roll_report->rl }}</td>
                                    <td>{{ $master_roll_report->salary_workday }}</td>
                                    <td>
                                        {{ $master_roll_report->comment }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
