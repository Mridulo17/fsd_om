@extends('admin.layouts.master')

@section('title') @lang('assigned_vehicle.index_title') @endsection

@section('css')
@endsection

@section('thead')
    <tr>
        <th width="5%">#</th>
        <th>@lang('common.tracking_no')</th>
        <th>@lang('type.type')</th>
        <th>@lang('category.category')</th>
        <th>@lang('brand.brand')</th>
        <th>@lang('assigned_vehicle.product_model')</th>
        <th>@lang('fire_station.fire_station')</th>
        <th>@lang('assigned_vehicle.registration_number')</th>
        <th>@lang('assigned_vehicle.label_name')</th>
        <th>@lang('assigned_vehicle.label_bn_name')</th>
        <th width="5%">@lang('assigned_vehicle.label_status')</th>
        <th width="12%">@lang('assigned_vehicle.label_action')</th>
    </tr>
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('title')@lang('assigned_vehicle.index_title')@endslot
        @slot('create_button')
            <a href="{{route('assigned_vehicle.create')}}" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fa fa-plus-circle"></i> @lang('assigned_vehicle.create_button_title')
            </a>
        @endslot
    @endcomponent

    <ul class="nav nav-tabs" id="Tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active text-primary" id="all_btn_tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">@lang('common.index_list',['model' => trans('country.country')])</button>
        </li>
        @if(\App\Helpers\MenuHelper::CustomElementPermission('deleted_list'))
            <li class="nav-item" role="presentation">
                <button class="nav-link text-primary" id="deleted_btn_tab" data-bs-toggle="tab" data-bs-target="#deleted_list" type="button" role="tab" aria-controls="deleted_list" aria-selected="false">@lang('common.deleted_list',['model' => trans('country.country')])</button>
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
                </div>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{--yajra datatable--}}
    <script type="text/javascript">
        let datatable_columns = [
            {data: 'DT_RowIndex',name:"DT_RowIndex", orderable: false, searchable: false},
            {data: 'tracking_no',name: 'tracking_no',},
            {data: 'type.bn_name',name: 'type.bn_name',},
            {data: 'category.bn_name',name: 'category.bn_name',},
            {data: 'brand.bn_name',name: 'brand.bn_name',},
            {data: 'model.bn_name',name: 'model.bn_name',},
            {data: 'fire_station.bn_name',name: 'fire_station.bn_name',},
            {data: 'registration_number',name: 'registration_number',},
            {data: 'name',name: 'name',},
            {data: 'bn_name',name: 'bn_name',},
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
            { className: 'text-uppercase', targets: [1] },
        ]
        // $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
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
                url: '{{ route('assigned_vehicle.index') }}',
                type: 'get',
                dataType: 'JSON',
                cache: true,
                "data": function(d){
                    $.each($('#product_search_form').serializeArray(), function(i, obj){
                        d['form_'+obj['name']] = obj['value'];
                    });
                },
            },
            columns: datatable_columns,
            search: {
                "regex": true
            },
            columnDefs: datatable_columns_defs,
        });
        $(document).on('click','#search_button',function () {
            $('#datatable').DataTable().ajax.reload();
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
                url: '{{ route('assigned_vehicle.deleted_list') }}',
                type: 'get',
                dataType: 'JSON',
                cache: true,
            },
            columns: datatable_columns,
            search: {
                "regex": true
            },
            // columnDefs: datatable_columns_defs,
            "columnDefs": [{
                "defaultContent": "-",
                "targets": "_all"
            }],
        });
        @endif


        function statusChange(id){
            statusUpdate(id, '{{route('assigned_vehicle.status')}}')
        }
    </script>

    @include('components.delete_script')

@endsection
