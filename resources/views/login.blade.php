<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route("login")}}" method="post">
        @csrf
        email:<input type="email" name="email">
        password:<input type="password" name="password">
        <input type="submit" value="login">
    </form>
    @if (session("message"))
        <p>{{session("message")}}</p>
    @endif
</body>
</html>