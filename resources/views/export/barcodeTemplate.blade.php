<!DOCTYPE html>

<html>
    <head>
        <!-- <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1, width=device-width" /> -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            @page {
                size: 8cm 14cm;
                margin: 0px;
            }
            /* @font-face {
                font-family: 'Playfair Display SC';
                src: url('{{ public_path("fonts/Playfair_Display_SC/PlayfairDisplaySC-Black.ttf") }}') format('truetype');
                
            } */
            @import url('https://fonts.googleapis.com/css2?family=Playfair+Display+SC:wght@900&display=swap');
            body {
                text-align: center;
                margin: 0px;
            }
            .qr-invitation-form{
                font-family: 'Playfair Display SC', serif;
                text-align: center;
                font-weight: 900;
                font-style: normal;
            }
            .qr-invitation-title {
                font-family: 'Playfair Display SC', serif;
                text-align: center;
                font-size: 16pt;
                font-weight: 900;
                font-style: normal;
            }
            .qr-invitation-desc {
                font-family: 'Playfair Display SC', serif;
                text-align: center;
                font-size: 10pt;
                font-weight: 900;
                font-style: normal;
            }
            .qr-invitation-qrcode{
                margin-top: 25;
            }
            .qr-invitation-wrap{
                background-color: maroon;
            }
        </style>
    </head>

    <body>
        <div class="qr-invitation-wrap">
            <div class="qr-invitation-body">
                <div class="qr-invitation-form">
                    <div class="qr-invitation-details">
                        <p class="qr-invitation-title" >& QR Code &</p>
                        <p class="qr-invitation-desc" >simpan QR Code ini untuk <br> ditunjukkan pada saat
                            isi buku tamu</p>
                        <img class="qr-invitation-qrcode"
                            src="data:image/png;base64, {!! base64_encode(
                                QrCode::margin(2)->backgroundColor(255,255,255)->format('png')->style('round')->merge('/public/img/logo-hoofey-bg-white.png', 0.5)->errorCorrection('H')->size(220)->generate($data['qr_kode']),
                            ) !!} ">
                        <p class="footer" style="font-size: small;">Bapak/Ibu</p>
                        <p class="footer" style="font-size: small;">{{$data['nama_tamu'] ?? ''}}</p>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>