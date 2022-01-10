@extends('admin.layouts.master')

@section('title') @lang('common.view',['model' => trans('octane_cost_report.octane_cost_report')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('octane_cost_report.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('octane_cost_report.octane_cost_report')])@endslot
        @slot('li_2')@lang('common.view',['model' => trans('octane_cost_report.octane_cost_report')])@endslot
        @slot('title')@lang('common.view',['model' => trans('octane_cost_report.octane_cost_report')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th span="8" colspan="16" class="p-2 text-center bg-secondary font-size-14 text-white text-uppercase">
                                {{ $octane_cost_report->tracking_no }} @lang('octane_cost_report.octane_cost_reports')
                            </th>
                        </tr>
                        </thead>
                        <tbody class="thead-dark">
                            <tr>
                                <td class="text-uppercase">{{ $octane_cost_report->month_name }}</td>
                                <th>@lang('division.division')</th>
                                <td class="text-uppercase">{{ $octane_cost_report->fireStation->division->bn_name}}</td>
                                <th>@lang('district.district')</th>
                                <td class="text-uppercase">{{ $octane_cost_report->fireStation->district->bn_name }}</td>
                                <th>@lang('thana.thana')</th>
                                <td class="text-uppercase">{{ $octane_cost_report->fireStation->thana->bn_name }}</td>
                                <th>@lang('fire_station.fire_station')</th>
                                <td class="text-uppercase">{{ $octane_cost_report->fireStation->bn_name }}</td>
                                <th>@lang('octane_cost_report.months')</th>
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
                                text-white">@lang('octane_cost_report.octane_cost_reports')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>@lang('octane_cost_report.previous_report')</th>
                                <th>@lang('octane_cost_report.purchase_formula')</th>
                                <th>@lang('octane_cost_report.purchase_source')</th>
                                <th>@lang('octane_cost_report.purchase_date')</th>
                                <th>@lang('octane_cost_report.purchase_amount_liters')</th>
                                <th>@lang('octane_cost_report.total_amount_liters')</th>
                                <th>@lang('octane_cost_report.issue_date')</th>
                                <th>@lang('octane_cost_report.godiva_pump')</th>
                                <th>@lang('octane_cost_report.angus_pump')</th>
                                <th>@lang('octane_cost_report.firman_generator')</th>
                                <th>@lang('octane_cost_report.honda_generator')</th>
                                <th>@lang('octane_cost_report.smoke_ejector')</th>
                                <th>@lang('octane_cost_report.rotary_rescue_saw')</th>
                                <th>@lang('octane_cost_report.eli_generator')</th>
                                <th>@lang('octane_cost_report.two_wheeler')</th>
                                <th>@lang('octane_cost_report.maintenance_work_issue')</th>
                                <th>@lang('octane_cost_report.others')</th>
                                <th>@lang('octane_cost_report.operational_work_issue')</th>
                                <th>@lang('octane_cost_report.administrative_work_issue')</th>
                                <th>@lang('octane_cost_report.total_cost_issue')</th>
                                <th>@lang('octane_cost_report.remaining')</th>
                                <th>@lang('octane_cost_report.comment')</th>
                            </tr>
                            @foreach($octane_cost_report->octaneCostReportDetails as $key => $octane_cost_report)
                                <tr>
                                    <td lang="bang">{{ $key+1 }}</td>
                                    <td>{{ $octane_cost_report->previous_report }}</td>
                                    <td>{{ $octane_cost_report->purchase_formula }}</td>
                                    <td>{{ $octane_cost_report->purchase_source }}</td>
                                    <td>{{ $octane_cost_report->purchase_date }}</td>
                                    <td>{{ $octane_cost_report->purchase_amount_liters }}</td>
                                    <td>{{ $octane_cost_report->total_amount_liters }}</td>
                                    <td>{{ $octane_cost_report->issue_date }}</td>
                                    <td>{{ $octane_cost_report->godiva_pump }}</td>
                                    <td>{{ $octane_cost_report->angus_pump }}</td>
                                    <td>{{ $octane_cost_report->firman_generator }}</td>
                                    <td>{{ $octane_cost_report->honda_generator }}</td>
                                    <td>{{ $octane_cost_report->smoke_ejector }}</td>
                                    <td>{{ $octane_cost_report->rotary_rescue_saw }}</td>
                                    <td>{{ $octane_cost_report->eli_generator }}</td>
                                    <td>{{ $octane_cost_report->two_wheeler }}</td>
                                    <td>{{ $octane_cost_report->maintenance_work_issue }}</td>
                                    <td>{{ $octane_cost_report->others }}</td>
                                    <td>{{ $octane_cost_report->operational_work_issue }}</td>
                                    <td>{{ $octane_cost_report->administrative_work_issue }}</td>
                                    <td>{{ $octane_cost_report->total_cost_issue }}</td>
                                    <td>{{ $octane_cost_report->remaining }}</td>
                                    <td>{{ $octane_cost_report->comment }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
