<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    {{-- icon --}}
    <!--<link rel="shortcut icon" href="{{ asset('img/primary-icon.png') }}">-->
    <link rel="icon" href="{{asset('favicon_hoofey.ico')}}" type="image/x-icon"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style-v1.css') }}" />
    <title>Feature - Don't Worry be Hoofey</title>
</head>

<body>
    @if ($errors->count() > 0)
        <div class="modal d-block" tabindex="-1" role="dialog" id="modal-alert">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ $errors->first() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <nav class="navbar login navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo-pink.png') }}" alt="Hoofey.id" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/feature') }}">Feature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/price') }}">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/story') }}">Template</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="{{ route('login') }}">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <section class="features">
        <div class="container">
            <div class="row features-list mb-5">
                <div class="col-md-12">
                    <div class="text-heading text-center">
                        <h1>
                            <span>Syarat</span> dan <span>Ketentuan</span>
                        </h1>
                    </div>
                    <div class="text-body text-center mt-2">
                        <p>
                            "dibuat oleh hoofey, 08 Agustus 2020."
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <h5>Ketentuan Umum</h5>
                <p>Syarat dan Ketentuan yang ditetapkan berikut ini (selanjutnya disebut sebagai "Syarat dan Ketentuan Pengguna") berlaku untuk penggunaan platform <a href="https://hoofey.id/">www.hoofey.id</a> yang dimiliki dan dikelola oleh CV.Akses Digital yang beralamat di Jl. Kemboja No.1, Kedungjaya, Kec. Kedawung, Kabupaten Cirebon.</p>
                <p>Dengan mengunjungi, mengakses, dan menggunakan Website ini, Anda setuju bahwa Anda telah membaca, memahami, menerima, dan menyetujui Syarat dan Ketentuan Pengguna ini. 
                    Syarat dan Ketentuan Pengguna ini merupakan suatu perjanjian sah antara Anda dan Hoofey.
                    Jika Anda tidak setuju dengan salah satu, sebagian, atau seluruh dari Syarat dan Ketentuan Pengguna ini, maka Anda tidak diperkenankan menggunakan layanan Platform Hoofey.</p>
                <p>Anda merupakan individu yang secara hukum berhak untuk mengadakan perjanjian yang mengikat berdasarkan hukum Negara Republik Indonesia, khususnya Syarat dan Ketentuan Pengguna, untuk menggunakan layanan kami dan bahwa Anda telah berusia minimal 17 tahun atau sudah menikah dan tidak berada di bawah perwalian.
                    Jika tidak, Hoofey berhak berdasarkan hukum untuk membatalkan perjanjian yang dibuat dengan Anda.</p>
            <!-- </div> -->
                <div class="col">
                    <ol class="list-group list-group-numbered">
                        <li>
                            <div>
                                <h5>Definisi</h5>
                                <p>Dalam Syarat dan Ketentuan Pengguna ini, kecuali apabila secara tegas ditentukan lain, istilah-istilah dibawah ini memiliki arti sebagai berikut:</p>
                                <ol class="list-group" type="a">
                                    <div class="col">
                                        <li>
                                            <p>
                                                "Akun Pengguna" berarti akun yang dimiliki oleh Pengguna setelah proses registrasi pada Platform Hoofey.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                “Biaya Layanan” memiliki arti sebagaimana didefinisikan dalam Pasal 4.a;
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                “Kebijakan Privasi” adalah kebijakan privasi yang berlaku sehubungan dengan penggunaan Platform Hoofey yang dapat dilihat di <a href="http://127.0.0.1:8000/kebijakan-privasi">Kebijakan Privasi</a>.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                “Konten Pengguna” merupakan segala data, informasi, teks, foto/gambar, video, lagu, dan berkas yang diunggah oleh Pengguna ke Platform Hoofey.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                “Pengguna” berarti termasuk namun tidak terbatas pada pihak yang mengunjungi atau menggunakan Platform Hoofey dan/atau Website. Istilah “Anda” pada Ketentuan Umum merujuk pada Pengguna.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                “Platform Hoofey adalah layanan platform online yang tersedia pada www.hoofey.id.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                “Transaksi” berarti aktivitas pembelian yang dilakukan oleh Pengguna melalui Platform Hoofey.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                “Website Acara” merupakan website yang dibuat melalui platform Hoofey untuk mempublikasikan undangan.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Hoofey adalah pemilik dan pengelola Platform www.hoofey.id.
                                            </p>
                                        </li>
                                    </div>
                                </ol>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h5>Ketentuan Pengguna</h5>
                                <ol class="list-group" type="a">
                                    <div class="col">
                                        <li>
                                            <p>
                                                Untuk menggunakan platform, pengguna harus registrasi dan membuat akun. Hoofey berhak untuk menolak registrasi pengguna atau membokir akses pengguna ke platform atas kebijaksanaan perusahaan.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Pengguna secara sadar paham bahwa Pengguna akan bertanggung jawab penuh atas aktifitas yang terjadi pada akun Pengguna.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Pengguna hanya dapat menggunakan akun milik sendiri dan Pengguna tidak diperkenankan untuk memberikan wewenang kepada orang lain untuk menggunakan identitas Anda atau menggunakan akun Anda. Apabila wewenang tersebut diberikan kepada orang lain, maka sepenuhnya menjadi tanggung jawab Pengguna.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Hoofey mengumpulkan dan memproses informasi pribadi yang anda berikan langsung kepada Hoofey. Seperti nama, alamat surat elektronik (surel/email), nomor telepon, detail acara, foto, komen, dan informasi lain. Pengguna diwajibkan untuk memberikan informasi yang akurat dan lengkap, serta memperbarui informasi yang secara wajar yang dapat diminta sewaktu-waktu oleh Hoofey.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Pengguna tidak diperbolehkan untuk menyalahgunakan atau menggunakan Platform Hoofey untuk tujuan penipuan atau menyebabkan ketidaknyamanan kepada orang lain.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Pengguna tidak diperkenankan untuk membahayakan, mengubah, atau memodifikasi platform Hoofey dengan cara apapun.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Hoofey tidak bertanggung jawab apabila Pengguna tidak memiliki perangkat yang sesuai. Hoofey berhak untuk melarang Pengguna untuk menggunakan Platform Hoofey lebih lanjut apabila Pengguna menggunakan Platform Hoofey dengan perangkat yang tidak kompatibel/cocok atau tidak sah atau untuk tujuan lain selain daripada tujuan yang dimaksud untuk penggunaan Platform Hoofey ini.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Pengguna memahami dan setuju bahwa penggunaan Platform Hoofey oleh Pengguna akan tunduk pada Kebijakan Privasi kami sebagaimana dapat berubah dari waktu ke waktu. Dengan menggunakan Platform Hoofey dan/atau mengakses Website, Pengguna juga memberikan persetujuan sebagaimana dipersyaratkan berdasarkan Kebijakan Privasi kami.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Apabila Pengguna mempergunakan fitur yang tersedia dalam Platform Hoofey maka Pengguna memahami dan menyetujui segala syarat dan ketentuan yang diatur khusus sehubungan dengan fitur tersebut. Segala hal yang belum dan/atau tidak diatur dalam syarat dan ketentuan khusus dalam fitur tersebut maka akan sepenuhnya merujuk pada syarat dan ketentuan Hoofey secara umum.
                                            </p>
                                        </li>
                                    </div>
                                </ol>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h5>Konten Pengguna</h5>
                                <ol class="list-group" type="a">
                                    <div class="col">
                                        <li>
                                            <p>
                                                Pengguna dilarang untuk mengunggah atau mempergunakan kata-kata, komentar, gambar, atau konten apapun yang mengandung unsur SARA, diskriminasi, pencemaran nama baik, merendahkan atau menyudutkan orang lain, vulgar, bersifat ancaman, beriklan, atau hal-hal lain yang dapat dianggap tidak sesuai dengan nilai dan norma sosial maupun berdasarkan kebijakan yang ditentukan sendiri oleh Hoofey.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Pengguna dilarang mengunggah segala bentuk komunikasi yang dirancang atau ditujukan untuk mendapatkan kata sandi, akun, atau informasi pribadi dari pihak ketiga.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Pengguna dilarang membuat indentitas palsu atau berusaha meniru identitas orang lain.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Pengguna dilarang melanggar hukum atau peraturan lokal, nasional, atau internasional yang berlaku.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Pengguna menjamin bahwa tidak melanggar hak kekayaan intelektual dalam mengunggah konten ke Platform Hoofey. Pengguna memberikan Hoofey hak non-eksklusif, di seluruh dunia, secara terus-menerus, tidak dapat dibatalkan, bebas royalti, disublisensikan (melalui beberapa tingkatan) hak untuk melaksanakan setiap dan semua hak cipta, publisitas, merek dagang, hak basis data dan hak kekayaan intelektual yang Pengguna miliki dalam konten, di media manapun yang dikenal sekarang atau di masa depan. Selanjutnya, untuk sepenuhnya diizinkan oleh hukum yang berlaku, Pengguna mengesampingkan hak moral dan berjanji untuk tidak menuntut hak-hak tersebut terhadap Hoofey.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Pengguna bertanggung jawab penuh terhadap kebenaran, privasi, dan keamanan data yang diunggah ke platform Hoofey.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Pengguna memahami dan menyetujui bahwa pelanggaran konten, data, informasi, dan foto/gambar yang diunggah oleh Pengguna atau pembuat Website adalah tanggung jawab Pengguna secara pribadi. Hoofey berhak melakukan tindakan yang diperlukan atas pelanggaran ketentuan ini, antara lain penghapusan konten, moderasi akun, penutupan akun, dan lain-lain apabila diperlukan.
                                            </p>
                                        </li>
                                    </div>
                                </ol>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h5>Biaya Layanan</h5>
                                <ol class="list-group" type="a">
                                    <div class="col">
                                        <li>
                                            <p>
                                                Pengguna memahami dan menyetujui bahwa Hoofey dapat mengenakan biaya terhadap Pengguna atas layanan yang diberikan Hoofey untuk setiap Transaksi (“Biaya Layanan”). Biaya layanan ini diberlakukan untuk tujuan pemeliharaan sistem dan peningkatan layanan.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Besaran atas Biaya Layanan akan ditentukan lebih lanjut oleh Hoofey dalam halaman tersendiri yang merupakan suatu kesatuan dan bagian yang tidak terpisahkan dari Syarat dan Ketentuan Pengguna ini.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Seluruh biaya layanan yang sudah dilakukan oleh Pengguna tidak dapat dibatalkan atau dikembalikan.
                                            </p>
                                        </li>
                                    </div>
                                </ol>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h5>Jaminan</h5>
                                <ol class="list-group" type="a">
                                    <div class="col">
                                        <li>
                                            <p>
                                                Hoofey tidak memberikan pernyataan, jaminan, atau garansi untuk dapat diandalkannya, ketepatan waktu, kualitas, kesesuaian, ketersediaan, akurasi atau kelengkapan dari Platform Hoofey termasuk (namun tidak terbatas pada) konten yang diperoleh atau berasal dari Pengguna.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Hoofey tidak menjamin bahwa (a) penggunaan Platform Hoofey akan selalu aman, tepat waktu, tanpa gangguan atau terbebas dari kesalahan atau beroperasi dengan kombinasi dengan perangkat keras lain, perangkat lunak, sistem atau data, (b) setiap data yang tersimpan akan akurat atau dapat diandalkan, (c) kualitas produk, aplikasi, informasi, atau bahan-­bahan lain yang diperoleh oleh Pengguna melalui Platform Hoofey akan memenuhi kebutuhan atau harapan Pengguna, (d) kesalahan atau kecacatan dalam Platform Hoofey akan diperbaiki, atau (e) aplikasi atau server yang menyediakan Platform Hoofey terbebas dari virus atau komponen berbahaya lainnya.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Pengguna mengakui dan menyetujui bahwa seluruh risiko yang timbul dari penggunaan Platform Hoofey dan/atau Website Acara oleh Pengguna tetap semata-­mata dan sepenuhnya ada pada Pengguna dan Pengguna tidak akan memiliki hak untuk meminta ganti rugi apapun dari Hoofey.
                                            </p>
                                        </li>
                                    </div>
                                </ol>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h5>Kebijakan Privasi</h5>
                                <p>Pengguna dapat mengakses Kebijakan Privasi melalui <a href="http://127.0.0.1:8000/kebijakan-privasi">Kebijakan privasi</a> . Dengan menggunakan Platform Hoofey, maka Pengguna dianggap sepakat atas Kebijakan Privasi dan memberikan hak kepada Hoofey untuk menggunakan informasi Pengguna yang terdapat dalam Platform Hoofey untuk kepentingan pengembangan Platform Hoofey maupun komersial Hoofey, sepanjang diperbolehkan oleh peraturan perundang-undangan.</p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h5>Lain-lain</h5>
                                <ol class="list>-group" type="a">
                                    <div class="col">
                                        <li>
                                            <p>
                                                Syarat dan Ketentuan Pengguna ini diatur oleh dan ditafsirkan berdasarkan hukum Negara Republik Indonesia. Pengguna setuju bahwa tindakan hukum apapun atau sengketa yang mungkin timbul dari, berhubungan dengan, atau berada dalam cara apapun berhubungan dengan situs dan/atau Syarat dan Ketentuan ini akan diselesaikan secara eksklusif dalam yurisdiksi pengadilan Republik Indonesia.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Syarat dan Ketentuan Pengguna ini dapat dimodifikasi dan diubah dari waktu ke waktu. Hoofey akan memberitahu Pengguna melalui Platform Hoofey dan/atau email atas modifikasi, dan/atau perubahan atas Syarat dan Ketentuan Pengguna. Penggunaan Platform Hoofey secara terus menerus setelah diterimanya pemberitahuan ini merupakan persetujuan dan penerimaan Anda atas modifikasi dan/atau perubahan. Apabila Pengguna tidak bersedia untuk terikat pada Syarat dan Ketentuan Pengguna yang baru, maka Pengguna dapat melakukan permintaan penutupan Akun Pengguna dengan mengirimkan email ke <a href="">cvaksesdigital@gmail.com</a>
                                            </p>
                                        </li>
                                    </div>
                                </ol>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-heading text-white text-center">
                        <h1>Tunggu apa lagi? Miliki sekarang juga!</h1>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row d-flex align-items-center justify-content-center mt-5">
                        <div class="col-lg-6 col-md-8 col-sm-9 col-xs-9 col-12">
                            <div class="signup-homepage">
                                <form action="{{ route('register') }}" method="get">
                                    <input type="text" name="email" id="email" placeholder="Your Email Address" />
                                    <button type="submit" class="btn btn-orange">
                                        Daftar Sekarang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-light">
        <div class="col-lg-12 text-center">
            <p>2020-2021 Copyright Hoofey by Akses Digital. All Rights Reserved</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $("nav.navbar button.navbar-toggler").click(function() {
                $("nav").addClass("bg-putih");
            });
            $(window).scroll(function() {
                if ($(document).scrollTop() > 70) {
                    $("nav.navbar").addClass("bg-putih");
                } else {
                    $("nav.navbar").removeClass("bg-putih");
                }
            });
        });
    </script>
</body>

</html>