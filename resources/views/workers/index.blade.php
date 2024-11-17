<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>worker</h1>
    <form action="{{route("menu")}}" method="get">
        <input type="submit" value="menuに戻る">
    </form>
    <form action="{{route("worker.create")}}" method="get">
        <input type="submit" value="人材情報新規登録">
    </form>
    <table>
        <thead>
            <tr>
                <th>氏名</th>
                <th>メールアドレス</th>
                <th>編集ボタン</th>
                <th>削除ボタン</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workers as $worker)
                <tr>
                    <td>{{$worker->name}}</td>
                    <td>{{$worker->email}}</td>
                    <td>
                        <form action="{{route("worker.edit", $worker->id)}}" method="get">
                            <input type="submit" value="編集">
                        </form>
                    </td>
                    <td>
                        <form action="{{route("worker.destroy", $worker->id)}}" method="post">
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