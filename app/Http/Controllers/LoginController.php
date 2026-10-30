<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use ThrottlesLogins;

    /**
     * Max login attempts before lockout.
     */
    protected $maxAttempts = 5;

    /**
     * Lockout duration in minutes.
     */
    protected $decayMinutes = 1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Check for too many failed login attempts
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $attemptLoginData = [
            'username' => $request->username,
            'password' => $request->password,
            'status_pengguna' => 1,
        ];

        if (Auth::attempt($attemptLoginData)) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);

            // Autentikasi berhasil
            return redirect()->route('home');
        }

        // Autentikasi gagal
        $this->incrementLoginAttempts($request);

        return $this->loginFailed();
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Redirect back after failed login.
     */
    protected function loginFailed()
    {
        return back()
            ->withInput()
            ->with('gagal_login', 'Username atau password salah');
    }

    /**
     * Username field name for throttling.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }
}
