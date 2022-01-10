<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SubDepartmentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|unique:sub_departments,name,'.@$this->sub_department->id,
            'bn_name' => 'required|unique:sub_departments,bn_name,'.@$this->sub_department->id,
            'department_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'department_id' => trans('sub_department.department_id'),
        ];
    }
}
