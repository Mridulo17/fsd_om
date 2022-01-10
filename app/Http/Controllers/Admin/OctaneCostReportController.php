<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CommonHelper;
use App\Helpers\ModalHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\DesignationInterface;
use App\Interfaces\DistrictInterface;
use App\Interfaces\EmployeeInterface;
use App\Interfaces\FireStationInterface;
use App\Http\Requests\Admin\OctaneCostReportRequest;
use App\Interfaces\OctaneCostReportInterface;
use App\Models\OctaneCostReport;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use App\Models\FireStation;
use Illuminate\Http\Request;

class OctaneCostReportController extends Controller
{
    protected $octane_cost_report;
    protected $fire_station;
    protected $employee;
    protected $designation;

    public function __construct
    (
        OctaneCostReportInterface $octane_cost_report,
        FireStationInterface $fire_station,
        EmployeeInterface $employee,
        DesignationInterface $designation
    )
    {
        $this->octane_cost_report = $octane_cost_report;
        $this->fire_station = $fire_station;
        $this->employee = $employee;
        $this->designation = $designation;
        $this->middleware('auth');
    }

    protected function path(string $link){
        return "admin.octane_cost_report.{$link}";
    }

    public function index(Request $request){

        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['fireStation', 'employee', 'designation']
            ];
            return $this->octane_cost_report->datatable($parameter_array);
        }
        return view($this->path('index'));

    }

    public function deletedListIndex(){
        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['fireStation', 'employee', 'designation']
            ];
            return $this->octane_cost_report->deletedDatatable($parameter_array);
        }
    }

    public function create(){
        $data = $this->octane_cost_report->commonData();
        return view($this->path('create'))->with($data);
    }

    public function store(OctaneCostReportRequest $request){
        $data = $request;
        $octane_cost_reports = $request->octane_cost_reports;
        $power_units = $request->power_units;
        $data['entry_type'] = 'manual';
        $parameters = [
            'create_many' => [
                [
                    'relation' => 'octaneCostReportDetails',
                    'data' => $octane_cost_reports
                ],
                [
                    'relation' => 'octaneCostPowerUnit',
                    'data' => $power_units
                ],
            ],
        ];
        $octane_cost_report = $this->octane_cost_report->create($data,$parameters);

        return $octane_cost_report;
    }

    public function show(OctaneCostReport $octane_cost_report){
        return view($this->path('view'),compact('octane_cost_report'));
    }

    public function edit(OctaneCostReport $octane_cost_report){
        $data = $this->octane_cost_report->commonData($octane_cost_report);
//        dd($data);
        return view($this->path('edit'))->with($data);
    }

    public function update(OctaneCostReportRequest $request, OctaneCostReport $octane_cost_report){
        $data = $request;
        $update_parameters = [
            'create_many' => [
                [
                    'relation' => 'octaneCostReportDetails',
                    'data' => $data->octane_cost_reports
                ],
                [
                    'relation' => 'octaneCostPowerUnit',
                    'data' => $data->power_units
                ],
            ],
        ];
        return $this->octane_cost_report->update($octane_cost_report->id,$data,$update_parameters);
    }

    public function print($id){
        $octane_cost_report = $this->octane_cost_report->find($id);
        $data = [
            'octane_cost_report'=> $octane_cost_report,
        ];
        $pdf = PDF::loadView($this->path('print'),
            $data,
            [],
            [
                'format' => 'A4-L',
                'orientation' => 'P',
            ]);
        return $pdf->stream($octane_cost_report->tracking_no.'.pdf');
    }

    public function destroy(OctaneCostReport $octane_cost_report){
        return $this->octane_cost_report->delete($octane_cost_report->id);
    }

    public function restore($id){
        return $this->octane_cost_report->restore($id);
    }

    public function forceDelete($id){
        return $this->octane_cost_report->forceDelete($id);
    }


}
