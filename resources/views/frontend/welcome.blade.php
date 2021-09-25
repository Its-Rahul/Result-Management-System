<!DOCTYPE html>
<html>
<head>
    <title>RMS(Result Management Syatem)</title>

    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <style type="text/css">


        .loginButton a {
            float: right;
            margin-right: 50px;
            margin-top: 30px;
        }
        .click_here{
            font-size: 22px;
            margin-left: 100px;
        }
        .section{
            margin-left: 100px;
        }

    </style>
</head>
<body>
<div class="main-wrapper">
    <div class="row">

        <h1 align="center">Student Result Management System</h1>

        <div class="loginButton">
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline btn btn-warning">Admin Login</a>
        </div>
    </div>
    <div class="container row">

        <section class="section">

            <span class="click_here">Check Your Result </span><a href="{{route('resultsearch.search')}}" class="btn btn-primary">Click Here</a>
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Class</th>
                    <th>Name</th>

                    <th>total</th>
                    <th>pass/fail</th>
                    <th>Percentage(%)</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>One</td>
                    <td>Rahul Mandal</td>

                    <td>490</td>
                    <td>pass</td>
                    <td>90%</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>One</td>
                    <td>Rahul Mandal</td>

                    <td>490</td>
                    <td>pass</td>
                    <td>90%</td>
                </tr>

            </table>

        </section>


    </div>
</div>

</body>
</html>
