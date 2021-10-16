<?php

namespace Zaico\Domain\Stock;

class StockTransformer
{
    public static function transform(Stock $stock)
    {
        return [
            'id' => $stock->getId(),
            'name' => $stock->getName(),
            'url' => $stock->getUrl(),
            'imageUrl' => $stock->getImageUrl(),
        ];
    }
}
