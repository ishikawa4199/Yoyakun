@extends('layout')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
@endpush
@section('content')


<form action="{{ route('product.addCart') }}" method="post">
    @csrf
    
    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
    <div class="detail-container">
        <h2>{{ $product->name }}</h2>
        <p>価格:￥{{ $product->price }}円</p>
        <p>{{ $product->category }}</p>
        <label for="">数量:</label>
        <input type="number" name="quantity" value="1" min="1" max="10"><br>
        <input type="submit" value="カートに追加">
    </div>
</form>



@endsection