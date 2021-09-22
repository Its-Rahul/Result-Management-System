@extends('backend.layouts.master')

@section('title', 'Index Subject')

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
        <h2 class="card-title">Manage Subject
            <a href="{{route('subject.create')}}" class="btn btn-success">Create</a>
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
               <th>Subject Name</th>
               <th>Subject Code</th>
               <th>Created At</th>
               <th>Updated At</th>
               <th>Action</th>
           </tr>
                @foreach($data['rows'] as $i => $row)
           <tr>
               <td>{{$i+1}}</td>
               <td>{{$row->classId->className}}</td>
               <td>{{$row->subject_name}}</td>
               <td>{{$row->subject_code}}</td>
               <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
               <td>{{$row->updated_at}}</td>
               <td>
                   <a href="{{route('subject.show',$row->id)}}" class="btn btn-info">View</a>
                   <a href="{{route('subject.edit',$row->id)}}" class="btn btn-warning">Edit</a>
                   <form action="{{route('subject.destroy',$row->id)}}" method="post">
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
