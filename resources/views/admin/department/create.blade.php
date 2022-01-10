@extends('admin.layouts.master')

@section('title') @lang('department.create_title') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('department.index')}}@endslot
        @slot('li_1')@lang('department.index_title')@endslot
        @slot('li_2')@lang('department.create_title')@endslot
        @slot('title')@lang('department.create_title')@endslot

    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['url' => route('department.store'), 'method' => 'post','class' => 'custom-validation']) }}
                        @include('admin.department.form')
                    {{ Form::close() }}

                </div>
            </div>


        </div> <!-- end col -->
    </div>
@endsection


