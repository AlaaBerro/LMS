<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Pdf;
class CoursesController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function index()
    {
        return view('course.index')
        ->with(['courses'=>Course::get(),'users'=>User::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eid = Auth::user()->id;
        $request->validate([
            'name'=>'required',
            'title'=>'required',
            'description'=>'required'
        ]);
        $course = Course::create([
            'name'=>$request->input('name'),
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'editor_id'=>$eid
        ]);
        Enrollment::create([
            'user_id' => $eid ,
            'course_id' => $course->id ,
            'status' => 2
        ]);
        return redirect('/course');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uid = Auth::user()->id;
        $enroll = Enrollment::where('course_id',$id)->where('user_id', $uid)->get()->first() ;

        if (!is_null($enroll)){

            /*if($enroll->status == 0) {
                $buttonVisible = true ;
            } */
            $buttonVisible = false;

            return view('course.show')->with(['course'=>Course::where('id',$id)->first(),'pdfs'=>Pdf::get(),'enrolls'=>$enroll,'buttonVisible' => $buttonVisible]); 
        } 
        else {
            $buttonVisible = true;
            return view('course.show')->with(['course'=>Course::where('id',$id)->first(),'pdfs'=>Pdf::get(),'buttonVisible' => $buttonVisible]); 
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
        return view('course.edit')->with(['course'=>Course::where('id',$id)->first(),'pdfs'=>Pdf::get()]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cid)
    {
        $id = Auth::user()->id;
        $request->validate([
            'name' => 'required' ,
            'title' => 'required' ,
            'description' => 'required'
        ]) ;
 
        Course::where('id',$cid)
        ->update([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'editor_id' => $id 
        ]);
        return redirect('/course/' . $cid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cid)
    {
        Course::where('id',$cid)
        ->delete();
        return redirect('/course');
    }
}
