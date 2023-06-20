<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Pdf;
class EnrollmentsController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    public function index()
    {
        return redirect()->route('/course');
    }

    
    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        $id = Auth::user()->id;  
        $cid = $request->input('st');
        Enrollment::create([
            'user_id' => $id ,
            'course_id' => $cid,
            'status' => 1
        ]);
        return redirect('/course');
    }

    
    public function show($id)
    {
        $enroll = Enrollment::where('course_id',$id)->get() ;
        return view('enrollments.show')->with(['request'=>$enroll]) ;
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $cid = session()->get('my_data');

        Enrollment::where('id',$id)
        ->update([
            'status' =>  intval($request->input('status')),
        ]);
        return redirect('/enrollments/' .$cid);
    }

    
    public function destroy($id)
    {
        $cid = session()->get('my_data');
        Enrollment::where('id',$id)
        ->delete();
        return redirect('enrollments/'.$cid);
    }
}
