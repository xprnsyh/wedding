<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Newsletter</title>
    <style>
        nav {
            width: 100%;
            height: 65px;
            background: #F8F9FA;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        section.body {
            padding: 35px 130px;
        }

        footer {
            width: 100%;
            height: 65px;
            background: #F8F9FA;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        footer p {
            font-family: Source Sans Pro;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 15px;
            color: #868E96
        }

        @media (max-width: 500px) {
            section.body {
                padding: 35px 15px;
            }
        }

    </style>
</head>

<body>
    <nav>
        <img src="{{ asset('admin-bsb/images/logo.png') }}" width="100" height="30" alt="">
    </nav>
    <section class="body">
        {!! $content !!}
    </section>
    <footer>
        <p>&#169; {{ date('Y') }} Hoofey. All rights reserved.</p>
    </footer>
</body>

</html>
