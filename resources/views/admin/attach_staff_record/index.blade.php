@extends('admin.layouts.master')

@section('title') @lang('common.index',['model' => trans('attach_staff_record.attach_staff_record')]) @endsection

@section('css')

@endsection

@section('thead')
    <tr>
        <th width="5%">#</th>
        <th>@lang('attach_staff_record.memorandum_no')</th>
        <th>@lang('attach_staff_record.date')</th>
        <th>@lang('attach_staff_record.to_employee_id')</th>
        <th>@lang('attach_staff_record.months')</th>
        <th>@lang('attach_staff_record.from_employee_id')</th>
        <th>@lang('attach_staff_record.from_designation_id')</th>
        <th>@lang('attach_staff_record.from_fire_station_id')</th>
        <th>@lang('attach_staff_record.thana_id')</th>
        <th>@lang('attach_staff_record.from_district_id')</th>
        <th width="5%">@lang('common.status')</th>
        <th width="12%">@lang('common.action')</th>
    </tr>
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('title')@lang('common.index',['model' => trans('attach_staff_record.attach_staff_record')])@endslot
        @slot('create_button')
            <a href="{{route('attach_staff_record.create')}}" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fa fa-plus-circle"></i> @lang('common.create',['model' => trans('attach_staff_record.attach_staff_record')])
            </a>
        @endslot
    @endcomponent

    <ul class="nav nav-tabs" id="Tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active text-primary" id="all_btn_tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">@lang('common.index_list',['model' => trans('attach_staff_record.attach_staff_record')])</button>
        </li>
        @if(\App\Helpers\MenuHelper::CustomElementPermission('deleted_list'))
            <li class="nav-item" role="presentation">
                <button class="nav-link text-primary" id="deleted_btn_tab" data-bs-toggle="tab" data-bs-target="#deleted_list" type="button" role="tab" aria-controls="deleted_list" aria-selected="false">@lang('common.deleted_list',['model' => trans('attach_staff_record.attach_staff_record')])</button>
            </li>
        @endif
    </ul>
    <div class="tab-content" id="TabContent">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="card">
                        <div class="card-body table-responsive">

                            <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
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
                        <div class="card-body table-responsive">

                            <table id="deleted_list_datatable" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
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
            {data: 'from_fire_station.memorandum_no',name: 'from_fire_station.memorandum_no', defaultContent:''},
            {data: 'date',name: 'date', defaultContent:''},
            {data: 'to_employee.bn_name',name: 'to_employee.bn_name', defaultContent:''},
            {data: 'month_name',name: 'month_name',},
            {data: 'from_employee.bn_name',name: 'from_employee.bn_name', defaultContent:''},
            {data: 'from_designation.bn_name',name: 'from_designation.bn_name', defaultContent:''},
            {data: 'from_fire_station.bn_name',name: 'from_fire_station.bn_name', defaultContent:''},
            {data: 'thana.bn_name',name: 'thana.bn_name', defaultContent:''},
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
            {'bSortable': true, 'aTargets': [0,1,2,3,4]},
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
                url: '{{ route('attach_staff_record.index') }}',
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
                    url: '{{ route('attach_staff_record.deleted_list') }}',
                    type: 'get',
                    dataType: 'JSON',
                    cache: false,
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