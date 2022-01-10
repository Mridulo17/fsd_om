<?php


namespace App\Repositories;

use App\Helpers\ENTOBN;
use App\Interfaces\SituationReportInterface;
use App\Models\Employee;
use App\Models\SituationReport;
use App\Models\Thana;
use App\Models\FireStation;
use Illuminate\Database\Eloquent\Collection;


class SituationReportRepository extends BaseRepository implements SituationReportInterface
{
    protected $fire_station;
    protected $designation;
    protected $district;
    protected $thana;
    protected $employee;

    public function __construct
    (
        SituationReport $model,
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
    public function commonData($situation_report = null)
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

        $edit = $situation_report == null ? false : true;
        if ($edit){
            $situation_report['memorandum_no'] = @$situation_report->fire_station->memorandum_no;

            /*foreach ($situation_report->getAttributes() as $key => $value){
                if (substr_count($key,'date') > 0){
                    $situation_report[$key] = $value ? date('d-m-Y',strtotime($value)) : null;
                }
            }*/
        }

        $data = [
            'situation_report' => $situation_report,
            'fire_stations' => $fire_stations,
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
