<!doctype html>
<html lang="en-US">
	<head>
		<title>Detail Permintaan Mutasi | MRP-App</title>

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="/assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />

	</head>

	<body>


		<!-- WRAPPER -->
		<div id="wrapper">
			@foreach ($detail as $detaill)

			<div class="padding-20">

				<div class="panel panel-default">
				
					<div class="panel-body">

						<div class="row">
							<div class="col-md-6 col-xs-6 text-right">
								<h4>Registry<strong> Number</strong></h4>
								<ul class="list-unstyled ">
									<li><strong>{{$detaill->registry_number}}</strong></li>
								</ul>
							</div>
							<div class="col-md-6 col-xs-6 text-left">
								<h4><strong>Nomor</strong> Nota Dinas</h4>
								<ul class="list-unstyled ">
									<li><strong>{{$detaill->no_dokumen_unit_asal}}</strong></li>
								</ul>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table table-condensed nomargin">
								<thead>
									<tr>
										<th width="12%">Detail Pegawai</th>
										<th width="12%">Detail Mutasi</th>
										<th width="30%">Proyeksi Jabatan</th>
										<th width="30%">Jabatan Saat Ini</th>
										<th width="8%">Masa Kerja</th>
										<th width="8%">Sisa Masa Kerja</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										
										<td>
											<ul class="list-unstyled">
												<li><strong>NIP:</strong> {{ $detaill->pegawai->nip }}</li>
												<li><strong>Nama:</strong> {{ $detaill->pegawai->nama_pegawai }}</li>
												<li><strong>Grade:</strong> (((NOT YET)))</li>
											</ul>
										</td>
										<td>
											<ul class="list-unstyled">
												<li><strong>Tanggal Aktifasi:</strong> (((NOT YET)))</li>
												<li><strong>Jenis Mutasi:</strong> {{ $detaill->jenis_mutasi}}</li>
												<li><strong>Mutasi:</strong> {{ $detaill->mutasi }}</li>
												<li><strong>Jalur Mutasi:</strong> {{ $detaill->jalur_mutasi}}</li>
											</ul>
										</td>
										<td>
											<div><strong>{{$detaill->formasi_jabatan->formasi}} {{$detaill->formasi_jabatan->jabatan}}</strong></div>
											<small>{{$detaill->formasi_jabatan->posisi}}</small>
										</td>
										<td>
											<div><strong>{{$detaill->pegawai->formasi_jabatan->formasi}} {{$detaill->pegawai->formasi_jabatan->jabatan}}</strong></div>
											<small>{{$detaill->pegawai->formasi_jabatan->posisi}}</small>
										</td>
										<td>(((NOT YET)))</td>
										<td>(((NOT YET)))</td>
										
									</tr>
								</tbody>
							</table>
						</div>

						<hr class="nomargin-top" />

						<div class="row">

							<div class="col-xs-6">
								<h4><strong>Unit</strong> Peminta</h4>
								<address>
									<strong>(((NOT YET)))</strong><!-- <br>
									Jalan Trunojoyo Blok M – I No 135<br>
									Kebayoran Baru, Jakarta 12160, Indonesia<br>
									Telp : 021 – 7251234, 7261122<br>
									fax : 021 – 7221330 -->
								</address>

							</div>

							<!-- <div class="col-xs-6 text-right">

								<ul class="list-unstyled">
									<li><strong>Sub - Total Amount:</strong> $2162.00</li>
									<li><strong>Discount:</strong> 10.0%</li>
									<li><strong>VAT ($6):</strong> $12.0</li>
									<li><strong>Grand Total:</strong> $1958.0</li>
								</ul>

							</div> -->

						</div>

					</div>
				
				</div>

			</div>
			@endforeach
		</div>
		<!-- /WRAPPER -->



	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '/assets/plugins/';</script>
		<script type="text/javascript" src="/assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/app.js"></script>

		<script type="text/javascript">
			// window.print();
		</script>

	</body>
</html>