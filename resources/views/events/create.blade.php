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
    <form action="{{route("event.store")}}" method="post">
        @csrf
        イベント名: <input type="text" name="title" >
        開催場所: <input type="text" name="place">
        開催日時: <input type="date" name="date" >
        <input type="submit" value="登録">
    </form>
    @if (session("errors"))
        <p>エラーが発生しました。</p>
    @endif
</body>

</html>