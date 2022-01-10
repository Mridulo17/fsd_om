<?php


namespace App\Repositories;

use App\Helpers\ENTOBN;
use App\Interfaces\OctaneCostReportInterface;
use App\Models\Employee;
use App\Models\FireStation;
use App\Models\OctaneCostReport;
use Illuminate\Database\Eloquent\Collection;
use MongoDB\BSON\Type;


class OctaneCostReportRepository extends BaseRepository implements OctaneCostReportInterface
{
    protected $fire_station;
    protected $designation;
    protected $employee;
    protected $district;

    public function __construct(
        OctaneCostReport $model,
        FireStationRepository $fire_station,
        DesignationRepository $designation,
        EmployeeRepository $employee,
        DistrictRepository $district)
    {
        $this->model = $model;
        $this->fire_station = $fire_station;
        $this->designation = $designation;
        $this->employee = $employee;
        $this->district = $district;
    }
    public function commonData($octane_cost_report = null)
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

        $edit = $octane_cost_report == null ? false : true;

        if ($edit){
//            $octane_cost_report['fire_station_id'] = @$octane_cost_report->fire_station_id;
//              $octane_cost_report['thana_id'] = @$octane_cost_report->thana_id;
//            $octane_cost_report['district_id'] = @$octane_cost_report->district_id;
//

            foreach ($octane_cost_report->octaneCostReportDetails as $octaneCostReportDetail){
                foreach ($octaneCostReportDetail->getAttributes() as $key => $value){
                    if (substr_count($key,'date') > 0){
                        $octaneCostReportDetail[$key] = $value ? date('d-m-Y',strtotime($value)) : null;
                    }
                }
            }
        }

        $data = [
            'octane_cost_report' => $octane_cost_report,
            'fire_stations' => $fire_stations,
//            'employees' => $this->employee->pluck(),
            'employees' => $employees,
            'designations' => $this->designation->pluck(),
            'districts' => $this->district->pluck(),
            'months' => $this->model::months(),
        ];
        return $data;
    }
}
