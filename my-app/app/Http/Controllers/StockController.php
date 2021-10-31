<?php

namespace App\Http\Controllers;

use App\Models\stock;
use Illuminate\Http\Request;
use Zaico\Application\Stock\StockFetchService;
use Zaico\Application\Stock\StockFindService;
use Zaico\Application\Stock\StockStoreService;
use Zaico\Application\Stock\StockUpdateService;
use Zaico\Domain\Date\Date;
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
        $userId = 1;

        $stocks = json_encode(
            array_map(
                fn($modelStock) => StockTransformer::transform($modelStock),
                $stockFetchService->exec($userId)
            )
        );

        $rakutenItemList = [];

        // dd($stocks);

        // return view('stock', [
        //     'stocks' => $stocks,
        // ]);

        return view('stock', compact('stocks'));
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
        StockStoreService $stockStoreService
    ) {
        $request->merge(['user_id' => 1]);
        // $request->merge(['expiry_date' => new Date($request->expiry_date)]);

        $stocks = $stockStoreService->exec($request->all());
        return view('stock', compact('stocks'));
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
    public function edit(Request $request, StockFindService $stockFindService)
    {
        // stockIdを受け取り、編集画面とともに返す

        $stock = StockTransformer::transform(
            $stockFindService->exec($request->id)
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
        Request $request,
        StockUpdateService $stockUpdateService
    ) {
        //

        // dd($request->all());

        $stockUpdateService->exec($request->all());

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
