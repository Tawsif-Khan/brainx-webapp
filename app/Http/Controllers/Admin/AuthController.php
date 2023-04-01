<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class AuthController extends Controller
{

    public function index(){
        return view('pages.admin.auth.login');
    }
    
    public function login(Request $request){

        // dd($request->email);
        $user = User::where('email', $request->email)->where('role', 'Admin')->first();
        // dd($request);
        if (Hash::check($request->password, $user->password)) {
            // dd($user);
            Auth::login($user);
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route("admin.login.form");

    }

}
