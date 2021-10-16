<?php

namespace Zaico\Application\Stock;

use Zaico\Domain\Stock\Repository\StockRepository;
use Zaico\Domain\Stock\Stock;

class StockFindService
{
    private $stockRepository;

    public function __construct(StockRepository $stockRepository)
    {
        $this->stockRepository = $stockRepository;
    }

    public function exec($stockId): Stock
    {
        return $this->stockRepository->findById($stockId);
    }
}
