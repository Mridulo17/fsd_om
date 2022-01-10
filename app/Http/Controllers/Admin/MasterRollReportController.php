<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CommonHelper;
use App\Helpers\ModalHelper;
use App\Http\Controllers\Controller;
use App\Interfaces\DesignationInterface;
use App\Interfaces\DistrictInterface;
use App\Interfaces\EmployeeInterface;
use App\Interfaces\ThanaInterface;
use App\Interfaces\FireStationInterface;
use App\Http\Requests\Admin\MasterRollReportRequest;
use App\Interfaces\MasterRollReportInterface;
use App\Models\MasterRollReport;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use App\Models\FireStation;
use Illuminate\Http\Request;

class MasterRollReportController extends Controller
{
    protected $master_roll_report;
    protected $fire_station;
    protected $employee;
    protected $designation;
    protected $district;
    protected $thana;

    public function __construct
    (
        MasterRollReportInterface $master_roll_report,
        FireStationInterface $fire_station,
        EmployeeInterface $employee,
        DesignationInterface $designation,
        DistrictInterface $district,
        ThanaInterface $thana
    )
    {
        $this->master_roll_report = $master_roll_report;
        $this->fire_station = $fire_station;
        $this->employee = $employee;
        $this->designation = $designation;
        $this->district = $district;
        $this->thana = $thana;
        $this->middleware('auth');
    }

    protected function path(string $link){
        return "admin.master_roll_report.{$link}";
    }

    public function index(Request $request){

        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['toFireStation', 'fromFireStation', 'toDistrict', 'fromDistrict', 'toEmployee', 'fromEmployee', 'toDesignation', 'fromDesignation', 'thana']
            ];
            return $this->master_roll_report->datatable($parameter_array);
        }
        return view($this->path('index'));

    }

    public function deletedListIndex(){
        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['toFireStation', 'fromFireStation', 'toDistrict', 'fromDistrict', 'toEmployee', 'fromEmployee', 'toDesignation', 'fromDesignation', 'thana']
            ];
//            \Log::info('test');
//            \Log::info($parameter_array);
            return $this->master_roll_report->deletedDatatable($parameter_array);
        }
    }

    public function create(){
        $data = $this->master_roll_report->commonData();
        return view($this->path ('create'))->with($data);
    }

    public function store(MasterRollReportRequest $request){
        $data = $request;
        $master_roll_reports = $request->master_roll_reports;
        $data['entry_type'] = 'manual';
        $parameters = [
            'create_many' => [
                [
                    'relation' => 'masterRollReportDetails',
                    'data' => $master_roll_reports
                ],
            ],
        ];
        $master_roll_report = $this->master_roll_report->create($data,$parameters);

        return $master_roll_report;
    }

    public function show(MasterRollReport $master_roll_report){
        return view($this->path('view'),compact('master_roll_report'));
    }

    public function edit(MasterRollReport $master_roll_report){
        $data = $this->master_roll_report->commonData($master_roll_report);
        return view($this->path('edit'))->with($data);
    }

    public function update(MasterRollReportRequest $request, MasterRollReport $master_roll_report){
        $data = $request;
        $update_parameters = [
            'create_many' => [
                [
                    'relation' => 'masterRollReportDetails',
                    'data' => $data->master_roll_reports
                ],
            ],
        ];
        return $this->master_roll_report->update($master_roll_report->id,$data,$update_parameters);
    }

    public function print($id){
        $master_roll_report = $this->master_roll_report->find($id);
        $data = [
            'master_roll_report'=> $master_roll_report,
        ];
        $pdf = PDF::loadView($this->path('print'),
            $data,
            [],
            [
                'format' => 'A4-L',
                'orientation' => 'P',
            ]);
        return $pdf->stream($master_roll_report->tracking_no.'.pdf');
    }

    public function destroy(MasterRollReport $master_roll_report){
        return $this->master_roll_report->delete($master_roll_report->id);
    }

    public function restore($id){
        return $this->master_roll_report->restore($id);
    }

    public function forceDelete($id){
        return $this->master_roll_report->forceDelete($id);
    }
}
