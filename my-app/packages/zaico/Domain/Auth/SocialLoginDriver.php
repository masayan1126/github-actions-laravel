<?php

namespace Zaico\Domain\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Models\ModelUser;
use Illuminate\Support\Facades\Auth;
use Exception;

class SocialLoginDriver
{
    private string $driverType;

    public function __construct($driverType)
    {
        $this->driverType = $driverType;
    }

    /**
     * Get the value of driverType
     */
    public function driverType()
    {
        return $this->driverType;
    }
}
