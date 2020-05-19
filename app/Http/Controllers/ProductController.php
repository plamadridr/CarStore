<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;

use Illuminate\Support\Facades\Auth;

class ProductController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $products = Product::paginate(6);

        if ($request->get('buscarpor')!=""){
            $buscar = $request->get('buscarpor');
            $tipoBuscar = $request->get('tipoBuscar');

            $products = $this::buscarPor($tipoBuscar, $buscar);
        }

        else if ($request->get('ordenarpor')!=""){
            $ordenar = $request->get('ordenarpor');
            $tipoOrdenar = $request->get('tipoOrdenar');

            $products = $this::ordenarPor($tipoOrdenar, $ordenar);
        }

        return view('listProducts', array('listProducts'=>$products));
    }

    public function llistar(Request $request){
        $products = Product::paginate(6);

        return view('listProducts', array('listProducts'=>$products));
    }

    public function create(){
        $brands = Brand::all();
        return view('addProduct', array('brands'=>$brands));
    }

    public function insertProduct(){
        $product = new Product;

        $product->brand_id = request('brand');
        $product->user_id = Auth::id();
        $product->model = request('model');
        $product->image = request('image');
        $product->price = request('price');
        $product->plazas = request('plazas');
        $product->year = request('year');
        
        $product->save();

        return redirect('/products');

    }

    public function update($id){
        $product = Product::find($id);
        return view('updateProduct', array('product'=>$product));
    }

    public function updateProduct(){
        $product_id = request('product_id');
        $product = Product::find($product_id);

        $product->brand_id = request('brand');
        $product->user_id = Auth::id();
        $product->model = request('model');
        $product->image = request('image');
        $product->price = request('price');
        $product->plazas = request('plazas');
        $product->year = request('year');
        
        $product->save();

        return redirect('/products');
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
    }

    public function buscarPor($tipo, $buscar) {
        if ( ($tipo) && ($buscar) ) {
            return Product::where($tipo,'like',"%$buscar%")->paginate(12);
        }
    }

    public function ordenarPor($tipo, $order) {
        if ( ($tipo) && ($order) ) {
            return Product::orderBy($tipo, $order)->paginate(12);
        }
    }

}
