<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Client;
use Auth;

class AuthController extends Controller
{
    

    public function login(Request $request){

        // dd($request->email);
        $user = User::where('email', $request->email)->where('role', 'Client')->first();
        // dd($user);
        if ($user && Hash::check($request->password, $user->password)) {
            // dd($user);
            Auth::login($user);
            return redirect()->route('client.dashboard');
        }
        return redirect("/business");

    }

    public function register(Request $request){

        $user = User::create([
            'name' => $request->name,
            'role' => 'Client',
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_id' => $user->id,
            'country' => $request->country,
            'job_title' => $request->job_title,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect()->route('client.job.new');
    }   
}
