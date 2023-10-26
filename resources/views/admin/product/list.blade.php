
@extends('layout')
@vite('resources/css/app.css')
    


@section('content')
<div class="wrapper">
    


    <a class="block rounded text-center bg-indigo-500 py-3 px-4 w-36 font-bold text-white my-2.5 m-auto" href="{{ route('cart.list') }}">カートへ</a>
    
        <div class="flex flex-wrap gap-y-4">
            
            @foreach($products as $product)
            <a class="flex w-45 p-7 rounded shadow-md m-auto font-bold bg-amber-200 text-center justify-center items-cneter" href="/order/detail/{{ $product->product_id }}">
                <div class="m-auto" class="shadow-md">
            
                    <img class="block m-auto w-[200px]" src="{{ asset('storage'.$product->productImage[0]->path) }}" alt="">
                    <div class="text-xl">
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="text-center">￥{{ $product->price }}円</div>
                        <div>カテゴリ:{{ $product->category }}</div>

                    </div>
                        
                </div>
            </a>
    
            @endforeach
    
    
    
        </div>


</div>


@endsection