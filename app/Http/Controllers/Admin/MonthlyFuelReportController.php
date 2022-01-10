<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CommonHelper;
use App\Helpers\ModalHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\AssignedVehicleInterface;
use App\Interfaces\DesignationInterface;
use App\Interfaces\DistrictInterface;
use App\Interfaces\EmployeeInterface;
use App\Interfaces\FireStationInterface;
use App\Http\Requests\Admin\MonthlyFuelReportRequest;
use App\Interfaces\MonthlyFuelReportInterface;
use App\Models\MonthlyFuelReport;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use App\Models\FireStation;
use Illuminate\Http\Request;

class MonthlyFuelReportController extends Controller
{
    protected $monthly_fuel_report;
    protected $fire_station;
    protected $employee;
    protected $designation;
    protected $assigned_vehicle;

    public function __construct
    (
        MonthlyFuelReportInterface $monthly_fuel_report,
        FireStationInterface $fire_station,
        EmployeeInterface $employee,
        DesignationInterface $designation,
        AssignedVehicleInterface $assigned_vehicle
    )
    {
        $this->monthly_fuel_report = $monthly_fuel_report;
        $this->fire_station = $fire_station;
        $this->employee = $employee;
        $this->designation = $designation;
        $this->assigned_vehicle = $assigned_vehicle;
        $this->middleware('auth');
    }

    protected function path(string $link){
        return "admin.monthly_fuel_report.{$link}";
    }

    public function index(Request $request){

        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['fireStation', 'employee', 'designation', 'assignedVehicle', 'assignedVehicle.type', 'assignedVehicle.category', 'assignedVehicle.brand', 'assignedVehicle.model', 'fireStation.district', 'fireStation.division', 'fireStation.thana']
            ];
            return $this->monthly_fuel_report->datatable($parameter_array);
        }
        return view($this->path('index'));

    }

    public function deletedListIndex(){
        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['fireStation', 'employee', 'designation', 'assignedVehicle', 'assignedVehicle.type', 'assignedVehicle.category', 'assignedVehicle.brand', 'assignedVehicle.model', 'fireStation.district', 'fireStation.division', 'fireStation.thana']
            ];
            return $this->monthly_fuel_report->deletedDatatable($parameter_array);
        }
    }

    public function create(){
        $data = $this->monthly_fuel_report->commonData();
        return view($this->path('create'))->with($data);
    }

    public function store(MonthlyFuelReportRequest $request){
        $data = $request;
        $monthly_fuel_reports = $request->monthly_fuel_reports;
        $data['entry_type'] = 'manual';
        $parameters = [
            'create_many' => [
                [
                    'relation' => 'monthlyFuelReportDetails',
                    'data' => $monthly_fuel_reports
                ],
            ],
        ];
        $monthly_fuel_report = $this->monthly_fuel_report->create($data,$parameters);

        return $monthly_fuel_report;
    }

    public function show(MonthlyFuelReport $monthly_fuel_report){
        return view($this->path('view'),compact('monthly_fuel_report'));
    }

    public function edit(MonthlyFuelReport $monthly_fuel_report){
        $data = $this->monthly_fuel_report->commonData($monthly_fuel_report);
//        dd($data);
        return view($this->path('edit'))->with($data);
    }

    public function update(MonthlyFuelReportRequest $request, MonthlyFuelReport $monthly_fuel_report){
        $data = $request;
        $update_parameters = [
            'create_many' => [
                [
                    'relation' => 'monthlyFuelReportDetails',
                    'data' => $data->monthly_fuel_reports
                ],
            ],
        ];
        return $this->monthly_fuel_report->update($monthly_fuel_report->id,$data,$update_parameters);
    }

    public function print($id){
        $monthly_fuel_report = $this->monthly_fuel_report->find($id);
        $data = [
            'monthly_fuel_report'=> $monthly_fuel_report,
        ];
        $pdf = PDF::loadView($this->path('print'),
            $data,
            [],
            [
                'format' => 'A4-L',
                'orientation' => 'P',
            ]);
        return $pdf->stream($monthly_fuel_report->tracking_no.'.pdf');
    }

    public function destroy(MonthlyFuelReport $monthly_fuel_report){
        return $this->monthly_fuel_report->delete($monthly_fuel_report->id);
    }

    public function restore($id){
        return $this->monthly_fuel_report->restore($id);
    }

    public function forceDelete($id){
        return $this->monthly_fuel_report->forceDelete($id);
    }
}
