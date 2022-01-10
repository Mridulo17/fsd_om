<div id="vue" class="row mb-3">

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('to_employee_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('situation_report.to_employee_id')</label>
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
        <label for="bn_name" class="form-label">@lang('situation_report.to_designation_id')</label>
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
            $error_class = $errors->has('to_fire_station_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('situation_report.to_fire_station_id')</label>
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
            $error_class = $errors->has('to_district_id') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('situation_report.to_district_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('to_district_id', $districts, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'to_district_id', 'required' => false ]) }}
            @if ($errors->has('to_district_id'))
                <p class="text-danger">{{$errors->first('to_district_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('months') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('situation_report.months')</label>
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
        <label for="bn_name" class="form-label">@lang('situation_report.from_employee_id')</label>
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
        <label for="bn_name" class="form-label">@lang('situation_report.from_designation_id')</label>
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
        <label for="bn_name" class="form-label">@lang('situation_report.from_fire_station_id')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('from_fire_station_id', $fire_stations, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select_one'), 'id' => 'from_fire_station_id', 'required' => 1]) }}
            @if ($errors->has('from_fire_station_id'))
                <p class="text-danger">{{$errors->first('from_fire_station_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('memorandum_no') ? 'parsley-error ' : ''; @endphp
        <label for="memorandum_no" class="form-label">@lang('situation_report.memorandum_no')
        </label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon-memo-no">{{ @$situation_report->fromFireStation->memorandum_no }}</span>
                {{ Form::text('memorandum_no_extension', @$situation_report->memorandum_no_extension, ['class' => $error_class.'form-control memorandum_no_extension','aria-describedby' => 'basic-addon-memo-no', 'required' =>
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
        <label for="bn_name" class="form-label">@lang('situation_report.from_district_id')</label>
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
        <label for="bn_name" class="form-label">@lang('situation_report.thana_id')</label>
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
        <h6 style="text-align: center" class="font-weight-semibold">@lang('situation_report.Administrative_Branch')</h6>
        <div class="attachstaff" v-for="(row,index) in administrative_situation_inputs">
            <div  class="border border-secondary mb-6 p-3 my-2">
                <div class="col-sm-12 text-right">
                    <button v-if="index != 0" type="button" class="btn btn-danger btn-sm" @click="removeAdministrativeSituation(index)"><i
                            class="fas fa-times text-warning"></i> </button>
                </div>
                <div class="row" >

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('fire_station_id') ? 'parsley-error ' : ''; @endphp
                        <label for="fire_station_id" class="form-label">@lang('common.model',['model' => trans('situation_report.fire_station_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue fire_station_id" :name="'administrative_situations['+index+'][fire_station_id]'">
                                <option value="">@lang('common.select_one')</option>
                                <option v-for="(fire_station,index) in fire_stations" :value="index"    :selected="index == row.fire_station_id">@{{fire_station}}
                                </option>
                            </select>
                            @if ($errors->has('fire_station_id'))
                                <p class="text-danger">{{$errors->first('fire_station_id')}}</p>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('situation_report_problems') ? 'parsley-error ' : ''; @endphp
                        <label for="situation_report_problems" class="form-label">@lang('situation_report.situation_report_problems',['model' => trans('situation_report.situation_report')])</label>
                        <div class="form-group">
                            <input v-model="row.situation_report_problems" class="{{$error_class}} form-control"
                                   :name="'administrative_situations['+index+'][situation_report_problems]'" id="situation_report_problems">
                            @if ($errors->has('situation_report_problems'))
                                <p class="text-danger">{{$errors->first('situation_report_problems')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('recipient_system') ? 'parsley-error ' : ''; @endphp
                        <label for="recipient_system" class="form-label">@lang('situation_report.recipient_system',['model' => trans('situation_report.situation_report')])</label>
                        <div class="form-group">
                            <input v-model="row.recipient_system" class="{{$error_class}} form-control"
                                   :name="'administrative_situations['+index+'][recipient_system]'" id="recipient_system">
                            @if ($errors->has('recipient_system'))
                                <p class="text-danger">{{$errors->first('recipient_system')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('next_activities_responsibility') ? 'parsley-error ' : ''; @endphp
                        <label for="next_activities_responsibility" class="form-label">@lang('situation_report.next_activities_responsibility',['model' => trans('situation_report.situation_report')])</label>
                        <div class="form-group">
                            <input v-model="row.next_activities_responsibility" class="{{$error_class}} form-control"
                                   :name="'administrative_situations['+index+'][next_activities_responsibility]'" id="next_activities_responsibility">
                            @if ($errors->has('next_activities_responsibility'))
                                <p class="text-danger">{{$errors->first('next_activities_responsibility')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('comment') ? 'parsley-error ' : ''; @endphp
                        <label for="comment" class="form-label">@lang('situation_report.comment',['model' => trans('situation_report.situation_report')])</label>
                        <div class="form-group">
                            <input v-model="row.comment" class="{{$error_class}} form-control"
                                   :name="'administrative_situations['+index+'][comment]'" id="comment">
                            @if ($errors->has('comment'))
                                <p class="text-danger">{{$errors->first('comment')}}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-sm-12 text-right">
            <a href="javascript:" class="btn btn-success"  @click="addMoreAdministrativeSituation">
                <i class="fa fa-plus-circle"></i>
                @lang('situation_report.add_situation_report')
            </a>
        </div>
    </div>
    <div class="mt-3">
        <hr>
        <h6 style="text-align: center" class="font-weight-semibold">@lang('situation_report.Operational_Branch')</h6>
        <div class="attachstaff" v-for="(row,index) in operation_situation_inputs">
            <div  class="border border-secondary mb-6 p-3 my-2">
                <div class="col-sm-12 text-right">
                    <button v-if="index != 0" type="button" class="btn btn-danger btn-sm" @click="removeOperationSituation(index)"><i
                            class="fas fa-times text-warning"></i> </button>
                </div>
                <div class="row" >

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('fire_station_id') ? 'parsley-error ' : ''; @endphp
                        <label for="fire_station_id" class="form-label">@lang('common.model',['model' => trans('situation_report.fire_station_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue fire_station_id" :name="'operation_situations['+index+'][fire_station_id]'">
                                <option value="">@lang('common.select_one')</option>
                                <option v-for="(fire_station,index) in fire_stations" :value="index"    :selected="index == row.fire_station_id">@{{fire_station}}
                                </option>
                            </select>
                            @if ($errors->has('fire_station_id'))
                                <p class="text-danger">{{$errors->first('fire_station_id')}}</p>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('situation_report_problems') ? 'parsley-error ' : ''; @endphp
                        <label for="situation_report_problems" class="form-label">@lang('situation_report.situation_report_problems',['model' => trans('situation_report.situation_report')])</label>
                        <div class="form-group">
                            <input v-model="row.situation_report_problems" class="{{$error_class}} form-control"
                                   :name="'operation_situations['+index+'][situation_report_problems]'" id="situation_report_problems">
                            @if ($errors->has('situation_report_problems'))
                                <p class="text-danger">{{$errors->first('situation_report_problems')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('recipient_system') ? 'parsley-error ' : ''; @endphp
                        <label for="recipient_system" class="form-label">@lang('situation_report.recipient_system',['model' => trans('situation_report.situation_report')])</label>
                        <div class="form-group">
                            <input v-model="row.recipient_system" class="{{$error_class}} form-control"
                                   :name="'operation_situations['+index+'][recipient_system]'" id="recipient_system">
                            @if ($errors->has('recipient_system'))
                                <p class="text-danger">{{$errors->first('recipient_system')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('next_activities_responsibility') ? 'parsley-error ' : ''; @endphp
                        <label for="next_activities_responsibility" class="form-label">@lang('situation_report.next_activities_responsibility',['model' => trans('situation_report.situation_report')])</label>
                        <div class="form-group">
                            <input v-model="row.next_activities_responsibility" class="{{$error_class}} form-control"
                                   :name="'operation_situations['+index+'][next_activities_responsibility]'" id="next_activities_responsibility">
                            @if ($errors->has('next_activities_responsibility'))
                                <p class="text-danger">{{$errors->first('next_activities_responsibility')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('comment') ? 'parsley-error ' : ''; @endphp
                        <label for="comment" class="form-label">@lang('situation_report.comment',['model' => trans('situation_report.situation_report')])</label>
                        <div class="form-group">
                            <input v-model="row.comment" class="{{$error_class}} form-control"
                                   :name="'operation_situations['+index+'][comment]'" id="comment">
                            @if ($errors->has('comment'))
                                <p class="text-danger">{{$errors->first('comment')}}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-sm-12 text-right">
            <a href="javascript:" class="btn btn-success"  @click="addMoreOperationSituation">
                <i class="fa fa-plus-circle"></i>
                @lang('situation_report.add_situation_report')
            </a>
        </div>
    </div>
    <div class="mt-3">
        <hr>
        <h6 style="text-align: center" class="font-weight-semibold">@lang('situation_report.development_training_Branch')</h6>
        <div class="attachstaff" v-for="(row,index) in development_training_situation_inputs">
            <div  class="border border-secondary mb-6 p-3 my-2">
                <div class="col-sm-12 text-right">
                    <button v-if="index != 0" type="button" class="btn btn-danger btn-sm" @click="removeDevelopmentTrainingSituation(index)"><i
                            class="fas fa-times text-warning"></i> </button>
                </div>
                <div class="row" >

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('fire_station_id') ? 'parsley-error ' : ''; @endphp
                        <label for="fire_station_id" class="form-label">@lang('common.model',['model' => trans('situation_report.fire_station_id')])</label>
                        <sup class="text-danger">*</sup>
                        <div class="form-group">
                            <select class="{{$error_class}} form-control select2vue fire_station_id" :name="'development_training_situations['+index+'][fire_station_id]'">
                                <option value="">@lang('common.select_one')</option>
                                <option v-for="(fire_station,index) in fire_stations" :value="index"    :selected="index == row.fire_station_id">@{{fire_station}}
                                </option>
                            </select>
                            @if ($errors->has('fire_station_id'))
                                <p class="text-danger">{{$errors->first('fire_station_id')}}</p>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('situation_report_problems') ? 'parsley-error ' : ''; @endphp
                        <label for="situation_report_problems" class="form-label">@lang('situation_report.situation_report_problems',['model' => trans('situation_report.situation_report')])</label>
                        <div class="form-group">
                            <input v-model="row.situation_report_problems" class="{{$error_class}} form-control"
                                   :name="'development_training_situations['+index+'][situation_report_problems]'" id="situation_report_problems">
                            @if ($errors->has('situation_report_problems'))
                                <p class="text-danger">{{$errors->first('situation_report_problems')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('recipient_system') ? 'parsley-error ' : ''; @endphp
                        <label for="recipient_system" class="form-label">@lang('situation_report.recipient_system',['model' => trans('situation_report.situation_report')])</label>
                        <div class="form-group">
                            <input v-model="row.recipient_system" class="{{$error_class}} form-control"
                                   :name="'development_training_situations['+index+'][recipient_system]'" id="recipient_system">
                            @if ($errors->has('recipient_system'))
                                <p class="text-danger">{{$errors->first('recipient_system')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('next_activities_responsibility') ? 'parsley-error ' : ''; @endphp
                        <label for="next_activities_responsibility" class="form-label">@lang('situation_report.next_activities_responsibility',['model' => trans('situation_report.situation_report')])</label>
                        <div class="form-group">
                            <input v-model="row.next_activities_responsibility" class="{{$error_class}} form-control"
                                   :name="'development_training_situations['+index+'][next_activities_responsibility]'" id="next_activities_responsibility">
                            @if ($errors->has('next_activities_responsibility'))
                                <p class="text-danger">{{$errors->first('next_activities_responsibility')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
                        @php /** @var string $errors */
                            $error_class = $errors->has('comment') ? 'parsley-error ' : ''; @endphp
                        <label for="comment" class="form-label">@lang('situation_report.comment',['model' => trans('situation_report.situation_report')])</label>
                        <div class="form-group">
                            <input v-model="row.comment" class="{{$error_class}} form-control"
                                   :name="'development_training_situations['+index+'][comment]'" id="comment">
                            @if ($errors->has('comment'))
                                <p class="text-danger">{{$errors->first('comment')}}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-sm-12 text-right">
            <a href="javascript:" class="btn btn-success"  @click="addMoreDevelopmentTrainingSituation">
                <i class="fa fa-plus-circle"></i>
                @lang('situation_report.add_situation_report')
            </a>
        </div>
    </div>


    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('status') ? 'parsley-error ' : ''; @endphp
        <label for="status" class="form-label">@lang('common.status',['model' => trans('situation_report.situation_report')])</label>
        <sup class="text-danger">*</sup>
        <div class="form-group form-group-check pl-4">
            <div class="form-check-custom">
                {{ Form::radio('status', 'Active',null, ['class' => 'form-check-input', 'id' => 'active', 'required' => 1, 'checked' => 1]) }}
                <label class="form-check-label" for="active">
                    @lang('common.active',['model' => trans('situation_report.situation_report')])
                </label>
            </div>

            <div class="form-check-custom">
                {{ Form::radio('status', 'Inactive',null, ['class' => 'form-check-input', 'id' => 'inactive', 'required' => 1]) }}
                <label class="form-check-label" for="inactive">
                    @lang('common.inactive',['model' => trans('situation_report.situation_report')])
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
            <i class="fa fa-save"></i> @lang('common.submit',['model' => trans('situation_report.situation_report')])
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
                fire_stations: {!! @$fire_stations !!},
                administrative_situation_inputs: [{
                    situation_report_problems:'',
                    recipient_system:'',
                    next_activities_responsibility:'',
                    comment:'',
                }],

                operation_situation_inputs:[{
                    situation_report_problems:'',
                    recipient_system:'',
                    next_activities_responsibility:'',
                    comment:'',
                }],
                development_training_situation_inputs:[{
                    situation_report_problems:'',
                    recipient_system:'',
                    next_activities_responsibility:'',
                    comment:'',
                }],
            },
            methods: {
                addMoreAdministrativeSituation(){
                    this.administrative_situation_inputs.push({
                        situation_report_problems:'',
                        recipient_system:'',
                        next_activities_responsibility:'',
                        comment:'',
                    });
                },
                removeAdministrativeSituation(index) {
                    this.administrative_situation_inputs.splice(index, 1);
                },

                addMoreOperationSituation(){
                    this.operation_situation_inputs.push({
                        situation_report_problems:'',
                        recipient_system:'',
                        next_activities_responsibility:'',
                        comment:'',
                    });
                },

                removeOperationSituation(index) {
                    this.operation_situation_inputs.splice(index, 1);
                },
                addMoreDevelopmentTrainingSituation(){
                    this.development_training_situation_inputs.push({
                        situation_report_problems:'',
                        recipient_system:'',
                        next_activities_responsibility:'',
                        comment:'',
                    });
                },

                removeDevelopmentTrainingSituation(index) {
                    this.development_training_situation_inputs.splice(index, 1);
                },

                load_parameters(){
                    this.administrative_situation_inputs = {!! @$situation_report->administrativeSituation ?? '{}' !!}
                        this.operation_situation_inputs = {!! @$situation_report->operationSituation ?? '{}' !!}
                        this.development_training_situation_inputs = {!! @$situation_report->developmentTrainingSituation ?? '{}' !!}
                },
            },
            created() {
                @if(\Route::currentRouteName() == 'situation_report.edit')
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
