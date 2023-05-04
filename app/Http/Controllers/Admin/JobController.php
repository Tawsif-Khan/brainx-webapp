<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;

class JobController extends Controller
{

    public function index(){

        $talents = User::where('role','Talent')->with('talent')->get();
        $jobs = Job::with('client')->with('talent')->get();

        
        return view('pages.admin.projects')->with('jobs', $jobs)->with('talents', $talents);
    }
    
    public function assignTalent(Request $request){

        $job = Job::where('job_id', $request->job_id)->update([
            'talent_user_id' => $request->talent_id
        ]);

        return redirect()->route("admin.projects");
        
    }
}
