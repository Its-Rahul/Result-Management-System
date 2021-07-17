@extends('backend.layouts.master')

@section('title', 'Admin Create')

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
                        <li class="breadcrumb-item active">Create User</li>
                    </ol>
                </div>
            </div>
            <!-- Content Row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('main-content')
    <div class="card-header">
        <strong><h2 class="card-title">Create User
                <a href="{{route('user.index')}}" class="btn btn-success">Index</a>
            </h2></strong>

    </div>
    <div class="card-body">
        <form method="post" action="{{route('user.store')}}">
            @csrf
            <div class="form-group has-success">
                <label for="name" class="control-label">Full Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}"  id="name">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group has-success">
                <label for="email" class="control-label">Email</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}"  id="email">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group has-success">
                <label for="password" class="control-label">Password</label>
                <input type="text" name="password" class="form-control" value="{{old('password')}}"  id="password">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group has-success">
                <label for="conform_password" class="control-label">Conform password</label>
                <input type="text" name="conform_password" class="form-control" value="{{old('conform_password')}}"  id="conform_password">
                @error('conform_password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group has-success">
                <label for="phone" class="control-label">Full Name</label>
                <input type="number" name="phone" maxlength="10" class="form-control" value="{{old('phone')}}"  id="phone">
                @error('phone')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group has-success">
                <label for="address" class="control-label">Address</label>
                <input type="text" name="address"  class="form-control" value="{{old('address')}}"  id="address">
                @error('address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group has-success">
                <label for="image" class="control-label">Images</label>
                <input type="file" name="image" class="form-control" value="{{old('image')}}"  id="image">
                @error('image')
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
