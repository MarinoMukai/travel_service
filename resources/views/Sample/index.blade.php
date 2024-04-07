<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main</title>
</head>
<body>
    <p>日本時間: {{date('Y-m-d')}}</p>
    <div>
        変数の受け渡し:{{$number}}
    </div>

    <div>
        <!-- バリデーション -->
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <!-- フォーム入力 -->
        <form action="{{route('submit.form')}}" method="POST">
            @csrf
            <label for="inputName">名前:</label>
            <input type="text" name="inputName1" id="inputName1">
            +
            <input type="text" name="inputName2" id="inputName2">
            <button type="submit">送信</button>
        </form>
        <div>
            <!-- 成功メッセージ -->
            計算結果:
            @if(session('success'))
                {{ session('success') }}
            @endif
        </div>    
    </div>
    <div>
        <div>API通信</div>
        <form action="{{route('apiSubmit.form')}}" method="POST">
            @csrf
            <input type="text" name="api" id="api">
            <button type="submit">送信</button>
        </form>    
</body>
</html>