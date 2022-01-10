@extends('admin.layouts.master')

@section('title') @lang('accident_type.create_title') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('accident_type.index')}}@endslot
        @slot('li_1')@lang('accident_type.index_title')@endslot
        @slot('li_2')@lang('accident_type.create_title')@endslot
        @slot('title')@lang('accident_type.create_title')@endslot

    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['url' => route('accident_type.store'), 'method' => 'post','class' => 'custom-validation']) }}
                        @include('admin.accident_type.form')
                    {{ Form::close() }}

                </div>
            </div>


        </div> <!-- end col -->
    </div>
@endsection


