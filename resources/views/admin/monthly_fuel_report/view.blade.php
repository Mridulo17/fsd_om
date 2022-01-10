@extends('admin.layouts.master')

@section('title') @lang('common.view',['model' => trans('monthly_fuel_report.monthly_fuel_report')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('monthly_fuel_report.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('monthly_fuel_report.monthly_fuel_report')])@endslot
        @slot('li_2')@lang('common.view',['model' => trans('monthly_fuel_report.monthly_fuel_report')])@endslot
        @slot('title')@lang('common.view',['model' => trans('monthly_fuel_report.monthly_fuel_report')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th span="8" colspan="16" class="p-2 text-center bg-secondary font-size-14 text-white text-uppercase">
                                {{ $monthly_fuel_report->tracking_no }} @lang('monthly_fuel_report.monthly_fuel_reports')
                            </th>
                        </tr>
                        </thead>
                        <tbody class="thead-dark">
                            <tr>
                                <th>@lang('type.type')</th>
                                <td class="text-uppercase">{{ $monthly_fuel_report->assignedVehicle->type->bn_name }}</td>
                                <th>@lang('category.category')</th>
                                <td class="text-uppercase">{{ $monthly_fuel_report->assignedVehicle->category->bn_name }}</td>
                                <th>@lang('brand.brand')</th>
                                <td class="text-uppercase">{{ $monthly_fuel_report->assignedVehicle->brand->bn_name }}</td>
                                <th>@lang('model.model')</th>
                                <td class="text-uppercase">{{ $monthly_fuel_report->assignedVehicle->model->bn_name }}</td>
                                <th>@lang('monthly_fuel_report.assigned_vehicle_id')</th>
                                <td class="text-uppercase">{{ $monthly_fuel_report->assigned_vehicle_id }}</td>
                            </tr>
                            <tr>
                                <th>@lang('division.division')</th>
                                <td class="text-uppercase">{{ $monthly_fuel_report->fireStation->division->bn_name}}</td>
                                <th>@lang('district.district')</th>
                                <td class="text-uppercase">{{ $monthly_fuel_report->fireStation->district->bn_name }}</td>
                                <th>@lang('thana.thana')</th>
                                <td class="text-uppercase">{{ $monthly_fuel_report->fireStation->thana->bn_name }}</td>
                                <th>@lang('fire_station.fire_station')</th>
                                <td class="text-uppercase">{{ $monthly_fuel_report->fireStation->bn_name }}</td>
                                <th>@lang('monthly_fuel_report.months')</th>
                                <td class="text-uppercase">{{ $monthly_fuel_report->month_name }}</td>
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
                                text-white">@lang('monthly_fuel_report.monthly_fuel_reports')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>@lang('monthly_fuel_report.work_type_place')</th>
                                <th>@lang('monthly_fuel_report.fuel_type')</th>
                                <th>@lang('monthly_fuel_report.meter_reading')</th>
                                <th>@lang('monthly_fuel_report.distance_per_liter')</th>
                                <th>@lang('monthly_fuel_report.total_fuel_cost')</th>
                                <th>@lang('monthly_fuel_report.comment')</th>
                            </tr>
                            @foreach($monthly_fuel_report->monthlyFuelReportDetails as $key => $monthly_fuel_report)
                                <tr>
                                    <td lang="bang">{{ $key+1 }}</td>
                                    <td>{{ $monthly_fuel_report->work_type_place }}</td>
                                    <td>{{ $monthly_fuel_report->fuel_type }}</td>
                                    <td>{{ $monthly_fuel_report->meter_reading }}</td>
                                    <td>{{ $monthly_fuel_report->distance_per_liter }}</td>
                                    <td style="text-align: end">
                                        {{ $monthly_fuel_report->total_fuel_cost }}
                                    </td>
                                    <td>
                                        {{ $monthly_fuel_report->comment }}
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
