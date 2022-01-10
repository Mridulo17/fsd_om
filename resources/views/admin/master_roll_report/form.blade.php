<div id="vue" class="row mb-3">

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
                        $error_class = $errors->has('date') ? 'parsley-error ' : ''; @endphp
        <label for="date" class="form-label">@lang('master_roll_report.date',['model' => trans('master_roll_report.master_roll_report')])</label>
        <div class="form-group">
            {{ Form::text('date', null, ['class' => $error_class.'form-control datepicker', 'placeholder' => trans('master_roll_report.date'), 'id' => 'date', 'autocomplete' => 'off', 'required' => 1]) }}
            @if ($errors->has('date'))
                <p class="text-danger">{{$errors->first('date')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('to_fire_station_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('master_roll_report.to_fire_station_id')</label>
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
        <label for="bn_name" class="form-label">@lang('master_roll_report.to_employee_id')</label>
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
        <label for="bn_name" class="form-label">@lang('master_roll_report.to_designation_id')</label>
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
        <label for="bn_name" class="form-label">@lang('master_roll_report.to_district_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('to_district_id', $districts, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'to_district_id', 'required' => false,]) }}
            @if ($errors->has('to_district_id'))
                <p class="text-danger">{{$errors->first('to_district_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('months') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('master_roll_report.months')</label>
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
        <label for="bn_name" class="form-label">@lang('master_roll_report.from_employee_id')</label>
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
        <label for="bn_name" class="form-label">@lang('master_roll_report.from_designation_id')</label>
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
        <label for="bn_name" class="form-label">@lang('master_roll_report.from_fire_station_id')</label>
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
        <label for="memorandum_no" class="form-label">@lang('master_roll_report.memorandum_no')
        </label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon-memo-no">{{ @$master_roll_report->fromFireStation->memorandum_no }}</span>
                {{ Form::text('memorandum_no_extension', @$master_roll_report->memorandum_no_extension, ['class' => $error_class.'form-control memorandum_no_extension','aria-describedby' => 'basic-addon-memo-no', 'required' =>
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
        <label for="bn_name" class="form-label">@lang('master_roll_report.from_district_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('from_district_id', $districts, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'from_district_id', 'required' => false, 'onchange' => 'SelectChange("'.route('get_thanas').'","thana_id",this)']) }}
            @if ($errors->has('from_district_id'))
                <p class="text-danger">{{$errors->first('from_district_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('thana_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('master_roll_report.thana_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('thana_id', $thanas, null, ['class' => $error_class.'form-control select2vue thana_id', 'placeholder' => trans('common.select_one'), 'id' => 'thana_id', 'required' => 1 ]) }}
            @if ($errors->has('thana_id'))
                <p class="text-danger">{{$errors->first('thana_id')}}</p>
            @endif
        </div>
    </div>

    <div class="mt-3">
        <hr>
        <div v-for="(row,index) in master_roll_report_inputs">
            <div  class="border border-secondary mb-6 p-3 my-2">
                <div class="col-sm-12 text-right">
                    <button v-if="index != 0" type="button" class="btn btn-danger btn-sm" @click="removeMasterRollReportDetails(index)"><i
                            class="fas fa-times text-warning"></i>
                    </button>
                </div>

                <div class="row" >
                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('employee_id') ? 'parsley-error ' : ''; @endphp
                        <label for="employee_id" class="form-label">@lang('common.model',['model' => trans('master_roll_report.employee_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue employee_id" :name="'master_roll_reports['+index+'][employee_id]'">
                                <option value="">@lang('common.select_one')</option>
                                <option v-for="(employee,index) in employees" :value="index"    :selected="index == row.employee_id">@{{employee}}
                                </option>
                            </select>
                            @if ($errors->has('employee_id'))
                                <p class="text-danger">{{$errors->first('employee_id')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('designation_id') ? 'parsley-error ' : ''; @endphp
                        <label for="designation_id" class="form-label">@lang('common.model',['model' => trans('master_roll_report.designation_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue designation_id" :name="'master_roll_reports['+index+'][designation_id]'">
                                <option value="">@lang('common.select_one')</option>
                                <option v-for="(designation,index) in designations" :value="index"    :selected="index == row.designation_id">@{{designation}}
                                </option>
                            </select>
                            @if ($errors->has('designation_id'))
                                <p class="text-danger">{{$errors->first('designation_id')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('total_attendance_days') ? 'parsley-error ' : ''; @endphp
                        <label for="total_attendance_days" class="form-label">@lang('master_roll_report.total_attendance_days',['model' => trans('master_roll_report.master_roll_report')])</label>
                        <div class="form-group">
                            <input v-model="row.total_attendance_days" class="{{$error_class}} form-control"
                                   :name="'master_roll_reports['+index+'][total_attendance_days]'" id="total_attendance_days">
                            @if ($errors->has('total_attendance_days'))
                                <p class="text-danger">{{$errors->first('total_attendance_days')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('total_absent_days') ? 'parsley-error ' : ''; @endphp
                        <label for="total_absent_days" class="form-label">@lang('master_roll_report.total_absent_days',['model' => trans('master_roll_report.master_roll_report')])</label>
                        <div class="form-group">
                            <input v-model="row.total_absent_days" class="{{$error_class}} form-control"
                                   :name="'master_roll_reports['+index+'][total_absent_days]'" id="total_absent_days">
                            @if ($errors->has('total_absent_days'))
                                <p class="text-danger">{{$errors->first('total_absent_days')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('ml_el') ? 'parsley-error ' : ''; @endphp
                        <label for="ml_el" class="form-label">@lang('master_roll_report.ml_el',['model' => trans('master_roll_report.master_roll_report')])</label>
                        <div class="form-group">
                            <input v-model="row.ml_el" class="{{$error_class}} form-control"
                                   :name="'master_roll_reports['+index+'][ml_el]'" id="ml_el">
                            @if ($errors->has('ml_el'))
                                <p class="text-danger">{{$errors->first('ml_el')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('rl') ? 'parsley-error ' : ''; @endphp
                        <label for="rl" class="form-label">@lang('master_roll_report.rl',['model' => trans('master_roll_report.master_roll_report')])</label>
                        <div class="form-group">
                            <input v-model="row.rl" class="{{$error_class}} form-control"
                                   :name="'master_roll_reports['+index+'][rl]'" id="rl">
                            @if ($errors->has('rl'))
                                <p class="text-danger">{{$errors->first('rl')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('salary_workday') ? 'parsley-error ' : ''; @endphp
                        <label for="salary_workday" class="form-label">@lang('master_roll_report.salary_workday',['model' => trans('master_roll_report.master_roll_report')])</label>
                        <div class="form-group">
                            <input v-model="row.salary_workday" class="{{$error_class}} form-control"
                                   :name="'master_roll_reports['+index+'][salary_workday]'" id="salary_workday">
                            @if ($errors->has('salary_workday'))
                                <p class="text-danger">{{$errors->first('salary_workday')}}</p>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('comment') ? 'parsley-error ' : ''; @endphp
                        <label for="comment" class="form-label">@lang('master_roll_report.comment',['model' => trans('master_roll_report.master_roll_report')])</label>
                        <div class="form-group">
                            <input v-model="row.comment" class="{{$error_class}} form-control"
                                   :name="'master_roll_reports['+index+'][comment]'" id="comment">
                            @if ($errors->has('comment'))
                                <p class="text-danger">{{$errors->first('comment')}}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-sm-12 text-right">
            <a href="javascript:" class="btn btn-success"  @click="addMoreMasterRollReportDetails">
                <i class="fa fa-plus-circle"></i>
                @lang('master_roll_report.add_master_roll_report')
            </a>
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('status') ? 'parsley-error ' : ''; @endphp
        <label for="status" class="form-label">@lang('common.status',['model' => trans('master_roll_report.master_roll_report')])</label>
        <sup class="text-danger">*</sup>
        <div class="form-group form-group-check pl-4">
            <div class="form-check-custom">
                {{ Form::radio('status', 'Active',null, ['class' => 'form-check-input', 'id' => 'active', 'required' => 1, 'checked' => 1]) }}
                <label class="form-check-label" for="active">
                    @lang('common.active',['model' => trans('master_roll_report.master_roll_report')])
                </label>
            </div>

            <div class="form-check-custom">
                {{ Form::radio('status', 'Inactive',null, ['class' => 'form-check-input', 'id' => 'inactive', 'required' => 1]) }}
                <label class="form-check-label" for="inactive">
                    @lang('common.inactive',['model' => trans('master_roll_report.master_roll_report')])
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
            <i class="fa fa-save"></i> @lang('common.submit',['model' => trans('master_roll_report.master_roll_report')])
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
                employees: {!! @$employees !!},
                designations: {!! @$designations !!},
                master_roll_report_inputs: [{
                    total_attendance_days:'',
                    total_absent_days:'',
                    ml_el:'',
                    rl:'',
                    salary_workday:'',
                    comment:'',
                }],
            },
            methods: {
                addMoreMasterRollReportDetails(){
                    this.master_roll_report_inputs.push({
                        total_attendance_days:'',
                        total_absent_days:'',
                        ml_el:'',
                        rl:'',
                        salary_workday:'',
                        comment:'',
                    });
                },
                removeMasterRollReportDetails(index) {
                    this.master_roll_report_inputs.splice(index, 1);
                },
                load_parameters(){
                    console.log({!! @$master_roll_report->masterRollReportDetails !!})
                    this.master_roll_report_inputs = {!! @$master_roll_report->masterRollReportDetails ?? '{}' !!}
                },
            },
            created() {
                @if(\Route::currentRouteName() == 'master_roll_report.edit')
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
