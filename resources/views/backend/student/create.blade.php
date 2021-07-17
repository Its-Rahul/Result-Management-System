@extends('backend.layouts.master')

@section('title', 'Student Create')

@section('blank page')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Student</li>
                        <li class="breadcrumb-item active">Create Student</li>
                    </ol>
                </div>
            </div>
            <!-- Content Row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('main-content')
    <div class="card-header">
        <strong><h2 class="card-title">Create Student
                <a href="{{route('student.index')}}" class="btn btn-success">Index</a>
            </h2></strong>

    </div>
    <div class="card-body">


        <form method="post" action="{{route('student.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="class_id" class="control-label">Class</label>
                <select name="class_id" class="form-control" id="class_id">
                    <option value="">Select Class</option>
                    @foreach($data['class_id'] as $class)
                        <option value="{{$class->id}}">{{$class->className}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group has-success">
                <label for="fullname" class="control-label">Full Name</label>

                    <input type="text" name="fullname" class="form-control" value="{{old('fullname')}}" id="fullname"  autocomplete="off">

                @error('fullname')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="roll_id" class="control-label">Roll Id</label>
                    <input type="number" name="roll_id" class="form-control" value="{{old('roll_id')}}" id="roll_id" maxlength="5" autocomplete="off">
                @error('roll_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="control-label">Email id</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" id="email" autocomplete="off">

                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="gender" class="control-label">Gender </label>
                <input type="radio" name="gender" value="1" >Male
                <input type="radio" name="gender" value="0"  checked="">Female
            </div>
            <div class="form-group">
                <label for="dob" class="control-label">Date Of Birth</label>
                <input type="date" name="dob"  class="form-control" value="{{old('dob')}}" id="dob" placeholder="mm/mdd/yyyy" >

                @error('dob')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone" class="control-label">Phone</label>
                <input type="text" name="phone" maxlength="10" class="form-control" value="{{old('phone')}}" id="phone" autocomplete="off">

                @error('phone')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="address" class="control-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{old('address')}}" id="address" autocomplete="off">

                @error('address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="status" class="control-label">Status </label>

                <input type="radio" name="status" value="1"  checked="">Active
                <input type="radio" name="status" value="0" >De-active

            </div>
            <div class="form-group">
                <label for="image_file" class="control-label">Image</label>
                <input type="file" name="image_file" class="form-control" value="{{old('image_file')}}" id="image_file" autocomplete="off">

                @error('image_file')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="">
                <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
@endsection
