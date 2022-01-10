<?php


namespace App\Repositories;

use App\Helpers\ENTOBN;
use App\Interfaces\MasterRollReportInterface;
use App\Models\Employee;
use App\Models\MasterRollReport;
use App\Models\Thana;
use App\Models\FireStation;
use Illuminate\Database\Eloquent\Collection;


class MasterRollReportRepository extends BaseRepository implements MasterRollReportInterface
{
    protected $fire_station;
    protected $designation;
    protected $district;
    protected $thana;
    protected $employee;

    public function __construct
    (
        MasterRollReport $model,
        FireStationRepository $fire_station,
        DesignationRepository $designation,
        EmployeeRepository $employee,
        DistrictRepository $district,
        ThanaRepository $thana
    )
    {
        $this->model = $model;
        $this->fire_station = $fire_station;
        $this->designation = $designation;
        $this->employee = $employee;
        $this->district = $district;
        $this->thana = $thana;
    }
    public function commonData($master_roll_report = null)
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

        $edit = $master_roll_report == null ? false : true;
        if ($edit){
            $master_roll_report['memorandum_no'] = @$master_roll_report->fire_station->memorandum_no;

            foreach ($master_roll_report->masterRollReportDetails as $masterRollReportDetail){
                foreach ($masterRollReportDetail->getAttributes() as $key => $value){
                    if (substr_count($key,'date') > 0){
                        $masterRollReportDetail[$key] = $value ? date('d-m-Y',strtotime($value)) : null;
                    }
                }
            }
        }

        $data = [
            'master_roll_report' => $master_roll_report,
            'fire_stations' => $fire_stations,
//            'employees' => $this->employee->pluck(),
            'employees' => $employees,
            'districts' => $this->district->pluck(),
            'designations' => $this->designation->pluck(),
            'thanas' => $this->thana->pluck(),
            'months' => $this->model::months(),
            'fire_station_memorandum_nos' => $this->fire_station->selectRawPluck($selectFireStationRawParamsWithMemorandumNoNumber),
        ];

        return $data;
    }
}
