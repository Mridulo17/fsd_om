@extends('admin.layouts.master')

@section('title') @lang('common.create',['model' => trans('brand.brand')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('brand.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('brand.brand')])@endslot
        @slot('li_2')@lang('common.create',['model' => trans('brand.brand')])@endslot
        @slot('title')@lang('common.create',['model' => trans('brand.brand')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['url' => route('brand.store'), 'method' => 'post','class' => 'custom-validation']) }}
                        @include('admin.brand.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection


