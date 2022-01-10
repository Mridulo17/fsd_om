<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ModalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Interfaces\BrandInterface;
use App\Interfaces\CountryInterface;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brand;
    protected $country;

    public function __construct(BrandInterface $brand, CountryInterface $country){
        $this->brand = $brand;
        $this->country = $country;
        $this->middleware('auth');
    }

    protected function path(string $link){
        return "admin.brand.{$link}";
    }

    public function index(){
        if(request()->ajax()){
            $parameter = [
                'relations' => 'country'
            ];
            $datatable = $this->brand->datatable($parameter);
            return $datatable;
        }else{
            return view($this->path('index'));
        }
    }

    public function deletedListIndex(){
        if (request()->ajax()){
            return $this->brand->deletedDatatable();
        }
    }

    public function create(){
        $data = [
            'title' => trans('common.create',['model' => trans('brand.brand')]),
            'brand_id' => request('parent_id'),
            'form_action' => route('brand.store'),
            'method' => 'post',
            'included_path' => 'admin.brand.form',
            'countries' => $this->country->pluck(),
        ];

        return ModalHelper::content($data);
    }

    public function store(BrandRequest $request){
        return $this->brand->create($request);
    }

    public function show(Brand $brand){
        //
    }

    public function edit(Brand $brand){
        $data = [
            'title' => trans('common.edit',['model' => trans('brand.brand')]),
            'form_action' => route('brand.update',$brand->id),
            'method' => 'patch',
            'model' => $brand,
            'included_path' => 'admin.brand.form',
            'countries' => $this->country->pluck(),
        ];

        $modal_content = ModalHelper::content($data);

        return $modal_content;
    }

    public function update(BrandRequest $request, Brand $brand){
        return $this->brand->update($brand->id,$request);
    }

    public function destroy(Brand $brand){
        return $this->brand->delete($brand->id);
    }

    public function restore($id){
        return $this->brand->restore($id);
    }

    public function forceDelete($id){
        return $this->brand->forceDelete($id);
    }

    public function createModal(Request $request){
        $data = [
            'title' => trans('common.create',['model' => trans('brand.brand')]),
            'form_action' => route('brand_store_from_modal'),
            'method' => 'post',
            'included_path' => 'admin.brand.form',
            'countries' => $this->country->pluck(),
        ];

        $modal_content = ModalHelper::content($data);

        return $modal_content;
    }

    public function storeFromModal(BrandRequest $request){
        $brand = $this->brand->create($request)->getData()->data;
        $brands = $this->brand->pluck();
        return response()->json([
            'brands' => $brands,
            'brand' => $brand,
            'message' => trans('common.created',['model' => trans('brand.brand')]),
        ]);
    }
}
