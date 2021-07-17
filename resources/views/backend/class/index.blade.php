@extends('backend.layouts.master')

@section('title', 'Class Index')

@section('blank page')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Class Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Class</li>
                        <li class="breadcrumb-item active">Manage Class</li>
                    </ol>
                </div>
            </div>
            <!-- Content Row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('main-content')
    <div class="card-header">
        <h2 class="card-title">Manage Classes
            <a href="{{route('class.create')}}" class="btn btn-success">Create</a>
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
               <th>#</th>
               <th>Class Name</th>
               <th>Class Name Numeric</th>
               <th>Section</th>
               <th>Action</th>
           </tr>
                @foreach($data['rows'] as $i => $row)
           <tr>
               <td>{{$i+1}}</td>
               <td>{{$row->className}}</td>
               <td>{{$row->classNameNumeric}}</td>
               <td>{{$row->section}}</td>

               <td>
                   <a href="{{route('class.show',$row->id)}}" class="btn btn-info">View</a>
                   <a href="{{route('class.edit',$row->id)}}" class="btn btn-warning">Edit</a>
                   <form action="{{route('class.destroy',$row->id)}}" method="post">
                       <input type="hidden" name="_method" value="delete" />
                       @csrf
                       <button type="submit" class="btn btn-danger">Delete</button>
                   </form>

               </td>
           </tr>
                @endforeach
       </table>
    </div>
    <!-- /.card-body -->
@endsection
