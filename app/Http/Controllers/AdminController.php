<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Session;
use File;

class AdminController extends Controller
{
   public function __construct(){
        $this->middleware('user');
    }

    public function showDashboard(){
        return view('dashboard');
    }

    public function showProducts(){
        $products = Products::all();
        return view('products')->with('products',$products);
    }

    public function newProduct(){
        return view('product-form');
    }

    public function saveProduct(Request $request){
        $vd = Validator($request->all(),[
            'name'=>'required',
            'price'=>'required|numeric|between:0,99999.99',
            'qty'=>'required|numeric',
            'description'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:12048'
        ]);
        if($vd->fails())
        {
            return redirect()->back()->withErrors($vd)->withInput();
        }

        $product = new Products();
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->stock = $request->get('qty');
        $product->description = $request->get('description');
        if($product->save()){
            if($request->hasFile('image')){
                $file=$request->file('image');
                $filename = $product->id.'.jpg';
                $destinationPath = public_path(). '/uploads/products/';
                if(File::exists($destinationPath.$filename))
                {
                    File::delete($destinationPath.$filename);
                }
                $file->move($destinationPath, $filename);
            }
            Session::flash('msg','saved');
            return redirect('products/');
        }
    }

    public function editProduct($id){
        $product = Products::find($id);
        return view('product-form-edit')->with('product',$product);
    }

    public function updateProduct(Request $request,$id){
        $vd = Validator($request->all(),[
            'name'=>'required',
            'price'=>'required|numeric|between:0,99999.99',
            'qty'=>'required|numeric',
            'description'=>'required',
        ]);
        if($vd->fails())
        {
            return redirect()->back()->withErrors($vd)->withInput();
        }

        $product = Products::find($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->stock = $request->get('qty');
        $product->description = $request->get('description');
        if($product->save()){
            if($request->hasFile('image')){
                $file=$request->file('image');
                $filename = $product->id.'.jpg';
                $destinationPath = public_path(). '/uploads/products/';
                if(File::exists($destinationPath.$filename))
                {
                    File::delete($destinationPath.$filename);
                }
                $file->move($destinationPath, $filename);
            }
            Session::flash('msg','saved');
            return redirect('products/');
        }
    }
}
