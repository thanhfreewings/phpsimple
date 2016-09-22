<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <div class="container">
        <h1 class="text-info" style="font-weight:900;align:center">PHPSimple</h1>
        Link reset password: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
    </div>
</body>
</html>
