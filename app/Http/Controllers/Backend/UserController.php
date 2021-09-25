<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = User::all();
        return view('backend/user/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $file = $request->file('image_file');
        if ($request->hasFile("image_file")){
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/images/users'),$fileName);
            $request->request->add(['image'=> $fileName]);
        }

        $row = User::create($request->except(['_token']));
        if($row){
            $request->session()->flash('success','User Created Successfully');
        } else{
            $request->session()->flash('error','User Creation failed');

        }
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['row'] = User::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('user.index');
        }
        return view('backend.user.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = User::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('user.index');
        }
        return view('backend.user.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {

        $data['row'] = User::find($id);
        if(!$data['row']) {
            request()->session()->flash('error','Invalid request');
            return redirect()->route('user.index');
        }
        if($data['row']->update($request->except(['_token']))){
            $request->session()->flash('success','User Update Successfully');
        } else{
            $request->session()->flash('error','User Update failed');

        }
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['row'] = User::find($id);
        if($data['row']){
            if($data['row']->delete()){
                request()->session()->flash('success','User Deleted Successfully');

            } else{
                request()->session()->flash('error','User Deletion failed');
            }
        } else{
            request()->session()->flash('error','Invalid request');
        }
        return redirect()->route('user.index');
    }
}
