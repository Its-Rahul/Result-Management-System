@extends('backend.layouts.master')

@section('title', 'Notice Create')

@section('blank page')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Notice Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Notice</li>
                        <li class="breadcrumb-item active">Create Notice</li>
                    </ol>
                </div>
            </div>
            <!-- Content Row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('main-content')
    <div class="card-header">
        <strong><h2 class="card-title">Create Notice
                <a href="{{route('notice.index')}}" class="btn btn-success">Index</a>
            </h2></strong>

    </div>
    <div class="card-body">
        <form method="post" action="{{route('notice.update',$data['row']->id)}}">
            <input type="hidden" name="_method" value="PUT" />
            @csrf
            <div class="form-group has-success">
                <label for="date" class="control-label">Class Name</label>
                <div class="">
                    <input type="text" name="date" class="form-control" value="{{$data['row']->date}}"  id="date">

                </div>
            </div>
            <div class="form-group has-success">
                <label for="notice" class="control-label">Notice</label>
                <div class="">
                    <textarea name="notice" class="form-control" id="notice" cols="30" rows="3">{{$data['row']->notice}}</textarea>
                </div>
                @error('notice')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="status" class="control-label">Status </label>

                <input type="radio" name="status" value="1"  checked="">Active
                <input type="radio" name="status" value="0" >De-active

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
