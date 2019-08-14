<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ApiController extends Controller
{
    public function getProducts(){
        $products = Products::where('status','=',0)->get();
        return response()->json(['status'=>true,'products'=>$products]);
    }
}
