<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>travelservice</title>
</head>

<body>
    <div>
        <h1>自動記述</h1>
        <form action="{{route('freeInput.form')}}" method="POST">
            @csrf
            <input type="text" name="api" id="api" style="width: 800px;"><br>
            <button type=" submit">送信</button>
        </form>
        <div>
            <!-- 成功メッセージ -->
            @if (session('success'))
            <div>
                テキスト::<br>
                {{session('success')}}
            </div>
            @endif
        </div>
        <!-- バリデーション -->
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    </div>
</body>

</html>