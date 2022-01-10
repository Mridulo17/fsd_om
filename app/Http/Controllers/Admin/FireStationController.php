<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FireStationRequest;
use App\Http\Requests\Admin\FireStationTypeRequest;
use App\Interfaces\FireStationInterface;
use App\Models\District;
use App\Models\Division;
use App\Models\FireStation;
use App\Models\FireStationType;
use App\Models\Thana;
use Illuminate\Http\Request;

class FireStationController extends Controller
{
    protected $fireStation;

    public function __construct(FireStationInterface $fireStation)
    {
        $this->fireStation = $fireStation;
        $this->middleware('auth');
    }

    protected function path(string $link)
    {
        return "admin.fire_station.{$link}";
    }

    public function index()
    {
        if(request()->ajax()){
            $parameter_array = [
                'relations' =>['division','district', 'thana','fire_station_type']
            ];
            return $this->fireStation->datatable($parameter_array);
        }else{
            return view($this->path('index'));
        }
    }

    public function deletedListIndex()
    {
        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['division','district', 'thana','fire_station_type']
            ];
            return $this->fireStation->deletedDatatable($parameter_array);
        }
    }

    public function create()
    {
        $data['fire_station'] = '';
        $data['fire_stations'] = FireStation::pluck('bn_name','id');
        $data['divisions'] = Division::pluck('bn_name','id');
        $data['districts'] = District::pluck('bn_name','id');
        $data['thanas'] = Thana::pluck('bn_name','id');
        $data['fire_station_types'] = FireStationType::pluck('bn_name','id');
        $data['categories'] = array('সিটি কর্পোরেশন','জেলা','উপজেলা');
        return view($this->path('create'))->with($data);
    }

    public function store(FireStationTypeRequest $request)
    {
        $request->request->add(['thana_id' => implode(',', $request->thana_id)]);
        return $this->fireStation->create($request);
    }

    public function show(FireStation $fire_station)
    {
        //
    }

    public function edit(FireStation $fire_station)
    {
        $data['fire_station'] = $fire_station;
        $data['fire_stations'] = FireStation::pluck('name','id');
        $data['divisions'] = Division::pluck('bn_name','id');
        $data['districts'] = District::pluck('bn_name','id');
        $data['thanas'] = Thana::where('district_id',$fire_station->district_id)->pluck('bn_name','id');
        $data['fire_station_types'] = FireStationType::pluck('bn_name','id');
        $data['categories'] = array('সিটি কর্পোরেশন' => 'সিটি কর্পোরেশন','জেলা' => 'জেলা','উপজেলা' => 'উপজেলা');
        return view($this->path('edit'))->with($data);
    }

    public function update(FireStationRequest $request, FireStation $fire_station)
    {
        $request->request->add(['thana_id' => implode(',', $request->thana_id)]);
        return $this->fireStation->update($fire_station->id,$request);
    }

    public function destroy(FireStation $fire_station)
    {
        $fire_station->deleted_by = \Auth::id();
        $fire_station->save();
        return $this->fireStation->delete($fire_station->id);
    }

    public function restore($id)
    {
        return $this->fireStation->restore($id);
    }

    public function forceDelete($id)
    {
        return $this->fireStation->forceDelete($id);
    }

    public function status(Request $request)
    {
        return $this->fireStation->status($request->id);
    }
}
