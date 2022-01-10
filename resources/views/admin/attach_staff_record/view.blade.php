@extends('admin.layouts.master')

@section('title') @lang('common.view',['model' => trans('attach_staff_record.attach_staff_record')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('attach_staff_record.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('attach_staff_record.attach_staff_record')])@endslot
        @slot('li_2')@lang('common.view',['model' => trans('attach_staff_record.attach_staff_record')])@endslot
        @slot('title')@lang('common.view',['model' => trans('attach_staff_record.attach_staff_record')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th span="8" colspan="16" class="p-2 text-center bg-secondary font-size-14 text-white text-uppercase">
                                {{ $attach_staff_record->tracking_no }} @lang('attach_staff_record.attach_staff_records')
                            </th>
                        </tr>
                        </thead>
                        <tbody class="thead-dark">
                            <tr>
                                <th>@lang('attach_staff_record.date')</th>
                                <td>
                                    {{ $attach_staff_record->date ? date('d-m-Y',strtotime($attach_staff_record->date)) : ''}}
                                </td>
                                <th>@lang('attach_staff_record.to_employee_id')</th>
                                <td class="text-uppercase">{{ $attach_staff_record->toEmployee->bn_name }} [{{ $attach_staff_record->toEmployee->old_pin }}]  [{{ $attach_staff_record->toEmployee->new_pin }}]</td>
                                <th>@lang('attach_staff_record.months')</th>
                                <td class="text-uppercase">{{ $attach_staff_record->month_name }}</td>
                                <th>@lang('attach_staff_record.from_fire_station_id')</th>
                                <td class="text-uppercase">
                                    {{ $attach_staff_record->fromFireStation->bn_name }}
                                    [{{ $attach_staff_record->fromFireStation->code }}]
                                </td>
                                <td class="text-uppercase">
                                    {{ $attach_staff_record->fromFireStation->memorandum_no }}
                                    [{{ $attach_staff_record->memorandum_no_extension }}]
                                </td>
                            </tr>
                            <tr>
                                <th>@lang('attach_staff_record.from_employee_id')</th>
                                <td class="text-uppercase">{{ $attach_staff_record->fromEmployee->bn_name }} [{{ $attach_staff_record->fromEmployee->old_pin }}]  [{{ $attach_staff_record->fromEmployee->new_pin }}]</td>
                                <th>@lang('attach_staff_record.from_designation_id')</th>
                                <td class="text-uppercase">{{ $attach_staff_record->fromDesignation->bn_name }}</td>
                                <th>@lang('attach_staff_record.from_district_id')</th>
                                <td class="text-uppercase">{{ $attach_staff_record->fromDistrict->bn_name }}</td>
                                <th>@lang('thana.thana')</th>
                                <td class="text-uppercase">{{ $attach_staff_record->thana->bn_name }}</td>
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
                                text-white">@lang('attach_staff_record.attach_staff_records')
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>#</th>
                            <th>@lang('attach_staff_record.to_fire_station_id')</th>
                            <th>@lang('attach_staff_record.to_designation_id')</th>
                            <th>@lang('attach_staff_record.to_district_id')</th>
                        </tr>
                        @foreach($attach_staff_record->toAttachStaff as $key => $to_attach_staff)
                            <tr>
                                <td lang="bang">{{ $key+1 }}</td>
                                <td>{{ $to_attach_staff->toFireStation->bn_name }}</td>
                                <td>{{ $to_attach_staff->toDesignation->bn_name }}</td>
                                <td>{{ $to_attach_staff->toDistrict->bn_name }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <table class="table table-bordered table-hover dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th colspan="16" span="8" class="p-2 text-center bg-info font-size-14
                                text-white">@lang('attach_staff_record.attach_staff_records')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>@lang('attach_staff_record.employee_id')</th>
                                <th>@lang('attach_staff_record.designation_id')</th>
                                <th>@lang('attach_staff_record.main_fire_station_id')</th>
                                <th>@lang('attach_staff_record.attach_fire_station_id')</th>
                                <th>@lang('attach_staff_record.total_attendance_days')</th>
                                <th>@lang('attach_staff_record.total_absent_days')</th>
                                <th>@lang('attach_staff_record.ml_el_rl')</th>
                                <th>@lang('attach_staff_record.salary_workday')</th>
                                <th>@lang('attach_staff_record.comment')</th>
                            </tr>
                            @foreach($attach_staff_record->attachStaffRecordDetails as $key => $attach_staff_record)
                                <tr>
                                    <td lang="bang">{{ $key+1 }}</td>
                                    <td class="text-uppercase">{{ $attach_staff_record->employee->bn_name }} [{{ $attach_staff_record->employee->old_pin }}]  [{{ $attach_staff_record->employee->new_pin }}]</td>
                                    <td>{{ $attach_staff_record->designation->bn_name }}</td>
                                    <td>{{ $attach_staff_record->mainFireStation->bn_name }}</td>
                                    <td>{{ $attach_staff_record->attachFireStation->bn_name }}</td>
                                    <td>{{ $attach_staff_record->total_attendance_days }}</td>
                                    <td>{{ $attach_staff_record->total_absent_days }}</td>
                                    <td>{{ $attach_staff_record->ml_el_rl }}</td>
                                    <td>{{ $attach_staff_record->salary_workday }}</td>
                                    <td>
                                        {{ $attach_staff_record->comment }}
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
