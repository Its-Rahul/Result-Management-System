<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRequest;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = Classes::all();
        return view('backend/class/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend/class/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRequest $request)
    {
//        $validator = Validator::make($request->all(),[
//            'classname' => 'required|String|max:50',
//            'classnamenumeric' => 'required|Integer',
//            'section' => 'required|String|max:10',
//        ]);
//        if ($validator->fails()){
//            return redirect()->route('class.create')
//                ->withErrors($validator)
//                ->withInput();
//        }


        $row = Classes::create($request->all());
        if ($row) {
            $request->session()->flash('success', 'Class Created Successfully');
        } else {
            $request->session()->flash('error', 'Class Creation failed');

        }
        return redirect()->route('class.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['row'] = Classes::find($id);
        if (!$data['row']) {
            request()->session()->flash('error', 'Invalid request');
            return redirect()->route('class.index');
        }
        return view('backend.class.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = Classes::find($id);
        if (!$data['row']) {
            request()->session()->flash('error', 'Invalid request');
            return redirect()->route('class.index');
        }
        return view('backend.class.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassRequest $request, $id)
    {


        $data['row'] = Classes::find($id);
        if (!$data['row']) {
            request()->session()->flash('error', 'Invalid request');
            return redirect()->route('class.index');
        }
        if ($data['row']->update($request->all())) {
            $request->session()->flash('success', 'Class Update Successfully');
        } else {
            $request->session()->flash('error', 'Class Update failed');

        }
        return redirect()->route('class.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['row'] = Classes::find($id);
        if ($data['row']) {
            if ($data['row']->delete()) {
                request()->session()->flash('success', 'Class Deleted Successfully');

            } else {
                request()->session()->flash('error', 'Class Deletion failed');
            }
        } else {
            request()->session()->flash('error', 'Invalid request');
        }
        return redirect()->route('class.index');
    }
    public function getSubjectByClassId(Request $request){
        $class = Classes::find($request->input('class_id'));
        $html = "<option value=''>Select Subject</option>";
        foreach($class->subjects as $subject){
            $html .= "<option value='$subject->id'>$subject->subject_name</option>";

        }
        return $html;
    }
//    public function getStudentByClassId(Request $request){
//        $classes = Student::find($request->input('class_id'));
//
//        $html = "<option value=''>Select Subject</option>";
//        foreach($classes->students as $student){
//            $html .= "<option value='$student->id'>$student->fullname</option>";
//
//        }
//        return $html;
//    }
}
