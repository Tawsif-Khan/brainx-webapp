<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
use App\Models\User;
use App\Models\Talent;


class LinkedinController extends Controller
{
    public function linkedinRedirect()
    {
        return Socialite::driver('linkedin')->redirect();
    }
       
    public function linkedinCallback()
    {
        try {
            
            $user = Socialite::driver('linkedin')->user();
            // dd($user);
            $linkedinUser = User::where('oauth_id', $user->id)->first();
      
            if($linkedinUser){
                
                Auth::login($linkedinUser);
                $talent = Talent::where('user_id',$linkedinUser->id)->first();
                // dd($talent);
                if($talent->status == "INCOMPLETE"){
                    return redirect()->route('build.profile')->with(['user'=> $linkedinUser]);
                }else{
                    return redirect()->route('talent.pending')->with(['user'=> $linkedinUser]);
                    
                }
      
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' => 'linkedin',
                    'password' => encrypt('admin12345'),
                    'role' => 'Talent'
                ]);
                $talent = Talent::create([
                    'photo' => $user->avatar,
                    'user_id' => $newUser->id
                ]);
                Auth::login($newUser);
      
                return redirect('/build-profile')->with(['user'=> $newUser]);
            }
     
        } catch (Exception $e) {
            dd($e);
        }
    }
}
