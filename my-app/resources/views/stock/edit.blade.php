@extends('layouts.app')

@section('content')
    @isset($stock)
        <div id="stock-edit" data-stock_edit='{{ $stock }}' />
    @endisset
@endsection
