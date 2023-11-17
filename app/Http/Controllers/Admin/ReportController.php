<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ReportController extends Controller
{
    //
    public function Index(){
        $products = Product::all()->count();

        return view('admin.report', compact('products'));
    }
    
}
