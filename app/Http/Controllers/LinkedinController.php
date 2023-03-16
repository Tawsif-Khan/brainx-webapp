<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
use App\Models\User;
use App\Models\Talent;

// oauth2_access_token=AQVhDdTQbWX2ftlyGgEvf4GEmLs7F9-DQOVU7bK-zrGlhr4fEDEtKOqtl9m1frEXW5m39W96xCprnAn3y2ZT0ePJ3aKTBgGPchlJNx8YpzDw7N1uoWC6pcGVOpgFbexEHyGN30CesdxuLKQsBX5TT7vfE1JU9ce3eAJB2ak-V_UT4bupIofN1xTI9oJt8KIZ4ZeeytlY-1djcfhpebafQrSgJZxDqlYWT8fvhQw00HKB5z6HafS7ADVSlb5lVcDsvUEr-ngf0vPRYo4KxlkDjPVflqsdCYD1_wPezS0Loi1X_JV_F_Khjha01HHYChh_AHUGzsq7kMHfIKv_arNZx5KE1MqU5A
                    //    AQQTpYIT0zijLjCfg-bz7SqIiTuaLCt6ns1BtMwkCuB3lVd4HMABZmMP9oZe4L1vniVMfV0clYpr4tf-nHlsZRcFIKIkiaC4sC8mM0-RmhsmCgUWp6CTGwZOpILoOz7RE8v6aWqXcZ-hEh9n0oLPE-fvT3u-U9kTT7SlCSwEj1p0_B4iYbDAcCuSxQgP5uHYLoZjxNMeMgua_Og4WO4
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
            // dd($user->avatar);
            $linkedinUser = User::where('oauth_id', $user->id)->first();
      
            if($linkedinUser){
                
                Auth::login($linkedinUser);
                // dd($linkedinUser);
                return redirect()->route('build.profile')->with(['user'=> $linkedinUser]);
      
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
