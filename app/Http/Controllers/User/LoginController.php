<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('pages.user.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard-admin');
            } elseif ($user->role == 'user') {
                if($user->answers->count()){
                    $request->session()->regenerate();
                    return redirect()->intended(route('test-user'));
                }else{
                    $request->session()->regenerate();
                    return redirect()->intended(route('test-user.before'));
                }
            }

            return redirect('/');
        }

        return back()->with('loginError', 'Login gagal');
    }



    
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
