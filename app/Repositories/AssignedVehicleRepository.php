<?php


namespace App\Repositories;

use App\Interfaces\AssignedVehicleInterface;
use App\Helpers\MenuHelper;
use App\Models\FireStation;
use App\Models\AssignedVehicle;


class AssignedVehicleRepository extends BaseRepository implements AssignedVehicleInterface
{
    protected $type;
    protected $category;
    protected $brand;
    protected $product_model;
    protected $workshop;
    protected $fire_station;

    public function __construct(
        AssignedVehicle $model,
        TypeRepository $type,
        CategoryRepository $category,
        BrandRepository $brand,
        ModelRepository $product_model,
        FireStationRepository $fire_station
    )
    {
        $this->model = $model;
        $this->type = $type;
        $this->category = $category;
        $this->brand = $brand;
        $this->product_model = $product_model;
        $this->fire_station = $fire_station;
    }

    public function commonData($assigned_vehicle = null)
    {
        $data = [
            'types' => $this->type->pluck(),
            'categories' => $this->category->pluck(['type_id'=>@$assigned_vehicle->type_id]),
            'brands' => $this->brand->pluck(),
            'fire_stations' => $this->fire_station->pluck(),
            'models' => $this->product_model->pluck(),
        ];
        return $data;
    }

    public function datatable(array $relations = null, $make_true = null, $assigned_vehicles_filter=null){
        $assigned_vehicles = $relations? AssignedVehicle::with($relations) : AssignedVehicle::query();
//        if(!empty($assigned_vehicles_filter)){
//            $fields = [];
//            foreach ($assigned_vehicles_filter as $key=>$item){
//                if(explode('_',$key)[0] == 'form'){
//                    array_push($fields,[explode('_',$key,2)[1]=>$item]);
//                }
//            }
//            $fields = array_merge(...$fields);
//            $div = $fields['fire_station_id'];
//            $dis = $fields['brand_id'];
//            $tha = $fields['model_id'];
//            $fs = $fields['type_id'];
//            $type = $fields['category_id'];
//            $status = $fields['status'];
//            dd($status);
//              if ($div && $dis && $tha && $fs && $type){
//                  $assigned_vehicles->where('fire_station_id', $fs);
//           }
//             else
//            if ($div && $dis && $tha && $fs ){
//                $assigned_vehicles->where('fire_station_id', $fs);
//            }
//            elseif ($div && $dis && $tha){
//                $fs_ids = FireStation::where('thana_id',$tha)->pluck('id');
//                $assigned_vehicles->whereIn('fire_station_id', $fs_ids);
//            }
//            elseif ($div && $dis){
//                $dis_ids = FireStation::where('district_id',$dis)->pluck('id');
//                $assigned_vehicles->whereIn('fire_station_id', $dis_ids);
//            }
//            elseif ($div){
//                $div_ids = FireStation::where('division_id',$div)->pluck('id');
//                $assigned_vehicles->whereIn('fire_station_id', $div_ids);
//            }
//
//            if ($type){
//                $assigned_vehicles->where('type_id', $type);
//            }
//
//            if ($status){
//                $assigned_vehicles->where('status', $status);
//            }
//        }

        $datatable = \Datatables::of($assigned_vehicles)
            ->addIndexColumn()
            ->filterColumn('status', function($query, $keyword) {
                $query->where('status','LIKE', "%{$keyword}%");
            })
            ->addColumn('action', function($data){
                $action_array = [
                    'id' => $data->id,
                    'subject' => $data,
                ];
                $action = '';
                $action .= MenuHelper::TableActionButton($action_array);
                return $action;
            })
            ->addColumn('status', function($data){
                $status = '';
                if($data->status == 'Active'){
                    $status .= '<span class="badge badge-soft-success font-size-11 fw-bold">Active</span>';
                }elseif ($data->status == 'Inactive'){
                    $status .= '<span class="badge badge-soft-pink font-size-11 fw-bold">Inactive</span>';
                }
                return $status;
            })
            ->rawColumns(['action','status']);

        if($make_true != null){
            return $datatable;
        }else{
            return $datatable->make(true);
        }
    }
}
