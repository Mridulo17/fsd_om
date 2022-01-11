<div id="vue" class="row mb-3">


    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('months') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('octane_cost_report.months')</label>
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
            $error_class = $errors->has('fire_station_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('octane_cost_report.fire_station_id')</label>
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
            $error_class = $errors->has('employee_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('employee.employee')</label>
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
        <label for="bn_name" class="form-label">@lang('designation.designation')</label>
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
        <h6 class="font-weight-semibold">@lang('octane_cost_report.octane_cost_reports')</h6>
        <div class="attachstaff" v-for="(row,index) in octane_cost_report_inputs">
            <div  class="border border-secondary mb-6 p-3 my-2">
                <div class="col-sm-12 text-right">
                    <button v-if="index != 0" type="button" class="btn btn-danger btn-sm" @click="removeOctaneCostReportDetails(index)"><i
                            class="fas fa-times text-warning"></i> </button>
                </div>
                <div class="row" >

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('previous_report') ? 'parsley-error ' : ''; @endphp
                        <label for="previous_report" class="form-label">@lang('octane_cost_report.previous_report',['model' => trans('octane_cost_report.octane_cost_report')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <input v-model="row.previous_report" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][previous_report]'" id="previous_report">
                            @if ($errors->has('previous_report'))
                                <p class="text-danger">{{$errors->first('previous_report')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('purchase_formula') ? 'parsley-error ' : ''; @endphp
                        <label for="purchase_formula" class="form-label">@lang('octane_cost_report.purchase_formula',['model' => trans('octane_cost_report.octane_cost_report')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <input v-model="row.purchase_formula" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][purchase_formula]'" id="purchase_formula">
                            @if ($errors->has('purchase_formula'))
                                <p class="text-danger">{{$errors->first('purchase_formula')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('purchase_source') ? 'parsley-error ' : ''; @endphp
                        <label for="purchase_source" class="form-label">@lang('octane_cost_report.purchase_source',['model' => trans('octane_cost_report.purchase_source')])</label>
                        <div class="form-group">
                            <input v-model="row.purchase_source" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][purchase_source]'" id="purchase_source">
                            @if ($errors->has('purchase_source'))
                                <p class="text-danger">{{$errors->first('purchase_source')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('purchase_date') ? 'parsley-error ' : ''; @endphp
                        <label for="purchase_date" class="form-label">@lang('octane_cost_report.purchase_date')</label>
                        <div class="form-group">
                            <input pattern="/^(0[1-9]|1\d|2\d|3[01])\-(0[1-9]|1[0-2])\-(1|2)\d{3}$/" placeholder="dd-mm-yyyy" v-model="row.purchase_date" class="{{$error_class}} form-control" :name="'octane_cost_reports['+index+'][purchase_date]'" id="purchase_date">
                            @if ($errors->has('purchase_date'))
                                <p class="text-danger">{{$errors->first('purchase_date')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('purchase_amount_liters') ? 'parsley-error ' : ''; @endphp
                        <label for="purchase_amount_liters" class="form-label">@lang('octane_cost_report.purchase_amount_liters',['model' => trans('octane_cost_report.purchase_amount_liters')])</label>
                        <div class="form-group">
                            <input v-model="row.purchase_amount_liters" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][purchase_amount_liters]'" id="purchase_amount_liters">
                            @if ($errors->has('purchase_amount_liters'))
                                <p class="text-danger">{{$errors->first('purchase_amount_liters')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('total_amount_liters') ? 'parsley-error ' : ''; @endphp
                        <label for="total_amount_liters" class="form-label">@lang('octane_cost_report.total_amount_liters',['model' => trans('octane_cost_report.total_amount_liters')])</label>
                        <div class="form-group">
                            <input v-model="row.total_amount_liters" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][total_amount_liters]'" id="total_amount_liters">
                            @if ($errors->has('total_amount_liters'))
                                <p class="text-danger">{{$errors->first('total_amount_liters')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('issue_date') ? 'parsley-error ' : ''; @endphp
                        <label for="issue_date" class="form-label">@lang('octane_cost_report.issue_date')</label>
                        <div class="form-group">
                            <input pattern="/^(0[1-9]|1\d|2\d|3[01])\-(0[1-9]|1[0-2])\-(1|2)\d{3}$/" placeholder="dd-mm-yyyy" v-model="row.issue_date" class="{{$error_class}} form-control" :name="'octane_cost_reports['+index+'][issue_date]'" id="issue_date">
                            @if ($errors->has('issue_date'))
                                <p class="text-danger">{{$errors->first('issue_date')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('godiva_pump') ? 'parsley-error ' : ''; @endphp
                        <label for="godiva_pump" class="form-label">@lang('octane_cost_report.godiva_pump',['model' => trans('octane_cost_report.godiva_pump')])</label>
                        <div class="form-group">
                            <input v-model="row.godiva_pump" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][godiva_pump]'" id="godiva_pump">
                            @if ($errors->has('godiva_pump'))
                                <p class="text-danger">{{$errors->first('godiva_pump')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('angus_pump') ? 'parsley-error ' : ''; @endphp
                        <label for="angus_pump" class="form-label">@lang('octane_cost_report.angus_pump',['model' => trans('octane_cost_report.angus_pump')])</label>
                        <div class="form-group">
                            <input v-model="row.angus_pump" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][angus_pump]'" id="angus_pump">
                            @if ($errors->has('angus_pump'))
                                <p class="text-danger">{{$errors->first('angus_pump')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('firman_generator') ? 'parsley-error ' : ''; @endphp
                        <label for="firman_generator" class="form-label">@lang('octane_cost_report.firman_generator',['model' => trans('octane_cost_report.firman_generator')])</label>
                        <div class="form-group">
                            <input v-model="row.firman_generator" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][firman_generator]'" id="firman_generator">
                            @if ($errors->has('firman_generator'))
                                <p class="text-danger">{{$errors->first('firman_generator')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('honda_generator') ? 'parsley-error ' : ''; @endphp
                        <label for="honda_generator" class="form-label">@lang('octane_cost_report.honda_generator',['model' => trans('octane_cost_report.honda_generator')])</label>
                        <div class="form-group">
                            <input v-model="row.honda_generator" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][honda_generator]'" id="honda_generator">
                            @if ($errors->has('honda_generator'))
                                <p class="text-danger">{{$errors->first('honda_generator')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('smoke_ejector') ? 'parsley-error ' : ''; @endphp
                        <label for="smoke_ejector" class="form-label">@lang('octane_cost_report.smoke_ejector',['model' => trans('octane_cost_report.smoke_ejector')])</label>
                        <div class="form-group">
                            <input v-model="row.smoke_ejector" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][smoke_ejector]'" id="smoke_ejector">
                            @if ($errors->has('smoke_ejector'))
                                <p class="text-danger">{{$errors->first('smoke_ejector')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('rotary_rescue_saw') ? 'parsley-error ' : ''; @endphp
                        <label for="rotary_rescue_saw" class="form-label">@lang('octane_cost_report.rotary_rescue_saw',['model' => trans('octane_cost_report.rotary_rescue_saw')])</label>
                        <div class="form-group">
                            <input v-model="row.rotary_rescue_saw" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][rotary_rescue_saw]'" id="rotary_rescue_saw">
                            @if ($errors->has('rotary_rescue_saw'))
                                <p class="text-danger">{{$errors->first('rotary_rescue_saw')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('eli_generator') ? 'parsley-error ' : ''; @endphp
                        <label for="eli_generator" class="form-label">@lang('octane_cost_report.eli_generator',['model' => trans('octane_cost_report.eli_generator')])</label>
                        <div class="form-group">
                            <input v-model="row.eli_generator" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][eli_generator]'" id="eli_generator">
                            @if ($errors->has('eli_generator'))
                                <p class="text-danger">{{$errors->first('eli_generator')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('two_wheeler') ? 'parsley-error ' : ''; @endphp
                        <label for="two_wheeler" class="form-label">@lang('octane_cost_report.two_wheeler',['model' => trans('octane_cost_report.two_wheeler')])</label>
                        <div class="form-group">
                            <input v-model="row.two_wheeler" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][two_wheeler]'" id="two_wheeler">
{{--                            <a class="input-group-text modal_lg_button text-secondary" parent="type_id">--}}
{{--                                <i class="fa fa-plus-circle"></i>--}}
{{--                            </a>--}}
{{--                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>--}}
                            @if ($errors->has('two_wheeler'))
                                <p class="text-danger">{{$errors->first('two_wheeler')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('maintenance_work_issue') ? 'parsley-error ' : ''; @endphp
                        <label for="maintenance_work_issue" class="form-label">@lang('octane_cost_report.maintenance_work_issue',['model' => trans('octane_cost_report.maintenance_work_issue')])</label>
                        <div class="form-group">
                            <input v-model="row.maintenance_work_issue" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][maintenance_work_issue]'" id="maintenance_work_issue">
                            @if ($errors->has('maintenance_work_issue'))
                                <p class="text-danger">{{$errors->first('maintenance_work_issue')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('others') ? 'parsley-error ' : ''; @endphp
                        <label for="others" class="form-label">@lang('octane_cost_report.others',['model' => trans('octane_cost_report.others')])</label>
                        <div class="form-group">
                            <input v-model="row.others" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][others]'" id="others">
                            @if ($errors->has('others'))
                                <p class="text-danger">{{$errors->first('others')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('operational_work_issue') ? 'parsley-error ' : ''; @endphp
                        <label for="operational_work_issue" class="form-label">@lang('octane_cost_report.operational_work_issue',['model' => trans('octane_cost_report.operational_work_issue')])</label>
                        <div class="form-group">
                            <input v-model="row.operational_work_issue" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][operational_work_issue]'" id="operational_work_issue">
                            @if ($errors->has('operational_work_issue'))
                                <p class="text-danger">{{$errors->first('operational_work_issue')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('administrative_work_issue') ? 'parsley-error ' : ''; @endphp
                        <label for="administrative_work_issue" class="form-label">@lang('octane_cost_report.administrative_work_issue',['model' => trans('octane_cost_report.administrative_work_issue')])</label>
                        <div class="form-group">
                            <input v-model="row.administrative_work_issue" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][administrative_work_issue]'" id="administrative_work_issue">
                            @if ($errors->has('administrative_work_issue'))
                                <p class="text-danger">{{$errors->first('administrative_work_issue')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('total_cost_liter') ? 'parsley-error ' : ''; @endphp
                        <label for="total_cost_liter" class="form-label">@lang('octane_cost_report.total_cost_liter',['model' => trans('octane_cost_report.total_cost_liter')])</label>
                        <div class="form-group">
                            <input v-model="row.total_cost_liter" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][total_cost_liter]'" id="total_cost_liter">
                            @if ($errors->has('total_cost_liter'))
                                <p class="text-danger">{{$errors->first('total_cost_liter')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('remaining') ? 'parsley-error ' : ''; @endphp
                        <label for="remaining" class="form-label">@lang('octane_cost_report.remaining',['model' => trans('octane_cost_report.remaining')])</label>
                        <div class="form-group">
                            <input v-model="row.remaining" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][remaining]'" id="remaining">
                            @if ($errors->has('remaining'))
                                <p class="text-danger">{{$errors->first('remaining')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('comment') ? 'parsley-error ' : ''; @endphp
                        <label for="comment" class="form-label">@lang('octane_cost_report.comment',['model' => trans('octane_cost_report.octane_cost_report')])</label>
                        <div class="form-group">
                            <input v-model="row.comment" class="{{$error_class}} form-control"
                                   :name="'octane_cost_reports['+index+'][comment]'" id="comment">
                            @if ($errors->has('comment'))
                                <p class="text-danger">{{$errors->first('comment')}}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-sm-12 text-right">
            <a href="javascript:" class="btn btn-success"  @click="addMoreOctaneCostReportDetails">
                <i class="fa fa-plus-circle"></i>
                @lang('octane_cost_report.add_octane_cost_report')
            </a>
        </div>
    </div>

    <div class="mt-3">
        <hr>
        <h6 style="text-align: center" class="font-weight-semibold">@lang('octane_cost_report.power_unit')</h6>
        <div class="attachstaff" v-for="(row,index) in power_unit_inputs">
            <div  class="border border-secondary mb-6 p-3 my-2">
                <div class="col-sm-12 text-right">
                    <button v-if="index != 0" type="button" class="btn btn-danger btn-sm" @click="removeOctaneCostPowerUnit(index)"><i
                            class="fas fa-times text-warning"></i> </button>
                </div>
                <div class="row" >

                    <div style="text-align: center" class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('power_unit') ? 'parsley-error ' : ''; @endphp
                        <label for="power_unit" class="form-label">@lang('octane_cost_report.power_unit',['model' => trans('octane_cost_report.octane_cost_report')])</label>
                        <div class="form-group">
                            <input v-model="row.power_unit" class="{{$error_class}} form-control"
                                   :name="'power_units['+index+'][power_unit]'" id="power_unit">
                            @if ($errors->has('power_unit'))
                                <p class="text-danger">{{$errors->first('power_unit')}}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-sm-12 text-right">
            <a href="javascript:" class="btn btn-success"  @click="addMoreOctaneCostPowerUnit">
                <i class="fa fa-plus-circle"></i>
                @lang('octane_cost_report.add_power_unit')
            </a>
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('status') ? 'parsley-error ' : ''; @endphp
        <label for="status" class="form-label">@lang('common.status',['model' => trans('octane_cost_report.octane_cost_report')])</label>
        <sup class="text-danger">*</sup>
        <div class="form-group form-group-check pl-4">
            <div class="form-check-custom">
                {{ Form::radio('status', 'Active',null, ['class' => 'form-check-input', 'id' => 'active', 'required' => 1, 'checked' => 1]) }}
                <label class="form-check-label" for="active">
                    @lang('common.active',['model' => trans('octane_cost_report.octane_cost_report')])
                </label>
            </div>

            <div class="form-check-custom">
                {{ Form::radio('status', 'Inactive',null, ['class' => 'form-check-input', 'id' => 'inactive', 'required' => 1]) }}
                <label class="form-check-label" for="inactive">
                    @lang('common.inactive',['model' => trans('octane_cost_report.octane_cost_report')])
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
            <i class="fa fa-save"></i> @lang('common.submit',['model' => trans('octane_cost_report.octane_cost_report')])
        </button>
    </div>
</div>

@include('components.modal_lg')
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
                octane_cost_report_inputs: [{
                    previous_report:'',
                    purchase_formula:'',
                    purchase_source:'',
                    purchase_date:'',
                    purchase_amount_liters:'',
                    total_amount_liters:'',
                    issue_date:'',
                    godiva_pump:'',
                    angus_pump:'',
                    firman_generator:'',
                    honda_generator:'',
                    smoke_ejector:'',
                    rotary_rescue_saw:'',
                    eli_generator:'',
                    two_wheeler:'',
                    maintenance_work_issue:'',
                    others:'',
                    operational_work_issue:'',
                    administrative_work_issue:'',
                    total_cost_issue:'',
                    remaining:'',
                    comment:'',
                }],
                power_unit_inputs: [{
                    power_unit:'',
                }],
            },
            methods: {
                addMoreOctaneCostReportDetails(){
                    this.octane_cost_report_inputs.push({
                        previous_report:'',
                        purchase_formula:'',
                        purchase_source:'',
                        purchase_date:'',
                        purchase_amount_liters:'',
                        total_amount_liters:'',
                        issue_date:'',
                        godiva_pump:'',
                        angus_pump:'',
                        firman_generator:'',
                        honda_generator:'',
                        smoke_ejector:'',
                        rotary_rescue_saw:'',
                        eli_generator:'',
                        two_wheeler:'',
                        maintenance_work_issue:'',
                        others:'',
                        operational_work_issue:'',
                        administrative_work_issue:'',
                        total_cost_liter:'',
                        remaining:'',
                        comment:'',
                    });
                },
                removeOctaneCostReportDetails(index) {
                    this.octane_cost_report_inputs.splice(index, 1);
                },
                addMoreOctaneCostPowerUnit(){
                    this.power_unit_inputs.push({
                        power_unit:'',
                    });
                },

                removeOctaneCostPowerUnit(index) {
                    this.power_unit_inputs.splice(index, 1);
                },
                load_parameters(){
                    {{--console.log({!! @$octane_cost_report->OctaneCostReportDetails !!})--}}
                    this.octane_cost_report_inputs = {!! @$octane_cost_report->OctaneCostReportDetails ?? '{}' !!}
                        this.power_unit_inputs = {!! @$octane_cost_report->octaneCostPowerUnit ?? '{}' !!}
                },
            },
            created() {
                @if(\Route::currentRouteName() == 'octane_cost_report.edit')
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
