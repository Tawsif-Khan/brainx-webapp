<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Message;
use App\Models\Action;
use Auth;

class JobController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
        $this->checkRole('Client');
    }
    
    public function jobsPage(){
        
        return view('pages.client.pages.dashboard');
    }

    public function create(){
        $jobs = Job::where('client_id', Auth::guard()->user()->id)->orderBy('job_id','DESC')->get();
        return view('pages.client.pages.post-new-request')->with('jobs', $jobs);
    }

    public function jobDetails($id){
        if($id != null){
            $job = Job::with('actions')->find($id);
        }
        $jobs = Job::where('client_id', Auth::guard()->user()->id)->orderBy('job_id','DESC')->get();
        // dd($jobs);
        $actions = Action::where('job_id', $jobs[0]->job_id)->with('message')->with('sender')->get();
        // dd($actions);
        return view('pages.client.pages.job-details')->with('job', $jobs[0])->with('jobs', $jobs)->with('actions', $actions);
    }

    public function jobDetail(){
        
        $jobs = Job::where('client_id', Auth::guard()->user()->id)->orderBy('job_id','DESC')->get();
        if(sizeof($jobs)){
            $actions = Action::where('job_id', $jobs[0]->job_id)->with('message')->with('sender')->get();
            // dd($actions);
        }else{
            return redirect()->route('client.job.new');
        }
        return view('pages.client.pages.job-details')->with('job', $jobs[0])->with('jobs', $jobs)->with('actions', $actions);
    }

    public function store(Request $request){

        $job = Job::create([
            'job_title' => $request->job_title,
            'job_description' => $request->job_description,
            'job_type' => $request->job_type,
            'duration_in_weeks' => $request->duration_in_weeks,
            'hours_per_week' => $request->hours_per_week,
            'budget' => $request->budget,
            'hourly_rate_from' => $request->hourly_rate_from,
            'hourly_rate_to' => $request->hourly_rate_to,
            'client_id' => Auth::guard()->user()->id,
        ]);

        $action = Action::create([
            'job_id' => $job->job_id,
            'sender_id' => NULL, // sender id 0 means it is auto generated or sent by admin
            'action_type' => 'MESSAGE_WITH_MY_REQUEST',
            'receiver_id' => Auth::guard()->user()->id, // receiver 
        ]);

        $message = Message::create([
            'action_id' => $action->id,
            'message' => 'Our AI expert will review your request and match you to a suitable AI talent. You will be notified via email when we find one for you. Thank for your request!',
            'sender_id' => NULL,
            'receiver_id' => Auth::guard()->user()->id, // receiver
        ]);

        return redirect()->route('client.job.details',['id' => $job->job_id]);

    }
}
