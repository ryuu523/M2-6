<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{route("event.index")}}" method="get">
        <input type="submit" value="eventに戻る">
    </form>
    <form action="{{route("event.update",$event->id)}}" method="post">
        @csrf
        @method("PUT")
        イベント名: <input type="text" name="title" value="{{$event->title}}">
        開催場所: <input type="text" name="place" value="{{$event->place}}">
        開催日時: <input type="date" name="date" value="{{$event->date}}">
        <input type="submit" value="保存">
    </form>
    @if (session("errors"))
        <p>エラーが発生しました。</p>
    @endif
</body>

</html>