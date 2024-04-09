<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{-- <meta http-equiv="refresh" content="10"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <div class="row pt-5">
            @foreach ($chats as $key => $value)
                @if ($value->user == $whoami)
                    <div class="alert alert-success text-end" role="alert">
                        <span> {{ $value->message }}</span>
                    </div>
                @else
                    <div class="alert alert-primary" role="alert">
                        {{ $value->message }}
                    </div>
                @endif
            @endforeach
            <div class="col">

            </div>
        </div>

        <form action="/chat/{{ $whoami }}" method="POST">
            @csrf
            <div class="row">

                <div class="col-9">
                    <input type='hidden' name='user' value="{{ Str::substr(Request::url(), '27') }}">
                    <div class="input-group">
                        <textarea class="form-control" aria-label="With textarea" name="chatMessage"></textarea>
                    </div>
                </div>
                <div class="col-3">
                    <input type="submit" class="btn btn-danger" value="Enter">
                </div>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
