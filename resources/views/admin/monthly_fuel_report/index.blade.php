@extends('admin.layouts.master')

@section('title') @lang('common.index',['model' => trans('monthly_fuel_report.monthly_fuel_report')]) @endsection

@section('css')

@endsection

@section('thead')
    <tr>
        <th width="5%">#</th>
        <th>@lang('type.type')</th>
        <th>@lang('category.category')</th>
        <th>@lang('brand.brand')</th>
        <th>@lang('model.model')</th>
        <th>@lang('monthly_fuel_report.assigned_vehicle_id')</th>
        <th>@lang('division.division')</th>
        <th>@lang('district.district')</th>
        <th>@lang('thana.thana')</th>
        <th>@lang('fire_station.fire_station')</th>
        <th>@lang('monthly_fuel_report.months')</th>
        <th width="5%">@lang('common.status')</th>
        <th width="12%">@lang('common.action')</th>
    </tr>
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('title')@lang('common.index',['model' => trans('monthly_fuel_report.monthly_fuel_report')])@endslot
        @slot('create_button')
            <a href="{{route('monthly_fuel_report.create')}}" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fa fa-plus-circle"></i> @lang('common.create',['model' => trans('monthly_fuel_report.monthly_fuel_report')])
            </a>
        @endslot
    @endcomponent

    <ul class="nav nav-tabs" id="Tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active text-primary" id="all_btn_tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">@lang('common.index_list',['model' => trans('monthly_fuel_report.monthly_fuel_report')])</button>
        </li>
        @if(\App\Helpers\MenuHelper::CustomElementPermission('deleted_list'))
            <li class="nav-item" role="presentation">
                <button class="nav-link text-primary" id="deleted_btn_tab" data-bs-toggle="tab" data-bs-target="#deleted_list" type="button" role="tab" aria-controls="deleted_list" aria-selected="false">@lang('common.deleted_list',['model' => trans('monthly_fuel_report.monthly_fuel_report')])</button>
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
            {data: 'assigned_vehicle.type.bn_name',name: 'assigned_vehicle.type.bn_name'},
            {data: 'assigned_vehicle.category.bn_name',name: 'assigned_vehicle.category.bn_name', defaultContent:''},
            {data: 'assigned_vehicle.brand.bn_name',name: 'assigned_vehicle.brand.bn_name', defaultContent:''},
            {data: 'assigned_vehicle.model.bn_name',name: 'assigned_vehicle.model.bn_name', defaultContent:''},
            {data: 'assigned_vehicle.tracking_no',name: 'assigned_vehicle.tracking_no', defaultContent:''},
            {data: 'fire_station.division.bn_name',name: 'fire_station.division.bn_name', defaultContent:''},
            {data: 'fire_station.district.bn_name',name: 'fire_station.district.bn_name', defaultContent:''},
            {data: 'fire_station.thana.bn_name',name: 'fire_station.thana.bn_name', defaultContent:''},
            {data: 'fire_station.bn_name',name: 'fire_station.bn_name', defaultContent:''},
            {data: 'month_name',name: 'month_name',},
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
                url: '{{ route('monthly_fuel_report.index') }}',
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
                    url: '{{ route('monthly_fuel_report.deleted_list') }}',
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
