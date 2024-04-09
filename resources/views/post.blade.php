<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>New Post:</h2>
                <form action="/create" method="POST">
                    @csrf
                    <label for="subject" class="form-label">Enter Subject</label><br>
                    <input type="text" name="subject" class="form-control">
                    <label for="subject" class="form-label">Enter your private message</label><br>
                    <textarea name="message" cols="30" rows="10" class="form-control"></textarea><br>

                    <input class="btn btn-success" type="submit" value="Submit">
                </form>
            </div>
            <div class="col-6 bg-dark text-white">
                <h2>Recent Tweets:</h2>
                @foreach ($posts as $key => $value)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $value->subject }}</h5>
                            <p class="card-text">{{ $value->message }}</p>
                            <sup>Posted on {{ $value->created_at }} | Author: Admin</sup>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
