@extends('layout')


@section('content')

    <section class="section-order-list">

        <div class="order-list-container">
            <div class="order-list">
                <h2>商品名</h2>
                <h3>シート番号:</h3>
                <h3>伝票番号:</h3>
                <a href="">レシピを見る</a>
            </div>
        </div>
    </section>








<script src="{{ asset('./js/orderList.js') }}"></script>
@endsection