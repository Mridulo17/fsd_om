<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ModalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AccidentTypeRequest;
use App\Interfaces\AccidentTypeInterface;
use App\Models\AccidentType;
use Illuminate\Http\Request;

class AccidentTypeController extends Controller
{
    protected $accident_type;

    public function __construct(AccidentTypeInterface $accident_type)
    {
        $this->accident_type = $accident_type;
        $this->middleware('auth');
    }

    protected function path(string $link)
    {
        return "admin.accident_type.{$link}";
    }

    public function index()
    {
        if(request()->ajax())
        {
            return $this->accident_type->datatable();
        }else{
            return view($this->path('index'));
        }

    }

    public function deletedListIndex()
    {
        if (request()->ajax()){
            return $this->accident_type->deletedDatatable();
        }
    }

    public function create()
    {
        $data = [
            'title' => trans('common.create',['model' => trans('accident_type.accident_type')]),
            'form_action' => route('accident_type.store'),
            'method' => 'post',
            'included_path' => 'admin.accident_type.form',
        ];

        return ModalHelper::content($data);
    }

    public function store(AccidentTypeRequest $request)
    {
        return $this->accident_type->create($request);
    }

    public function show(AccidentType $accident_type)
    {
        //
    }

    public function edit(AccidentType $accident_type)
    {
        $data = [
            'title' => trans('common.edit',['model' => trans('accident_type.accident_type')]),
            'form_action' => route('accident_type.update',$accident_type->id),
            'method' => 'patch',
            'model' => $accident_type,
            'included_path' => 'admin.accident_type.form',
        ];
        $modal_content = ModalHelper::content($data);

        return $modal_content;
    }

    public function update(AccidentTypeRequest $request, AccidentType $accident_type)
    {
        return $this->accident_type->update($accident_type->id,$request);
    }

    public function destroy(AccidentType $accident_type)
    {
        return $this->accident_type->delete($accident_type->id);
    }

    public function restore($id)
    {
        return $this->accident_type->restore($id);
    }

    public function forceDelete($id)
    {
        return $this->accident_type->forceDelete($id);
    }

    public function status(Request $request)
    {
        return $this->accident_type->status($request->id);
    }
}
