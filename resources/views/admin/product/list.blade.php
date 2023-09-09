
@extends('layout')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/productList.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
@endpush



@section('content')
<div class="wrapper">
    


    <a class="cart-link" href="{{ route('cart.list') }}">カートへ</a>
    
        <div class="container">
            
            @foreach($products as $product)
            <a class="detail-link" href="/order/detail/{{ $product->product_id }}">
                <div class="product-container">
                    
                    <img class="product-image" src="{{ asset('storage'.$product->productImage[0]->path) }}" alt="">
                    <div class="product-detail">
                        <div class="product-name">{{ $product->name }}</div>
                        <div>￥{{ $product->price }}円</div>
                        <div>カテゴリ:{{ $product->category }}</div>

                    </div>
                        
                </div>
            </a>
    
            @endforeach
    
    
    
        </div>


</div>


@endsection