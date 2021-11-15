<?php

namespace Zaico\Application\RakutenProduct;

use Illuminate\Http\Request;
use RakutenRws_Client;
use Zaico\Domain\RakutenItem\RakutenItem;
use Zaico\Domain\RakutenItem\RakutenItemTransformer;

class RakutenProductSearchService
{
    private RakutenRws_Client $client;
    private RakutenItem $rakutenItem;

    public function __construct(
        RakutenRws_Client $client,
        RakutenItem $rakutenItem
    ) {
        $this->client = $client;
        $this->rakutenItem = $rakutenItem;
    }

    public function exec(Request $request, mixed $rakutenAppId): array
    {
        $this->client->setApplicationId($rakutenAppId);
        $responseData = $this->search($request->input('barcode'));
        $this->toRakutenItemDomain($responseData);

        return array_map(
            fn($rakutenItem) => RakutenItemTransformer::transform($rakutenItem),
            [$this->rakutenItem]
        );
    }

    private function search(string $barcode): mixed
    {
        if (!empty($barcode)) {
            $response = $this->client->execute('IchibaItemSearch', [
                'keyword' => $barcode,
            ]);

            if (!$response->isOk()) {
                echo 'Error:' . $response->getMessage();
            }

            return $response->getData();
        }
    }
    private function toRakutenItemDomain(mixed $responseData): void
    {
        $this->rakutenItem
            ->setName($responseData['Items'][0]['Item']['itemName'])
            ->setUrl($responseData['Items'][0]['Item']['itemUrl'])
            ->setImageUrl(
                $responseData['Items'][0]['Item']['mediumImageUrls'][0][
                    'imageUrl'
                ]
            );
    }
}
