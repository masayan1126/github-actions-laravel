<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakutenRws_Client;
use Zaico\Application\RakutenProduct\RakutenProductSearchService;
use Zaico\Domain\RakutenItem\RakutenItem;

class RakutenProductSearchController extends Controller
{
    /**
     *
     * @param RakutenProductSearchService $rakutenProductSearchService
     * @param Request $request
     * @param RakutenRws_Client $client
     * @param RakutenItem $rakutenItem
     * @return array
     */
    public function index(
        RakutenProductSearchService $rakutenProductSearchService,
        Request $request,
        RakutenRws_Client $client,
        RakutenItem $rakutenItem
    ): array {
        return $rakutenProductSearchService->exec(
            $request,
            config('app.rakuten_id')
        );
    }
}
