<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" CONTENT="noindex, nofollow">
    <title>Hoofey - Wedding of {{$event->nama_panggilan_mempelai_wanita}} & {{$event->nama_panggilan_mempelai_pria}}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{asset('favicon-16x16.png')}}" sizes="16x16" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template-1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template-1/css/dripicons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template-1/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template-1/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template-1/css/styles.css') }}">
    <style type="text/css">
        header:after {
            display: none;
        }

        #subscribers {
            padding-top: 120px;

        }

        .subscriber-list {
            padding: 20px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
        }

        /* Dark Style */
        .subscriber-list.dark {
            background-color: #1d1d1d;
            color: #999;
        }

        .subscriber-list.dark input,
        .subscriber-list.dark select {
            color: #ddd;
            padding: 6px 10px;
            background: #666;
            border: 0;
        }

        .subscriber-list.dark input:focus,
        .subscriber-list.dark select:focus {
            outline: none;
            box-shadow: none;
        }

        .subscriber-list.dark td {
            color: #aaa !important;
            font-weight: 400 !important;
            border-color: #333 !important;
        }

        .subscriber-list.dark th {
            font-weight: 600 !important;
            color: #EEE !important;
            border-color: #333 !important;
        }

        /* Light Style */
        .subscriber-list.light {
            background-color: #fff;
            color: #4d4d4d;
        }

        .subscriber-list.light input,
        .subscriber-list.light select {
            color: #4d4d4d;
            padding: 6px 10px;
            background: #eee;
            border: 0;
        }

        .subscriber-list.light input:focus,
        .subscriber-list.light select:focus {
            outline: none;
            box-shadow: none;
        }

        .subscriber-list.light td {
            color: #4d4d4d !important;
            font-weight: 400 !important;
            border-color: #eee !important;
        }

        .subscriber-list.light th {
            font-weight: 600 !important;
            color: #2d2d2d !important;
            border-color: #ccc !important;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="menu">
        <div class="container">
            <div class="row mb-0">
                <div class="col-md-5 col-sm-5 col-5 text-right my-auto">
                    <p class="mb-0 logo bold italic float-left">{{strtoupper($event->nama_panggilan_mempelai_wanita)}} & {{strtoupper($event->nama_panggilan_mempelai_pria)}} <br> WEDDING</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Navbar -->




    <!-- Subscribers -->
    <header id="subscribers">
        <div class="container">


            <div class="row">
                <div class="col-sm-12">
                    <h3 class="color--tosca text-center">Ucapan dan Harapan Untuk {{($event->nama_panggilan_mempelai_wanita)}} & {{($event->nama_panggilan_mempelai_pria)}}</h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    @include('layouts.alert')
                    <div class="subscriber-list light">
                        <table id="subscribers-table" class="table table-responsive-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Ucapan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_guestbook as $guestbook)
                                <tr>
                                    <td>{{$guestbook->user->name}}</td>
                                    <td>{{$guestbook->text}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <!-- RSVP -->
            <div id="rsvp">
                <div class="title--lg text-center">
                    <h2 class="font--2 color--midnight">Ucapan dan Harapan</h2>
                    <small class="fonr--3 color--midnight">Silahkan tulis harapan dan do'a untuk {{($event->nama_panggilan_mempelai_wanita)}} & {{($event->nama_panggilan_mempelai_pria)}} </small>
                </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="rsvp--form">
                            <form action="{{route('wishes',[ 'id' => $event->id])}}" autocomplete="off" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email Anda" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="text" class="form-control" placeholder="Ucapan dan Harapan Kalian" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn-info">Kirim Ucapan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
            <!-- End: RSVP -->

        </div>
        <footer style="background-color: #F7F7F7;padding: 20px 0;font-size: 12px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center" style="color: #111">Copyright 2021 Wedding Invitation by hoofey.id - All Rights Reserved</td>
                </tr>
            </table>
        </footer>
    </header>
    <!-- End: Subscribers -->



    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('template-1/js/jquery-3.1.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-1/js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-1/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-1/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-1/js/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-1/js/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-1/js/buttons.html5.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#subscribers-table').DataTable();
        });
    </script>
</body>

</html>