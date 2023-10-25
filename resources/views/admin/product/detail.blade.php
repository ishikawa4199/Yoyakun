@extends('layout')

@push('css')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endpush
@section('content')




<section class="section-detail">
    <div class="detail-container">
        <h2>{{ $product->name }}</h2>
        <p>価格:￥{{ $product->price }}円</p>
        <p>{{ $product->category }}</p>
        <form id="submit" action="{{ route('product.addCart') }}" method="post">
            @csrf
            <input type="hidden" name="quantity" class="quantity" value="1">
            <input type="hidden" name="product_id" value="{{ $product->product_id }}">  
        </form>
        <div class="quantity-container">
            <div class="quantity-box">
                <label for="">数量:</label><span id="quantity">1</span>

            </div>
            <div class="buttons">
                <button class="btn-plus" onclick="add()">＋</button>
                <button class="btn-minus" onclick="decrease()">ー</button>
                

            </div>


        </div>
        <input type="text" id="text" class="text-input">
        <p id="ptag"></p>
        
        <button onclick="submit()" class="add-btn">カートに追加</button>
    </div>
</section>

<script src="{{ asset('js/detail.js') }}"></script>

@endsection