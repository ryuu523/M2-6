<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>dispatch</h1>
    <form action="{{route("menu")}}" method="get">
        <input type="submit" value="menuに戻る">
    </form>
    <form action="{{route("dispatch.create")}}" method="get">
        <input type="submit" value="派遣情報新規登録">
    </form>
    <table>
        <thead>
            <tr>
                <th>イベント名</th>
                <th>人材氏名</th>
                <th>編集ボタン</th>
                <th>削除ボタン</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dispatchs as $dispatch)
                <tr>
                    <td>{{$dispatch->event->title}}</td>
                    <td>{{$dispatch->worker->name}}</td>
                    <td>
                        <form action="{{route("dispatch.edit", $dispatch->id)}}" method="get">
                            <input type="submit" value="編集">
                        </form>
                    </td>
                    <td>
                        <form action="{{route("dispatch.destroy", $dispatch->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <input type="submit" onclick="return confirm('削除してもよろしいですか？')" value="削除">
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