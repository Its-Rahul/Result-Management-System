@extends('backend.layouts.master')

@section('title', 'Class Edit')

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
                        <li class="breadcrumb-item active">Create Classes</li>
                    </ol>
                </div>
            </div>
            <!-- Content Row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('main-content')
    <div class="card-header">
        <strong><h2 class="card-title">Create Classes
                <a href="{{route('class.index')}}" class="btn btn-success">Index</a>
            </h2></strong>

    </div>
    <div class="card-body">
        <form method="post" action="{{route('class.update',$data['row']->id)}}">
            <input type="hidden" name="_method" value="PUT" />
            @csrf
            <div class="form-group has-success">
                <label for="classname" class="control-label">Class Name</label>
                <div class="">
                    <input type="text" name="classname" class="form-control" value="{{$data['row']->className}}" id="classname">
                    <span class="help-block">Eg- Third, Fouth,Sixth etc</span>
                </div>
                @error('classname')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group has-success">
                <label for="classnamenumeric" class="control-label">Class Name in Numeric</label>
                <div class="">
                    <input type="number" name="classnamenumeric"   value="{{$data['row']->classNameNumeric}}" class="form-control" id="classnamenumeric">
                    <span class="help-block">Eg- 1,2,4,5 etc</span>
                </div>
                @error('classnamenumeric')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group has-success">

                <div class="">
                    <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                </div>

            </div>

        </form>
    </div>
    <!-- /.card-body -->
@endsection
