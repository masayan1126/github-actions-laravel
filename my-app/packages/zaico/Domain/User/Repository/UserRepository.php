<?php

namespace Zaico\Domain\User\Repository;

use Zaico\Domain\User\User;
use Zaico\Domain\User\UserCriteria;

interface UserRepository
{
    public function findById(int $id): User;

    public function searchByCriteria(UserCriteria $userCriteria): array;
}
