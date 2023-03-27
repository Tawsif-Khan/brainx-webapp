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
            
            if($user->talent->status == "INCOMPLETE"){
            
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
        if($request->resume != null){
            $talent->resumePath = $this->uploadResume($request->resume);
            $talent->resumeData = $this->getResumeData($talent->resumePath);
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
        $command = escapeshellcmd("pdftohtml $pdfFilePath -");
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

    function convertToHTML(){
        $this->getResumeData('11679853700.pdf');
        return;
        // Parse the PDF content using Poppler
$pdfFile = __DIR__.'/../../../public/resumes/11679853700.pdf';
$pdf = new \Poppler\Poppler();
$pages = $pdf->render($pdfFile);

// Convert the PDF content to HTML using Dompdf
$html = '';
foreach ($pages as $page) {
    $text = $page->getText();
    $html .= "<p>$text</p>";
}
$dompdf = new \Dompdf\Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Save the HTML output to a file or output it to the browser
$htmlOutput = $dompdf->output();
dd($htmlOutput);

file_put_contents('output.html', $htmlOutput);
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
        
        $title = ['Top Skills','Languages','Honors-Awards',''];

        $user = User::with('talent')->find(Auth::guard()->user()->id);
        
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

    public function showPendingPage(){

    $user = Auth::guard()->user();
    return view('pages.talent.pending-profile')->with('user', $user);
    }
}
