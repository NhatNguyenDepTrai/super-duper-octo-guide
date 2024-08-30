<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    public function showRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Hiển thị form nhập mật khẩu mới
    public function showResetForm(Request $request)
    {
        return view('auth.passwords.reset')->with([
            'token' => $request->token,
            'email' => $request->email
        ]);
    }

    // Xử lý việc gửi email yêu cầu đặt lại mật khẩu
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = Password::sendResetLink($request->only('email'));

        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', __($response))
            : back()->withErrors(['email' => __($response)]);
    }

    // Xử lý việc đặt lại mật khẩu
    public function reset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $response = Password::reset([
            'email' => $request->email,
            'password' => $request->password,
            'token' => $request->token,
        ], function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        return $response == Password::PASSWORD_RESET
            ? redirect('user/login')->with('status', __($response))
            : back()->withErrors(['email' => __($response)]);
    }

}
