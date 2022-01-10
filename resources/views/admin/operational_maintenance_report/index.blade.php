@extends('admin.layouts.master')

@section('title') @lang('common.index',['model' => trans('operational_maintenance_report.operational_maintenance_report')]) @endsection

@section('css')

@endsection

@section('thead')
    <tr>
        <th width="5%">#</th>
        <th>@lang('operational_maintenance_report.to_fire_station_id')</th>
        <th>@lang('operational_maintenance_report.to_employee_id')</th>
        <th>@lang('operational_maintenance_report.to_designation_id')</th>
        <th>@lang('operational_maintenance_report.to_district_id')</th>
        <th>@lang('operational_maintenance_report.months')</th>
        <th>@lang('operational_maintenance_report.from_fire_station_id')</th>
        <th>@lang('operational_maintenance_report.memorandum_no')</th>
        <th>@lang('operational_maintenance_report.from_employee_id')</th>
        <th>@lang('operational_maintenance_report.from_designation_id')</th>
        <th>@lang('operational_maintenance_report.from_district_id')</th>
        <th width="5%">@lang('common.status')</th>
        <th width="12%">@lang('common.action')</th>
    </tr>
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('title')@lang('common.index',['model' => trans('operational_maintenance_report.operational_maintenance_report')])@endslot
        @slot('create_button')
            <a href="{{route('operational_maintenance_report.create')}}" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fa fa-plus-circle"></i> @lang('common.create',['model' => trans('operational_maintenance_report.operational_maintenance_report')])
            </a>
        @endslot
    @endcomponent

    <ul class="nav nav-tabs" id="Tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active text-primary" id="all_btn_tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">@lang('common.index_list',['model' => trans('operational_maintenance_report.operational_maintenance_report')])</button>
        </li>
        @if(\App\Helpers\MenuHelper::CustomElementPermission('deleted_list'))
            <li class="nav-item" role="presentation">
                <button class="nav-link text-primary" id="deleted_btn_tab" data-bs-toggle="tab" data-bs-target="#deleted_list" type="button" role="tab" aria-controls="deleted_list" aria-selected="false">@lang('common.deleted_list',['model' => trans('operational_maintenance_report.operational_maintenance_report')])</button>
            </li>
        @endif
    </ul>
    <div class="tab-content" id="TabContent">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable" class="table table-bordered table-hover dt-responsive w-100">
                                <thead class="thead-dark">
                                    @yield('thead')
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>

        <div class="tab-pane fade" id="deleted_list" role="tabpanel" aria-labelledby="deleted_list_tab">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="deleted_list_datatable" class="table table-bordered table-hover dt-responsive w-100">
                                <thead class="thead-dark">
                                    @yield('thead')
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/common/libs/parsleyjs/parsleyjs.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/common/js/pages/form-validation.init.js') }}"></script>

    <script type="text/javascript">
        let datatable_columns = [
            {data: 'DT_RowIndex',name:"DT_RowIndex", orderable: false, searchable: false},
            {data: 'to_fire_station.bn_name',name: 'to_fire_station.bn_name', defaultContent:''},
            {data: 'to_employee.bn_name',name: 'to_employee.bn_name', defaultContent:''},
            {data: 'to_designation.bn_name',name: 'to_designation.bn_name', defaultContent:''},
            {data: 'to_district.bn_name',name: 'to_district.bn_name', defaultContent:''},
            {data: 'month_name',name: 'month_name',},
            {data: 'from_fire_station.bn_name',name: 'from_fire_station.bn_name', defaultContent:''},
            {data: 'from_fire_station.memorandum_no',name: 'from_fire_station.memorandum_no', defaultContent:''},
            {data: 'from_employee.bn_name',name: 'from_employee.bn_name', defaultContent:''},
            {data: 'from_designation.bn_name',name: 'from_designation.bn_name', defaultContent:''},
            {data: 'from_district.bn_name',name: 'from_district.bn_name', defaultContent:''},
            {data: 'status',name: 'status',},
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]

        let datatable_columns_defs = [
            {'bSortable': true, 'aTargets': [0,1,2,3]},
            {'bSearchable': false, 'aTargets': [0]},
            { className: 'text-center', targets: [0,3,4] },
        ]

        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 25,
            serverMethod: 'get',
            lengthMenu: [10, 25, 50,100],
            order: [ 0, "asc" ],
            language: {
                'loadingRecords': '&nbsp;',
                'processing': 'Loading ...'
            },
            ajax: {
                url: '{{ route('operational_maintenance_report.index') }}',
                type: 'get',
                dataType: 'JSON',
                cache: true,
            },
            columns: datatable_columns,
            search: {
                "regex": true
            },
            columnDefs: datatable_columns_defs,
        });

        @if(\App\Helpers\MenuHelper::CustomElementPermission('deleted_list'))
            $('#deleted_list_datatable').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                serverMethod: 'get',
                lengthMenu: [10, 25, 50,100],
                order: [ 0, "asc" ],
                language: {
                    'loadingRecords': '&nbsp;',
                    'processing': 'Loading ...'
                },
                ajax: {
                    url: '{{ route('operational_maintenance_report.deleted_list') }}',
                    type: 'get',
                    dataType: 'JSON',
                    cache: true,
                },
                columns: datatable_columns,
                search: {
                    "regex": true
                },
                columnDefs: datatable_columns_defs,
            });
        @endif
    </script>

    @include('components.delete_script')

@endsection
