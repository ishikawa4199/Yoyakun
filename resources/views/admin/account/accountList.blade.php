@extends('layout')
@section('content')
<table>
    <tr>
        <th>商品名</th>
        <th>数量</th>
        <th>単価</th>
        <th>小計</th>
    </tr>


    @foreach($data as $d)
    <tr>
        <td>{{ $d['name'] }}</td>
        <td>{{ $d['quantity'] }}</td>
        <td>￥{{ $d['price'] }}</td>
        <td>￥{{ $d['itemPrice'] }}</td>
        
    </tr>
    
    @endforeach
    <td>合計</td>
        @php
            $totalPrice = number_format(array_sum(array_column($data, 'itemPrice')))
        @endphp
        <td>
            ¥{{ $totalPrice }}円
        </td>
</table>
<form action="{{ route('account.complete') }}" method="post">
    @csrf
    <input type="hidden" value="{{ $d['seat_num'] }}" name="seat_num">
    <input type="submit" value="お支払い完了">



</form>

@endsection