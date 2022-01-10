<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ModalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FireAccidentReasonRequest;
use App\Interfaces\FireAccidentReasonInterface;
use App\Models\FireAccidentReason;
use Illuminate\Http\Request;

class FireAccidentReasonController extends Controller
{
    protected $fire_accident_reason;

    public function __construct(FireAccidentReasonInterface $fire_accident_reason)
    {
        $this->fire_accident_reason = $fire_accident_reason;
        $this->middleware('auth');
    }

    protected function path(string $link)
    {
        return "admin.fire_accident_reason.{$link}";
    }

    public function index()
    {
        if(request()->ajax())
        {
            return $this->fire_accident_reason->datatable();
        }else{
            return view($this->path('index'));
        }

    }

    public function deletedListIndex()
    {
        if (request()->ajax()){
            return $this->fire_accident_reason->deletedDatatable();
        }
    }

    public function create()
    {
        $data = [
            'title' => trans('common.create',['model' => trans('fire_accident_reason.fire_accident_reason')]),
            'form_action' => route('fire_accident_reason.store'),
            'method' => 'post',
            'included_path' => 'admin.fire_accident_reason.form',
        ];

        return ModalHelper::content($data);
    }

    public function store(FireAccidentReasonRequest $request)
    {
        return $this->fire_accident_reason->create($request);
    }

    public function show(FireAccidentReason $fire_accident_reason)
    {
        //
    }

    public function edit(FireAccidentReason $fire_accident_reason)
    {
        $data = [
            'title' => trans('common.edit',['model' => trans('fire_accident_reason.fire_accident_reason')]),
            'form_action' => route('fire_accident_reason.update',$fire_accident_reason->id),
            'method' => 'patch',
            'model' => $fire_accident_reason,
            'included_path' => 'admin.fire_accident_reason.form',
        ];
        $modal_content = ModalHelper::content($data);

        return $modal_content;
    }

    public function update(FireAccidentReasonRequest $request, FireAccidentReason $fire_accident_reason)
    {
        return $this->fire_accident_reason->update($fire_accident_reason->id,$request);
    }

    public function destroy(FireAccidentReason $fire_accident_reason)
    {
        return $this->fire_accident_reason->delete($fire_accident_reason->id);
    }

    public function restore($id)
    {
        return $this->fire_accident_reason->restore($id);
    }

    public function forceDelete($id)
    {
        return $this->fire_accident_reason->forceDelete($id);
    }

    public function status(Request $request)
    {
        return $this->fire_accident_reason->status($request->id);
    }
}
