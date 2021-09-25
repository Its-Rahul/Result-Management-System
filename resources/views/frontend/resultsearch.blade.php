
<!DOCTYPE html>
<html>
<head>
    <title>RMS(Result Management Syatem)</title>

    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">


</head>
<body>

    <div class="row">
        <div class="header">
            <h1 align="center">Student Result Management System</h1>
        </div>
    </div>
    <div class="container col-6">
        <a href="{{route('welcome.back')}}" class="btn btn-primary"><-- Back to Ledger</a>

        <form action="{{route('resultsearch.marksheet')}}">
            @csrf
            <div class="form-group">
                <br>
                <label for="class_id" class="control-label"><strong>Class</strong></label>
                <select name="class_id" class="form-control" id="class_id">
                    <option value="">Select Class</option>
                    @foreach($data['class_id'] as $class)
                        <option value="{{$class->id}}">{{$class->className}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="student_id" class="control-label"><strong>Student</strong></label>
                <select name="student_id" class="form-control" id="student_id">
                    <option value="">Select Student</option>
                    @foreach($data['student_id'] as $student)
                        <option value="{{$student->id}}">{{$student->fullname}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <input type="submit" class="btn btn-success" value="submit">
            </div>
        </form>


    </div>



</body>
</html>

@section('js')
    @include('frontend.includes.script')
@endsection
