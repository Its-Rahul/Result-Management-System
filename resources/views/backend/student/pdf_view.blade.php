<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel 8 HTML to PDF Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body class="antialiased container mt-5">

<table class="table table-bordered">
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
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data['rows'] as $i => $row)
        <tr>
            <td>{{$i+1}}</td>
            <td>{{$row->classId->classNameNumeric}}</td>
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

            <td>
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
</body>

</html>


