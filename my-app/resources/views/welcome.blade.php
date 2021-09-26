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

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                    </div>
                </div>
            </div>
            <a href="/users">ユーザー一覧</a>
        </div>

        <script type="text/javascript" src="https://serratus.github.io/quaggaJS/examples/js/quagga.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script>

            var rakutenAPiurl = "https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?format=json";
            var applicationId=1087782710441504749;

            var fetchProduct = async (code) => {
                await axios.get("https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?format=json&keyword=45166228&applicationId=1087782710441504749")
                .then(res => console.log(res))
                .catch(err => console.error(err));
            }

            Quagga.init({
        inputStream: { type : 'LiveStream' },
        decoder: {
            readers: [{
                format: 'upc_e_reader',
                config: {}
            }]
        }
    }, (err) => {

        if(!err) {

            Quagga.start();

        }

    });

    Quagga.onDetected((result) => {

        var code = result.codeResult.code;
        // ここでAjaxを通して配送完了処理をする
        fetchProduct(code);

        // axios.post('http://localhost:8500/search', code)
        //   .then(res =>  {
        //     console.log(res.data);
        // }).catch( error => { console.log(error); });
    });

        </script>



    </body>
</html>
