<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ModalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubDepartmentRequest;
use App\Interfaces\SubDepartmentInterface;
use App\Interfaces\DepartmentInterface;
use App\Models\Department;
use App\Models\SubDepartment;
use Illuminate\Http\Request;

class SubDepartmentController extends Controller
{
    protected $sub_department;
    protected $department;

    public function __construct(SubDepartmentInterface $sub_department, DepartmentInterface $department)
    {
        $this->sub_department = $sub_department;
        $this->department = $department;
        $this->middleware('auth');
    }

    protected function path(string $link)
    {
        return "admin.sub_department.{$link}";
    }

    public function index()
    {
        if(request()->ajax()){
            $parameter_array = [
                'relations' =>['department']
            ];
            return $this->sub_department->datatable($parameter_array);
        }
        return view($this->path('index'));
    }

    public function deletedListIndex()
    {
        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['department']
            ];
            return $this->sub_department->deletedDatatable($parameter_array);
        }
    }

    public function create()
    {
        $data = [
            'title' => trans('common.create',['model' => trans('sub_department.sub_department')]),
            'sub_department_id' => request('parent_id'),
            'form_action' => route('sub_department.store'),
            'method' => 'post',
            'included_path' => 'admin.sub_department.form',
            'departments' => $this->department->pluck(),
        ];

        return ModalHelper::content($data);
    }

    public function store(SubDepartmentRequest $request)
    {
        return $this->sub_department->create($request);
    }

    public function show(SubDepartment $sub_department)
    {
        //
    }

    public function edit(SubDepartment $sub_department)
    {
        $data = [
            'title' => trans('common.edit',['model' => trans('sub_department.sub_department')]),
            'form_action' => route('sub_department.update',$sub_department->id),
            'method' => 'patch',
            'sub_department' => $sub_department,
            'included_path' => 'admin.sub_department.form',
            'departments' => $this->department->pluck(),
        ];

        $modal_content = ModalHelper::content($data);

        return $modal_content;
    }

    public function update(SubDepartmentRequest $request, SubDepartment $sub_department)
    {
        return $this->sub_department->update($sub_department->id,$request);
    }

    public function destroy(SubDepartment $sub_department)
    {
        return $this->sub_department->delete($sub_department->id);
    }

    public function restore($id)
    {
        return $this->sub_department->restore($id);
    }

    public function forceDelete($id)
    {
        return $this->sub_department->forceDelete($id);
    }

    public function status(Request $request)
    {
        return $this->sub_department->status($request->id);
    }
}
