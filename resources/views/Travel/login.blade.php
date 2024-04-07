<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main</title>
</head>

<body>
    <div>aasbksvlsdjvl</div>

    <form action="{{ route('loginsubmit.form') }}" method="POST">
        @csrf
        <label for="inputName1">名前:</label>
        <input type="text" name="inputName1" id="inputName1" value="{{ old('inputName1') }}">
        @error('inputName1')
            <div>{{ $message }}</div>
        @enderror
        <br>
        <label for="inputName2">パスワード:</label>
        <input type="password" name="inputName2" id="inputName2" value="{{ old('inputName2') }}">
        @error('inputName2')
            <div>{{ $message }}</div>
        @enderror
        <br>
        <button type="submit">送信</button>
    </form>
</body>

</html>