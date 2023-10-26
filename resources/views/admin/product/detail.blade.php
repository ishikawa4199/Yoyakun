@extends('layout')
@vite('resources/css/app.css')

@section('content')




<section class="my-3">
    <div class="detail-container">
        <h2 class="font-bold text-center text-3xl">{{ $product->name }}</h2>
        <p class="font-bold text-center text-3xl">価格:￥{{ $product->price }}円</p>
        <p class="text-center font-bold text-2xl">カテゴリ：{{ $product->category }}</p>
        <form id="submit" action="{{ route('product.addCart') }}" method="post">
            @csrf
            <input type="hidden" name="quantity" class="quantity" value="1">
            <input type="hidden" name="product_id" value="{{ $product->product_id }}">  
        </form>
        <div class="quantity-container">
            <div class="w-max m-auto">
                <label class="text-center font-bold" for="">数量:<span id="quantity">1</span></label>
            </div>
            <div class="flex gap-2 m-auto w-max my-2">
                <button class="block items-center bg-indigo-300 w-12 text-center font-bold rounded py-3 px-3" onclick="add()">＋</button>
                <button class="block items-center bg-indigo-300 w-12 text-center font-bold rounded py-3 px-3" onclick="decrease()">ー</button>
            </div>


</div>
        
        <button onclick="submit()" class="block w-36 text-bold rounded px-3 py-3 bg-orange-400 m-auto my-4 text-white">カートに追加</button>
    </div>
</section>

<script src="{{ asset('js/detail.js') }}"></script>

@endsection