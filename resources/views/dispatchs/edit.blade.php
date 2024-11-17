<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{route("dispatch.index")}}" method="get">
        <input type="submit" value="dispatchに戻る">
    </form>
    <form action="{{route("dispatch.update", $dispatch->id)}}" method="post">
        @csrf
        @method("PUT")
        イベント名:
        <select name="event">
            @foreach ($events as $event)
                <option value="{{$event->id}}" {{$event->id == $dispatch->event_id ? "selected" : ""}}>{{$event->title}}
                </option>
            @endforeach
        </select>
        人材氏名:
        <select name="worker">
            @foreach ($workers as $worker)
                <option value="{{$worker->id}}" {{$worker->id == $dispatch->worker_id ? "selected" : ""}}>{{$worker->name}}
                </option>
            @endforeach
        </select>
        メモ:<input type="text" name="memo" value="{{$dispatch->memo}}">
        <input type="submit" value="保存">
    </form>
    @if (session("errors"))
        <p>エラーが発生しました。</p>
    @endif
</body>

</html>