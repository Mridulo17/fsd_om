@extends('admin.layouts.master')

@section('title') @lang('common.view',['model' => trans('operational_maintenance_report.operational_maintenance_report')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('operational_maintenance_report.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('operational_maintenance_report.operational_maintenance_report')])@endslot
        @slot('li_2')@lang('common.view',['model' => trans('operational_maintenance_report.operational_maintenance_report')])@endslot
        @slot('title')@lang('common.view',['model' => trans('operational_maintenance_report.operational_maintenance_report')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th span="8" colspan="16" class="p-2 text-center bg-secondary font-size-14 text-white text-uppercase">
                                {{ $operational_maintenance_report->tracking_no }} @lang('operational_maintenance_report.operational_maintenance_reports')
                            </th>
                        </tr>
                        </thead>
                        <tbody class="thead-dark">
                            <tr>
                                <th>@lang('operational_maintenance_report.to_fire_station_id')</th>
                                <td class="text-uppercase">{{ $operational_maintenance_report->toFireStation->bn_name }} [{{ $operational_maintenance_report->toFireStation->code }}]</td>
                                <th>@lang('operational_maintenance_report.to_employee_id')</th>
                                <td class="text-uppercase">{{ $operational_maintenance_report->toEmployee->bn_name }} [{{ $operational_maintenance_report->toEmployee->old_pin }}]  [{{ $operational_maintenance_report->toEmployee->new_pin }}]</td>
                                <th>@lang('operational_maintenance_report.to_designation_id')</th>
                                <td class="text-uppercase">{{ $operational_maintenance_report->toDesignation->bn_name }}</td>
                                <th>@lang('operational_maintenance_report.to_district_id')</th>
                                <td class="text-uppercase">{{ $operational_maintenance_report->toDistrict->bn_name }}</td>
                            </tr>
                            <tr>
                                <th>@lang('operational_maintenance_report.months')</th>
                                <td class="text-uppercase">{{ $operational_maintenance_report->month_name }}</td>
                            </tr>
                            <tr>
                                <th>@lang('operational_maintenance_report.from_fire_station_id')</th>
                                <td class="text-uppercase">
                                    {{ $operational_maintenance_report->fromFireStation->bn_name }}
                                    [{{ $operational_maintenance_report->fromFireStation->code }}]
                                </td>
                                <td class="text-uppercase">
                                    {{ $operational_maintenance_report->fromFireStation->memorandum_no }}
                                    [{{ $operational_maintenance_report->memorandum_no_extension }}]
                                </td>
                                <th>@lang('operational_maintenance_report.from_employee_id')</th>
                                <td class="text-uppercase">{{ $operational_maintenance_report->fromEmployee->bn_name }} [{{ $operational_maintenance_report->fromEmployee->old_pin }}]  [{{ $operational_maintenance_report->fromEmployee->new_pin }}]</td>
                                <th>@lang('operational_maintenance_report.from_designation_id')</th>
                                <td class="text-uppercase">{{ $operational_maintenance_report->fromDesignation->bn_name }}</td>
                                <th>@lang('operational_maintenance_report.from_district_id')</th>
                                <td class="text-uppercase">{{ $operational_maintenance_report->fromDistrict->bn_name }}</td>
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
                                text-white">@lang('operational_maintenance_report.operational_maintenance_reports')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>@lang('operational_maintenance_report.date')</th>
                                <th>@lang('operational_maintenance_report.fire_accident_place')</th>
                                <th>@lang('operational_maintenance_report.fire_accident_reason_id')</th>
                                <th>@lang('operational_maintenance_report.damaged_property_id')</th>
                                <th>@lang('operational_maintenance_report.probable_damage_amount')</th>
                                <th>@lang('operational_maintenance_report.probable_rescue_amount')</th>
                                <th>@lang('operational_maintenance_report.people_injury')</th>
                                <th>@lang('operational_maintenance_report.people_died')</th>
                                <th>@lang('operational_maintenance_report.animals_injury')</th>
                                <th>@lang('operational_maintenance_report.animals_died')</th>
                                <th>@lang('operational_maintenance_report.employee_injury')</th>
                                <th>@lang('operational_maintenance_report.employee_died')</th>
                                <th>@lang('operational_maintenance_report.assigned_vehicle_id')</th>
                                <th>@lang('operational_maintenance_report.comment')</th>
                            </tr>
                            @foreach($operational_maintenance_report->operationalMaintenanceDetails as $key => $operational_maintenance_report)
                                <tr>
                                    <td lang="bang">{{ $key+1 }}</td>
                                    <td>
                                        {{ $operational_maintenance_report->date ? date('d-m-Y',strtotime($operational_maintenance_report->date)) : ''}}
                                    </td>
                                    <td>{{ $operational_maintenance_report->fire_accident_place }}</td>
                                    <td>{{ $operational_maintenance_report->fireAccidentReason->bn_name }}</td>
                                    <td>{{ $operational_maintenance_report->damagedProperty->bn_name }}</td>
                                    <td style="text-align: end">
                                        {{ $operational_maintenance_report->probable_damage_amount }} <i class="fas fa-dollar-sign"></i>
                                    </td>
                                    <td style="text-align: end">
                                        {{ $operational_maintenance_report->probable_rescue_amount }} <i class="fas fa-dollar-sign"></i>
                                    </td>
                                    <td style="text-align: end">
                                        {{ $operational_maintenance_report->people_injury }}
                                    </td>
                                    <td style="text-align: end">
                                        {{ $operational_maintenance_report->people_died }}
                                    </td>
                                    <td style="text-align: end">
                                        {{ $operational_maintenance_report->animals_injury }}
                                    </td>
                                    <td style="text-align: end">
                                        {{ $operational_maintenance_report->animals_died }}
                                    </td>
                                    <td style="text-align: end">
                                        {{ $operational_maintenance_report->employee_injury }}
                                    </td>
                                    <td style="text-align: end">
                                        {{ $operational_maintenance_report->employee_died }}
                                    </td>
                                    <td>
                                        {{ $operational_maintenance_report->assignedVehicle->bn_name }}
                                    </td>
                                    <td>
                                        {{ $operational_maintenance_report->comment }}
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
