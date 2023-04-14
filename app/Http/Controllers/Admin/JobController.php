<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{

    public function index(){

        $jobs = Job::with('client')->with('talent')->get();

        return view('pages.admin.projects')->with('jobs', $jobs);
    }
    
    public function assignTalent(Request $request){

        
    }
}
