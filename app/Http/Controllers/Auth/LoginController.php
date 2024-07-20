<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use \Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    //username login
    public function username()
    {
        return 'username';
    }
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function credentials(Request $request)
    {
        
        return [
            'username' => $request->username,
            'password' => $request->password,
            'active' => 1,
        ];
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'username' => ['Sorry, this username is not found or not allowed to login to the Dashboard.'],
            'password' => ['Password is incorrect. Please try again.'],
            'active' => [trans('Your account is not active.')],
        ]);
    }

    //logout 
    public function logout(Request $request)
    {
        $this->guard()->logout();
    
        $request->session()->invalidate();
    
        return redirect('/login'); // Redirect to your desired page after logout
    }


}
