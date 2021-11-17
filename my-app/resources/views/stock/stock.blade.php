@extends('layouts.app')

@section('content')
    @isset($stocks)
        <div id="stocks" data-stocks='{{ $stocks }}' />
    @endisset
@endsection
