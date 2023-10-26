@extends('layout')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/cartList.css') }}">
@endpush
@vite('resources/css/app.css')
@section('content')
    <div class="buttons">
        <a href="{{ route('product.list') }}" class="block m-auto bg-orange-500 w-36 text-center rounded shadow-md px-4 py-5 my-5 font-bold text-white hover:bg-sky-700">商品を選ぶ</a>


    </div>
    <table class="w-1/2 bg-green-400 m-auto">
        <tr class="h-10">
            <th>商品名</th>
            <th>単価</th>
            <th>数量</th>
            <th>小計</th>
            <th></th>
        </tr>
    @foreach($cartData as $index => $data)
        <tr class="text-lg border-collapse border h-16">
            <td class="text-center">{{ $data['name'] }}</td>
            <td class="text-center">￥{{ $data['price'] }}</td>
            <td class="text-center">{{ $data['quantity'] }}</td>
            <td class="text-center">￥{{ $data['itemPrice'] }}</td>
            <td>
                <a href="/order/cart/remove/{{ $index }}" class="m-auto font-bold text-white text-center w-13 bg-red-400 rounded py-2 px-4">削除</a>
            </td>
        </tr>
    @endforeach
    <tr class="h-8">
        <td class="text-right">合計</td>
                @php
                    $totalPrice = number_format(array_sum(array_column($cartData, 'itemPrice')))
                @endphp
                    <td>
                        ¥{{ $totalPrice }}円
                    </td>

    </tr>
    </table>

    <form action="{{ route('order.store') }}" method="post">
        @csrf
        <input type="submit" value="注文を確定する" class="block text-center m-auto bg-orange-400 rounded py-4 font-bold  w-40 text-white mt-4">

    


    </form>


@endsection