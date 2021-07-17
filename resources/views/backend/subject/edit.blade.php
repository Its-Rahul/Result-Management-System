@extends('backend.layouts.master')

@section('title', 'Edit Subject')

@section('blank page')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subject Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Subject</li>
                        <li class="breadcrumb-item active">Create Subjects</li>
                    </ol>
                </div>
            </div>
            <!-- Content Row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('main-content')
    <div class="card-header">
        <strong><h2 class="card-title">Create Subjects
                <a href="{{route('subject.index')}}" class="btn btn-success">Index</a>
            </h2></strong>

    </div>
    <div class="card-body">

        <form method="post" action="{{route('subject.update',$data['row']->id)}}">
            <input type="hidden" name="_method" value="PUT" />
            @csrf
            <div class="form-group">
                <label for="class_id" class="control-label">Class</label>
                <select name="class_id" class="form-control" id="class_id">
                    <option value="{{$data['row']->class_id}}">{{$data['row']->classId->className}}</option>
                    @foreach($data['class_id'] as $class)
                        <option value="{{$class->id}}">{{$class->className}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subject_name" class="control-label">Subject Name</label>
                    <input type="text" name="subject_name" value="{{$data['row']->subject_name}}" class="form-control" id="subject_name" placeholder="Subject Name" >
                @error('subject_name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="subject_code" class="control-label">Subject Code</label>
                    <input type="number" name="subject_code"value="{{$data['row']->subject_code}}" class="form-control" id="subject_code" placeholder="Subject Code">
                @error('subject_code')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
            </div>
        </form>

    </div>
    <!-- /.card-body -->
@endsection
