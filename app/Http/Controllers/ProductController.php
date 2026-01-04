<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        $products = Product::get();
        return view('products/products',[
            'products' => $products
        ]);
    }

    public function add(){
        return view('products/add_product');
    }

    public function store(Request $request){
        Product::create($request->all());
        return redirect(route('products'));
    }
}
