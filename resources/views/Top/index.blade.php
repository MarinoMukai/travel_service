<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップ画面</title>
</head>

<body>
    <h1>トップ画面</h1>
    <form action="{{ route('freeInput.page') }}" method="GET">
        <button type="submit">自由記述式</button>
    </form>
    <form action="{{ route('choiceInput.page') }}" method="GET">
        <button type="submit">選択式</button>
    </form>
    <form action="{{ route('chatInput.page') }}" method="GET">
        <button type="submit">チャット式</button>
    </form>
</body>

</body>

</html>