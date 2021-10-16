<?php

namespace App\Http\Controllers;

use App\Models\stock;
use Illuminate\Http\Request;
use Zaico\Application\Stock\StockFetchService;
use Zaico\Application\Stock\StockStoreService;
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

        $stocks = array_map(
            fn($modelStock) => StockTransformer::transform($modelStock),
            $stockFetchService->exec($userId)
        );

        // return view('stock', [
        //     'stocks' => $stocks,
        // ]);

        // dd($stocks);

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

        $stockStoreService->exec($request->all());
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
    public function edit(stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stock $stock)
    {
        //
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
