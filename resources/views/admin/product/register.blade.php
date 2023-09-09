@extends('layout')
@section('content')


    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="product_image">
        <label for="">商品名</label><br>
        <input type="text" name="name"><br>
        <label for="">価格</label><br>
        <input type="text" name="price"><br>
        <label for="">カテゴリ:</label>
        <p>パスタ</p>
    
        <input type="submit" value="商品登録">
                




    </form>


@endsection