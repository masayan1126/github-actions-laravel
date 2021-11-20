<?php

namespace Zaico\Application\Auth;

use App\Models\ModelUser;
use Zaico\Domain\Auth\SocialLoginDriver;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialLoginService
{
    public function redirectToSocial(SocialLoginDriver $socialLoginDriver)
    {
        return Socialite::driver($socialLoginDriver->driverType())
            // FIXME:ここでドライバーをパラメーターとして動的にわたす必要があるがうまくいかない
            // ->with(['state' => $socialLoginDriver->driverType()])
            ->redirect();
    }

    public function handleSocialCallback(SocialLoginDriver $socialLoginDriver)
    {
        try {
            $googleUser = Socialite::driver($socialLoginDriver->driverType())
                ->with(['access_type' => 'offline'])
                ->user();
            $userByGoogleId = ModelUser::where('google_id', $googleUser->id)->first();
            $userByGmail = ModelUser::where('email', $googleUser->email)->first();

            // google_idが一致すれば即ログイン
            if ($userByGoogleId !== null) {
                Auth::login($userByGoogleId);
                return redirect()->intended('/stocks');
            }

            // google_idが一致していなくても、emailが一致していればログイン
            if ($userByGmail !== null) {
                $userByGmail->google_id = $googleUser->id;
                $userByGmail->save();
                Auth::login($userByGmail);
                return redirect()->intended('/stocks');
            }

            // google_idもemailも一致していない場合はエラーメッセージと合わせてリダイレクト

            // $newUser = ModelUser::create([
            //     'name' => $googleUser->name,
            //     'email' => $googleUser->email,
            //     'google_id' => $googleUser->id,
            //     'password' => encrypt('123456dummy'),
            // ]);
            // dd('error');

            return redirect('/login')->with('error', '該当するアカウントが見つかりませんでした');
        } catch (Exception $e) {
            \Log::error($e);
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->getMessage());
        }
    }
}
