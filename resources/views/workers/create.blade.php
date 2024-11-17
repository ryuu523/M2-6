<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{route("worker.index")}}" method="get">
        <input type="submit" value="workerに戻る">
    </form>
    <form action="{{route("worker.store")}}" method="post">
        @csrf
        氏名: <input type="text" name="name">
        email: <input type="email" name="email">
        password: <input type="password" name="password">
        メモ: <input type="text" name="memo">
        <input type="submit" value="登録">
    </form>
    @if (session("errors"))
        <p>エラーが発生しました。</p>
    @endif
</body>

</html>