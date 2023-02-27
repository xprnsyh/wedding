<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 | Not Found</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            text-decoration: none;
            font-family: 'Poppins';
        }

        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .img-wrapper {
            position: relative;
            max-width: 500px;
            text-align: center;
            top: -100px
        }

        .img-wrapper .text-wrapper {
            text-align: center;
            position: absolute;
            min-width: 100%;
            top: 65%;
        }

        .img-wrapper .text-wrapper h1 {
            color: #4C4C4C;
            font-family: Poppins;
            font-style: normal;
            font-weight: bold;
            font-size: 1.9em;
            line-height: 45px;
        }

        .img-wrapper .text-wrapper p {
            color: #7186A0;
            margin: 0;
            font-family: Poppins;
            font-style: normal;
            font-weight: normal;
            font-size: 1.15em;
            line-height: 27px;
        }

        .img-wrapper img {
            max-width: 100%;
        }

        .btn.btn-pink {
            padding: 11px 67px;
            text-decoration: none;
            font-size: 1.1em;
            color: #ffffff;
            background: #F54291;
            position: relative;
            top: 50px;
        }

        @media (max-width: 500px) {
            body {
                font-size: 0.8em !important;
            }
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="img-wrapper">
            <img src="{{ asset('img/404.png') }}" alt="">
            <div class="text-wrapper">
                <h1>Oops! We're lost</h1>
                <p>The pages that you requested is <br>not found in our system</p>
                <a href="{{ url('/') }}" class="btn btn-pink">Back to Home</a>
            </div>
        </div>
    </div>
</body>

</html>
