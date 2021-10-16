<?php

namespace Zaico\Domain\RakutenItem;

// 楽天ドメインオブジェクトを配列に変換する
class RakutenItemTransformer
{
    public static function transform(RakutenItem $rakutenItem)
    {
        return [
            'name' => $rakutenItem->getName(),
            'url' => $rakutenItem->getUrl(),
            'imageUrl' => $rakutenItem->getImageUrl(),
        ];
    }
}
