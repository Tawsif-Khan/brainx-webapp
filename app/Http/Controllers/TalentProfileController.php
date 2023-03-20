<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Talent;
use App\Models\TalentSkill;
use CV;

class TalentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::guard()->user()->id);
        if(Auth::guard()->user() != null){
            $user = User::find(Auth::guard()->user()->id);
            $categories = Category::with('skills')->get();
            
            
            return view('pages.talent.build-profile')->with('user', $user)->with('categories', $categories);
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::guard()->user()->id;
        
        

        $talent = Talent::where('user_id', $user_id)->with('skill')->first();
        if(($request->file('resume')) != null){
            $talent->resumePath = $this->uploadResume($request->file('resume'));
        }
        $talent->name = $request->name;
        $talent->country = $request->country;
        $talent->standout_job_title = $request->standout_job_title;
        $talent->experience = $request->experience;
        $talent->brief_summary = $request->bio;
        $talent->hours_per_week = $request->hours_per_week;
        $talent->hourly_rate = $request->hourly_rate;
        $talent->user_id = $user_id;
        $talent->status = "IN_REVIEW";
        $talent->save();

        $data = [];
        if(isset($request->skills)){
        foreach($request->skills as $skill){

            if(!$this->isSkillExists($talent->skill, $skill)){
                array_push($data,
                    array(
                        'talent_id' => $talent->talent_id,
                        'skill_id' => $skill
                    )
                );
            }
        }
    
        
        $skills = TalentSkill::insert($data);
    }

        return redirect()->route('talent.pending');
    }

    public function uploadResume($file)
    {
        
        $fileName = $file->getClientOriginalName().time();
        // Move uploaded file to a specific location
        $file->move(public_path('resumes'), $fileName);

        return $fileName;
    
    }

    function isSkillExists($existingSkills, $skill){
        foreach($existingSkills as $existingSkill){
            if($existingSkill->skill_id == $skill){
                return true;
            }
        }

        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        $user = User::with('talent')->find(Auth::guard()->user()->id);
        // dd($user->talent);
        return view('pages.talent.profile')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
