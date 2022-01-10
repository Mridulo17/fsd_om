@extends('admin.layouts.master')

@section('title') @lang('common.edit',['model' => trans('monthly_fuel_report.monthly_fuel_report')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('monthly_fuel_report.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('monthly_fuel_report.monthly_fuel_report')])@endslot
        @slot('li_2')@lang('common.edit',['model' => trans('monthly_fuel_report.monthly_fuel_report')])@endslot
        @slot('title')@lang('common.edit',['model' => trans('monthly_fuel_report.monthly_fuel_report')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($monthly_fuel_report,['url' => route('monthly_fuel_report.update',$monthly_fuel_report->id), 'method' => 'patch','class' => 'custom-validation','enctype' => "multipart/form-data"]) }}
                        @include('admin.monthly_fuel_report.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection


