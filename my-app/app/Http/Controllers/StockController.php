<?php

namespace App\Http\Controllers;

use App\Models\ModelStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Zaico\Application\Stock\StockFetchService;
use Zaico\Application\Stock\StockFindService;
use Zaico\Application\Stock\StockStoreService;
use Zaico\Application\Stock\StockUpdateService;
use Zaico\Domain\Date\Date;
use Zaico\Domain\Stock\Stock;
use Zaico\Domain\Stock\StockTransformer;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StockFetchService $stockFetchService)
    {
        //

        $stocks = json_encode(
            array_map(
                fn($modelStock) => StockTransformer::transform($modelStock),
                $stockFetchService->exec(Auth::id())
            )
        );

        $rakutenItemList = [];

        // dd($stocks);

        // return view('stock', [
        //     'stocks' => $stocks,
        // ]);

        return view('stock.stock', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param StockStoreService $stockStoreService
     * @return void
     */
    public function store(
        Request $request,
        StockStoreService $stockStoreService,
        Stock $stock
    ) {
        $data = json_decode($request->data);
        $stock
            ->setUserId(Auth::id())
            ->setName($data[0]->name)
            ->setImageUrl($data[0]->imageUrl)
            ->setUrl($data[0]->url)
            ->setNumber(1);

        // dd($stock);

        $stockStoreService->exec($stock);

        $stocks = json_encode(StockTransformer::transform($stock));

        // return view('stock', compact('stocks'));
        return redirect('/stocks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id, StockFindService $stockFindService)
    {
        // stockIdを受け取り、編集画面とともに返す
        $stock = json_encode(
            StockTransformer::transform($stockFindService->exec($id))
        );
        return view('stock.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
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

        // dd($stock);
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
