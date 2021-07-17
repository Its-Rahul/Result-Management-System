@extends('backend.layouts.master')

@section('title', 'Subject Show')

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
                        <li class="breadcrumb-item active">Manage Subject</li>
                    </ol>
                </div>
            </div>
            <!-- Content Row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('main-content')
    <div class="card-header">
        <h2 class="card-title">View Subject
            <a href="{{route('subject.index')}}" class="btn btn-success">List</a>
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

               <th>Subject Name</th>
               <td>{{$data['row'] ->subject_name}}</td>
           </tr>
                <tr>
               <th>Subject Code</th>
               <td>{{$data['row'] ->subject_code}}</td>
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
