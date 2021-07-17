@extends('backend.layouts.master')

@section('title', 'Student View')

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
                        <li class="breadcrumb-item active">Manage Student</li>
                    </ol>
                </div>
            </div>
            <!-- Content Row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('main-content')
    <div class="card-header">
        <h2 class="card-title">View Class
            <a href="{{route('student.index')}}" class="btn btn-success">List</a>
        </h2>

    </div>
    <div class="card-body">
        @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
       @endif
            @if(Session::has('error'))
                <p class="alert alert-danger">{{Session::get('danger')}}</p>
            @endif
            <table class="table table-boardered">

           <tr>

                   <th>Class</th>

                   <td>{{$data['row'] ->class_id}}</td>
           </tr>
                <tr>
                    <th>Roll ID</th>
                    <td>{{$data['row'] ->roll_id}}</td>

                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <img src="{{asset('uploads/images/student/'.$data['row']->image)}}"  height="100px" width="100px" alt="">
                    </td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>{{$data['row'] ->fullname}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$data['row'] ->email}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{$data['row'] ->status}}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{$data['row'] ->phone}}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{$data['row'] ->dob}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$data['row'] ->address}}</td>
                </tr>
                <tr>
               <th>Creation Date</th>
               <td>{{$data['row'] ->created_at}}</td>
                </tr>
                <tr>
               <th>Creation Date</th>
               <td>{{$data['row'] ->updated_at}}</td>
           </tr>

       </table>
    </div>
    <!-- /.card-body -->
@endsection
