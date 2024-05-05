<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Link</title>
</head>
<body>
    <h1>Your password reset link is: <a href="{{route('reset.password', $link)}}">{{ $link }} </a></h1>
</body>
</html>