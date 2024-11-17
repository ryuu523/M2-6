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
    <form action="{{route("worker.update",$worker->id)}}" method="post">
        @csrf
        @method("PUT")
        氏名: <input type="text" name="name" value="{{$worker->name}}">
        email: <input type="email" name="email" value="{{$worker->email}}">
        password(更新する場合は入力): <input type="password" name="password">
        メモ: <input type="text" name="memo" value="{{$worker->memo}}">
        <input type="submit" value="保存">
    </form>
    @if (session("errors"))
        <p>エラーが発生しました。</p>
    @endif
</body>

</html>