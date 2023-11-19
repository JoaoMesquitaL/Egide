<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;


class ReportController extends Controller
{
    //
    public function Index(){
        $products = Product::all()->count();
        $stock = DB::table('stock_mutations')->count();
        $user = DB::table('users')->count();
        
        return view('admin.report', compact('products', 'stock', 'user'));
    }
}