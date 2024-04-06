<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>travelservice</title>
</head>
<body>
    <div>
        <div>
            <!-- 成功メッセージ -->
            @if (session('success'))
                 {{session('success')}}
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