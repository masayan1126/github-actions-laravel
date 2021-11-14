<?php

namespace Zaico\Domain\Stock\Repository;

use Zaico\Domain\Stock\Stock;

interface StockRepository
{
    public function findById(int $id): Stock;

    public function findByUserId(int $userId): array;

    // public function searchByCriteria(UserCriteria $userCriteria): array;

    public function save(Stock $stock): void;

    public function update(Stock $stock): void;
}
