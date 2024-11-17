<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{route("logout")}}" method="post">
        @csrf
        <input type="submit" value="logout">
    </form>
    <ul>
        <li><a href="{{route("worker.index")}}">worker</a></li>
        <li><a href="{{route("event.index")}}">event</a></li>
        <li><a href="{{route("dispatch.index")}}">dispatch</a></li>
    </ul>
</body>

</html>