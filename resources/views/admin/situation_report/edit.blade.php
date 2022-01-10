@extends('admin.layouts.master')

@section('title') @lang('common.edit',['model' => trans('situation_report.situation_report')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('situation_report.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('situation_report.situation_report')])@endslot
        @slot('li_2')@lang('common.edit',['model' => trans('situation_report.situation_report')])@endslot
        @slot('title')@lang('common.edit',['model' => trans('situation_report.situation_report')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($situation_report,['url' => route('situation_report.update',$situation_report->id), 'method' => 'patch','class' => 'custom-validation','enctype' => "multipart/form-data"]) }}
                        @include('admin.situation_report.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection


