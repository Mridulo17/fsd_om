<?php

namespace App\Http\Requests\Admin;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AssignedVehicleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    protected function withValidator(Validator $validator)
    {
        $messages = $validator->messages();

        foreach ($messages->all() as $message)
        {
            Toastr::error($message, trans('settings.failed'), ['timeOut' => 10000]);
        }

        return $validator->errors()->all();
    }

    public function rules()
    {
        return [
            'name' => 'nullable|unique:assigned_vehicles,name,'.@$this->assigned_vehicle->id,
            'bn_name' => 'required|unique:assigned_vehicles,bn_name,'.@$this->assigned_vehicle->id,
            'type_id' => 'required',
            'brand_id' => 'required',
            'model_id' => 'required',
            'registration_number' => [
                'nullable',
                Rule::unique('assigned_vehicles','registration_number')
                    ->ignore(@$this->assigned_vehicle->id, 'id')
                    ->where(function ($query) {
                        $query->where('registration_number', '!=', 'ON TEST');
                    }),
            ],
        ];
    }

    public function attributes()
    {
        $attributes = [];
        foreach ($this->rules() as $key => $rule){
            $attributes[$key] = trans('assigned_vehicle.'.$key);
        }
        return $attributes;
    }


}
