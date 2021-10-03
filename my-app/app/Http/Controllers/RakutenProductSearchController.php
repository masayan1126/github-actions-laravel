<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakutenRws_Client;
use Zaico\Domain\RakutenItem\RakutenItem;

class RakutenProductSearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, RakutenItem $rakutenItem)
    {
        //楽天APIインスタンス
        $client = new RakutenRws_Client();

        define('RAKUTEN_APPLICATION_ID', config('app.rakuten_id'));
        define('RAKUTEN_APPLICATION_SEACRET', config('app.rakuten_key'));

        $client->setApplicationId(RAKUTEN_APPLICATION_ID);
        $code = $request->input('code');

        if (!empty($code)) {
            $response = $client->execute('IchibaItemSearch', [
                //入力パラメーターはバーコード
                'keyword' => $code,
            ]);

            if (!$response->isOk()) {
                echo 'Error:' . $response->getMessage();
            }

            $results = [];

            // TODO: 変換用のクラスを作ってきれいにする
            foreach ($response->getData()['Items'] as $item) {
                // コントローラのメソッドインジェクションしているのでRakutenItemをnewせず使用できる
                $rakutenItem
                    ->setName($item['Item']['itemName'])
                    ->setUrl($item['Item']['itemUrl'])
                    ->setImageUrl(
                        $item['Item']['mediumImageUrls'][0]['imageUrl']
                    );

                array_push($results, $rakutenItem);
            }

            $rakutenItem = array_shift($results);

            // TODO: APIドキュメントを読み込んで、もう少しきれいにデータを取得する(http://webservice.rakuten.co.jp/sdkapi/php/)
            return view('welcome', compact('rakutenItem'));
        }
    }
}
