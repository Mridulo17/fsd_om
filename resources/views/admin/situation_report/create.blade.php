@extends('admin.layouts.master')

@section('title') @lang('common.create',['model' => trans('situation_report.situation_report')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('situation_report.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('situation_report.situation_report')])@endslot
        @slot('li_2')@lang('common.create',['model' => trans('situation_report.situation_report')])@endslot
        @slot('title')@lang('common.create',['model' => trans('situation_report.situation_report')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['url' => route('situation_report.store'), 'method' => 'post','class' => 'custom-validation','enctype' => "multipart/form-data"]) }}
                        @include('admin.situation_report.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection


