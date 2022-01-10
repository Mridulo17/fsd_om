@extends('admin.layouts.master')

@section('title') @lang('assigned_vehicle.create_title') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('assigned_vehicle.index')}}@endslot
        @slot('li_1')@lang('assigned_vehicle.index_title')@endslot
        @slot('li_2')@lang('assigned_vehicle.create_title')@endslot
        @slot('title')@lang('assigned_vehicle.create_title')@endslot

    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['url' => route('assigned_vehicle.store'), 'method' => 'post','class' => 'custom-validation']) }}
                        @include('admin.assigned_vehicle.form')
                    {{ Form::close() }}

                </div>
            </div>


        </div> <!-- end col -->
    </div>
@endsection


