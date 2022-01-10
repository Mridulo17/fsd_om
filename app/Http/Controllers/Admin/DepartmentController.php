<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ModalHelper;
use App\Http\Requests\Admin\DepartmentRequest;
use App\Interfaces\DepartmentInterface;
use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $department;

    public function __construct(DepartmentInterface $department)
    {
        $this->department = $department;
        $this->middleware('auth');
    }

    protected function path(string $link)
    {
        return "admin.department.{$link}";
    }

    public function index()
    {
        if(request()->ajax())
        {
            return $this->department->datatable();
        }else{
            return view($this->path('index'));
        }

    }

    public function deletedListIndex()
    {
        if (request()->ajax()){
            return $this->department->deletedDatatable();
        }
    }

    public function create()
    {
        $data = [
            'title' => trans('common.create',['model' => trans('department.department')]),
            'form_action' => route('department.store'),
            'method' => 'post',
            'included_path' => 'admin.department.form',
        ];

        return ModalHelper::content($data);
    }

    public function store(DepartmentRequest $request)
    {
        return $this->department->create($request);
    }

    public function show(Department $department)
    {
        //
    }

    public function edit(Department $department)
    {
        $data = [
            'title' => trans('common.edit',['model' => trans('department.department')]),
            'form_action' => route('department.update',$department->id),
            'method' => 'patch',
            'model' => $department,
            'included_path' => 'admin.department.form',
        ];
        $modal_content = ModalHelper::content($data);

        return $modal_content;
    }

    public function update(DepartmentRequest $request, Department $department)
    {
        return $this->department->update($department->id,$request);
    }

    public function destroy(Department $department)
    {
        return $this->department->delete($department->id);
    }

    public function restore($id)
    {
        return $this->department->restore($id);
    }

    public function forceDelete($id)
    {
        return $this->department->forceDelete($id);
    }

    public function status(Request $request)
    {
        return $this->department->status($request->id);
    }
}
