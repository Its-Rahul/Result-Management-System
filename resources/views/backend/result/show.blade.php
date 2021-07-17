@extends('backend.layouts.master')

@section('title', 'Result Show')

@section('blank page')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Result Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Result</li>
                        <li class="breadcrumb-item active">Manage Result</li>
                    </ol>
                </div>
            </div>
            <!-- Content Row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('main-content')
    <div class="card-header">
        <h2 class="card-title">Result Show
            <a href="{{route('result.index')}}" class="btn btn-success">List</a>
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

               <th>Class Name</th>
               <td>{{$data['row'] ->student_id}}</td>
           </tr>
                <tr>
               <th>Class Name Numeric</th>
               <td>{{$data['row'] ->class_id}}</td>
                </tr>
                <tr>
               <th>Section</th>
               <td>{{$data['row'] ->subject_id}}</td>
                </tr>
                <tr>
                    <th>Section</th>
                    <td>{{$data['row'] ->marks}}</td>
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
