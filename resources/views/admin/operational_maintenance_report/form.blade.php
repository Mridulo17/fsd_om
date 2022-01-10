<div id="vue" class="row mb-3">

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('to_fire_station_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('operational_maintenance_report.to_fire_station_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('to_fire_station_id', $fire_stations, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'to_fire_station_id', 'required' => 1]) }}
            @if ($errors->has('to_fire_station_id'))
                <p class="text-danger">{{$errors->first('to_fire_station_id')}}</p>
            @endif
        </div>
    </div>



    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('to_employee_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('operational_maintenance_report.to_employee_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('to_employee_id', $employees, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'to_employee_id', 'required' => 1]) }}
            @if ($errors->has('to_employee_id'))
                <p class="text-danger">{{$errors->first('to_employee_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('to_designation_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('operational_maintenance_report.to_designation_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('to_designation_id', $designations, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'to_designation_id', 'required' => 1]) }}
            @if ($errors->has('to_designation_id'))
                <p class="text-danger">{{$errors->first('to_designation_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('to_district_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('operational_maintenance_report.to_district_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('to_district_id', $districts, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'to_district_id', 'required' => 1]) }}
            @if ($errors->has('to_district_id'))
                <p class="text-danger">{{$errors->first('to_district_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('months') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('operational_maintenance_report.months')</label>
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
            $error_class = $errors->has('from_employee_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('operational_maintenance_report.from_employee_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('from_employee_id', $employees, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'from_employee_id', 'required' => 1]) }}
            @if ($errors->has('from_employee_id'))
                <p class="text-danger">{{$errors->first('from_employee_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('from_designation_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('operational_maintenance_report.from_designation_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('from_designation_id', $designations, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'from_designation_id', 'required' => 1]) }}
            @if ($errors->has('from_designation_id'))
                <p class="text-danger">{{$errors->first('from_designation_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('from_fire_station_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('operational_maintenance_report.from_fire_station_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('from_fire_station_id', $fire_stations, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'from_fire_station_id', 'required' => 1]) }}
            @if ($errors->has('from_fire_station_id'))
                <p class="text-danger">{{$errors->first('from_fire_station_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('memorandum_no') ? 'parsley-error ' : ''; @endphp
        <label for="memorandum_no" class="form-label">@lang('operational_maintenance_report.memorandum_no')
        </label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon-memo-no">{{ @$operational_maintenance_report->fromFireStation->memorandum_no }}</span>
                {{ Form::text('memorandum_no_extension', @$operational_maintenance_report->memorandum_no_extension, ['class' => $error_class.'form-control memorandum_no_extension','aria-describedby' => 'basic-addon-memo-no', 'required' =>
                false]) }}
                @if ($errors->has('memorandum_no_extension'))
                    <p class="text-danger">{{$errors->first('memorandum_no_extension')}}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('from_district_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('operational_maintenance_report.from_district_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('from_district_id', $districts, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'from_district_id', 'required' => 1]) }}
            @if ($errors->has('from_district_id'))
                <p class="text-danger">{{$errors->first('from_district_id')}}</p>
            @endif
        </div>
    </div>

    <div class="mt-3">
        <hr>
        <h6 class="font-weight-semibold">@lang('operational_maintenance_report.operational_maintenance_reports')</h6>
        <div v-for="(row,index) in operational_maintenance_report_inputs">
            <div  class="border border-secondary mb-6 p-3 my-2">
                <div class="col-sm-12 text-right">
                    <button v-if="index != 0" type="button" class="btn btn-danger btn-sm" @click="removeOperationalMaintenanceDetails(index)"><i
                            class="fas fa-times text-warning"></i> </button>
                </div>
                <div class="row" >

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('date') ? 'parsley-error ' : ''; @endphp
                        <label for="date" class="form-label">@lang('operational_maintenance_report.date')</label>
                        <div class="form-group">
                            <input pattern="/^(0[1-9]|1\d|2\d|3[01])\-(0[1-9]|1[0-2])\-(1|2)\d{3}$/" placeholder="dd-mm-yyyy" v-model="row.date" class="{{$error_class}} form-control" :name="'operational_maintenance_reports['+index+'][date]'" id="date">
                            @if ($errors->has('date'))
                                <p class="text-danger">{{$errors->first('date')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('fire_accident_place') ? 'parsley-error ' : ''; @endphp
                        <label for="fire_accident_place" class="form-label">@lang('operational_maintenance_report.fire_accident_place',['model' => trans('operational_maintenance_report.operational_maintenance_report')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <input v-model="row.fire_accident_place" class="{{$error_class}} form-control"
                                   :name="'operational_maintenance_reports['+index+'][fire_accident_place]'" id="fire_accident_place">
                            @if ($errors->has('fire_accident_place'))
                                <p class="text-danger">{{$errors->first('fire_accident_place')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('fire_accident_reason_id') ? 'parsley-error ' : ''; @endphp
                        <label for="fire_accident_reason_id" class="form-label">@lang('common.model',['model' => trans('operational_maintenance_report.fire_accident_reason_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue fire_accident_reason_id" :name="'operational_maintenance_reports['+index+'][fire_accident_reason_id]'">
                                <option value="">@lang('common.select_one')</option>
                                <option v-for="(fire_accident_reason,index) in fire_accident_reasons" :value="index"    :selected="index == row.fire_accident_reason_id">@{{fire_accident_reason}}
                                </option>
                            </select>
                            @if ($errors->has('fire_accident_reason_id'))
                                <p class="text-danger">{{$errors->first('fire_accident_reason_id')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('damaged_property_id') ? 'parsley-error ' : ''; @endphp
                        <label for="damaged_property_id" class="form-label">@lang('common.model',['model' => trans('operational_maintenance_report.damaged_property_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue damaged_property_id" :name="'operational_maintenance_reports['+index+'][damaged_property_id]'">
                                <option value="">@lang('common.select_one')</option>
                                <option v-for="(damaged_property,index) in damaged_properties" :value="index"    :selected="index == row.damaged_property_id">@{{damaged_property}}
                                </option>
                            </select>
                            @if ($errors->has('damaged_property_id'))
                                <p class="text-danger">{{$errors->first('damaged_property_id')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('probable_damage_amount') ? 'parsley-error ' : ''; @endphp
                        <label for="probable_damage_amount" class="form-label">@lang('operational_maintenance_report.probable_damage_amount',['model' => trans('operational_maintenance_report.operational_maintenance_report')])</label>
                        <div class="form-group">
                            <input v-model="row.probable_damage_amount" class="{{$error_class}} form-control"
                                   :name="'operational_maintenance_reports['+index+'][probable_damage_amount]'" id="probable_damage_amount">
                            @if ($errors->has('probable_damage_amount'))
                                <p class="text-danger">{{$errors->first('probable_damage_amount')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('probable_rescue_amount') ? 'parsley-error ' : ''; @endphp
                        <label for="probable_rescue_amount" class="form-label">@lang('operational_maintenance_report.probable_rescue_amount',['model' => trans('operational_maintenance_report.operational_maintenance_report')])</label>
                        <div class="form-group">
                            <input v-model="row.probable_rescue_amount" class="{{$error_class}} form-control"
                                   :name="'operational_maintenance_reports['+index+'][probable_rescue_amount]'" id="probable_rescue_amount">
                            @if ($errors->has('probable_rescue_amount'))
                                <p class="text-danger">{{$errors->first('probable_rescue_amount')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('people_injury') ? 'parsley-error ' : ''; @endphp
                        <label for="people_injury" class="form-label">@lang('operational_maintenance_report.people_injury',['model' => trans('operational_maintenance_report.operational_maintenance_report')])</label>
                        <div class="form-group">
                            <input v-model="row.people_injury" class="{{$error_class}} form-control"
                                   :name="'operational_maintenance_reports['+index+'][people_injury]'" id="people_injury">
                            @if ($errors->has('people_injury'))
                                <p class="text-danger">{{$errors->first('people_injury')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('people_died') ? 'parsley-error ' : ''; @endphp
                        <label for="people_died" class="form-label">@lang('operational_maintenance_report.people_died',['model' => trans('operational_maintenance_report.operational_maintenance_report')])</label>
                        <div class="form-group">
                            <input v-model="row.people_died" class="{{$error_class}} form-control"
                                   :name="'operational_maintenance_reports['+index+'][people_died]'" id="people_died">
                            @if ($errors->has('people_died'))
                                <p class="text-danger">{{$errors->first('people_died')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('animals_injury') ? 'parsley-error ' : ''; @endphp
                        <label for="animals_injury" class="form-label">@lang('operational_maintenance_report.animals_injury',['model' => trans('operational_maintenance_report.operational_maintenance_report')])</label>
                        <div class="form-group">
                            <input v-model="row.animals_injury" class="{{$error_class}} form-control"
                                   :name="'operational_maintenance_reports['+index+'][animals_injury]'" id="animals_injury">
                            @if ($errors->has('animals_injury'))
                                <p class="text-danger">{{$errors->first('animals_injury')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('animals_died') ? 'parsley-error ' : ''; @endphp
                        <label for="animals_died" class="form-label">@lang('operational_maintenance_report.animals_died',['model' => trans('operational_maintenance_report.operational_maintenance_report')])</label>
                        <div class="form-group">
                            <input v-model="row.animals_died" class="{{$error_class}} form-control"
                                   :name="'operational_maintenance_reports['+index+'][animals_died]'" id="animals_died">
                            @if ($errors->has('animals_died'))
                                <p class="text-danger">{{$errors->first('animals_died')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('employee_injury') ? 'parsley-error ' : ''; @endphp
                        <label for="employee_injury" class="form-label">@lang('operational_maintenance_report.employee_injury',['model' => trans('operational_maintenance_report.operational_maintenance_report')])</label>
                        <div class="form-group">
                            <input v-model="row.employee_injury" class="{{$error_class}} form-control"
                                   :name="'operational_maintenance_reports['+index+'][employee_injury]'" id="employee_injury">
                            @if ($errors->has('employee_injury'))
                                <p class="text-danger">{{$errors->first('employee_injury')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('employee_died') ? 'parsley-error ' : ''; @endphp
                        <label for="employee_died" class="form-label">@lang('operational_maintenance_report.employee_died',['model' => trans('operational_maintenance_report.operational_maintenance_report')])</label>
                        <div class="form-group">
                            <input v-model="row.employee_died" class="{{$error_class}} form-control"
                                   :name="'operational_maintenance_reports['+index+'][employee_died]'" id="employee_died">
                            @if ($errors->has('employee_died'))
                                <p class="text-danger">{{$errors->first('employee_died')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('assigned_vehicle_id') ? 'parsley-error ' : ''; @endphp
                        <label for="assigned_vehicle_id" class="form-label">@lang('common.model',['model' => trans('operational_maintenance_report.assigned_vehicle_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue assigned_vehicle_id" :name="'operational_maintenance_reports['+index+'][assigned_vehicle_id]'">
                                <option value="">@lang('common.select_one')</option>
                                <option v-for="(assigned_vehicle,index) in assigned_vehicles" :value="index"    :selected="index == row.assigned_vehicle_id">@{{assigned_vehicle}}
                                </option>
                            </select>
                            @if ($errors->has('assigned_vehicle_id'))
                                <p class="text-danger">{{$errors->first('assigned_vehicle_id')}}</p>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('comment') ? 'parsley-error ' : ''; @endphp
                        <label for="comment" class="form-label">@lang('operational_maintenance_report.comment',['model' => trans('operational_maintenance_report.operational_maintenance_report')])</label>
                        <div class="form-group">
                            <input v-model="row.comment" class="{{$error_class}} form-control"
                                   :name="'operational_maintenance_reports['+index+'][comment]'" id="comment">
                            @if ($errors->has('comment'))
                                <p class="text-danger">{{$errors->first('comment')}}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-sm-12 text-right">
            <a href="javascript:" class="btn btn-success"  @click="addMoreOperationalMaintenanceDetails">
                <i class="fa fa-plus-circle"></i>
                @lang('operational_maintenance_report.add_operational_maintenance_report')
            </a>
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('status') ? 'parsley-error ' : ''; @endphp
        <label for="status" class="form-label">@lang('common.status',['model' => trans('operational_maintenance_report.operational_maintenance_report')])</label>
        <sup class="text-danger">*</sup>
        <div class="form-group form-group-check pl-4">
            <div class="form-check-custom">
                {{ Form::radio('status', 'Active',null, ['class' => 'form-check-input', 'id' => 'active', 'required' => 1, 'checked' => 1]) }}
                <label class="form-check-label" for="active">
                    @lang('common.active',['model' => trans('operational_maintenance_report.operational_maintenance_report')])
                </label>
            </div>

            <div class="form-check-custom">
                {{ Form::radio('status', 'Inactive',null, ['class' => 'form-check-input', 'id' => 'inactive', 'required' => 1]) }}
                <label class="form-check-label" for="inactive">
                    @lang('common.inactive',['model' => trans('operational_maintenance_report.operational_maintenance_report')])
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
            <i class="fa fa-save"></i> @lang('common.submit',['model' => trans('operational_maintenance_report.operational_maintenance_report')])
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
                fire_accident_reasons: {!! @$fire_accident_reasons !!},
                assigned_vehicles: {!! @$assigned_vehicles !!},
                damaged_properties: {!! @$damaged_properties !!},
                operational_maintenance_report_inputs: [{
                    date:'',
                    fire_accident_place:'',
                    probable_damage_amount:'',
                    probable_rescue_amount:'',
                    people_injury:'',
                    people_died:'',
                    animals_injury:'',
                    animals_died:'',
                    employee_injury:'',
                    employee_died:'',
                    comment:'',
                }],
            },
            methods: {
                addMoreOperationalMaintenanceDetails(){
                    this.operational_maintenance_report_inputs.push({
                        date:'',
                        fire_accident_place:'',
                        probable_damage_amount:'',
                        probable_rescue_amount:'',
                        people_injury:'',
                        people_died:'',
                        animals_injury:'',
                        animals_died:'',
                        employee_injury:'',
                        employee_died:'',
                        comment:'',
                    });
                },
                removeOperationalMaintenanceDetails(index) {
                    this.operational_maintenance_report_inputs.splice(index, 1);
                },
                load_parameters(){
                    console.log({!! @$operational_maintenance_report->OperationalMaintenanceDetails !!})
                    this.operational_maintenance_report_inputs = {!! @$operational_maintenance_report->operationalMaintenanceDetails ?? '{}' !!}
                },
            },
            created() {
                @if(\Route::currentRouteName() == 'operational_maintenance_report.edit')
                    this.load_parameters()
                @endif
            },
            mounted() {
                console.log(this.fire_accident_reasons);
                $(document).trigger('vue-loaded');
            },
            updated() {
                $(document).trigger('vue-loaded');
                make_bangla()
            },
        });

        $('#from_fire_station_id').on('change', function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: '{{route('find_fire_station')}}',
                type: 'post',
                dataType: 'JSON',
                data : {id: $('#from_fire_station_id').val()},
                cache: false,
                success: function (response) {
                    console.log(response)
                    $('#basic-addon-memo-no').html(response.memorandum_no)
                    // $('#memorandum_no').val(response.memorandum_no)
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
