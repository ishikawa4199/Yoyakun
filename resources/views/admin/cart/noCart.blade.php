@extends('layout')
@push('css')

    <link rel="stylesheet" href="{{ asset('css/noCart.css') }}">

    
@endpush
@section('content')
<div class="main">
    <div class="cart-info">
        <h2>カートに商品はありません。</h1>
        <a href="{{ route('product.list') }}" class="btn">商品一覧へ戻る</a>

    </div>    

</div>

@endsection