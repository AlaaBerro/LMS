<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Pdf;
use Illuminate\Http\Request;

class PdfsController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function index()
    {
        $cid = session()->get('my_data');
        return redirect()->route('course.show', ['course' => $cid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pdf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $cid = session()->get('my_data');

        $request->validate([
            'name'=>'required',
            'pdf'=>'required |mimes:pdf|max:10000',
            'manage'=>'required',
            
        ]);
        $newPdfname = $request->name . '.' .$request->pdf->extension() ;
        $request->pdf->move(public_path('pdfs'),$newPdfname);
        Pdf::create([
            

            'name'=>$request->input('name'),
            'path'=>$newPdfname,
            'cid'=>$cid,
            'status'=>$request->input('manage'),

             
             
        ]);
        return redirect('/pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pdf = Pdf::findOrFail($id);
        $filePath = public_path("/pdfs/". $pdf->path);

        return response()->download($filePath);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pdf.edit')->with(['pdf'=>Pdf::where('id',$id)->first()]);
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
        $request->validate([
            'name'=>'required',
            'manage'=>'required',
            
        ]);
        $cid = session()->get('my_data');

        Pdf::where('id',$id)
        ->update([
            'name' =>$request->input('name'),
            'status' => intval($request->input('manage')),
        ]);
        return redirect('/course/'.$cid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cid = session()->get('my_data');

        Pdf::where('id',$id)
        ->delete();
        return redirect('/course/'.$cid);
    }
}
