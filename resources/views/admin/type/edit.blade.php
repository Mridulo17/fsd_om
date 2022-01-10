@extends('admin.layouts.master')

@section('title') @lang('type.edit_title') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('type.index')}}@endslot
        @slot('li_1')@lang('type.index_title')@endslot
        @slot('li_2')@lang('type.edit_title')@endslot
        @slot('title')@lang('type.edit_title')@endslot

    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($type,['url' => route('type.update',$type->id), 'method' => 'patch','class' => 'custom-validation']) }}
                        @include('admin.type.form')
                    {{ Form::close() }}

                </div>
            </div>


        </div> <!-- end col -->
    </div>
@endsection


