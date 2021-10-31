@extends('layouts.app')

@section('content')
    @isset($stocks)
    <div id="stock" data-stocks='{{ $stocks }}' >
        @isset($rakutenItemList)
            <div id="rakuten-item-list" data-rakutenItemList='{{ $rakutenItemList }}'>

            </div>
        @endisset
    </div>
    @endisset
@endsection
