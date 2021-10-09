<?php

namespace Zaico\Domain\Stock\Repository;

use Zaico\Domain\Stock\Stock;

interface StockRepository
{
    // public function findById(int $id): Stock;

    // public function searchByCriteria(UserCriteria $userCriteria): array;

    public function save($data): void;
}
