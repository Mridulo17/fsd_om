<?php


namespace App\Repositories;

use App\Helpers\ENTOBN;
use App\Interfaces\OperationalMaintenanceReportInterface;
use App\Models\Employee;
use App\Models\Thana;
use App\Models\FireAccidentReason;
use App\Models\FireStation;
use App\Models\OperationalMaintenanceReport;
use Illuminate\Database\Eloquent\Collection;


class OperationalMaintenanceReportRepository extends BaseRepository implements OperationalMaintenanceReportInterface
{
    protected $fire_station;
    protected $designation;
    protected $district;
    protected $employee;
    protected $fire_accident_reason;
    protected $damaged_property;
    protected $assigned_vehicle;

    public function __construct(
        OperationalMaintenanceReport $model,
        FireStationRepository $fire_station,
        DesignationRepository $designation,
        EmployeeRepository $employee,
        DistrictRepository $district,
        FireAccidentReasonRepository $fire_accident_reason,
        DamagedPropertyRepository $damaged_property,
        AssignedVehicleRepository $assigned_vehicle)
    {
        $this->model = $model;
        $this->fire_station = $fire_station;
        $this->designation = $designation;
        $this->employee = $employee;
        $this->district = $district;
        $this->fire_accident_reason = $fire_accident_reason;
        $this->damaged_property = $damaged_property;
        $this->assigned_vehicle = $assigned_vehicle;
    }
    public function commonData($operational_maintenance_report = null)
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

        $selectFireStationRawParamsWithMemorandumNoNumber = [
            'columns' => "id, memorandum_no",
            'pluck' => [
                'key' => 'memorandum_no',
                'value' => 'id'
            ],
        ];

        $edit = $operational_maintenance_report == null ? false : true;
        if ($edit){
            $operational_maintenance_report['memorandum_no'] = @$operational_maintenance_report->fire_station->memorandum_no;

            foreach ($operational_maintenance_report->operationalMaintenanceDetails as $OperationalMaintenanceDetail){
                foreach ($OperationalMaintenanceDetail->getAttributes() as $key => $value){
                    if (substr_count($key,'date') > 0){
                        $OperationalMaintenanceDetail[$key] = $value ? date('d-m-Y',strtotime($value)) : null;
                    }
                }
            }
        }

        $data = [
            'operational_maintenance_report' => $operational_maintenance_report,
            'fire_stations' => $fire_stations,
//            'employees' => $this->employee->pluck(),
            'employees' => $employees,
            'districts' => $this->district->pluck(),
            'designations' => $this->designation->pluck(),
            'assigned_vehicles' => $this->assigned_vehicle->pluck(),
            'damaged_properties' => $this->damaged_property->pluck(),
            'fire_accident_reasons' => $this->fire_accident_reason->pluck(),
            'months' => $this->model::months(),
            'fire_station_memorandum_nos' => $this->fire_station->selectRawPluck($selectFireStationRawParamsWithMemorandumNoNumber),
        ];

        return $data;
    }
}
