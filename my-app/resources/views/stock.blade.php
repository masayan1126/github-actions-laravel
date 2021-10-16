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

                </div>

                <form method="POST" action="/stocks/edit">
                    {{ csrf_field() }}
                    <input type="hidden" name="url" value="{{ $stock["url"] }}">
                    <input type="hidden" name="name" value="{{ $stock["name"] }}">
                    <input type="hidden" name="image_url" value="{{ $stock["imageUrl"] }}">
                    <input type="submit" value="編集">
                </form>
                <form method="POST" action="/stocks/update">
                    {{ csrf_field() }}
                    <input type="hidden" name="url" value="{{ $stock["url"] }}">
                    <input type="hidden" name="name" value="{{ $stock["name"] }}">
                    <input type="hidden" name="image_url" value="{{ $stock["imageUrl"] }}">
                    <input type="submit" value="削除">
                </form>
            @endforeach
        @endisset
    </body>
</html>
