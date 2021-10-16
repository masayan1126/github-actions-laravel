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

       <h4>在庫編集</h4>

        @isset($stock)
            <form method="POST" action="/stocks/update/{{ $stock["id"] }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $stock["id"] }}">
                商品名：<input type="text" name="name" value="{{ $stock["name"] }}">
                在庫数：<input type="number" name="number" value="{{ $stock["number"] }}">
                賞味期限<input type="date" name="expiry_date" value="{{ $stock["expiryDate"] }}">
                <input type="submit" value="確定">
            </form>
        @endisset
    </body>
</html>
