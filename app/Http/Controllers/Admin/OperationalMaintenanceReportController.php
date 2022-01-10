<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CommonHelper;
use App\Helpers\ModalHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\DesignationInterface;
use App\Interfaces\DistrictInterface;
use App\Interfaces\EmployeeInterface;
use App\Interfaces\FireStationInterface;
use App\Http\Requests\Admin\OperationalMaintenanceReportRequest;
use App\Interfaces\OperationalMaintenanceReportInterface;
use App\Models\OperationalMaintenanceReport;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use App\Models\FireStation;
use Illuminate\Http\Request;

class OperationalMaintenanceReportController extends Controller
{
    protected $operational_maintenance_report;
    protected $fire_station;
    protected $employee;
    protected $designation;
    protected $district;

    public function __construct
    (
        OperationalMaintenanceReportInterface $operational_maintenance_report,
        FireStationInterface $fire_station,
        EmployeeInterface $employee,
        DesignationInterface $designation,
        DistrictInterface $district
    )
    {
        $this->operational_maintenance_report = $operational_maintenance_report;
        $this->fire_station = $fire_station;
        $this->employee = $employee;
        $this->designation = $designation;
        $this->district = $district;
        $this->middleware('auth');
    }

    protected function path(string $link){
        return "admin.operational_maintenance_report.{$link}";
    }

    public function index(Request $request){

        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['toFireStation', 'fromFireStation', 'toDistrict', 'fromDistrict', 'toEmployee', 'fromEmployee', 'toDesignation', 'fromDesignation']
            ];
            return $this->operational_maintenance_report->datatable($parameter_array);
        }
        return view($this->path('index'));

    }

    public function deletedListIndex(){
        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['toFireStation', 'fromFireStation', 'toDistrict', 'fromDistrict', 'toEmployee', 'fromEmployee', 'toDesignation', 'fromDesignation']
            ];
            return $this->operational_maintenance_report->deletedDatatable($parameter_array);
        }
    }

    public function create(){
        $data = $this->operational_maintenance_report->commonData();
        return view($this->path('create'))->with($data);
    }

    public function store(OperationalMaintenanceReportRequest $request){
        $data = $request;
        $operational_maintenance_reports = $request->operational_maintenance_reports;
        $data['entry_type'] = 'manual';
        $parameters = [
            'create_many' => [
                [
                    'relation' => 'operationalMaintenanceDetails',
                    'data' => $operational_maintenance_reports
                ],
            ],
        ];
        $operational_maintenance_report = $this->operational_maintenance_report->create($data,$parameters);

        return $operational_maintenance_report;
    }

    public function show(OperationalMaintenanceReport $operational_maintenance_report){
        return view($this->path('view'),compact('operational_maintenance_report'));
    }

    public function edit(OperationalMaintenanceReport $operational_maintenance_report){
        $data = $this->operational_maintenance_report->commonData($operational_maintenance_report);
        return view($this->path('edit'))->with($data);
    }

    public function update(OperationalMaintenanceReportRequest $request, OperationalMaintenanceReport $operational_maintenance_report){
        $data = $request;
        $update_parameters = [
            'create_many' => [
                [
                    'relation' => 'operationalMaintenanceDetails',
                    'data' => $data->operational_maintenance_reports
                ],
            ],
        ];
        return $this->operational_maintenance_report->update($operational_maintenance_report->id,$data,$update_parameters);
    }

    public function print($id){
        $operational_maintenance_report = $this->operational_maintenance_report->find($id);
        $data = [
            'operational_maintenance_report'=> $operational_maintenance_report,
        ];
        $pdf = PDF::loadView($this->path('print'),
            $data,
            [],
            [
                'format' => 'A4-L',
                'orientation' => 'P',
            ]);
        return $pdf->stream($operational_maintenance_report->tracking_no.'.pdf');
    }

    public function destroy(OperationalMaintenanceReport $operational_maintenance_report){
        return $this->operational_maintenance_report->delete($operational_maintenance_report->id);
    }

    public function restore($id){
        return $this->operational_maintenance_report->restore($id);
    }

    public function forceDelete($id){
        return $this->operational_maintenance_report->forceDelete($id);
    }
}
