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
use App\Http\Requests\Admin\AttachStaffRecordRequest;
use App\Interfaces\AttachStaffRecordInterface;
use App\Models\AttachStaffRecord;
use App\Models\ToAttachStaffRecord;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use App\Models\FireStation;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttachStaffRecordController extends Controller
{
    protected $attach_staff_record;
    protected $fire_station;
    protected $employee;
    protected $designation;
    protected $district;
    protected $thana;

    public function __construct
    (
        AttachStaffRecordInterface $attach_staff_record,
        FireStationInterface $fire_station,
        EmployeeInterface $employee,
        DesignationInterface $designation,
        DistrictInterface $district,
        ThanaInterface $thana
    )
    {
        $this->attach_staff_record = $attach_staff_record;
        $this->fire_station = $fire_station;
        $this->employee = $employee;
        $this->designation = $designation;
        $this->district = $district;
        $this->thana = $thana;
        $this->middleware('auth');
    }

    protected function path(string $link){
        return "admin.attach_staff_record.{$link}";
    }

    public function index(Request $request){

        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['fromFireStation', 'fromDistrict', 'toEmployee', 'fromEmployee', 'toDesignation', 'fromDesignation', 'thana']
            ];
            return $this->attach_staff_record->datatable($parameter_array);
        }
        return view($this->path('index'));

    }

    public function deletedListIndex(){
        if (request()->ajax()){
            $parameter_array = [
                'relations' =>['fromFireStation', 'fromDistrict', 'toEmployee', 'fromEmployee', 'toDesignation', 'fromDesignation', 'thana']
            ];
//            \Log::info('test');
//            \Log::info($parameter_array);
            return $this->attach_staff_record->deletedDatatable($parameter_array);
        }
    }

    public function create(){
        $data = $this->attach_staff_record->commonData();
        return view($this->path('create'))->with($data);
    }

    public function store(AttachStaffRecordRequest $request){
        $data = $request;
        $attach_staff_records = $request->attach_staff_records;
        $attach_staff = $request->to_attach_staffs;
//        dd($attach_staff);

        $data['entry_type'] = 'manual';
        $parameters = [
            'create_many' => [
                [
                    'relation' => 'attachStaffRecordDetails',
                    'data' => $attach_staff_records
                ],
                [
                    'relation' => 'toAttachStaff',
                    'data' => $attach_staff
                ],
            ],
        ];
        $attach_staff_record = $this->attach_staff_record->create($data,$parameters);
        return $attach_staff_record;
    }

    public function show(AttachStaffRecord $attach_staff_record){
        return view($this->path('view'),compact('attach_staff_record'));
    }

    public function edit(AttachStaffRecord $attach_staff_record){
        $data = $this->attach_staff_record->commonData($attach_staff_record);
        return view($this->path('edit'))->with($data);
    }

    public function update(AttachStaffRecordRequest $request, AttachStaffRecord $attach_staff_record){

        $data = $request;

        $update_parameters = [
            'create_many' => [
                [
                    'relation' => 'attachStaffRecordDetails',
                    'data' => $data->attach_staff_records
                ],
                [
                    'relation' => 'toAttachStaff',
                    'data' => $data->to_attach_staffs
                ],
            ],
        ];

//        dd($update_parameters);
        return $this->attach_staff_record->update($attach_staff_record->id,$data,$update_parameters);
    }

    public function print($id){
        $attach_staff_record = $this->attach_staff_record->find($id);
        $data = [
            'attach_staff_record'=> $attach_staff_record,
        ];
        $pdf = PDF::loadView($this->path('print'),
            $data,
            [],
            [
                'format' => 'A4-L',
                'orientation' => 'P',
            ]);
        return $pdf->stream($attach_staff_record->tracking_no.'.pdf');
    }

    public function destroy(AttachStaffRecord $attach_staff_record){
        return $this->attach_staff_record->delete($attach_staff_record->id);
    }

    public function restore($id){
        return $this->attach_staff_record->restore($id);
    }

    public function forceDelete($id){
        return $this->attach_staff_record->forceDelete($id);
    }
}
