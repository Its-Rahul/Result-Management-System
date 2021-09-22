@extends('backend.layouts.master')

@section('title', 'Student Index')

@section('blank page')

    <style>
        /*if you want to remove some content in print display then use .no_print class on it */
        @media print {
            #datatable_wrapper .row:first-child {display:none;}
            #datatable_wrapper .row:last-child {display:none;}
            .no_print {display:none;}
        }

    </style>

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
                        <li class="breadcrumb-item active">Manage student</li>
                    </ol>
                </div>
            </div>
            <!-- Content Row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('main-content')
    <div class="card-header no_print">
        <h2 class="card-title">Manage Classes
            <a href="{{route('student.create')}}" class="btn btn-success">Create</a>
            <a class="btn btn-primary text-white" id="printBtn">Print/PDF</a>
        </h2>

    </div>
    <div class="card-body">
        @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
       @endif
            @if(Session::has('error'))
                <p class="alert alert-danger">{{Session::get('danger')}}</p>
            @endif




            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
<thead>
           <tr>
               <th>#</th>
               <th>Class</th>
               <th>Full Name</th>
               <th>Roll ID</th>
               <th>Email</th>
               <th>Phone</th>

               <th>Image</th>
               <th>Address</th>
               <th>Status</th>
               <th class="no_print">Action</th>
           </tr>
</thead>
                <tbody>
                @foreach($data['rows'] as $i => $row)
           <tr>
               <td>{{$i+1}}</td>
               <td>{{$row->classId->className}}</td>
               <td>{{$row->fullname}}</td>
               <td>{{$row->roll_id}}</td>
               <td>{{$row->email}}</td>
               <td>{{$row->phone}}</td>

               <td>
                   <img src="{{asset('uploads/images/student/'.$row->image)}}"  height="100px" width="100px" alt="">
               </td>
               <td>{{$row->address}}</td>
               <td>
                   @if($row->status == 1)
                     <span class="text-success">Active</span>
                   @else
                       <span class="text-danger">De Active</span>
                   @endif
               </td>

               <td class="no_print">
                   <a href="{{route('student.show',$row->id)}}" class="btn btn-info">View</a>
                   <a href="{{route('student.edit',$row->id)}}" class="btn btn-warning">Edit</a>
                   <form action="{{route('student.destroy',$row->id)}}" method="post">
                       <input type="hidden" name="_method" value="delete" />
                       @csrf
                       <button type="submit" class="btn btn-danger">Delete</button>
                   </form>
               </td>
           </tr>
                @endforeach
                </tbody>
       </table>
    </div>
    <!-- /.card-body -->
@endsection
u
