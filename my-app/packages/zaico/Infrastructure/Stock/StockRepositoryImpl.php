<?php

namespace Zaico\Infrastructure\Stock;

use App\Models\ModelStock;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Zaico\Domain\Stock\Repository\StockRepository;
use Zaico\Domain\Stock\Stock;
use Zaico\Domain\User\UserCriteria;

class StockRepositoryImpl implements StockRepository
{
    public function findById(int $id): Stock
    {
        try {
            return ModelStock::query()
                ->findOrFail($id)
                ->toDomain();
        } catch (ModelNotFoundException $e) {
            throw new RepositoryNotFoundException('Not Found stock. id=' . $id);
        }
    }

    public function findByUserId(int $userId): array
    {
        try {
            $modelStocks = ModelStock::where('user_id', '=', $userId)->get();

            return array_map(
                fn($modelStock) => $modelStock->toDomain(),
                $modelStocks->all()
            );
        } catch (ModelNotFoundException $e) {
            throw new RepositoryNotFoundException(
                'Not Found stock. id=' . $userId
            );
        }
    }

    public function save(Stock $stock): void
    {
        $modelStock = new ModelStock();
        $modelStock = $modelStock->toModel($stock);
        $modelStock->save();
    }

    public function update(Stock $stock): void
    {
        $targetStock = $this->findById($stock->getId());
        $targetStock
            // ->setId($stock->getId())
            // ->setUserId($stock->getUserId())
            ->setName($stock->getName())
            ->setImageUrl($stock->getImageUrl())
            ->setUrl($stock->getUrl())
            ->setNumber($stock->getNumber())
            ->setExpiryDate($stock->getExpiryDate());

        $modelStock = new ModelStock();
        $modelStock = $modelStock->toModel($targetStock);
        $modelStock->save();
    }

    // public function searchByCriteria(UserCriteria $userCriteria): array
    // {
    //     $query = $this->buildQuery($userCriteria);

    //     return array_map(
    //         fn($modelUser) => $modelUser->toDomain(),
    //         $query->get()->all()
    //     );
    // }

    private function buildQuery(UserCriteria $criteria): Builder
    {
        $query = ModelStock::query();

        if ($criteria->getId() !== null) {
            $query->where('id', '=', $criteria->getId());
        }

        if ($criteria->getName() !== null) {
            $query->where('name', '=', $criteria->getName());
        }

        if ($criteria->getEmail() !== null) {
            $query->where('email', '=', $criteria->getEmail());
        }

        // $query->orderBy('hoge', 'asc');

        return $query;
    }
}
