@extends('layout')

@section('content')
<form action="{{ route('setting.store') }}" method="post">
    @csrf
    <h3>ご利用人数を入力してください。</h3>
    <input type="text" name="person_count">
    <h3>テーブル番号を入力してください。</h3>
    <input type="text" name="seat_num">
    <input type="submit" name="btn" value="決定">
</form>

@endsection