<!DOCTYPE html>
<html>
<head>
    <title>RMS(Result Management Syatem)</title>

    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <style type="text/css">

        .header{
            position: absolute;
        }
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
            margin-top: 10px;
            margin-left: 220px;
        }
        .notice{
            height: 500px;
            width: 900px;
            margin-top: 5px;
            border: double;
        }
    </style>
</head>
<body>
<div class="main-wrapper">
    <div class="row">
        <div class="header">
            <h1 align="center">Student Result Management System</h1>
        </div>
        <div class="loginButton">
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline btn btn-warning">Admin Login</a>

        </div>

    </div>
    <div class="container">
        <section class="section">
            <span class="click_here">Check Your Result </span><a href="#" class="btn btn-primary">Click Here</a>

            <div class="notice">
                <table class="table table-boarded">
                    <tr>
                        <th>Date</th>
                        <th>Notice</th>

                    </tr>

                    <tr>
                        <td>11-11-1111</td>
                        <td>Result published</td>
                    </tr>
                </table>
            </div>
        </section>
    </div>
</div>


</body>
</html>
