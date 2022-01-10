<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CommonHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AssignedVehicleRequest;
use App\Interfaces\AssignedVehicleInterface;
use App\Interfaces\FireStationInterface;
use App\Interfaces\BrandInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\TypeInterface;
use App\Interfaces\ModelInterface;
use App\Models\AssignedVehicle;
use App\Models\FireStation;
use App\Models\Model;
Use App\Models\Brand;
Use App\Models\Category;
Use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignedVehicleController extends Controller
{
    protected $assigned_vehicle;
    protected $model;
    protected $brand;
    protected $category;
    protected $fire_station;
    protected $type;

    public function __construct(
        AssignedVehicleInterface $assigned_vehicle,
        ModelInterface $model,
        BrandInterface $brand,
        CategoryInterface $category,
        FireStationInterface $fire_station,
        TypeInterface $type
    )
    {
        $this->assigned_vehicle = $assigned_vehicle;
        $this->model = $model;
        $this->brand = $brand;
        $this->category = $category;
        $this->fire_station = $fire_station;
        $this->type = $type;
        $this->middleware('auth');
    }

    protected function path(string $link)
    {
        return "admin.assigned_vehicle.{$link}";
    }

    public function index(Request $request)
    {

        if(request()->ajax()){
            $datatable = $this->assigned_vehicle->datatable(['fire_station','type','category','brand','model'],null,
                $request->all());
            return $datatable;
        }
            return view($this->path('index'));

    }

    public function deletedListIndex()
    {
        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['fire_station', 'type','category','brand','model']
            ];
            return $this->assigned_vehicle->deletedDatatable($parameter_array);
        }
    }

    public function create()
    {
        $data = $this->assigned_vehicle->commonData();
        $data['assigned_vehicles'] = $this->assigned_vehicle->pluck('bn_name','id');
        return view($this->path('create'))->with($data);
    }

    public function store(AssignedVehicleRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request;
            $tracking_parameter = [
                'prefix' => 'av',
            ];

            $data['tracking_no'] = CommonHelper::trackingNumber(AssignedVehicle::class,$tracking_parameter);
            $assigned_vehicle = $this->assigned_vehicle->create($data);

//            $data = $this->stockReceive($assigned_vehicle->getData()->data);
            session()->put('success',trans('common.tracking_no').': '.$assigned_vehicle->getData()->data->tracking_no);
            DB::commit();
            return $assigned_vehicle;
        }catch (\Exception $e){
            DB::rollBack();
            if($data->ajax() == true){
                return response()->json($e->getMessage(), 500);
            }
        }
        $assigned_vehicle =  $this->assigned_vehicle->create($request);

        $data = [
            'assigned_vehicle' => $assigned_vehicle,
            'message' => trans('common.created',['model' => trans('assigned_vehicle.assigned_vehicle')]),
        ];

        return $assigned_vehicle;
    }

    public function show(AssignedVehicle $assigned_vehicle)
    {
        //
    }

    public function edit(AssignedVehicle $assigned_vehicle)
    {
        $data = $this->assigned_vehicle->commonData($assigned_vehicle);
        $data['assigned_vehicle'] = $assigned_vehicle;
        $data['assigned_vehicles'] = $this->assigned_vehicle->pluck('name','id');
        return view($this->path('edit'))->with($data);
    }

    public function update(AssignedVehicleRequest $request, AssignedVehicle $assigned_vehicle)
    {
        return $this->assigned_vehicle->update($assigned_vehicle->id,$request);
    }

    public function destroy(AssignedVehicle $assigned_vehicle)
    {
        return $this->assigned_vehicle->delete($assigned_vehicle->id);
    }

    public function restore($id)
    {
        return $this->assigned_vehicle->restore($id);
    }

    public function forceDelete($id)
    {
        return $this->assigned_vehicle->forceDelete($id);
    }

    public function status(Request $request)
    {
        return $this->assigned_vehicle->status($request->id);
    }
}
