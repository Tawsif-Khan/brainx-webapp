<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{

    
    public function __construct(){

        // $this->middleware('auth');
        // $this->checkRole('Admin');
    }

    public function index(){
        // dd('here');
        $jobs = Job::with('client')->with('talent')->orderBy('job_id','DESC')->get();
        // dd($jobs);
        return view('pages.admin.projects')->with('jobs', $jobs);
    }
    
    public function assignTalent(Request $request){

        
    }
}
