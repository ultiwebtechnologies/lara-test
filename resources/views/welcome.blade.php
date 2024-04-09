<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Private Social Network</title>
</head>

<body>

    @if (isset($subject))
        <p>Your tweet has been posted successfully</p>
        <p><a href="/">Go Back</a></p>
    @else
        <h1>Welcome to Private Social Network</h1>
        <form action="/create" method="POST">
            @csrf
            <label for="subject">Enter Subject</label><br>
            <input type="text" name="subject"><br><br>
            <label for="subject">Enter your private message</label><br>
            <textarea name="message" id="" cols="30" rows="10"></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
    @endif

</body>

</html>
