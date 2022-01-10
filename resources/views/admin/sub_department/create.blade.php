@extends('admin.layouts.master')

@section('title') @lang('sub_department.create_title') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('sub_department.index')}}@endslot
        @slot('li_1')@lang('sub_department.index_title')@endslot
        @slot('li_2')@lang('sub_department.create_title')@endslot
        @slot('title')@lang('sub_department.create_title')@endslot

    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['url' => route('sub_department.store'), 'method' => 'post','class' => 'custom-validation']) }}
                        @include('admin.sub_department.form')
                    {{ Form::close() }}

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection


