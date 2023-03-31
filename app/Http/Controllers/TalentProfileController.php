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

    public function __construct()
    {
        // $this->middleware('auth');
    }
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
            
            if(!isset($user->talent) || $user->talent->status == "INCOMPLETE"){
            
            return view('pages.talent.build-profile')->with('user', $user)->with('categories', $categories);
            }else{
                return view('pages.talent.pending-profile')->with('user', $user)->with('categories', $categories);
            
            }
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
        
        // $this->convertToHTML();

        $talent = Talent::where('user_id', $user_id)->with('skill')->first();
        // dd($request->resume->extension());
        // if($request->resume != null){
        //     $talent->resumePath = $this->uploadResume($request->resume);
        //     $talent->resumeData = $this->getResumeData($talent->resumePath);
        // }
        $talent->name = $request->name;
        $talent->country = $request->country;
        $talent->standout_job_title = $request->standout_job_title;
        $talent->experience = $request->experience;
        $talent->brief_summary = $request->bio;
        $talent->hours_per_week = $request->hours_per_week;
        $talent->hourly_rate = $request->hourly_rate;
        $talent->user_id = $user_id;
        $talent->linkedin = $request->linkedin_url;
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
        
        $fileName = Auth::guard()->user()->id.time().'.'.$file->extension();
        // Move uploaded file to a specific location
        $file->move(public_path('resumes'), $fileName);

        return $fileName;
    
    }

    public function getResumeData($fileName){
        // Set the path to the PDF file
        // $pdfFilePath = '/Users/tawsifkhan/Projects/BrainX/laravel-multi-auth/public/resumes/'.$fileName;
        $pdfFilePath = __DIR__.'/../../../public/resumes/'.$fileName;
        // dd($pdfFilePath);
        $command = escapeshellcmd("pdftotext $pdfFilePath -");
        // Convert the PDF to text using pdftotext
        $text = shell_exec($command);
        
        // // Convert the text to an array
        $data = explode("\n", $text);

        // // Convert the array to JSON
        $json = json_encode($data);
        // dd(json_decode($json));
        // // Output the JSON
        return $json;
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
    public function show($id)
    {   
        // $this->extractResume();
        // return;
        $id = decrypt($id);
        $title = ['Experience','Education'];

        $user = User::with('talent')->find($id);

        // $resume = json_decode($user->talent->resumeData);

        // // dd($resume);
        // $read = false;
        // $running = '';
        // $data = [];
        // $blank = 0;                
        // $ignore = false;

        // foreach($resume as $line){
        //     $line = trim($line, "\f");
        //     if($read && !in_array($line, $title) && !str_contains($line, 'Page') && !empty($line)){
                
        //         array_push($data[$running],$line); 
        //     }
        //     if($read && empty($line) ){
        //         $blank++;
        //         if($blank %2==0)
        //             array_push($data[$running],$line); 
        //     }
        //     if(in_array($line, $title)){
        //         $read = true;
        //         $running = $line;
        //         $data[$running] = [];
        //     }

        //     if(!str_contains($line, 'Page')){
        //         $ignore = true;
        //     }else{
        //         $ignore = false;
        //     }
            
        // }
        // dd($data);

        
        return view('pages.talent.profile')->with('user', $user);
    }

    public function extractResume(){
        // Init
$resumeParser = new \LinkedInResumeParser\Parser();
$parsedResume = $resumeParser->parse(__DIR__.'/../../../public/resumes/21680031331.pdf');
 
// Get Name
echo $parsedResume->getName();
 
// Get Email
echo $parsedResume->getEmail();
 
// Get LinkedIn Profile URL
echo $parsedResume->getUrl();
 
// Get Summary
echo $parsedResume->getSummary();
 
// Get Work Experiences
$experiences = $parsedResume->getExperiences();
if (count($experiences) > 0) {
    foreach ($experiences as $experience) {
        echo $experience->getTitle() . ' at ' . $experience->getOrganisation() . ' (' . date_format($experience->getStart(), 'F Y') . ' - ' . date_format($experience->getEnd(), 'F Y') . ')';
    }
}
 
// Get Education
$education = $parsedResume->getEducation();
if (count($education) > 0) {
    foreach ($education as $edu) {
        echo $edu->getLevel() . ', ' . $edu->getCourseTitle() . ' at ' . $edu->getInstitution() . ' (' . date_format($edu->getStart(), 'Y') . ' - ' . date_format($edu->getEnd(), 'Y') . ')';
    }
}
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

    public function showPendingPage(){

    $user = Auth::guard()->user();
    return view('pages.talent.pending-profile')->with('user', $user);
    }
}
