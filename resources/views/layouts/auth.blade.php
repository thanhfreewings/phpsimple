<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PHPSimple.</title>

    <!-- Bootstrap -->
    <link href="/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/dashboard/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/dashboard/build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
        .help-block{
            margin: -12px 0px 20px 0px;
        }
    </style>
</head>

<body class="login">
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content" style="margin-top:50px">
                <h1 style="font-weight:900;margin-top:-25px">PHPSimple</h1>
                @yield('content')
            </section>
        </div>
    </div>
<!-- jQuery -->
<script src="/dashboard/vendors/jquery/dist/jquery.min.js"></script>
</body>
</html>
