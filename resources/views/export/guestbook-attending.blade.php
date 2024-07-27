<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="initial-scale=1, width=device-width" />

        <style>
            @page {
                margin: 0px;
            }

            body {
                margin: 0;
                line-height: normal;
                font-family: sans-serif;
                font-size: 18px;
            }

            .container {
                position: relative;
                background-color: #fff;
                width: 100%;
                height: 100%;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                text-align: left;
                font-size: 40px;
                color: #df6100;
                font-family: Montserrat;
            }

            .watermark {
                position: absolute;
                top: 20%;
                left: 10%;
            }

            .footer {
                position: absolute;
                bottom: 0;
                margin: 0;
                width: 100%;
            }

            .header {
                position: relative;
                width: 100%;
                margin: 0;
                z-index: 2;
            }

            .header-content {
                margin: 0 !important;
                position: absolute;
                top: 64px;
                left: 54px;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                justify-content: flex-start;
                gap: 1px;
                z-index: 3;
            }

            h1 {
                margin: 0;
                position: relative;
                font-size: inherit;
                letter-spacing: -0.89px;
                font-weight: bold;
            }

            h3 {
                margin: 0;
                position: relative;
                font-size: 24px;
                letter-spacing: 0.53px;
                font-weight: 500;
                color: #000;
            }

            .data-container {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                justify-content: flex-start;
                padding: 24px 54px;
                box-sizing: border-box;
                gap: 24px;
                z-index: 4;
                font-size: 18px;
                color: #2d78f2;
            }

            .data-group {
                align-self: stretch;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                justify-content: flex-start;
                gap: 16px;
                color: #000;
            }

            .data-group h6 {
                margin: 0;
                position: relative;
                font-size: 24px;
                letter-spacing: -0.02em;
                font-weight: bold;
                margin-bottom: 24px;
                color: #2d78f2;
            }

            .data-item {
                align-self: stretch;
                display: flex;
                flex-direction: row;
                align-items: flex-start;
                justify-content: flex-start;
            }

            .data-item p {
                margin: 0;
                font-size: 18px;
                position: relative;
                letter-spacing: -0.02em;
                font-weight: 600;
                display: inline-block;
                width: 180px;
                flex-shrink: 0;
                margin-bottom: 12px;
            }

            .data-item p:last-child {
                width: auto;
                flex: 1;
            }

            .date-container {
                align-self: stretch;
                display: flex;
                flex-direction: column;
                align-items: flex-end;
                justify-content: center;
                gap: 8px;
                text-align: right;
                font-size: 18px;
                color: #000;
            }

            .date {
                position: relative;
                letter-spacing: -0.02em;
                font-weight: 600;
            }

            .stamp {
                position: relative;
                width: 151px;
                height: 114px;
                object-fit: cover;
            }
        </style>
        <style type="text/css">
            table tr td,
            table tr th{
                font-size: 9pt;
            }
        </style>
    </head>

    <body>
        <div class="container">
            
            <img class="header" alt="" src="data:image/png+xml;base64,<?php echo base64_encode(file_get_contents(base_path('public/img/primary-icon.png'))); ?>" />

            <div class="header-content">
                <h1>Daftar GuestBook</h1>
                <h3>{{ $event['nama_lengkap_mempelai_pria'] }} - {{ $event['nama_lengkap_mempelai_wanita'] }}</h3>
            </div>

            <div class="data-container">
                <div class="data-group">
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No.Hp</th>
                                <th>golongan</th>
                                <th>Status</th>
                                <th>Klasifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach($guest_list as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><span>{{$data->name ?? ''}} 
                                    @if($data->InviteGroup->count() > 0)
                                    - {{$data->inviteGroup->count() }} Orang
                                    @endif </span>
                                </td>
                                <td>{{$data->no_hp ?? ''}}</td>
                                <td>{{$data->tipe ?? ''}}</td>
                                <td style="text-align: center;"><span>{{$data->status ?? '' }}</span>
                                    <p>{{ $data->attended_at ?? ''}}</p>
                                </td>
                                <td style="text-align: center;">{{$data->klasifikasi ?? ''}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>