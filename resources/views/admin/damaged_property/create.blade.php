@extends('admin.layouts.master')

@section('title') @lang('damaged_property.create_title') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('damaged_property.index')}}@endslot
        @slot('li_1')@lang('damaged_property.index_title')@endslot
        @slot('li_2')@lang('damaged_property.create_title')@endslot
        @slot('title')@lang('damaged_property.create_title')@endslot

    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['url' => route('damaged_property.store'), 'method' => 'post','class' => 'custom-validation']) }}
                        @include('admin.damaged_property.form')
                    {{ Form::close() }}

                </div>
            </div>


        </div> <!-- end col -->
    </div>
@endsection


