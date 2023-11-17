<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;


class StockController extends Controller
{
    //
    public function updateStockIncrease(){
        $products = Product::all();
        $images = Image::all();
        return view('admin.displayproducts', compact('products', 'images'));
    }

    public function sumStockProducts(){
        $stock = Stock::all();
        return view('admin.stockproducts', compact('total'));
    }

    public function StockProducts() {
        $stock = Stock::all();
        $products = Product::all();
        $total = $stock->sum('quantidade');
        $valor_total = $products->sum('preco') * $total;
        
        return view('admin.stockproducts', compact('products', 'total', 'valor_total'));
        
    }
}
