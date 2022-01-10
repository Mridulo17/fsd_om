@extends('admin.layouts.master')

@section('title') @lang('common.edit',['model' => trans('octane_cost_report.octane_cost_report')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('octane_cost_report.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('octane_cost_report.octane_cost_report')])@endslot
        @slot('li_2')@lang('common.edit',['model' => trans('octane_cost_report.octane_cost_report')])@endslot
        @slot('title')@lang('common.edit',['model' => trans('octane_cost_report.octane_cost_report')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($octane_cost_report,['url' => route('octane_cost_report.update',$octane_cost_report->id), 'method' => 'patch','class' => 'custom-validation','enctype' => "multipart/form-data"]) }}
                        @include('admin.octane_cost_report.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection


