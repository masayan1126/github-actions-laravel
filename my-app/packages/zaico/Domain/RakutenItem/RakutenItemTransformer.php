<?php

namespace Zaico\Domain\RakutenItem;

class RakutenItemTransformer
{
    public static function transform(RakutenItem $rakutenItem)
    {
        return [
            'name' => $rakutenItem->getName(),
        ];
    }
}
