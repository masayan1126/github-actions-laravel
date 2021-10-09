<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            /* #interactive.viewport {
                height: 1000px;
                width: 1000px;
                border: 2px;
                border-color: blueviolet;
            } */

        </style>
    </head>
    <body class="antialiased">
        <div id="interactive" class="viewport"></div>
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

            {{-- <a href="/users">ユーザー一覧</a> --}}

            <form method="GET" action="/products/search">
                {{ csrf_field() }}
                  <input id="code" type="text" value="" name="code">
                  <input type="submit" class="btn btn-primary" value="送信">
            </form>

            @isset($rakutenItem)
                <form method="GET" action="/stocks/store">
                    <a href="{{ $rakutenItem->getUrl() }}">
                        <img src="{{ $rakutenItem->getImageUrl() }}" alt="商品画像">
                        {{ $rakutenItem->getName() }}
                    </a>
                    <input type="hidden" name="rakutenItemUrl" value="{{ $rakutenItem->getUrl() }}">
                    <input type="hidden" name="name" value="{{ $rakutenItem->getName() }}">
                    <input type="hidden" name="rakutenItemImageUrl" value="{{ $rakutenItem->getImageUrl() }}">
                    <input type="submit" value="登録">
                </form>
            @endisset

        </div>

        <script type="text/javascript" src="https://serratus.github.io/quaggaJS/examples/js/quagga.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script>
            // const fetchProducts = async (code) => {
            //     await axios.get("/search", {
            //         params:{ "code" :code }
            //     })
            //     .then(res => console.log(res))
            //     .catch(err => console.error(err));
            // }

            Quagga.init({
                inputStream: { type : 'LiveStream' },
                decoder: {
                    readers: [{
                        format: 'ean_reader',
                        config: {},
                        multiple: false,
                    }]
                }
            }, (err) => {

                if(!err) {

                    Quagga.start();

                }

            });

            Quagga.onDetected((result) => {

                const code = result.codeResult.code;
                // fetchProducts(code);
                document.getElementById("code").value= code;
            });

        </script>
    </body>
</html>
