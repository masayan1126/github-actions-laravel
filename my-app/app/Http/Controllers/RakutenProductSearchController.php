<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakutenRws_Client;
use Zaico\Domain\RakutenItem\RakutenItem;
use Zaico\Domain\RakutenItem\RakutenItemTransformer;

class RakutenProductSearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        RakutenRws_Client $client,
        RakutenItem $rakutenItem
    ) {
        define('RAKUTEN_APPLICATION_ID', config('app.rakuten_id'));

        $client->setApplicationId(RAKUTEN_APPLICATION_ID);

        if (!empty($request->input('barcode'))) {
            $response = $client->execute('IchibaItemSearch', [
                //入力パラメーターはバーコード
                'keyword' => $request->input('barcode'),
            ]);

            if (!$response->isOk()) {
                echo 'Error:' . $response->getMessage();
            }

            $results = [];

            $rakutenItem
                ->setName($response->getData()['Items'][0]['Item']['itemName'])
                ->setUrl($response->getData()['Items'][0]['Item']['itemUrl'])
                ->setImageUrl(
                    $response->getData()['Items'][0]['Item'][
                        'mediumImageUrls'
                    ][0]['imageUrl']
                );

            $rakutenItemList = RakutenItemTransformer::transform($rakutenItem);
            return [$rakutenItemList];
        }
    }
}
