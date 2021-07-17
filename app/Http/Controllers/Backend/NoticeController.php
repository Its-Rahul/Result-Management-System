<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = Notice::all();
        return view('backend/notice/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/notice/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeRequest $request)
    {
        $row = Notice::create($request->all());
        if($row){
            $request->session()->flash('success','Notice Created Successfully');
        } else{
            $request->session()->flash('error','Notice Creation failed');

        }
        return redirect()->route('notice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['row'] = Notice::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('notice.index');
        }
        return view('backend.notice.show',compact('data'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = Notice::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('notice.index');
        }
        return view('backend.notice.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoticeRequest $request, $id)
    {
        $data['row'] = Notice::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('notice.index');
        }
        if($data['row']->update($request->all())){
            $request->session()->flash('success','Notice Update Successfully');
        } else{
            $request->session()->flash('error','Notice Update failed');

        }
        return redirect()->route('notice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['row'] = Notice::find($id);
        if($data['row']){
            if($data['row']->delete()){
                request()->session()->flash('success','Notice Deleted Successfully');

            } else{
                request()->session()->flash('error','Notice Deletion failed');
            }
        } else{
            request()->session()->flash('error','Invalid request');
        }
        return redirect()->route('notice.index');
    }
}
