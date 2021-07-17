@extends('backend.layouts.master')

@section('title', 'Admin Index')

@section('blank page')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                        <li class="breadcrumb-item active">Manage User</li>
                    </ol>
                </div>
            </div>
            <!-- Content Row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('main-content')
    <div class="card-header">
        <h2 class="card-title">Manage User
            <a href="{{route('user.create')}}" class="btn btn-success">Create</a>
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
               <th>Image</th>
               <th>Full Name</th>
               <th>Password</th>
               <th>Phone</th>
               <th>Address</th>
               <th>Status</th>
               <th>Action</th>
           </tr>
                @foreach($data['rows'] as $i => $row)
           <tr>
               <td>{{$i+1}}</td>
               <td>
                   <img src="{{asset('uploads/images/users/'.$row->image)}}"  height="100px" width="100px" alt="">
               </td>
               <td>{{$row->name}}</td>
               <td>{{$row->password}}</td>
               <td>{{$row->phone}}</td>
               <td>{{$row->address}}</td>
               <td> @if($row->status == 1)
                       <span class="text-success">Active</span>
                   @else
                       <span class="text-danger">De Active</span>
                   @endif</td>
               <td>
                   <a href="{{route('user.show',$row->id)}}" class="btn btn-info">View</a>
                   <a href="{{route('user.edit',$row->id)}}" class="btn btn-warning">Edit</a>
                   <form action="{{route('user.destroy',$row->id)}}" method="post">
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
