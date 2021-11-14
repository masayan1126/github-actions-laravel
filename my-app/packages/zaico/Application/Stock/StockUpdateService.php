<?php

namespace Zaico\Application\Stock;

use Zaico\Domain\Stock\Repository\StockRepository;
use Zaico\Domain\Stock\Stock;

class StockUpdateService
{
    private $stockRepository;

    public function __construct(StockRepository $stockRepository)
    {
        $this->stockRepository = $stockRepository;
    }

    public function exec(Stock $stock)
    {
        $this->stockRepository->update($stock);
    }
}
