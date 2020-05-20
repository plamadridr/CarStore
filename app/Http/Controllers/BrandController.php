<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;

use Illuminate\Support\Facades\Auth;

class BrandController extends Controller{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $brands = Brands::paginate(12);

        return view('listBrands', array('listBrands'=>$brands));
    }

    public function list(Request $request){
        $brands = Brand::paginate(12);

        return view('listBrands', array('listBrands'=>$brands));
    }

    public function create(){
        return view('addBrand');
    }

    public function insertBrand(){
        $brand = new Brand;

        $brand->name = request('name');
        
        $brand->save();

        return redirect('/brands/list');

    }

    public function update($id){
        $brand = Brand::find($id);
        return view('updateBrand', array('brand'=>$brand));
    }

    public function updateBrand(){
        $brand_id = request('brand_id');
        $brand = Brand::find($brand_id);

        $brand->name = request('name');
        
        $brand->save();

        return redirect('/brands/list');
    }

    public function deleteBrand($id){
        $brand = Brand::find($id);
        $brand->delete();

        return redirect('/brands/list');
    }
}
