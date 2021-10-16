<?php

namespace Zaico\Application\Stock;

use Zaico\Domain\Stock\Repository\StockRepository;

class StockUpdateService
{
    private $stockRepository;

    public function __construct(StockRepository $stockRepository)
    {
        $this->stockRepository = $stockRepository;
    }

    public function exec($data)
    {
        $this->stockRepository->update($data);
    }
}
