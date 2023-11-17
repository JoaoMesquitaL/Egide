<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function Index(){
        $items = \Cart::getContent();
        return view('admin.cart', compact('items'));
    }

    public function AddToCart(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->nome,
            'price' => $request->preco,
            'quantity' => abs($request->quantidade)
        ]);

        return redirect()->back()->with('message', 'Produto adicionado no carrinho com sucesso!');
    }

    public function DeleteCart(Request $request){
        \Cart::remove($request->id);

        return redirect()->back()->with('message', 'Produto removido do carrinho com sucesso!');
    }

    public function UpdateCart(Request $request){
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity),
            ],
        ]);

        return redirect()->back()->with('message', 'Produto atualizado ao carrinho com sucesso!');
    }

    public function ClearCart(Request $request){
        \Cart::clear();

        return redirect()->back()->with('warning', 'Seu carrinho está vazio!');
    }
}
