@extends('layouts.app')

@section('content')

<div class="container">

        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <a href="/users">ユーザー一覧</a>

            @isset($rakutenItemList)

            <a href={{ $rakutenItemList["url"] }}>
                {{ $rakutenItemList["name"] }}
                <img src="{{ $rakutenItemList["imageUrl"] }}" alt="{{ $rakutenItemList["name"] }} の画像">
            </a>

                <form method="POST" action="/stocks/store">
                    {{ csrf_field() }}
                    <input type="hidden" name="url" value="{{ $rakutenItemList["url"] }}">
                    <input type="hidden" name="name" value="{{ $rakutenItemList["name"] }}">
                    在庫数:<input type="number" name="number" value="">
                    賞味期限:<input type="date" name="expiry_date" value="">
                    <input type="hidden" name="image_url" value="{{ $rakutenItemList["imageUrl"] }}">
                    <input type="submit" value="登録">
                </form>

            @endisset

        </div>

        {{-- <script type="text/javascript" src="https://serratus.github.io/quaggaJS/examples/js/quagga.min.js"></script> --}}
        {{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}

        <script>




        </script>
</div>
@endsection
