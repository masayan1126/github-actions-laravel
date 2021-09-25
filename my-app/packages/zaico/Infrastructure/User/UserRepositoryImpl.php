<?php

namespace Zaico\Infrastructure\User;

use App\Models\ModelUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Zaico\Domain\User\Repository\UserRepository;
use Zaico\Domain\User\User;
use Zaico\Domain\User\UserCriteria;

class UserRepositoryImpl implements UserRepository
{
    public function findById(int $id): User
    {
        try {
            return ModelUser::query()
                ->findOrFail($id)
                ->toDomain();
        } catch (ModelNotFoundException $e) {
            throw new RepositoryNotFoundException(
                'Not Found industry. id=' . $id
            );
        }
    }

    public function searchByCriteria(UserCriteria $userCriteria): array
    {
        $query = $this->buildQuery($userCriteria);

        return array_map(
            fn($modelUser) => $modelUser->toDomain(),
            $query->get()->all()
        );
    }

    private function buildQuery(UserCriteria $criteria): Builder
    {
        $query = ModelUser::query();

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
