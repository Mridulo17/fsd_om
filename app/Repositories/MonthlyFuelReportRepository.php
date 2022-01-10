<?php


namespace App\Repositories;

use App\Helpers\ENTOBN;
use App\Interfaces\MonthlyFuelReportInterface;
use App\Models\Employee;
use App\Models\FireStation;
use App\Models\MonthlyFuelReport;
use Illuminate\Database\Eloquent\Collection;
use MongoDB\BSON\Type;


class MonthlyFuelReportRepository extends BaseRepository implements MonthlyFuelReportInterface
{
    protected $fire_station;
    protected $designation;
    protected $employee;
    protected $type;
    protected $category;
    protected $product_model;
    protected $brand;
    protected $thana;
    protected $district;
    protected $division;
    protected $assigned_vehicle;

    public function __construct(
        MonthlyFuelReport $model,
        FireStationRepository $fire_station,
        DesignationRepository $designation,
        EmployeeRepository $employee,
        TypeRepository $type,
        CategoryRepository $category,
        ModelRepository $product_model,
        BrandRepository $brand,
        ThanaRepository $thana,
        DistrictRepository $district,
        DivisionRepository $division,
        AssignedVehicleRepository $assigned_vehicle)
    {
        $this->model = $model;
        $this->fire_station = $fire_station;
        $this->designation = $designation;
        $this->employee = $employee;
        $this->category = $category;
        $this->type = $type;
        $this->brand = $brand;
        $this->product_model = $product_model;
        $this->thana = $thana;
        $this->district = $district;
        $this->division = $division;
        $this->assigned_vehicle = $assigned_vehicle;
    }
    public function commonData($monthly_fuel_report = null)
    {
        $all_employees = Employee::query()->where('status','Active')->get();
        $employees = Collection::empty();
        foreach ($all_employees as $employee){
            $employees[$employee->id] = $employee->bn_name.' ['.ENTOBN::convert_to_bangla($employee->old_pin).']'.' ['.ENTOBN::convert_to_bangla($employee->new_pin).']';
        }

        $all_fire_stations = FireStation::query()->where('status','Active')->get();
        $fire_stations = Collection::empty();
        foreach ($all_fire_stations as $fire_station){
            $fire_stations[$fire_station->id] = $fire_station->bn_name.' ['.ENTOBN::convert_to_bangla($fire_station->code).']';
        }

        $selectAssignedVehicleRawParams = [
            'columns' => "id, tracking_no",
            'pluck' => [
                'key' => 'tracking_no',
                'value' => 'id'
            ],
        ];

        $edit = $monthly_fuel_report == null ? false : true;
        if ($edit){
            $monthly_fuel_report['brand_id'] = @$monthly_fuel_report->assigned_vehicle->brand_id;
            $monthly_fuel_report['model_id'] = @$monthly_fuel_report->assigned_vehicle->model_id;
            $monthly_fuel_report['type_id'] = @$monthly_fuel_report->assigned_vehicle->type_id;
            $monthly_fuel_report['category_id'] = @$monthly_fuel_report->assigned_vehicle->category_id;
            $monthly_fuel_report['thana_id'] = @$monthly_fuel_report->assigned_vehicle->brand_id;
            $monthly_fuel_report['district_id'] = @$monthly_fuel_report->assigned_vehicle->model_id;
            $monthly_fuel_report['division_id'] = @$monthly_fuel_report->assigned_vehicle->type_id;
        }

        $data = [
            'monthly_fuel_report' => $monthly_fuel_report,
            'fuel_types' => $this->model::fuelTypes(),
            'fire_stations' => $fire_stations,
//            'employees' => $this->employee->pluck(),
            'employees' => $employees,
            'designations' => $this->designation->pluck(),
            'categories' => $this->category->pluck(['type_id'=>@$monthly_fuel_report->type_id]),
            'types' => $this->type->pluck(),
            'brands' => $this->brand->pluck(),
            'models' => $this->product_model->pluck(),
            'thanas' => $this->thana->pluck(),
            'districts' => $this->district->pluck(),
            'divisions' => $this->division->pluck(),
            'assigned_vehicles' => $this->assigned_vehicle->selectRawPluck($selectAssignedVehicleRawParams),
            'months' => $this->model::months(),
        ];
        return $data;
    }
}
