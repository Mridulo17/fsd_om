<div id="vue" class="row mb-3">


    <div class="mt-3">
        <hr>
        <div class="to-fire" v-for="(row,index) in to_attach_staff_inputs">
            <div  class="border border-secondary mb-6 p-3 my-2">
                <div class="col-sm-12 text-right">
                    <button v-if="index != 0" type="button" class="btn btn-danger btn-sm" @click="removeToAttachStaff(index)"><i
                            class="fas fa-times text-warning"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('to_fire_station_id') ? 'parsley-error ' : ''; @endphp
                        <label for="to_fire_station_id" class="form-label">@lang('common.model',['model' => trans('attach_staff_record.to_fire_station_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue to_fire_station_id" :name="'to_attach_staffs['+index+'][to_fire_station_id]'">
                                <option value="">@lang('common.select_one')</option>
                                <option v-for="(fire_station,index) in to_fire_stations" :value="index"    :selected="index == row.to_fire_station_id">@{{fire_station}}
                                </option>
                            </select>
                            @if ($errors->has('to_fire_station_id'))
                                <p class="text-danger">{{$errors->first('to_fire_station_id')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('to_designation_id') ? 'parsley-error ' : ''; @endphp
                        <label for="to_designation_id" class="form-label">@lang('common.model',['model' => trans('attach_staff_record.to_designation_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue to_designation_id" :name="'to_attach_staffs['+index+'][to_designation_id]'">
                                <option value="">@lang('common.select_one')</option>
                                <option v-for="(designation,index) in to_designations" :value="index"    :selected="index == row.to_designation_id">@{{designation}}
                                </option>
                            </select>
                            @if ($errors->has('to_designation_id'))
                                <p class="text-danger">{{$errors->first('to_designation_id')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('to_district_id') ? 'parsley-error ' : ''; @endphp
                        <label for="to_district_id" class="form-label">@lang('common.model',['model' => trans('attach_staff_record.to_district_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue to_district_id" :name="'to_attach_staffs['+index+'][to_district_id]'">
                                <option value="">@lang('common.select_one')</option>
                                <option v-for="(district,index) in to_districts" :value="index"    :selected="index == row.to_district_id">@{{district}}
                                </option>
                            </select>
                            @if ($errors->has('to_district_id'))
                                <p class="text-danger">{{$errors->first('to_district_id')}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-12 text-right">
            <a href="javascript:" class="btn btn-success"  @click="addMoreToAttachStaff">
                <i class="fa fa-plus-circle"></i>
                @lang('attach_staff_record.To:')
            </a>
        </div>
    </div>

{{--    <div class="col-md-4 col-sm-4 col-xs-12 my-2">--}}
{{--        @php /** @var string $errors */--}}
{{--            $error_class = $errors->has('to_fire_station_id') ? 'parsley-error ' : ''; @endphp--}}
{{--        <label for="bn_name" class="form-label">@lang('attach_staff_record.to_fire_station_id')</label>--}}
{{--        <sup class="text-danger">*</sup>--}}
{{--        <div class="form-group">--}}
{{--            {{ Form::select('to_fire_station_id[]', $fire_stations, null, ['class' => $error_class.'form-control select2vue', 'multiple'=> 'multiple', 'id' => 'to_fire_station_id', 'required' => 1]) }}--}}
{{--            @if ($errors->has('to_fire_station_id'))--}}
{{--                <p class="text-danger">{{$errors->first('to_fire_station_id')}}</p>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
                        $error_class = $errors->has('date') ? 'parsley-error ' : ''; @endphp
        <label for="date" class="form-label">@lang('attach_staff_record.date',['model' => trans('attach_staff_record.attach_staff_record')])</label>
        <div class="form-group">
            {{ Form::text('date', null, ['class' => $error_class.'form-control datepicker', 'placeholder' => trans('attach_staff_record.date'), 'id' => 'date', 'autocomplete' => 'off', 'required' => 1]) }}
            @if ($errors->has('date'))
                <p class="text-danger">{{$errors->first('date')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('to_employee_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('attach_staff_record.to_employee_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('to_employee_id', $employees, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'to_employee_id', 'required' => 1]) }}
            @if ($errors->has('to_employee_id'))
                <p class="text-danger">{{$errors->first('to_employee_id')}}</p>
            @endif
        </div>
    </div>

{{--    <div class="col-md-4 col-sm-4 col-xs-12 my-2">--}}
{{--        @php /** @var string $errors */--}}
{{--            $error_class = $errors->has('to_designation_id') ? 'parsley-error ' : ''; @endphp--}}
{{--        <label for="bn_name" class="form-label">@lang('attach_staff_record.to_designation_id')</label>--}}
{{--        <sup class="text-danger">*</sup>--}}
{{--        <div class="form-group">--}}
{{--            {{ Form::select('to_designation_id', $designations, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'to_designation_id', 'required' => 1]) }}--}}
{{--            @if ($errors->has('to_designation_id'))--}}
{{--                <p class="text-danger">{{$errors->first('to_designation_id')}}</p>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="col-md-4 col-sm-4 col-xs-12 my-2">--}}
{{--        @php /** @var string $errors */--}}
{{--            $error_class = $errors->has('to_district_id') ? 'parsley-error ' : ''; @endphp--}}
{{--        <label for="bn_name" class="form-label">@lang('attach_staff_record.to_district_id')</label>--}}
{{--        <sup class="text-danger">*</sup>--}}
{{--        <div class="form-group">--}}
{{--            {{ Form::select('to_district_id', $districts, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'to_district_id', 'required' => false,]) }}--}}
{{--            @if ($errors->has('to_district_id'))--}}
{{--                <p class="text-danger">{{$errors->first('to_district_id')}}</p>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('months') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('attach_staff_record.months')</label>
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
        <label for="bn_name" class="form-label">@lang('attach_staff_record.from_employee_id')</label>
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
        <label for="bn_name" class="form-label">@lang('attach_staff_record.from_designation_id')</label>
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
        <label for="bn_name" class="form-label">@lang('attach_staff_record.from_fire_station_id')</label>
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
        <label for="memorandum_no" class="form-label">@lang('attach_staff_record.memorandum_no')
        </label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon-memo-no">{{ @$attach_staff_record->fromFireStation->memorandum_no }}</span>
                {{ Form::text('memorandum_no_extension', @$attach_staff_record->memorandum_no_extension, ['class' => $error_class.'form-control memorandum_no_extension','aria-describedby' => 'basic-addon-memo-no', 'required' =>
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
        <label for="bn_name" class="form-label">@lang('attach_staff_record.from_district_id')</label>
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
        <label for="bn_name" class="form-label">@lang('attach_staff_record.thana_id')</label>
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
        <h6 class="font-weight-semibold">@lang('attach_staff_record.attach_staff_records')</h6>
        <div class="attachstaff" v-for="(row,index) in attach_staff_record_inputs">
            <div  class="border border-secondary mb-6 p-3 my-2">
                <div class="col-sm-12 text-right">
                    <button v-if="index != 0" type="button" class="btn btn-danger btn-sm" @click="removeAttachStaffRecordDetails(index)"><i
                            class="fas fa-times text-warning"></i> </button>
                </div>
                <div class="row" >


                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('employee_id') ? 'parsley-error ' : ''; @endphp
                        <label for="employee_id" class="form-label">@lang('common.model',['model' => trans('attach_staff_record.employee_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue employee_id" :name="'attach_staff_records['+index+'][employee_id]'">
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
                        <label for="designation_id" class="form-label">@lang('common.model',['model' => trans('attach_staff_record.designation_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue designation_id" :name="'attach_staff_records['+index+'][designation_id]'">
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
                            $error_class = $errors->has('main_fire_station_id') ? 'parsley-error ' : ''; @endphp
                        <label for="main_fire_station_id" class="form-label">@lang('common.model',['model' => trans('attach_staff_record.main_fire_station_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue main_fire_station_id" :name="'attach_staff_records['+index+'][main_fire_station_id]'">
                                <option value="">@lang('common.select_one')</option>
                                <option v-for="(fire_station,index) in main_fire_stations" :value="index"    :selected="index == row.main_fire_station_id">@{{fire_station}}
                                </option>
                            </select>
                            @if ($errors->has('main_fire_station_id'))
                                <p class="text-danger">{{$errors->first('main_fire_station_id')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('attach_fire_station_id') ? 'parsley-error ' : ''; @endphp
                        <label for="attach_fire_station_id" class="form-label">@lang('common.model',['model' => trans('attach_staff_record.attach_fire_station_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue attach_fire_station_id" :name="'attach_staff_records['+index+'][attach_fire_station_id]'">
                                <option value="">@lang('common.select_one')</option>
                                <option v-for="(fire_station,index) in attch_fire_stations" :value="index"    :selected="index == row.attach_fire_station_id">@{{fire_station}}
                                </option>
                            </select>
                            @if ($errors->has('attach_fire_station_id'))
                                <p class="text-danger">{{$errors->first('attach_fire_station_id')}}</p>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('total_attendance_days') ? 'parsley-error ' : ''; @endphp
                        <label for="total_attendance_days" class="form-label">@lang('attach_staff_record.total_attendance_days',['model' => trans('attach_staff_record.attach_staff_record')])</label>
                        <div class="form-group">
                            <input v-model="row.total_attendance_days" class="{{$error_class}} form-control"
                                   :name="'attach_staff_records['+index+'][total_attendance_days]'" id="total_attendance_days">
                            @if ($errors->has('total_attendance_days'))
                                <p class="text-danger">{{$errors->first('total_attendance_days')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('total_absent_days') ? 'parsley-error ' : ''; @endphp
                        <label for="total_absent_days" class="form-label">@lang('attach_staff_record.total_absent_days',['model' => trans('attach_staff_record.attach_staff_record')])</label>
                        <div class="form-group">
                            <input v-model="row.total_absent_days" class="{{$error_class}} form-control"
                                   :name="'attach_staff_records['+index+'][total_absent_days]'" id="total_absent_days">
                            @if ($errors->has('total_absent_days'))
                                <p class="text-danger">{{$errors->first('total_absent_days')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('ml_el_rl') ? 'parsley-error ' : ''; @endphp
                        <label for="ml_el_rl" class="form-label">@lang('attach_staff_record.ml_el_rl',['model' => trans('attach_staff_record.attach_staff_record')])</label>
                        <div class="form-group">
                            <input v-model="row.ml_el_rl" class="{{$error_class}} form-control"
                                   :name="'attach_staff_records['+index+'][ml_el_rl]'" id="ml_el_rl">
                            @if ($errors->has('ml_el_rl'))
                                <p class="text-danger">{{$errors->first('ml_el_rl')}}</p>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('salary_workday') ? 'parsley-error ' : ''; @endphp
                        <label for="salary_workday" class="form-label">@lang('attach_staff_record.salary_workday',['model' => trans('attach_staff_record.attach_staff_record')])</label>
                        <div class="form-group">
                            <input v-model="row.salary_workday" class="{{$error_class}} form-control"
                                   :name="'attach_staff_records['+index+'][salary_workday]'" id="salary_workday">
                            @if ($errors->has('salary_workday'))
                                <p class="text-danger">{{$errors->first('salary_workday')}}</p>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('comment') ? 'parsley-error ' : ''; @endphp
                        <label for="comment" class="form-label">@lang('attach_staff_record.comment',['model' => trans('attach_staff_record.attach_staff_record')])</label>
                        <div class="form-group">
                            <input v-model="row.comment" class="{{$error_class}} form-control"
                                   :name="'attach_staff_records['+index+'][comment]'" id="comment">
                            @if ($errors->has('comment'))
                                <p class="text-danger">{{$errors->first('comment')}}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-sm-12 text-right">
            <a href="javascript:" class="btn btn-success"  @click="addMoreAttachStaffRecordDetails">
                <i class="fa fa-plus-circle"></i>
                @lang('attach_staff_record.add_attach_staff_record')
            </a>
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('status') ? 'parsley-error ' : ''; @endphp
        <label for="status" class="form-label">@lang('common.status',['model' => trans('attach_staff_record.attach_staff_record')])</label>
        <sup class="text-danger">*</sup>
        <div class="form-group form-group-check pl-4">
            <div class="form-check-custom">
                {{ Form::radio('status', 'Active',null, ['class' => 'form-check-input', 'id' => 'active', 'required' => 1, 'checked' => 1]) }}
                <label class="form-check-label" for="active">
                    @lang('common.active',['model' => trans('attach_staff_record.attach_staff_record')])
                </label>
            </div>

            <div class="form-check-custom">
                {{ Form::radio('status', 'Inactive',null, ['class' => 'form-check-input', 'id' => 'inactive', 'required' => 1]) }}
                <label class="form-check-label" for="inactive">
                    @lang('common.inactive',['model' => trans('attach_staff_record.attach_staff_record')])
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
            <i class="fa fa-save"></i> @lang('common.submit',['model' => trans('attach_staff_record.attach_staff_record')])
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
                main_fire_stations: {!! @$fire_stations !!},
                to_fire_stations: {!! @$fire_stations !!},
                to_designations: {!! @$designations !!},
                to_districts: {!! @$districts !!},
                attch_fire_stations: {!! @$fire_stations !!},
                attach_staff_record_inputs: [{
                    main_workplace:'',
                    attach_workplace:'',
                    total_attendance_days:'',
                    total_absent_days:'',
                    ml_el_rl:'',
                    salary_workday:'',
                    comment:'',
                }],

                to_attach_staff_inputs:[{
                    to_fire_station_id:'',
                    to_designation_id:'',
                    to_district_id:'',
                }],
            },
            methods: {
                addMoreAttachStaffRecordDetails(){
                    this.attach_staff_record_inputs.push({
                        total_attendance_days:'',
                        total_absent_days:'',
                        ml_el_rl:'',
                        salary_workday:'',
                        comment:'',
                    });
                },
                removeAttachStaffRecordDetails(index) {
                    this.attach_staff_record_inputs.splice(index, 1);
                },

                addMoreToAttachStaff(){
                    this.to_attach_staff_inputs.push({
                        to_fire_station_id:'',
                        to_designation_id:'',
                        to_district_id:'',
                    });
                },

                removeToAttachStaff(index) {
                    this.to_attach_staff_inputs.splice(index, 1);
                },
                load_parameters(){
                    {{--console.log({!! @$attach_staff_record->attachStaffRecordDetails !!})--}}
                    this.attach_staff_record_inputs = {!! @$attach_staff_record->attachStaffRecordDetails ?? '{}' !!}
                        this.to_attach_staff_inputs = {!! @$attach_staff_record->toAttachStaff ?? '{}' !!}
                },
            },
            created() {
                @if(\Route::currentRouteName() == 'attach_staff_record.edit')
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
