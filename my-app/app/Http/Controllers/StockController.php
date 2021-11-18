<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Zaico\Application\Stock\StockFetchService;
use Zaico\Application\Stock\StockFindService;
use Zaico\Application\Stock\StockStoreService;
use Zaico\Application\Stock\StockUpdateService;
use Zaico\Domain\Stock\Stock;
use Zaico\Domain\Stock\StockTransformer;

class StockController extends Controller
{
    /**
     * ログインユーザーの在庫一覧と在庫一覧のviewを返します
     *
     * @param StockFetchService $stockFetchService
     * @return void
     */
    public function index(StockFetchService $stockFetchService)
    {
        $stocks = json_encode(
            array_map(
                fn($modelStock) => StockTransformer::transform($modelStock),
                $stockFetchService->exec(Auth::id())
            )
        );

        return view('stock.stock', compact('stocks'));
    }

    /**
     * 在庫の新規追加
     *
     * @param Request $request
     * @param Stock $stock
     * @param StockStoreService $stockStoreService
     * @return void
     */
    public function store(
        Request $request,
        Stock $stock,
        StockStoreService $stockStoreService
    ) {
        $data = json_decode($request->data);
        $stock
            ->setUserId(Auth::id())
            ->setName($data[0]->name)
            ->setImageUrl($data[0]->imageUrl)
            ->setUrl($data[0]->url)
            ->setNumber(1);

        $stockStoreService->exec($stock);
        return redirect('/stocks');
    }

    public function show(stock $stock)
    {
        //
    }

    /**
     * 在庫の編集画面表示
     *
     * @param integer $id
     * @param StockFindService $stockFindService
     * @return void
     */
    public function edit(int $id, StockFindService $stockFindService)
    {
        $stock = json_encode(
            StockTransformer::transform($stockFindService->exec($id))
        );
        return view('stock.edit', compact('stock'));
    }

    /**
     * 在庫の更新
     *
     * @param integer $id
     * @param Request $request
     * @param StockUpdateService $stockUpdateService
     * @param Stock $stock
     * @return void
     */
    public function update(
        int $id,
        Request $request,
        StockUpdateService $stockUpdateService,
        Stock $stock
    ) {
        $stock
            ->setId($id)
            ->setUserId(Auth::id())
            ->setName($request->productName)
            ->setImageUrl($request->productImageUrl)
            ->setUrl($request->productUrl)
            ->setExpiryDate($request->expiryDate)
            ->setNumber($request->number);

        $stockUpdateService->exec($stock);

        return redirect('/stocks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(stock $stock)
    {
        //
    }
}
