<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Hoofey.id</title>
    <link rel="stylesheet" href="https://hoofey.id/css/materialize.min.css">

</head>


<body>
    <div class="card">
        <div class="header ">
            <h3>Hello, {{$name }}</h3>
        </div>
    </div>
    <div class="body">
        <p>Anda telah memiliki akun di website <a href="https://hoofey.id" target="_blank">Hoofey.id</a></p>
        <p>Berikut ini info akun Anda</p>
        <p>Nama : <b>{{$name}}</b></p>
        <p>Email : <b>{{$email}}</b></p>
        <p>Password : <b>{{$password}}</b></p>

    </div>
    <div class="card-action">
        <a href="https://hoofey.id/login">Login</a>
    </div>
    <br>
    Terima kasih
    <br>
    Hoofey
</body>

</html>