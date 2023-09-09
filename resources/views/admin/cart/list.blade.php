@extends('layout')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/cartList.css') }}">
@endpush

@section('content')
    <div class="buttons">
        <a href="">商品を選ぶ</a>


    </div>
    <table>
        <tr>
            <th>商品名</th>
            <th>単価</th>
            <th>数量</th>
            <th>小計</th>
            <th></th>
        </tr>
    @foreach($cartData as $index => $data)
        <tr>
            <td>{{ $data['name'] }}</td>
            <td class="price">￥{{ $data['price'] }}</td>
            <td class="quantity">{{ $data['quantity'] }}</td>
            <td class="itemPrice">￥{{ $data['itemPrice'] }}</td>
            <td>
                <a href="/order/cart/remove/{{ $index }}">削除</a>
            </td>
        </tr>
    @endforeach
    <tr>
        <td>合計</td>
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
        <input type="submit" value="注文を確定する" class="submit-btn">

    


    </form>


@endsection