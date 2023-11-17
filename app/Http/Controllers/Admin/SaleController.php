<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Image;

class SaleController extends Controller
{
    //
    public function Index(){
        $products = Product::all();
        $images = Image::all();
        return view('admin.displayproducts', compact('products', 'images'));
    }

    public function Checkout(){
        return view('admin.salecheckout');
    }

    public function ViewProduct($id){
        $product = Product::find($id);
        return view('admin.viewproduct', compact('product'));
    }
}
