<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body class="antialiased">

       <h4>在庫一覧</h4>

        @isset($stocks)
            @foreach ($stocks as $stock)
                <div class="d-flex">
                    <a href={{ $stock["url"] }}>
                        <img src="{{ $stock["imageUrl"] }}" alt="{{ $stock["name"] }} の画像">
                        {{ $stock["name"] }}
                    </a>
                    <p>在庫数：{{ $stock["number"] }}</p>
                    <p>賞味期限：{{ $stock["expiryDate"] }}</p>

                </div>

                <form method="GET" action="/stocks/edit/{{ $stock["id"] }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $stock["id"] }}">
                    <input type="submit" value="編集">
                </form>
                <form method="POST" action="/stocks/delete/{{ $stock["id"] }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $stock["id"] }}">
                    <input type="submit" value="削除">
                </form>
            @endforeach
        @endisset
    </body>
</html>
