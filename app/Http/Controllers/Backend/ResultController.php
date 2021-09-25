<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResultRequest;
use App\Models\Classes;
use App\Models\Result;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Sabberworm\CSS\Settings;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = Result::all();

        return view('backend/result/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $data['class_id'] = Classes::all();
        $data['student_id'] = Student::all();
        $data['subject_id'] = Subject::all();

        $data['active_student'] = Student::where('status','1')->get();

        return view('backend/result/create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student_id = $request->input('student_id');
        $class_id = $request->input('class_id');
        $subject_id = $request->subject_id;
        $marks = $request->marks;
        for ($i = 0; $i< count($subject_id); $i++){
            DB::table('table_results')->insert([
                'student_id' => $student_id,
                'class_id' => $class_id,
                'subject_id' => $subject_id[$i],
                'marks' => $marks[$i],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        }

        return redirect()->route('result.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['row'] = Result::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('class.index');
        }
        return view('backend.result.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = Result::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('result.index');
        }
        return view('backend.result.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResultRequest $request, $id)
    {
        $data['row'] = Result::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('class.index');
        }
        if($data['row']->update($request->all())){
            $request->session()->flash('success','Class Update Successfully');
        } else{
            $request->session()->flash('error','Class Update failed');

        }
        return redirect()->route('result.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['row'] = Result::find($id);
        if($data['row']){
            if($data['row']->delete()){
                request()->session()->flash('success','Result Deleted Successfully');

            } else{
                request()->session()->flash('error','Result Deletion failed');
            }
        } else{
            request()->session()->flash('error','Invalid request');
        }
        return redirect()->route('result.index');
    }


//    public function fetchData(ResultRequest $request)
//    {
//        dd($request);
//        $class = $request->input('class');
//
//        $data['search']= DB::table('table_students')
//            ->select("*")
//            ->where('class_id',$class)
//            ->get();
//
//        return view('result.create',compact('data'));
//
//    }
}
