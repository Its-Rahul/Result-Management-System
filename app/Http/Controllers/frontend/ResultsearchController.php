<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Result;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class ResultsearchController extends Controller
{
    public function search()
    {
        $data['class_id'] = Classes::all();
        $data['subject_id'] = Subject::all();
        $data['student_id'] = Student::all();


        return view('frontend/resultsearch', compact('data'));
    }

    public function marksheet(Request $request){
        $class_id = $request->input('class_id');
        $student_id = $request->input('student_id');
        $total = 0;
        $failed = 0;
        $percentage = 0;
        $data['marks'] = Result::where('class_id',$class_id)->where('student_id', $student_id )->get();
        $data['no_subject'] = Subject::where('class_id',$class_id)->get();
        $data['student_name'] = Student::where('id',$student_id)->first();

        $data['class_name'] = Classes::where('id',$class_id)->first();
        $no_subject = count($data['no_subject']);

        for($i = 0; $i<count($data['marks']); $i++ ){
            if ($data['marks'][$i]->marks >= 40){
             $total= $total + $data['marks'][$i]->marks;
            }
            else{
                $total= $total + $data['marks'][$i]->marks;
                $failed++;
//                $request->session()->flash('error', 'Fail');
//                return redirect()->route('frontend.marksheet');
            }
        }

            $data['subjects'] = Result::where('class_id',$class_id)->where('student_id', $student_id )->get();
            $percentage = ($total/($no_subject*100))*100;


        return view('frontend/marksheet', compact('total','percentage','data','failed'));
    }
    public function back()
    {
        return view('frontend/welcome');
    }

}
