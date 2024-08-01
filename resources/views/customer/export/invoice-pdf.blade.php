<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Invoice {{$data['order']['invoice']}}</title>

		<!-- Favicon -->
		<link rel="icon" href="{{ asset('img/logo-pink.png') }}" type="image/x-icon" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
				margin-top: 25pt;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			.fa {
				display: inline;
				font-style: normal;
				font-variant: normal;
				font-weight: normal;
				font-size: 14px;
				line-height: 1;
				font-family: FontAwesome;
				font-size: inherit;
				text-rendering: auto;
				-webkit-font-smoothing: antialiased;
				-moz-osx-font-smoothing: grayscale;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td>
									<img class="stamp" alt="" style="width: 100%; max-width: 160px" src="data:image/png+xml;base64,<?php echo base64_encode(file_get_contents(base_path('public/img/logo-hoofey.png'))); ?>" /><br />
									CV.Akses Digital<br />
									Jl. Kemboja No.1, Kedungjaya, Kec. Kedawung, Kabupaten Cirebon<br />
									<span class="fa fa-envelope"></span>	hoofey.aksesdigital@gmail.com<br />
									<span class="fa fa-solid fa-phone"></span> / <span class="fa fa-brands fa-whatsapp"></span> (+62) 81220801118<br />
								</td>

								<td>
									Invoice: {{$data['order']['invoice']}}<br />
                                    {{$data['order']['customer_name']}} <br />
                                    {{$data['order']['customer_phone']}} - {{$data['customer']['email']}}<br />
                                    {{$data['order']['customer_address']}},{{$data['district_id']['name']}}<br />
                                    {{$data['cities_id']['name']}} - {{$data['provinces_id']['name']}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Item</td>
					<td>#</td>
				</tr>

				<tr class="items">
					<td>{{$data['product']['name']}}</td>
					<td>Rp {{number_format($data['product']['price'],0)}}</td>
				</tr>

				@if($data['order']['discount_amount'] != null)
					<tr class="item">
						<td>Discount</td>
						<td>Rp {{number_format($data['order']['discount_amount'])}}</td>
					</tr>
				@endif

				<tr class="total">
					<td></td>
					<td>Total: Rp {{number_format($data['order']['subtotal'],0)}}</td>
				</tr>
			</table>
			<div class="footer">
				<table>
					<tr>
						<td>
							<table>
								<tr class="heading" >
									<td style="text-align: center;">
										Metode Pembayaran<br />
									</td>
								</tr>
								<tr class="item">
								<td style="text-align: center;">
										Transfer<br />
										Bank Mandiri<br />
										AN : CV. Akses Digital <br />
										No.Rek : 1340000432129
									</td>
								</tr>
							</table>
						</td>
						@if ($data['order']['status'] == 'SUCCESS')
							<td>
								<table>
									<tr>
									<img class="stamp" alt="" style="width: 100%; max-width: 160px" src="data:image/png+xml;base64,<?php echo base64_encode(file_get_contents(base_path('public/img/lunas.png'))); ?>" /><br />
									</tr>
								</table>
							</td>
						@else
						<td style="width: 50%;"></td>
						@endif
					</tr>
				</table>
				
			</div>
			<div class="footer">
				<table style="width: 45%;">
					<tr class="heading" >
						<td style="text-align: center;">
							Konfirmasi Pembayaran<br />
						</td>
					</tr>
					<tr class="item">
						<td style="text-align: center;">
							<span class="fa fa-brands fa-whatsapp"></span> (+62) 81220801118<br />
						</td>
					</tr>
				</table>
			</div>
		</div>
		
	</body>
</html>
