<?php

namespace App\Http\Controllers\Common;

use App\Helpers\HtmlHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\CategoryInterface;
use App\Interfaces\BrandInterface;
use App\Interfaces\FireStationInterface;
use App\Interfaces\ModelInterface;
use App\Interfaces\AssignedVehicleInterface;
use App\Models\Content;
use App\Models\Employee;
use App\Models\District;
use App\Models\FireStation;
use App\Models\AssignedVehicle;
use App\Models\Thana;
use App\Rules\LocalizedNumber;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    protected $fire_station;
    protected $assigned_vehicle;
    protected $category;
    protected $brand;
    protected $model;

    public function __construct(
        FireStationInterface $fire_station,
        AssignedVehicleInterface $assigned_vehicle,
        CategoryInterface $category,
        BrandInterface $brand,
        ModelInterface $model
    ){
        $this->fire_station = $fire_station;
        $this->assigned_vehicle = $assigned_vehicle;
        $this->category = $category;
        $this->brand = $brand;
        $this->model = $model;
    }

    public function GetDistrict()
    {
        $district = District::query()->where('division_id', request('division_id'))->where('status','Active')->get();
        return $district;
    }

    public function GetThana()
    {
        $thana = Thana::query()->where('district_id', request('district_id'))->where('status','Active')->get();
        return $thana;
    }

    public function contact()
    {
        $data['content'] = Content::query()->where('name','contact')->first();

        return view('guest.contact.show')->with($data);
    }
    public function GetDistrictFromDivision()
    {
        return District::query()->where('division_id', request('division_id'))->where('status','Active')->pluck('bn_name','id');
    }

    public function GetFireStationFromDistrict()
    {
        return FireStation::query()->where('district_id', request('district_id'))->where('status','Active')->get();
    }


    public function GetFireStationFromCode()
    {
        return FireStation::query()
            ->where('code', request('code'))
            ->where('status','Active')
            ->firstOrFail();
    }

    public function GetEmployee()
    {
        return Employee::query()->findOrFail(request('id'));
    }

    public function GetEmployeeFromPin()
    {
        return Employee::query()
            ->where('old_pin',request('pin'))
            ->orWhere('new_pin',request('pin'))
            ->firstOrFail();
    }

    public function NumberValidation(Request $request)
    {
        $request->validate([
            'input_number' => [new LocalizedNumber],
        ]);

        return true;
    }

    public function GetDistricts(Request $request)
    {
       $districts = District::query()->where('division_id',$request->key)->pluck('bn_name','id');
       $data = HtmlHelper::dropdownOptions($districts);
       return $data['options'];
    }

    public function GetFireStations(Request $request)
    {
       $fire_stations = FireStation::query()->where('district_id',$request->key)->pluck('bn_name','id');
       $data = HtmlHelper::dropdownOptions($fire_stations);
       return $data['options'];
    }

    public function GetFireStationFromThana(Request $request){
        $fire_stations = FireStation::query()->where('thana_id',$request->key)->pluck('bn_name','id');
        $data = HtmlHelper::dropdownOptions($fire_stations);
        return $data['options'];
    }

    public function GetThanas(Request $request)
    {
       $thanas = Thana::query()->where('district_id',$request->key)->pluck('bn_name','id');
       $data = HtmlHelper::dropdownOptions($thanas);
       return $data['options'];
    }

    public function getCategoriesByType(Request $request){
        $categories = $this->category->pluck(['type_id'=> $request->key]);
        $data = HtmlHelper::dropdownOptions($categories);
        return $data['options'];
    }
    public function GetModels(Request $request){
        $models = $this->model->pluck(['brand_id'=> $request->key]);
        $data = HtmlHelper::dropdownOptions($models);
        return $data['options'];
    }

    public function FindFireStation(Request $request){
        return FireStation::query()->findOrFail($request->id);
    }

    public function GetAssignedVehicles(Request $request){
        $selectAssignedVehicleRawParamsWhereModel = [
            'columns' => "id, tracking_no",
            'pluck' => [
                'key' => 'tracking_no',
                'value' => 'id'
            ],
            'where' => [
                'model_id'=> @$request->id
            ],
        ];
        $selectAssignedVehicleRawParamsWhereModelAndCategory = [
            'columns' => "id, tracking_no",
            'pluck' => [
                'key' => 'tracking_no',
                'value' => 'id'
            ],
            'where' => [
                'model_id'=> @$request->id,
                'category_id' => @$request->filter
            ],
        ];
        if ($request->filter){
            $assigned_vehicles = $this->assigned_vehicle->selectRawPluck($selectAssignedVehicleRawParamsWhereModelAndCategory);
        } else {
            $assigned_vehicles = $this->assigned_vehicle->selectRawPluck($selectAssignedVehicleRawParamsWhereModel);
        }
        $data = HtmlHelper::dropdownOptions($assigned_vehicles);
        return $data['options'];
    }

    public function FindAssignedVehicle(Request $request){
        return AssignedVehicle::query()->with('type','category','brand','model')->findOrFail($request->id);
    }

}
