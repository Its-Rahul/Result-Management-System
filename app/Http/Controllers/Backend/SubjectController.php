<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = Subject::all();
        return view('backend/subject/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['class_id'] = Classes::all();
        return view('backend/subject/create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $row = Subject::create($request->all());
        if($row){
            $request->session()->flash('success','Subject Created Successfully');
        } else{
            $request->session()->flash('error','Subject Creation failed');

        }
        return redirect()->route('subject.index');
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
        $data['row'] = Subject::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('subject.index');
        }
        return view('backend.subject.show',compact('data'));
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
        $data['row'] = Subject::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('subject.index');
        }
        return view('backend.subject.edit',compact('data'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $id)
    {
        $data['class_id'] = Classes::all();
        $data['row'] = Subject::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('subject.index');
        }
        if($data['row']->update($request->all())){
            $request->session()->flash('success','Class Update Successfully');
        } else{
            $request->session()->flash('error','Class Update failed');

        }
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['row'] = Subject::find($id);
        if($data['row']){
            if($data['row']->delete()){
                request()->session()->flash('success','Subject Deleted Successfully');

            } else{
                request()->session()->flash('error','Subject Deletion failed');
            }
        } else{
            request()->session()->flash('error','Invalid request');
        }
        return redirect()->route('subject.index');
    }
}
