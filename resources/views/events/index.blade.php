<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>event</h1>
    <form action="{{route("menu")}}" method="get">
        <input type="submit" value="menuに戻る">
    </form>
    <form action="{{route("event.create")}}" method="get">
        <input type="submit" value="イベント情報新規登録">
    </form>
    <table>
        <thead>
            <tr>
                <th>イベント名</th>
                <th>開催場所</th>
                <th>開催日時</th>
                <th>編集ボタン</th>
                <th>削除ボタン</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{$event->title}}</td>
                    <td>{{$event->place}}</td>
                    <td>{{$event->date}}</td>
                    <td>
                        <form action="{{route("event.edit", $event->id)}}" method="get">
                            <input type="submit" value="編集">
                        </form>
                    </td>
                    <td>
                        <form action="{{route("event.destroy", $event->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <input type="submit" onclick="return confirm('削除してもよろしいですか？')"  value="削除">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (session("message"))
        <p>{{session("message")}}</p>
    @endif

</body>

</html>