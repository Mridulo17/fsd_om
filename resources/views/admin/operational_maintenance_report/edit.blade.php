@extends('admin.layouts.master')

@section('title') @lang('common.edit',['model' => trans('operational_maintenance_report.operational_maintenance_report')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('operational_maintenance_report.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('operational_maintenance_report.operational_maintenance_report')])@endslot
        @slot('li_2')@lang('common.edit',['model' => trans('operational_maintenance_report.operational_maintenance_report')])@endslot
        @slot('title')@lang('common.edit',['model' => trans('operational_maintenance_report.operational_maintenance_report')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($operational_maintenance_report,['url' => route('operational_maintenance_report.update',$operational_maintenance_report->id), 'method' => 'patch','class' => 'custom-validation','enctype' => "multipart/form-data"]) }}
                        @include('admin.operational_maintenance_report.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection


