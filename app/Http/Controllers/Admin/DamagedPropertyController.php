<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ModalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DamagedPropertyRequest;
use App\Interfaces\DamagedPropertyInterface;
use App\Models\DamagedProperty;
use Illuminate\Http\Request;

class DamagedPropertyController extends Controller
{
    protected $damaged_property;

    public function __construct(DamagedPropertyInterface $damaged_property)
    {
        $this->damaged_property = $damaged_property;
        $this->middleware('auth');
    }

    protected function path(string $link)
    {
        return "admin.damaged_property.{$link}";
    }

    public function index()
    {
        if(request()->ajax())
        {
            return $this->damaged_property->datatable();
        }else{
            return view($this->path('index'));
        }

    }

    public function deletedListIndex()
    {
        if (request()->ajax()){
            return $this->damaged_property->deletedDatatable();
        }
    }

    public function create()
    {
        $data = [
            'title' => trans('common.create',['model' => trans('damaged_property.damaged_property')]),
            'form_action' => route('damaged_property.store'),
            'method' => 'post',
            'included_path' => 'admin.damaged_property.form',
        ];

        return ModalHelper::content($data);
    }

    public function store(DamagedPropertyRequest $request)
    {
        return $this->damaged_property->create($request);
    }

    public function show(DamagedProperty $damaged_property)
    {
        //
    }

    public function edit(DamagedProperty $damaged_property)
    {
        $data = [
            'title' => trans('common.edit',['model' => trans('damaged_property.damaged_property')]),
            'form_action' => route('damaged_property.update',$damaged_property->id),
            'method' => 'patch',
            'model' => $damaged_property,
            'included_path' => 'admin.damaged_property.form',
        ];
        $modal_content = ModalHelper::content($data);

        return $modal_content;
    }

    public function update(DamagedPropertyRequest $request, DamagedProperty $damaged_property)
    {
        return $this->damaged_property->update($damaged_property->id,$request);
    }

    public function destroy(DamagedProperty $damaged_property)
    {
        return $this->damaged_property->delete($damaged_property->id);
    }

    public function restore($id)
    {
        return $this->damaged_property->restore($id);
    }

    public function forceDelete($id)
    {
        return $this->damaged_property->forceDelete($id);
    }

    public function status(Request $request)
    {
        return $this->damaged_property->status($request->id);
    }
}
