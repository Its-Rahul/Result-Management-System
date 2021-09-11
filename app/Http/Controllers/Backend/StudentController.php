<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = Student::all();
        return view('backend/student/index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['class_id'] = Classes::all();
        return view('backend/student/create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $file = $request->file('image_file');
        if ($request->hasFile("image_file")){
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/images/student'),$fileName);
            $request->request->add(['image'=> $fileName]);
        }

        $row = Student::create($request->all());
        if($row){
            $request->session()->flash('success','Student Created Successfully');
        } else{
            $request->session()->flash('error','Student Creation failed');

        }
        return redirect()->route('student.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['class_id'] = Classes::all();
        $data['row'] = Student::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('student.index');
        }
        return view('backend.student.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['class_id'] = Classes::all();
        $data['row'] = Student::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('student.index');
        }
        return view('backend.student.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $data['class_id'] = Classes::all();
        $data['row'] = Student::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('student.index');
        }
        if($data['row']->update($request->all())){
            $request->session()->flash('success','Class Update Successfully');
        } else{
            $request->session()->flash('error','Class Update failed');

        }
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['row'] = Student::find($id);
        if($data['row']){
            if($data['row']->delete()){
                request()->session()->flash('success','Student Deleted Successfully');

            } else{
                request()->session()->flash('error','Student Deletion failed');
            }
        } else{
            request()->session()->flash('error','Invalid request');
        }
        return redirect()->route('student.index');
    }
    // Generate PDF
    public function createPDF() {

        // retreive all records from db
        $user = Student::all();

        // share data to view
        view()->share('user',$user);
        $pdf = PDF::loadView('pdf_view', $user);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
