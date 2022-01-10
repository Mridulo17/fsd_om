<div class="row mb-3" id="vue">


    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('type') ? 'parsley-error ' : ''; @endphp
        <label for="type" class="form-label">@lang('product.type')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('type_id', $types, null, ['class' => $error_class.'form-control select2vue type_id', 'placeholder' => trans('product.select_one'), 'id' => 'type', 'v-on:change' => 'toggleType', 'v-model' => 'type_id', 'onchange' => 'SelectChange("'.route('get_categories_by_type').'","category_id",this)', 'required' => 1]) }}
            @if ($errors->has('type'))
                <p class="text-danger">{{$errors->first('type')}}</p>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('category_id') ? 'parsley-error ' : ''; @endphp
        <label for="category_id" class="form-label">@lang('category.category')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group input-group">
            <select name="category_id" id="category_id" v-model="category_id" class="{{$error_class}} form-control select2vue category_id" required="1">
                <option value="">@lang('common.select_one')</option>
                <option v-for="(category,index) in categories" :value="index">@{{category}}</option>
            </select>
            <a href="{{route('category.create')}}" class="input-group-text modal_lg_button text-secondary" parent="type_id">
                <i class="fa fa-plus-circle"></i>
            </a>
            @if ($errors->has('category_id'))
                <p class="text-danger">{{$errors->first('category_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('brand_id') ? 'parsley-error ' : ''; @endphp
        <label for="brand_id" class="form-label">@lang('product.brand')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group input-group">
            <select name="brand_id" v-model="brand_id" class="{{$error_class}} form-control select2vue brand_id" onchange = SelectChange("{{route('get_models')}}","model_id",this) required="1">
                <option value="">@lang('product.select_one')</option>
                <option v-for="(brand,index) in brands" :value="index">@{{brand}}</option>
            </select>
            <a href="{{route('brand_create_modal')}}" class="input-group-text modal_lg_button text-secondary">
                <i class="fa fa-plus-circle"></i>
            </a>
            @if ($errors->has('brand_id'))
                <p class="text-danger">{{$errors->first('brand_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('model_id') ? 'parsley-error ' : ''; @endphp
        <label for="model_id" class="form-label">@lang('product.model')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group input-group">
            <select name="model_id" id="model_id" v-model="model_id" class="{{$error_class}} form-control select2vue model_id" required="1">
                <option value="">@lang('product.select_one')</option>
                <option v-for="(model,index) in models" :value="index">@{{model}}</option>
            </select>
            <a href="{{route('model_create_modal')}}" class="input-group-text modal_lg_button text-secondary" parent="brand_id">
                <i class="fa fa-plus-circle"></i>
            </a>
            @if ($errors->has('model_id'))
                <p class="text-danger">{{$errors->first('model_id')}}</p>
            @endif
        </div>
    </div>


    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('fire_station_id') ? 'parsley-error ' : ''; @endphp
        <label for="fire_station_id" class="form-label">@lang('fire_station.fire_station')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::select('fire_station_id', $fire_stations, null, ['class' => $error_class.'form-control select2vue', 'placeholder' => trans('common.select'), 'id' => 'fire_station_id', 'required' => 1]) }}
            @if ($errors->has('fire_station_id'))
                <p class="text-danger">{{$errors->first('fire_station_id')}}</p>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('registration_number') ? 'parsley-error ' : ''; @endphp
        <label for="name" class="form-label">@lang('assigned_vehicle.registration_number')</label>
        <div class="form-group">
            {{ Form::text('registration_number', null, ['class' => $error_class.'form-control', 'id' => 'registration_number', 'required' => false]) }}
            @if ($errors->has('registration_number'))
                <p class="text-danger">{{$errors->first('registration_number')}}</p>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('name') ? 'parsley-error ' : ''; @endphp
        <label for="name" class="form-label">@lang('assigned_vehicle.label_name')</label>
        <div class="form-group">
            {{ Form::text('name', null, ['class' => $error_class.'form-control', 'id' => 'name', 'required' => false]) }}
            @if ($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
            @endif
        </div>
    </div>
    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('bn_name') ? 'parsley-error ' : ''; @endphp
        <label for="bn_name" class="form-label">@lang('assigned_vehicle.label_bn_name')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group">
            {{ Form::text('bn_name', null, ['class' => $error_class.'form-control', 'id' => 'bn_name', 'required' => 1]) }}
            @if ($errors->has('bn_name'))
                <p class="text-danger">{{$errors->first('bn_name')}}</p>
            @endif
        </div>
    </div>
    <div class="col-sm-12 col-md-4 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('status') ? 'parsley-error ' : ''; @endphp
        <label for="status" class="form-label">@lang('assigned_vehicle.label_status')</label>
        <sup class="text-danger">*</sup>
        <div class="form-group form-group-check pl-4">
            <div class="form-check-custom">
                {{ Form::radio('status', 'Active',null, ['class' => 'form-check-input', 'id' => 'active', 'required' => 1, 'checked' => 1]) }}
                <label class="form-check-label" for="active">
                    @lang('assigned_vehicle.label_status_active')
                </label>
            </div>

            <div class="form-check-custom">
                {{ Form::radio('status', 'Inactive',null, ['class' => 'form-check-input', 'id' => 'inactive', 'required' => 1]) }}
                <label class="form-check-label" for="inactive">
                    @lang('assigned_vehicle.label_status_inactive')
                </label>
            </div>
            @if ($errors->has('status'))
                <p class="text-danger">{{$errors->first('status')}}</p>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-primary waves-effect waves-light">
            <i class="fa fa-save"></i> @lang('assigned_vehicle.label_submit_button')
        </button>
    </div>
</div>

@include('components.modal_lg')

@section('script')
    <script src="{{ URL::asset('/assets/common/libs/parsleyjs/parsleyjs.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/common/js/pages/form-validation.init.js') }}"></script>

    <script src="{{ asset('vue-js/vue/dist/vue.js') }}"></script>
    <script src="{{ asset('vue-js/axios/dist/axios.min.js') }}"></script>

    <script>
        $(function () {
            let vue = new Vue({
                el: '#vue',
                data: {
                    type_id : '{!! @$assigned_vehicle->type_id ? $assigned_vehicle->type_id : '' !!}',
                    category_id : '{!! @$assigned_vehicle->category_id ? $assigned_vehicle->category_id : '' !!}',
                    brand_id : '{!! @$assigned_vehicle->brand_id ? $assigned_vehicle->brand_id : '' !!}',
                    model_id : '{!! @$assigned_vehicle->model_id ? $assigned_vehicle->model_id : '' !!}',
                    categories: {!! @$categories ? $categories: '{}' !!},
                    brands: {!! $brands !!},
                    models: {!! @$models ? $models: '{}' !!},
                    type: '',
                    preview_list: [],
                    image_list: [],
                    delete_images: [],
                },

                methods: {

                    getResponseDataFromAjax(response){

                        if(response.categories){
                            this.categories = []
                            this.categories = response.categories
                            this.category_id = response.category.id
                            this.type_id = response.category.type_id
                        }
                        if(response.brands){
                            this.brands = []
                            this.brands = response.brands
                            this.brand_id = response.brand.id
                        }
                        if(response.models){
                            this.models = []
                            this.models = response.models
                            this.model_id = response.model.id
                            this.brand_id = response.model.brand_id
                            $('.brand_id').val(response.model.brand_id)
                        }
                    },
                    toggleType(){
                        this.type = event.currentTarget.value
                    },
                    previewMultiImage: function(event) {
                        var input = event.target;
                        var count = input.files.length;
                        var index = 0;
                        if (input.files) {
                            while(count --) {
                                var reader = new FileReader();
                                reader.onload = (e) => {
                                    this.preview_list.push(
                                        {'source' : e.target.result}
                                    );
                                }
                                this.image_list.push(input.files[index]);
                                reader.readAsDataURL(input.files[index]);
                                index ++;
                            }
                        }

                    },

                    removeImage(index, image_id = null){
                        this.preview_list.splice(index, 1);
                        if(image_id){
                            this.delete_images.push(image_id);
                        }else{
                            this.image_list.splice(index, 1);
                        }

                    },
                    load_parameters(){
                        let vm = this;
                        this.type = '{!! @$assigned_vehicle->type ?? '' !!}'

                        this.preview_list = {!! $assigned_vehicle->files ?? '{}' !!}
                    },
                },
                mounted(){
                    $(document).trigger('vue-loaded');
                    $('#loader').hide()
                },
                created() {
                    window.vue_data = this;
                    @if(@$assigned_vehicle)
                        this.load_parameters()
                    @endif
                },
                beforeUpdate(){
                    $(document).trigger('vue-loaded');
                },
            });

        });

        $(document).on('submit', '#assigned_vehicle_form', function (event) {
            $('#loader').show();
            let ajax_error_alert = $('#ajax_error_alert')
            let ajax_error = ajax_error_alert.find('#ajax_error')
            ajax_error.text('')
            ajax_error_alert.addClass('d-none');
            event.preventDefault();
            let vm = $(this)
            let input_array = ['input', 'select']
            vm.find('.parsley-errors-list').remove();
            input_array.forEach(function (value, index) {
                vm.find(value).removeClass('parsley-error');
            });

            let vue_data = window.vue_data
            let images = vue_data.image_list
            console.log(images);
            var formData = new FormData(this);
            let total_images =images.length; //Total Images
            for (let i = 0; i < total_images; i++) {
                formData.append('images[]', images[i]);
            }
            formData.append('total_images', total_images);
            formData.append('delete_images', vue_data.delete_images);
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (response) {
                    window.location.href = '{{route('assigned_vehicle.index')}}'
                },
                error: function (xhr) {
                    ajax_error_alert.removeClass('d-none');
                    if(xhr.status === 500 && xhr.responseJSON){
                        ajax_error.text(xhr.responseJSON);
                    }
                    if(xhr.responseJSON && xhr.responseJSON.exception){
                        ajax_error.text(xhr.responseJSON.message);
                    }
                    if(xhr.responseJSON && xhr.responseJSON.errors){
                        let errors = Object.entries(xhr.responseJSON.errors);
                        for(let error of errors){
                            ajax_error.text(error[1]);
                            break
                        }

                        let flag = 0;
                        for(let error of errors){

                            if (flag === 0){
                                $('html, body').animate({
                                    scrollTop: $('input[name='+error[0]+'], select[name='+error[0]+'], textarea[name='+error[0]+']').offset().top - 500
                                }, 500);
                                flag = 1
                            }

                            input_array.forEach(function (value) {
                                let input = $(value+'[name='+error[0]+']');
                                vm.find(input).addClass('parsley-error');
                                vm.find(input).after(
                                    '<ul class="parsley-errors-list filled" aria-hidden="false">' +
                                    '<li class="parsley-required">'+error[1]+'</li>' +
                                    '</ul>'
                                );
                            });
                        }
                    }
                    setTimeout(function(){
                        $('#loader').hide();
                    }, 280);
                }
            });
        });
    </script>

    @include('admin.layouts.partial.footer.vue_loaded_script')
@endsection

