@extends('backend.layouts.master')

@section('title', 'Result Create')

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
                        <li class="breadcrumb-item active">Create Result</li>
                    </ol>
                </div>
            </div>
            <!-- Content Row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection

@section('main-content')
    <div class="card-header">
        <strong><h2 class="card-title">Create Result
                <a href="{{route('result.index')}}" class="btn btn-success">Index</a>
            </h2></strong>

    </div>
    <div class="card-body">

        <form method="post" action="{{route('result.store')}}">
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
            <div class="form-group">
                <label for="subject_id" class="control-label">Subject</label>
                <select name="subject_id" class="form-control" id="subject_id">
                    <option value="">Select Subject</option>
                        @foreach($data['subject_id'] as $subject)
                                <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                        @endforeach
                </select>
            </div>



            <div class="row">
<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Roll Id</th>
        <th> Name</th>
        <th>Full Marks</th>
        <th>Pass Marks</th>
        <th>Marks</th>
    </tr>


    @foreach($data['student_id'] as $i => $row)


        <tr>
        <td>{{$i+1}}</td>
        <td>{{$row->roll_id}}</td>
        <td>{{$row->fullname}}</td>
        <td>100</td>
        <td>40</td>
        <td><input type="number" name="marks" class="form-control" value="{{old('marks')}}" id="marks"  autocomplete="off">
        </td>

    </tr>
    @endforeach


</table>
</div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit <span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
            </div>
        </form>

    </div>
    <!-- /.card-body -->
@endsection
@section('js')
    @include('backend.result.includes.script')

@endsection
