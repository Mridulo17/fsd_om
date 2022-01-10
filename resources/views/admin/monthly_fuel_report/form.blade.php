<div id="vue" class="row mb-3">

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('type_id') ? 'parsley-error ' : ''; @endphp
        <label for="type_id" class="form-label">@lang('type.type')</label>
        <div class="form-group">
            {{ Form::select('type_id', $types, null, ['class' => $error_class.'form-control select2vue type_id', 'placeholder' => trans('common.select'), 'id' => 'type_id', 'required' => false, 'onchange' => 'SelectChange("'.route('get_categories_by_type').'","category_id",this)']) }}
            @if ($errors->has('type_id'))
                <p class="text-danger">{{$errors->first('type_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('category_id') ? 'parsley-error ' : ''; @endphp
        <label for="category_id" class="form-label">@lang('category.category')</label>
        <div class="form-group">
            {{ Form::select('category_id', $categories, null, ['class' => $error_class.'form-control select2vue category_id', 'placeholder' => trans('common.select'), 'id' => 'category_id', 'required' => false, 'onchange' => 'SelectChangeDependent("'.route('get_assigned_vehicles').'","assigned_vehicle_id",this,"model_id")']) }}
            @if ($errors->has('category_id'))
                <p class="text-danger">{{$errors->first('category_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('brand_id') ? 'parsley-error ' : ''; @endphp
        <label for="brand_id" class="form-label">@lang('brand.brand')</label>
        <div class="form-group">
            {{ Form::select('brand_id', $brands, null, ['class' => $error_class.'form-control select2vue brand_id', 'placeholder' => trans('common.select'), 'id' => 'brand_id', 'required' => false, 'onchange' => 'SelectChange("'.route('get_models').'","model_id",this)']) }}
            @if ($errors->has('brand_id'))
                <p class="text-danger">{{$errors->first('brand_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('model_id') ? 'parsley-error ' : ''; @endphp
        <label for="model_id" class="form-label">@lang('model.model')</label>
        <div class="form-group">
            {{ Form::select('model_id', $models, null, ['class' => $error_class.'form-control select2vue model_id', 'placeholder' => trans('common.select'), 'id' => 'model_id', 'required' => false, 'onchange' => 'SelectChangeDependent("'.route('get_assigned_vehicles').'","assigned_vehicle_id",this,"category_id")']) }}
            @if ($errors->has('model_id'))
                <p class="text-danger">{{$errors->first('model_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('assigned_vehicle_id') ? 'parsley-error ' : ''; @endphp
        <label for="assigned_vehicle_id" class="form-label">@lang('monthly_fuel_report.assigned_vehicle_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group text-uppercase">
            {{ Form::select('assigned_vehicle_id', $assigned_vehicles, null, ['class' => $error_class.'form-control select2vue assigned_vehicle_id', 'placeholder' => trans('common.select'), 'id' => 'assigned_vehicle_id', 'required' => 1]) }}
            @if ($errors->has('assigned_vehicle_id'))
                <p class="text-danger">{{$errors->first('assigned_vehicle_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('division_id') ? 'parsley-error ' : ''; @endphp
        <label for="division_id" class="form-label">@lang('division.division')</label>
        <div class="form-group">
            {{ Form::select('division_id', $divisions, null, ['class' => $error_class.'form-control select2vue division_id', 'placeholder' => trans('common.select'), 'id' => 'division_id', 'required' => false, 'onchange' => 'SelectChange("'.route('get_districts').'","district_id",this)']) }}
            @if ($errors->has('division_id'))
                <p class="text-danger">{{$errors->first('division_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('district_id') ? 'parsley-error ' : ''; @endphp
        <label for="district_id" class="form-label">@lang('district.district')</label>
        <div class="form-group">
            {{ Form::select('district_id', $districts, null, ['class' => $error_class.'form-control select2vue district_id', 'placeholder' => trans('common.select'), 'id' => 'district_id', 'required' => false, 'onchange' => 'SelectChange("'.route('get_thanas').'","thana_id",this)']) }}
            @if ($errors->has('district_id'))
                <p class="text-danger">{{$errors->first('district_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('thana_id') ? 'parsley-error ' : ''; @endphp
        <label for="thana_id" class="form-label">@lang('thana.thana')</label>
        <div class="form-group">
            {{ Form::select('thana_id', $thanas, null, ['class' => $error_class.'form-control select2vue thana_id', 'placeholder' => trans('common.select'), 'id' => 'thana_id', 'required' => false, 'onchange' => 'SelectChange("'.route('get_fire_station_from_thana').'","fire_station_id",this)']) }}
            @if ($errors->has('thana_id'))
                <p class="text-danger">{{$errors->first('thana_id')}}</p>
            @endif
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('fire_station_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('monthly_fuel_report.fire_station_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('fire_station_id', $fire_stations, null, ['class' => $error_class.'form-control select2vue fire_station_id', 'placeholder' => trans('common.select_one'), 'id' => 'fire_station_id', 'required' => 1]) }}
            @if ($errors->has('fire_station_id'))
                <p class="text-danger">{{$errors->first('fire_station_id')}}</p>
            @endif
        </div>
    </div>


    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('months') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('monthly_fuel_report.months')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('month', $months, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'month', 'required' => 1,]) }}
            @if ($errors->has('month'))
                <p class="text-danger">{{$errors->first('month')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('employee_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('monthly_fuel_report.employee_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('employee_id', $employees, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'employee_id', 'required' => 1]) }}
            @if ($errors->has('employee_id'))
                <p class="text-danger">{{$errors->first('employee_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('designation_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('monthly_fuel_report.designation_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('designation_id', $designations, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'designation_id', 'required' => 1]) }}
            @if ($errors->has('designation_id'))
                <p class="text-danger">{{$errors->first('designation_id')}}</p>
            @endif
        </div>
    </div>


    <div class="mt-3">
        <hr>
        <h6 class="font-weight-semibold">@lang('monthly_fuel_report.monthly_fuel_reports')</h6>
        <div v-for="(row,index) in monthly_fuel_report_inputs">
            <div  class="border border-secondary mb-6 p-3 my-2">
                <div class="col-sm-12 text-right">
                    <button v-if="index != 0" type="button" class="btn btn-danger btn-sm" @click="removeMonthlyFuelReportDetails(index)"><i
                            class="fas fa-times text-warning"></i> </button>
                </div>
                <div class="row" >

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('work_type_place') ? 'parsley-error ' : ''; @endphp
                        <label for="work_type_place" class="form-label">@lang('monthly_fuel_report.work_type_place',['model' => trans('monthly_fuel_report.monthly_fuel_report')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <input v-model="row.work_type_place" class="{{$error_class}} form-control"
                                   :name="'monthly_fuel_reports['+index+'][work_type_place]'" id="work_type_place">
                            @if ($errors->has('work_type_place'))
                                <p class="text-danger">{{$errors->first('work_type_place')}}</p>
                            @endif
                        </div>
                    </div>

{{--        @dd($fuel_types);--}}
                    <div class="col-sm-12 col-md-4 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('fuel_type') ? 'parsley-error ' : ''; @endphp
                        <label for="fuel_type" class="form-label">@lang('monthly_fuel_report.fuel_type',['model' => trans('monthly_fuel_report.monthly_fuel_report')])</label>
                        <div class="form-group">
                            <select v-model="row.fuel_type" class="{{$error_class}} form-control select2vue fuel_type" :name="'monthly_fuel_reports['+index+'][fuel_type]'">
                                <option value="">@lang('common.select_one')</option>
                                @foreach($fuel_types as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('fuel_type'))
                                <p class="text-danger">{{$errors->first('fuel_type')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('meter_reading') ? 'parsley-error ' : ''; @endphp
                        <label for="meter_reading" class="form-label">@lang('monthly_fuel_report.meter_reading',['model' => trans('monthly_fuel_report.meter_reading')])</label>
                        <div class="form-group">
                            <input v-model="row.meter_reading" class="{{$error_class}} form-control"
                                   :name="'monthly_fuel_reports['+index+'][meter_reading]'" id="meter_reading">
                            @if ($errors->has('meter_reading'))
                                <p class="text-danger">{{$errors->first('meter_reading')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('distance_per_liter') ? 'parsley-error ' : ''; @endphp
                        <label for="distance_per_liter" class="form-label">@lang('monthly_fuel_report.distance_per_liter',['model' => trans('monthly_fuel_report.distance_per_liter')])</label>
                        <div class="form-group">
                            <input v-model="row.distance_per_liter" class="{{$error_class}} form-control"
                                   :name="'monthly_fuel_reports['+index+'][distance_per_liter]'" id="distance_per_liter">
                            @if ($errors->has('distance_per_liter'))
                                <p class="text-danger">{{$errors->first('distance_per_liter')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('total_fuel_cost') ? 'parsley-error ' : ''; @endphp
                        <label for="total_fuel_cost" class="form-label">@lang('monthly_fuel_report.total_fuel_cost',['model' => trans('monthly_fuel_report.total_fuel_cost')])</label>
                        <div class="form-group">
                            <input v-model="row.total_fuel_cost" class="{{$error_class}} form-control"
                                   :name="'monthly_fuel_reports['+index+'][total_fuel_cost]'" id="total_fuel_cost">
                            @if ($errors->has('total_fuel_cost'))
                                <p class="text-danger">{{$errors->first('total_fuel_cost')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('comment') ? 'parsley-error ' : ''; @endphp
                        <label for="comment" class="form-label">@lang('monthly_fuel_report.comment',['model' => trans('monthly_fuel_report.monthly_fuel_report')])</label>
                        <div class="form-group">
                            <input v-model="row.comment" class="{{$error_class}} form-control"
                                   :name="'monthly_fuel_reports['+index+'][comment]'" id="comment">
                            @if ($errors->has('comment'))
                                <p class="text-danger">{{$errors->first('comment')}}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-sm-12 text-right">
            <a href="javascript:" class="btn btn-success"  @click="addMoreMonthlyFuelReportDetails">
                <i class="fa fa-plus-circle"></i>
                @lang('monthly_fuel_report.add_monthly_fuel_report')
            </a>
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('status') ? 'parsley-error ' : ''; @endphp
        <label for="status" class="form-label">@lang('common.status',['model' => trans('monthly_fuel_report.monthly_fuel_report')])</label>
        <sup class="text-danger">*</sup>
        <div class="form-group form-group-check pl-4">
            <div class="form-check-custom">
                {{ Form::radio('status', 'Active',null, ['class' => 'form-check-input', 'id' => 'active', 'required' => 1, 'checked' => 1]) }}
                <label class="form-check-label" for="active">
                    @lang('common.active',['model' => trans('monthly_fuel_report.monthly_fuel_report')])
                </label>
            </div>

            <div class="form-check-custom">
                {{ Form::radio('status', 'Inactive',null, ['class' => 'form-check-input', 'id' => 'inactive', 'required' => 1]) }}
                <label class="form-check-label" for="inactive">
                    @lang('common.inactive',['model' => trans('monthly_fuel_report.monthly_fuel_report')])
                </label>
            </div>
            @if ($errors->has('status'))
                <p class="text-danger">{{$errors->first('status')}}</p>
            @endif
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary waves-effect waves-light">
            <i class="fa fa-save"></i> @lang('common.submit',['model' => trans('monthly_fuel_report.monthly_fuel_report')])
        </button>
    </div>
</div>

@if(!request()->ajax()) @section('script') @endif
<script src="{{ URL::asset('/assets/common/libs/parsleyjs/parsleyjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/common/js/pages/form-validation.init.js') }}"></script>

<script src="{{ asset('vue-js/vue/dist/vue.js') }}"></script>
<script src="{{ asset('vue-js/axios/dist/axios.min.js') }}"></script>

<script>

    $(function () {
        let vue = new Vue({
            el: '#vue',
            data: {
                monthly_fuel_report_inputs: [{
                    work_type_place:'',
                    fuel_type:'',
                    meter_reading:'',
                    distance_per_liter:'',
                    total_fuel_cost:'',
                    comment:'',
                }],
            },
            methods: {
                addMoreMonthlyFuelReportDetails(){
                    this.monthly_fuel_report_inputs.push({
                        work_type_place:'',
                        fuel_type:'',
                        meter_reading:'',
                        distance_per_liter:'',
                        total_fuel_cost:'',
                        comment:'',
                    });
                },
                removeMonthlyFuelReportDetails(index) {
                    this.monthly_fuel_report_inputs.splice(index, 1);
                },
                load_parameters(){
                    console.log({!! @$monthly_fuel_report->MonthlyFuelReportDetails !!})
                    this.monthly_fuel_report_inputs = {!! @$monthly_fuel_report->MonthlyFuelReportDetails ?? '{}' !!}
                },
            },
            created() {
                @if(\Route::currentRouteName() == 'monthly_fuel_report.edit')
                    this.load_parameters()
                @endif
            },
            mounted() {
                $(document).trigger('vue-loaded');
            },
            updated() {
                $(document).trigger('vue-loaded');
                make_bangla()
            },
        });

        $('#assigned_vehicle_id').on('change', function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: '{{route('find_assigned_vehicle')}}',
                type: 'post',
                dataType: 'JSON',
                data : {id: $('#assigned_vehicle_id').val()},
                cache: false,
                success: function (response) {
                    console.log(response)
                    $('#type_id').val(response.type_id)
                    $('#category_id').val(response.category_id)
                    $('#brand_id').val(response.brand_id)
                    $('#model_id').val(response.model_id)
                    $('.select2vue').select2()

                    setTimeout(function(){
                        $('#loader').hide();
                    }, 280);
                },
                error: function (xhr) {
                    setTimeout(function(){
                        $('#loader').hide();
                    }, 280);
                }
            });
        })

        $('#fire_station_id').on('change', function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: '{{route('find_fire_station')}}',
                type: 'post',
                dataType: 'JSON',
                data : {id: $('#fire_station_id').val()},
                cache: false,
                success: function (response) {
                    console.log(response)
                    $('#division_id').val(response.division_id)
                    $('#district_id').val(response.district_id)
                    $('#thana_id').val(response.thana_id)
                    $('.select2vue').select2()

                    setTimeout(function(){
                        $('#loader').hide();
                    }, 280);
                },
                error: function (xhr) {
                    setTimeout(function(){
                        $('#loader').hide();
                    }, 280);
                }
            });
        })
    })
</script>

@include('admin.layouts.partial.footer.vue_loaded_script')

@if(!request()->ajax()) @endsection @endif
