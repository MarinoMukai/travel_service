<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>travelservice</title>
    <style>
        #prefecture {
            height: 100%;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div>
        <h1>選択式</h1>
        <form action="{{ route('choiceInput.form') }}" method="POST">
            @csrf
            @foreach($choiceList as $choice)
            <div style="display: flex;">
                <div>{{ $choice }}:</div>
                @if ($choice === '都道府県')
                <div id="prefectureInput">
                    <select name="prefecture" id="prefecture">
                        @foreach($prefectureList as $prefecture)
                        <option value="{{ $prefecture }}">{{ $prefecture }}</option>
                        @endforeach
                    </select>
                </div>
                @elseif ($choice === '交通手段')
                <div id="prefectureInput">
                    <select name="transportation" id="transportation">
                        @foreach($transportationList as $transportation)
                        <option value="{{ $transportation }}">{{ $transportation }}</option>
                        @endforeach
                    </select>
                </div>
                @elseif ($choice === '金銭')
                <input type="text" name="money" id="money" style="width: 100px;">
                @endif
            </div>
            @endforeach

            <button type="submit">送信</button>
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
    <script>
        // select文も変更できるように(jsも変更) htmlの<div>{{ $choice }}:</div>のところに書く。
        // <select name="choice" id="choice" onchange="togglePrefectureInput(this)">
        //     @foreach($choiceList as $choice)
        //     <option value="{{ $choice }}">{{ $choice }}</option>
        //     @endforeach
        // </select>
        // function togglePrefectureInput(select) {
        //     var selectedValue = select.value;
        //     console.log(selectedValue);
        //     var prefectureInput = document.getElementById('prefectureInput');
        //     if (selectedValue !== '都道府県') {
        //         prefectureInput.innerHTML = '<input type="text" name="text1" id="text1" style="width: 100px;">';
        //     } else {
        //         var html = '<select name="prefecture" id="prefecture">';
        //         @foreach($prefectureList as $prefecture)
        //         html += '<option value="{{ $prefecture }}">{{ $prefecture }}</option>';
        //         @endforeach
        //         html += '</select>';
        //         prefectureInput.innerHTML = html;
        //     }
        // }
    </script>
</body>


</html>