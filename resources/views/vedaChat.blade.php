<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    {{ app('request')->input('name') }}
    <hr>

    @if (isset($chats))
        @foreach ($chats as $key => $value)
            {{ $value->user }}:
            {{ $value->message }}<br>
        @endforeach
    @else
        <p>Not working</p>
    @endif

    <form action="/veda/input/{{ $a }}" method="POST">
        @csrf
        @if (isset($a))
            <input type="text" name="name" value="{{ $a }}" disabled><br><br>
        @else
            <input type="text" name="name"><br><br>
        @endif

        <input type="text" name="message"><br><br>
        <input type="submit">
    </form>
</body>

</html>
