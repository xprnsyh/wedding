<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Site Metas -->
	<title>Hoofey - Wedding Of {{$event->nama_panggilan_mempelai_wanita}} & {{$event->nama_panggilan_mempelai_pria}}</title>
	<meta name="keywords" content="">
	<meta name="description" content="Undangan Website Pernikahan">
	<meta name="author" content="">
	<meta property="og:title" content="WEDDING OF {{$event->nama_panggilan_mempelai_wanita }} & {{$event->nama_panggilan_mempelai_pria }}" />
	<meta property="og:url" content="{{route('see.event',[ 'slug' => $event->slug])}}" />

	@if($photo_event != null)
	<meta property="og:image" content="{{asset($photo_event[0]['path'])}}">
	<meta property="og:image:size" content="300" />
	@endif
	<meta property="og:description" content="{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y')}}">

	<meta property="og:image:type" content="image/jpeg" />

	<!-- Site Icons -->
	<link rel="shortcut icon" href="{{asset('template-5/images/favicon.png')}}">
	<link rel="apple-touch-icon" href="{{asset('template-5/images/apple-touch-icon (2).png')}}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('template-5/css/bootstrap.min.css')}}">
	<!-- Pogo Slider CSS -->
	<link rel="stylesheet" href="{{asset('template-5/css/pogo-slider.min.css')}}">
	<!-- Site CSS -->
	<link rel="stylesheet" href="{{asset('template-5/css/style.css')}}">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="{{asset('template-5/css/responsive.css')}}">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{asset('template-5/css/custom.css')}}">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">


	<!-- LOADER -->
	<!-- <div id="preloader">
		<div class="preloader pulse">
			<h3>Karlene Hoard & Jonas Pare</h3>
		</div>
    </div> -->
	<!-- END LOADER -->

	<!-- Navbar -->
	<div class="menu">
		<div class="container">
			<div class="row mb-0">
				<div class="col-md-5 col-sm-5 col-5 text-right my-auto">
					<p class="mb-0 logo bold italic float-left" style="font-family: 'Engagement'; font-size: 25px" href="#">The Wedding Of {{($event->nama_panggilan_mempelai_wanita)}} & {{($event->nama_panggilan_mempelai_pria)}} </p>
				</div>
				<div class="col-md-7 col-sm-7 col-7 text-right my-auto">
					<div class="share">
						SHARE
						<span class="separator"></span>
						<span class="share-social">
							<a href="https://www.facebook.com/sharer.php?u=https://hoofey.id/{{$event->slug}}" target="_blank">
								<img src="{{asset('template-5/images/icons/facebook.png')}}" alt="">
							</a>
							<a href="https://twitter.com/share?url=https://hoofey.id/{{$event->slug}}&amp;text=SOME_TEXT&amp;hashtags=HASHTAGS" target="_blank">
								<img src="{{asset('template-5/images/icons/twitter.png')}}" alt="">
							</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End: Navbar -->

	<!-- Start header -->
	<!-- <header class="top-header">
		<nav class="navbar header-nav navbar-expand-lg">
            <div class="container">
				<a class="mb-0 logo bold italic float-left" style="font-family: 'Engagement'; font-size: 25px" href="#">The Wedding Of {{($event->nama_panggilan_mempelai_wanita)}} & {{($event->nama_panggilan_mempelai_pria)}}</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
						<li>
						<a class="share bold italic text-uppercase">Share</a>
						<span class="separator"></span>
                        <span class="share-social">
                            <a href="https://www.facebook.com/sharer.php?u=https://hoofey.id/{{$event->slug}}" target="_blank">
                                <img src="{{asset('template-1/img/icons/facebook.png')}}" alt="">
                            </a>
                            <a href="https://twitter.com/share?url=https://hoofey.id/{{$event->slug}}&amp;text=SOME_TEXT&amp;hashtags=HASHTAGS" target="_blank">
                                <img src="{{asset('template-1/img/icons/twitter.png')}}" alt="">
                            </a>
                        </span>
						</li>
                    </ul>
                </div> -->
	<!-- <div class="col-md-7 col-sm-7 col-7 text-right my-auto">
                    <div class="share bold italic text-uppercase">
                        share
                        <span class="separator"></span>
                        <span class="share-social">
                            <a href="https://www.facebook.com/sharer.php?u=https://hoofey.id/{{$event->slug}}" target="_blank">
                                <img src="{{asset('template-1/img/icons/facebook.png')}}" alt="">
                            </a>
                            <a href="https://twitter.com/share?url=https://hoofey.id/{{$event->slug}}&amp;text=SOME_TEXT&amp;hashtags=HASHTAGS" target="_blank">
                                <img src="{{asset('template-1/img/icons/twitter.png')}}" alt="">
                            </a>
                        </span>
                    </div> -->
	</div>
	</div>
	</nav>
	</header>
	<!-- End header -->

	<!-- Start Banner -->
	<div class="home-slider">
		<ul class="rslides">
			<li><img src="{{asset('template-5/images/slider-01.jpg')}}" alt=""></li>
			<li><img src="{{asset('template-5/images/slider-02.jpg')}}" alt=""></li>
			<li><img src="{{asset('template-5/images/slider-03.jpg')}}" alt=""></li>
		</ul>
		<div class="lbox-details">
			<h1>{{$event->nama_panggilan_mempelai_wanita}} & {{$event->nama_panggilan_mempelai_pria}}</h1>
			<h2>We're getting married</h2>
			<div class="countdown main-time clearfix">
				<div id="timer">
					<h3> {{ \Carbon\Carbon::parse($event->tanggal_resepsi)->format('M d Y')}} </h3>
					<div id="days"></div>
					<div id="hours"></div>
					<div id="minutes"></div>
					<div id="seconds"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Banner -->

	<!-- Start About us -->
	<div id="about" class="about-box">
		<div class="about-a1">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="title-box">
							<h2> {{$event->nama_panggilan_mempelai_wanita}} & {{$event->nama_panggilan_mempelai_pria}} </h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="row align-items-center about-main-info">
							<div class="col-lg-4 col-md-6 col-sm-12">
								@if($event->avatar_wanita != null)
								<div class="about-m">
									<div class="about-img">
										<img class="img-fluid" src="{{asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita)}}" alt="fotomempelai" class="image-mempelai">
									</div>
									<ul>
										<li><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
										<li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
										<li><a href="https://google-plus.com"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
								@endif
							</div>
							<div class="col-md-6 col-sm-6">
								<h2> <i class="fa fa-heart-o" aria-hidden="true"></i> <span>{{$event->nama_lengkap_mempelai_wanita}}</span> <i class="fa fa-heart-o" aria-hidden="true"></i></h2>
								<p class="textpotong">{{$event->bio_mempelai_wanita}}</p>
							</div>
						</div>
						<div class="row align-items-center about-main-info">
							<div class="col-lg-4 col-md-6 col-sm-12">
								@if($event->avatar_pria != null)
								<div class="about-m">
									<div class="about-img">
										<img class="img-fluid" src="{{asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria)}}" alt="fotomempelai" class="image-mempelai">
									</div>
									<ul>
										<li><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
										<li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
										<li><a href="https://google-plus.com"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
								@endif
							</div>

							<div class="col-md-6 col-sm-6">
								<h2> <i class="fa fa-heart-o" aria-hidden="true"></i> <span>{{$event->nama_lengkap_mempelai_pria}}</span> <i class="fa fa-heart-o" aria-hidden="true"></i></h2>
								<p class="textpotong">{{$event->bio_mempelai_pria}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About us -->

	<!-- Start Story -->
	<!-- <div id="story" class="story-box main-timeline-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Our Story</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					</div>
				</div>
			</div>
			
			<div class="timeLine">
				<div class="row">
					<div class="lineHeader hidden-sm hidden-xs"></div>
					<div class="lineFooter hidden-sm hidden-xs"></div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 item" >
							<div class="caption">
								<div class="star center-block">
									<span class="h3">01</span>
									<span>March </span>
									<span>2017</span>
								</div>
								<div class="image">
									<img src="{{asset('template-5/images/time-01.jpg')}}" alt="" />
									<div class="title">
										<h2>First Meet <i class="fa fa-angle-right" aria-hidden="true"></i></h2>
									</div>
								</div>
								<div class="textContent">
									<p class="lead">We met at the wedding of our close friends and immediately found a common language, so a year later our first date happened.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 item">
							<div class="caption">
								<div class="star center-block">
									<span class="h3">03</span>
									<span>April</span>
									<span>2017</span>
								</div>
								<div class="image">
									<img src="{{asset('template-5/images/time-02.jpg')}}" alt="" />
									<div class="title">
										<h2>First date <i class="fa fa-angle-right" aria-hidden="true"></i></h2>
									</div>
								</div>
								<div class="textContent">
									<p class="lead">We met at the wedding of our close friends and immediately found a common language, so a year later our first date happened.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 item">
							<div class="caption">
								<div class="star center-block">
									<span class="h3">03</span>
									<span>May</span>
									<span>2017</span>
								</div>
								<div class="image">
									<img src="{{asset('template-5/images/time-03.jpg')}}" alt="" />
									<div class="title">
										<h2>Proposal <i class="fa fa-angle-right" aria-hidden="true"></i></h2>
									</div>
								</div>
								<div class="textContent">
									<p class="lead">We met at the wedding of our close friends and immediately found a common language, so a year later our first date happened.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 item">
							<div class="caption">
								<div class="star center-block">
									<span class="h3">04</span>
									<span>June</span>
									<span>2017</span>
								</div>
								<div class="image">
									<img src="{{asset('template-5/images/time-04.jpg')}}" alt="" />
									<div class="title">
										<h2>Engagement <i class="fa fa-angle-right" aria-hidden="true"></i></h2>
									</div>
								</div>
								<div class="textContent">
									<p class="lead">For 2 years of work as support engineer responsible about installing and maintenance SWIFT packages for banks. I gain a lot from it before i leave country.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 item">
							<div class="caption">
								<div class="star center-block">
									<span class="h3">04</span>
									<span>July</span>
									<span>2017</span>
								</div>
								<div class="image">
									<img src="{{asset('template-5/images/time-05.jpg')}}" alt="" />
									<div class="title">
										<h2>My Wedding <i class="fa fa-angle-right" aria-hidden="true"></i></h2>
									</div>
								</div>
								<div class="textContent">
									<p class="lead">Since then i came to Austria as refugee far from my lovers and friends far a way escaping from wars and threats searching a new life that i didn't find until yet.</p>
								</div>
							</div>
						</div>

				</div>
			</div>
			
		</div>
	</div> -->
	<!-- End Story -->

	<!-- Start Family -->
	<!-- <div id="family" class="family-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Family</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="single-team-member">
						<div class="family-img">
							<img class="img-fluid" src="{{asset('template-5/images/family-01.jpg')}}" alt="" />
						</div>
						<div class="family-info">
							<h4>Mr. Alonso Wiles </h4>
							<p>{ Elfa’s Father }</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="single-team-member">
						<div class="family-img">
							<img class="img-fluid" src="{{asset('template-5/images/family-02.jpg')}}" alt="" />
						</div>
						<div class="family-info">
							<h4>Mr. Evon Wiles </h4>
							<p>{ Elfa’s Mother }</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="single-team-member">
						<div class="family-img">
							<img class="img-fluid" src="{{asset('template-5/images/family-03.jpg')}}" alt="" />
						</div>
						<div class="family-info">
							<h4>Mr. Chris Wiles </h4>
							<p>{ Elfa’s Brother }</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="single-team-member">
						<div class="family-img">
							<img class="img-fluid" src="{{asset('template-5/images/family-04.jpg')}}" alt="" />
						</div>
						<div class="family-info">
							<h4>Mr. Adina Wiles </h4>
							<p>{ Elfa’s Sister }</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="single-team-member">
						<div class="family-img">
							<img class="img-fluid" src="{{asset('template-5/images/family-05.jpg')}}" alt="" />
						</div>
						<div class="family-info">
							<h4>Mr. Annetta Wiles </h4>
							<p>{ Elfa’s Sister }</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="single-team-member">
						<div class="family-img">
							<img class="img-fluid" src="{{asset('template-5/images/family-06.jpg')}}" alt="" />
						</div>
						<div class="family-info">
							<h4>Mr. Ladonna Wiles </h4>
							<p>{ Elfa’s Sister }</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- End Family -->

	<!-- Start Gallery -->
	@if($photo_event != null)
	<div id="gallery" class="gallery-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="title-box">
						<h2>Gallery</h2>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p> -->
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($photo_event as $gallery)
				<div class="col-12 col-md-3 col-lg-3">
					<div class="tumb1">
						<ul class="popup-gallery clearfix">
							<li style="width: 100%; height:auto; align-items: middle">
								<a href="{{asset($gallery['path'])}}">
									<img class="img-fluid2" src="{{asset($gallery['path'])}}" alt="single image">
									<span class="overlay"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	@endif
	<!-- End Gallery -->

	<!-- Youtube -->
	@if($event->link_youtube != null)
	<div id="gallery" class="youtube-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Trailer Wedding</h2>
						<br>
						<div class="col-lg-8 offset-lg-2 my-auto">

							<div id="video" class="videowrapper">
								{!!$event->link_youtube!!}
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
	<!-- End Youtube -->

	<!-- Start Wedding -->
	<div id="wedding" class="wedding-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Wedding Day</h2>
						<!-- <p>Yang akan dilaksanakan pada : </p> -->
					</div>
				</div>
			</div>

			<div class="row">

				<div class="col-md-6 col-sm-6">
					<div class="serviceBox">
						<div class="service-icon"><i class="flaticon-wedding"></i></div>
						<h3 class="title">Akad Nikah </h3>
						<h2 class="description"> {{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('M d Y')}} </h2>
						<h4>{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i')}} - {{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('H:i')}} WIB</h4>
						<p class="description">
							{{$event->lokasi_ijab}}
						</p>
					</div>
				</div>

				<div class="col-md-6 col-sm-6">
					<div class="serviceBox">
						<div class="service-icon"><i class="flaticon-reception-bell"></i></div>
						<h3 class="title">Acara Resepsi </h3>
						<h2 class="description"> {{ \Carbon\Carbon::parse($event->tanggal_resepsi)->format('M d Y')}} </h2>
						<h4>{{ \Carbon\Carbon::parse($event->jam_mulai_resepsi)->format('H:i')}} - {{ \Carbon\Carbon::parse($event->jam_selesai_resepsi)->format('H:i')}} WIB</h4>
						<p class="description">
							{{$event->lokasi_resepsi}}
						</p>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- End Wedding -->

	<!-- Maps -->
	@if($event->gm_ijab != null)
	<div id="wedding" class="wedding-box2">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Lokasi Resepsi</h2>
						<br>
						<div class="col-lg-8 offset-lg-2">
							<div id="maps" class="peta-responsive">
								{!!$event->gm_ijab!!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
	<!-- End: Maps -->

	<!-- Start Contact -->
	<div id="contact" class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-attending">
						<h2>Are You Attending?</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form action="{{route('attending',[ 'id' => $event->id])}}" autocomplete="off" method="POST">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="name" class="form-control" placeholder="Your Name ..." required>

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="Your Email ..." required>

									</div>
								</div>
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit">I am attending</button>
										<div id="msgSubmit" class="h3 text-center hidden"></div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</form>
					</div>
					@include('layouts.alert')
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact -->

	<!-- Protokol -->
	<div id="events" class="events-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Aturan Protokol Kesehatan</h2>
					</div>
					<div class="row text-center">
						<div class="col-sm-12 col-md-12 col-lg-4">
							<img src="{{asset('admin-bsb/images/protokol-1.png')}}" alt="protokol1">
							<p>Menggunakan Masker</p>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-4">
							<img src="{{asset('admin-bsb/images/protokol-2.png')}}" alt="protokol2">
							<p>Mencuci Tangan Dengan Sabun</p>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-4">
							<img src="{{asset('admin-bsb/images/protokol-3.png')}}" alt="protokol3">
							<p>Tidak Berjabat Tangan</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- End: Protokol -->

	<!-- Panduan -->
	<div id="panduan" class="panduan-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Panduan Penggunaan Aplikasi</h2>
					</div>
					<div class="row text-center" style="margin: 45px 0;">
						<div class="col-sm-12 col-md-12 col-lg-6">
							<img src="{{asset('admin-bsb/images/step-1.png')}}" alt="protokol1"><br>
							<p><b>Download Aplikasi di Google Playstore</b></p>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6">
							<img src="{{asset('admin-bsb/images/step-2.png')}}" alt="protokol2"><br>
							<p><b>Login menggunakan email yang sudah didaftarkan</b></p>
						</div>
					</div>
					<div class="row text-center" style="margin: 45px 0;">
						<div class="col-sm-12 col-md-12 col-lg-6">
							<img src="{{asset('admin-bsb/images/step-3.png')}}" alt="protokol1"><br>
							<p><b>Pilih menu invitation dan pilih undangan</b></p>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6">
							<img src="{{asset('admin-bsb/images/step-4.png')}}" alt="protokol2"><br>
							<p><b>Lihat detail undangan mulai dari nama sampai lokasi pernikahan</b></p>
						</div>
					</div>
					<div class="row text-center" style="margin: 45px 0;">
						<div class="col-sm-12 col-md-12 col-lg-6">
							<img src="{{asset('admin-bsb/images/step-5.png')}}" alt="protokol1"><br>
							<p><b>Pilih menu SCAN QR di pojok kanan atas</b></p>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6">
							<img src="{{asset('admin-bsb/images/step-6.png')}}" alt="protokol2" class="img6"><br>
							<p><b>Scan QR Code yang telah tersedia di lokasi resepsi</b></p>
						</div>
					</div>
					<div class="row text-center" style="margin: 45px 0;">
						<div class="col-sm-12 col-md-12 col-lg-6">
							<img src="{{asset('admin-bsb/images/step-7.png')}}" alt="protokol1"><br>
							<p><b>Setelah Scan QR kamu bisa langsung memberikan ucapan</b></p>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6">
							<img src="{{asset('admin-bsb/images/step-8.png')}}" alt="protokol2" class="img8"><br>
							<p><b>Pilih tombol kamera untuk selfie</b></p>
						</div>
					</div>
					<div class="row text-center" style="margin: 45px 0;">
						<div class="col-sm-12 col-md-12 col-lg-6">
							<img src="{{asset('admin-bsb/images/step-9.png')}}" alt="protokol1"><br>
							<p><b>Pilih template selfie kesukaanmu dan foto</b></p>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6">
							<img src="{{asset('admin-bsb/images/step-10.png')}}" alt="protokol2"><br>
							<p><b>Kamu juga bisa share dan simpan foto</b></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End: Panduan -->
	@if($event->audio_id != null)
	<audio autoplay hidden loop>
		<source src="{{asset('admin/assets/audio/' . $event->audio->path ?? '')}}" type="audio/mpeg" id="audio">
	</audio>
	@endif
	<!-- Start Footer -->
	<footer class="footer-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p class="footer-company-name">The Wedding Of <a href="#">{{$event->nama_lengkap_mempelai_wanita}} & {{$event->nama_lengkap_mempelai_pria}} </a></p>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer -->

	<!-- ALL JS FILES -->
	<script src="{{asset('template-5/js/jquery.min.js')}}"></script>
	<script src="{{asset('template-5/js/popper.min.js')}}"></script>
	<script src="{{asset('template-5/js/bootstrap.min.js')}}"></script>
	<!-- ALL PLUGINS -->
	<script src="{{asset('template-5/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('template-5/js/jquery.pogo-slider.min.js')}}"></script>
	<script src="{{asset('template-5/js/slider-index.js')}}"></script>
	<script src="{{asset('template-5/js/smoothscroll.js')}}"></script>
	<script src="{{asset('template-5/js/responsiveslides.min.js')}}"></script>
	<script src="{{asset('template-5/js/timeLine.min.js')}}"></script>
	<script src="{{asset('template-5/js/form-validator.min.js')}}"></script>
	<script src="{{asset('template-5/js/contact-form-script.js')}}"></script>
	<script src="{{asset('template-5/js/custom.js')}}"></script>
	<script src="{{asset('template-5/js/levidio.js')}}"></script>

	<!-- /* ..............................................
    Countdown Clock
    ................................................. */ -->
	<script>
		(function() {
			const second = 1000,
				minute = second * 60,
				hour = minute * 60,
				day = hour * 24;

			let wedding = "{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('M d Y')}} {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i')}}",
				countDown = new Date(wedding).getTime(),
				x = setInterval(function() {

					let now = new Date().getTime(),
						distance = countDown - now;

					document.getElementById("days").innerText = Math.floor(distance / (day)),
						document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
						document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
						document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
				}, 0)
		}());
	</script>

	<script>
		function resize_image($file, $w, $h, $crop = FALSE) {
			list($width, $height) = getimagesize($file);
			$r = $width / $height;
			if ($crop) {
				if ($width > $height) {
					$width = ceil($width - ($width * abs($r - $w / $h)));
				} else {
					$height = ceil($height - ($height * abs($r - $w / $h)));
				}
				$newwidth = $w;
				$newheight = $h;
			} else {
				if ($w / $h > $r) {
					$newwidth = $h * $r;
					$newheight = $h;
				} else {
					$newheight = $w / $r;
					$newwidth = $w;
				}
			}
			$src = imagecreatefromjpg($file);
			$dst = imagecreatetruecolor($newwidth, $newheight);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

			return $dst;
		}
	</script>

</body>

</html>