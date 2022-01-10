@extends('admin.layouts.master')

@section('title') @lang('common.edit',['model' => trans('master_roll_report.master_roll_report')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('master_roll_report.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('master_roll_report.master_roll_report')])@endslot
        @slot('li_2')@lang('common.edit',['model' => trans('master_roll_report.master_roll_report')])@endslot
        @slot('title')@lang('common.edit',['model' => trans('master_roll_report.master_roll_report')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($master_roll_report,['url' => route('master_roll_report.update',$master_roll_report->id), 'method' => 'patch','class' => 'custom-validation','enctype' => "multipart/form-data"]) }}
                        @include('admin.master_roll_report.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection


