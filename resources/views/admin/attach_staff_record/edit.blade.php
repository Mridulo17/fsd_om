@extends('admin.layouts.master')

@section('title') @lang('common.edit',['model' => trans('attach_staff_record.attach_staff_record')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('attach_staff_record.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('attach_staff_record.attach_staff_record')])@endslot
        @slot('li_2')@lang('common.edit',['model' => trans('attach_staff_record.attach_staff_record')])@endslot
        @slot('title')@lang('common.edit',['model' => trans('attach_staff_record.attach_staff_record')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($attach_staff_record,['url' => route('attach_staff_record.update',$attach_staff_record->id), 'method' => 'patch','class' => 'custom-validation','enctype' => "multipart/form-data"]) }}
                        @include('admin.attach_staff_record.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection


