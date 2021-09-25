
<html>
<title>Marksheet
</title>
<head>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <style>
        /*if you want to remove some content in print display then use .no_print class on it */
        @media print {
            #datatable_wrapper .row:first-child {display:none;}
            #datatable_wrapper .row:last-child {display:none;}
            .no_print {display:none;}
        }

    </style>
</head>
<body>

<div class="no_print">
    <a href="{{route('welcome.back')}}" class="btn btn-primary "><-- Back to Ledger</a>
</div>

<div class="col-8">
    <Strong>Name  </Strong>
    <label for=""> {{$data['student_name']->fullname}} </label>
    <br>
    <Strong>Class :</Strong>
    <label for=""> {{ucfirst($data['class_name']->className)}} </label>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th >#</th>
            <th >Subjects</th>
            <th >Full Marks</th>
            <th>Pass Marks</th>
            <th>Marks Secure</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['subjects'] as $i => $row)
        <tr>
            <td>{{$i+1}}</td>
            <td>{{$row->subjectId->subject_name}}</td>
            <td>100</td>
            <td>40</td>
            <td>{{$row->marks}}</td>
        </tr>
        @endforeach
        <tr>

            <th colspan="4">Total Marks:</th>
            <td>{{$total}}</td>
        </tr>
        <tr>
            <th colspan="4">Result:</th>
            <td>
                @if($failed == 0)
                    <label for="">Pass</label>
                @else
                    <label for="">Fail</label>

                @endif
            </td>
        </tr>
        <tr>
            <th colspan="4">Percentage</th>

            <td>
                @if($failed == 0)
                {{$percentage}}
                @else
                    <label for="">-</label>
                @endif
            </td>
        </tr>
        </tbody>
    </table>
</div>

<div align="center" class="no_print">
    <a class="btn btn-primary text-white" id="printBtn">Print/PDF</a>
</div>

</body>

</html>
@section('js')
    <script type="text/javascript" src="{{ asset('assets/backend/plugins/print_any_part/dist/jQuery.print.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {

            $("#printBtn").on('click', function() {

                $.print("#printable");

            });

        });
    </script>

@endsection
