<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Models\ModelUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Zaico\Application\Auth\SocialLoginService;
use Zaico\Domain\Auth\SocialLoginDriver;

class LoginBySocialController extends Controller
{
    public function redirectToSocial(Request $request, SocialLoginService $socialLoginService)
    {
        $socialLoginDriver = new SocialLoginDriver($request->type);
        return $socialLoginService->redirectToSocial($socialLoginDriver);
    }

    public function handleSocialCallback(SocialLoginService $socialLoginService, Request $request)
    {
        // FIXME: driverの種類をgoogle固定でわたしている
        $socialLoginDriver = new SocialLoginDriver('google');
        return $socialLoginService->handleSocialCallback($socialLoginDriver);
    }
}
