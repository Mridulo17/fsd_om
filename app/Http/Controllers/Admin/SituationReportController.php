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
use App\Http\Requests\Admin\SituationReportRequest;
use App\Interfaces\SituationReportInterface;
use App\Models\SituationReport;
use App\Models\OperationSituation;
use App\Models\AdministrativeSituation;
use App\Models\DevelopmentTrainingSituation;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use App\Models\FireStation;
use App\Models\Employee;
use Illuminate\Http\Request;

class SituationReportController extends Controller
{
    protected $situation_report;
    protected $fire_station;
    protected $employee;
    protected $designation;
    protected $district;
    protected $thana;

    public function __construct
    (
        SituationReportInterface $situation_report,
        FireStationInterface $fire_station,
        EmployeeInterface $employee,
        DesignationInterface $designation,
        DistrictInterface $district,
        ThanaInterface $thana
    )
    {
        $this->situation_report = $situation_report;
        $this->fire_station = $fire_station;
        $this->employee = $employee;
        $this->designation = $designation;
        $this->district = $district;
        $this->thana = $thana;
        $this->middleware('auth');
    }

    protected function path(string $link){
        return "admin.situation_report.{$link}";
    }

    public function index(Request $request){

        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['toFireStation', 'fromFireStation', 'toDistrict', 'fromDistrict', 'toEmployee', 'fromEmployee', 'toDesignation', 'fromDesignation', 'thana']
            ];
            return $this->situation_report->datatable($parameter_array);
        }
        return view($this->path('index'));

    }

    public function deletedListIndex(){
        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['toFireStation', 'fromFireStation', 'fromDistrict', 'toDistrict', 'toEmployee', 'fromEmployee', 'toDesignation', 'fromDesignation', 'thana']
            ];
//            \Log::info('test');
//            \Log::info($parameter_array);
            return $this->situation_report->deletedDatatable($parameter_array);
        }
    }

    public function create(){
        $data = $this->situation_report->commonData();
        return view($this->path('create'))->with($data);
    }

    public function store(SituationReportRequest $request){
        $data = $request;
        $administrative_situations = $request->administrative_situations;
        $operation_situations = $request->operation_situations;
        $development_training_situations = $request->development_training_situations;
//        dd($attach_staff);

        $data['entry_type'] = 'manual';
        $parameters = [
            'create_many' => [
                [
                    'relation' => 'administrativeSituation',
                    'data' => $administrative_situations
                ],
                [
                    'relation' => 'operationSituation',
                    'data' => $operation_situations
                ],
                [
                    'relation' => 'developmentTrainingSituation',
                    'data' => $development_training_situations
                ],
            ],
        ];
        $situation_report = $this->situation_report->create($data,$parameters);
        return $situation_report;
    }

    public function show(SituationReport $situation_report){
        return view($this->path('view'),compact('situation_report'));
    }

    public function edit(SituationReport $situation_report){
        $data = $this->situation_report->commonData($situation_report);
        return view($this->path('edit'))->with($data);
    }

    public function update(SituationReportRequest $request, SituationReport $situation_report){

        $data = $request;

        $update_parameters = [

            'create_many' => [
                [
                    'relation' => 'administrativeSituation',
                    'data' => $data->administrative_situations
                ],
                [
                    'relation' => 'operationSituation',
                    'data' => $data->operation_situations
                ],
                [
                    'relation' => 'developmentTrainingSituation',
                    'data' => $data->development_training_situations
                ],
            ],
        ];

//        dd($update_parameters);
        return $this->situation_report->update($situation_report->id,$data,$update_parameters);
    }

    public function print($id){
        $situation_report = $this->situation_report->find($id);
        $data = [
            'situation_report'=> $situation_report,
        ];
        $pdf = PDF::loadView($this->path('print'),
            $data,
            [],
            [
                'format' => 'A4-L',
                'orientation' => 'P',
            ]);
        return $pdf->stream($situation_report->tracking_no.'.pdf');
//        return view($this->path('print'), compact('situation_report'));
    }

    public function destroy(SituationReport $situation_report){
        return $this->situation_report->delete($situation_report->id);
    }

    public function restore($id){
        return $this->situation_report->restore($id);
    }

    public function forceDelete($id){
        return $this->situation_report->forceDelete($id);
    }
}
