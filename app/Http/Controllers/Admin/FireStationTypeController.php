<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FireStationTypeRequest;
use App\Interfaces\FireStationTypeInterface;
use App\Models\FireStationType;
use Illuminate\Http\Request;

class FireStationTypeController extends Controller
{
    protected $fireStationType;

    public function __construct(FireStationTypeInterface $fireStationType){
        $this->fireStationType = $fireStationType;
        $this->middleware('auth');
    }

    protected function path(string $link){
        return "admin.fire_station_type.{$link}";
    }

    public function index()
    {
        if(request()->ajax()){
            return $this->fireStationType->datatable();
        }else{
            return view($this->path('index'));
        }
    }

    public function deletedListIndex(){
        if (request()->ajax()){
            return $this->fireStationType->deletedDatatable();
        }
    }

    public function create()
    {
        $data['fire_station_types'] = $this->fireStationType->pluck('bn_name','id');
        return view($this->path('create'))->with($data);
    }

    public function store(FireStationTypeRequest $request)
    {
        return $this->fireStationType->create($request);
    }

    public function show(FireStationType $fire_station_type)
    {
        //
    }

    public function edit(FireStationType $fire_station_type)
    {
        $data['fire_station_type'] = $fire_station_type;
        $data['fire_station_types'] = $this->fireStationType->pluck('name','id');
        return view($this->path('edit'))->with($data);
    }

    public function update(FireStationTypeRequest $request, FireStationType $fire_station_type)
    {
        return $this->fireStationType->update($fire_station_type->id,$request);
    }

    public function destroy(FireStationType $fire_station_type)
    {
        return $this->fireStationType->delete($fire_station_type->id);
    }

    public function restore($id){
        return $this->fireStationType->restore($id);
    }

    public function forceDelete($id){
        return $this->fireStationType->forceDelete($id);
    }

    public function status(Request $request){
        return $this->fireStationType->status($request->id);
    }
}
