@extends('backend.layouts.master')

@section('title', 'Result Index')

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
        <h2 class="card-title">Manage Result
            <a href="{{route('result.create')}}" class="btn btn-success">Create</a>
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
               <th>Class</th>
               <th>Name</th>
               <th>Roll Id</th>
               <th>Subject</th>
               <th>Marks</th>
               <th>Action</th>
           </tr>
                @foreach($data['rows'] as $i => $row)
           <tr>
               <td>{{$i+1}}</td>
               <td>{{$row->class_id}}</td>
               <td>{{$row->student_id}}</td>
               <td>{{$row->student_id}}</td>
               <td>{{$row->subject_id}}</td>
               <td>{{$row->marks}}</td>
               <td>
                   <a href="{{route('result.show',$row->id)}}" class="btn btn-info">View</a>
                   <a href="#" class="btn btn-warning">Edit</a>
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
