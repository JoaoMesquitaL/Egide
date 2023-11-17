@extends('layouts.layout')
@section('titulo', 'Produtos')
@section('subtitulo', 'Adicionar produto')
@section('content')

<!-- BREADSCRUMBS -->

@php
// SDK do MercadoPago
require base_path('vendor/autoload.php');
#use MercadoPago\MercadoPagoConfig;
//Adicione as credenciais
MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();

$item->title = "Cidade de bronze";
$item->quantity = 1;
$item->unit_price = 34.00;
$item->currency_id = "BRL";

$preference->items = array($item);
$preference->save();


@endphp

<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item">
            <a class="link-body-emphasis" href="#">
                <i class="bi bi-house-door-fill"></i>
                <span class="visually-hidden">Home</span>
            </a>
        </li>
        <li class="breadcrumb-item">
            <a class="link-body-emphasis fw-semibold text-decoration-none"
                href="{{ route('displayproducts') }}">Vendas</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            Carrinho
        </li>
    </ol>
</nav>
<!---->

<div class="page-content">

    <!-- ERRORS MESSAGE -->
    @if($message = Session::get('message'))
    <div class="alert alert-success">
        {{ session()->get('message'); }}
    </div>
    @endif

    @if($message = Session::get('warning'))
    <div class="alert alert-warning">
        {{ session()->get('warning'); }}
    </div>
    @endif
    <!--  -->

    @if ($items->count() == 0)

    <div class="alert alert-warning">
        <span>Carrinho vazio!</span>
    </div>

    @else

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>R$ {{ number_format($item->price, 2, ',' , '.') }}</td>

                <td>R$ {{ number_format(\Cart::getSubtotal(), 2, ',', '.') }}</td>

                {{-- BTN UPDATE --}}
                <form action="{{ route('updatecart') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <td><input style="width: 50px" type="number" name="quantity" min="1" value="{{ $item->quantity }}">
                    </td>
                    <td>

                        <button class="btn btn-bd-primary">
                            <i class="bi bi-arrow-clockwise"></i>
                        </button>

                </form>

                {{-- BTN DELETE --}}
                <form action="{{ route('deletecart') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">

                    <button class="btn btn-bd-primary">
                        <i class="bi bi-trash3"></i>
                    </button>

                </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h5>Valor total: R$ {{ number_format(\Cart::getTotal(), 2, ',', '.') }}</h5>
    @endif

    <br>

    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <a href="{{ route('displayproducts') }}" class="btn btn-bd-primary" type="button"><i
                    class="bi bi-arrow-left"></i> Continuar
                comprando</a>
            <a href="{{ route('clearcart') }}" class="btn btn-danger" type="button">Limpar carrinho <i
                    class="bi bi-x-lg"></i></a>
        </div>
        <br>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="cho" style="border:none;" type="button"> </button>
        </div>

    </div>

    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script>
        const mp = new MercadoPago("{{config('services.mercadopago.key')}}");

     
        mp.checkout({
            preference: {
                id: '{{ $preference->id }}'
            },
            render: {
                container: '.cho',
                label: 'Finalizar pedido',
            }
        });


    </script>



    @endsection