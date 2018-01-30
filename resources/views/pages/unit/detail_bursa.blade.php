<?php 


?>
<!doctype html>
<html lang="en-US">
	<head>
		<title>Detail Bursa Jabatan | MRP-App</title>

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

			<div class="padding-20">

				<div class="panel panel-default">
				
					<div class="panel-body">

						<div class="row">
							<div class="col-md-3 col-xs-3 text-left">
								@if ($detail->status == 98)
									<h4><strong>Ditolak</strong> oleh Karir II (Pusat)</h4>
									<ul class="list-unstyled ">
										<li>{{ $detail->tindak_lanjut }}</li>
									</ul>
								@endif
							</div>
							<div class="col-md-3 col-xs-3 text-right">
								<h4>Registry<strong> Number</strong></h4>
								<ul class="list-unstyled ">
									<li><strong>{{$detail->registry_number}}</strong></li>
								</ul>
							</div>
							<div class="col-md-3 col-xs-3 text-left">
								<h4><strong>Nomor</strong> Nota Dinas</h4>
								<ul class="list-unstyled ">
									<li><strong>{{$detail->no_dokumen_unit_usul}}</strong></li>
								</ul>
							</div>
							<div class="col-md-3 col-xs-3 text-right">
								@if ($detail->no_dokumen_unit_usul)
									<a href="/download/{{ $detail->registry_number }}/{{ $detail->filename_dokumen_unit_usul }}" class="btn btn-sm btn-3d btn-blue">{{ $detail->filename_dokumen_unit_usul }}</a>
								@endif
								@if ($detail->no_dokumen_unit_jawab)
									<a href="/download/{{ $detail->registry_number }}/{{ $detail->filename_dokumen_unit_jawab }}" class="btn btn-sm btn-3d btn-info">{{ $detail->filename_dokumen_unit_jawab }}</a>
								@endif
								@if ($detail->status == 99 && $detail->no_dokumen_respon_sdm)
									<a href="/download/{{ $detail->registry_number }}/{{ $detail->filename_dokumen_respon_sdm }}" class="btn btn-sm btn-3d btn-red">{{ $detail->filename_dokumen_respon_sdm }}</a>
								@endif
								@if ($detail->sk_stg_id)
									<a href="/download/{{ $detail->registry_number }}/{{ $detail->skstg->filename_dokumen_sk }}" class="btn btn-sm btn-3d btn-red">{{ $detail->skstg->filename_dokumen_sk }}</a>
								@endif
							</div>
						</div>

						<div class="table-responsive">
							<table class="table table-condensed nomargin">
								<thead>
									<tr>
										<th width="20%">Detail Unit</th>
										<th width="20%">Detail Pengusul</th>
										<th width="30%">Jabatan yang Dibursakan</th>
										<th width="30%">Source</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										
										<td>
											<ul class="list-unstyled">
												{{-- {{dd($detail->pegawai)}} --}}
												<li><strong>Nama:</strong> {{ $detail->personnel_area_pengusul->nama }}</li>
												<li><strong>Alamat:</strong> {{ $detail->personnel_area_pengusul->alamat }}</li>
												<li><strong>Kota:</strong> {{ $detail->personnel_area_pengusul->Kota }}</li>
												<li><strong>Provinsi:</strong> {{ $detail->personnel_area_pengusul->provinsi }}</li>
											</ul>
										</td>
										<td>
											<ul class="list-unstyled">
												<li><strong>NIP:</strong> {{ $detail->nip_pengusul }}</li>
												<li><strong>Nama:</strong> {{ $detail->pegawai_pengusul->nama_pegawai }}</li>
											</ul>
										</td>
										<td>
											<ul class="list-unstyled">
												<li><strong>Formasi:</strong> {{ $detail->formasi_jabatan->formasi }}</li>
												<li><strong>Jabatan:</strong> {{ $detail->formasi_jabatan->jabatan }}</li>
												<li><strong>Jenjang:</strong> {{ $detail->formasi_jabatan->jenjang_txt }} ({{ $detail->formasi_jabatan->jenjang_id }})</li>
												<li><strong>Posisi:</strong> {{ $detail->formasi_jabatan->posisi }}</li>
												<li><strong>SPFJ:</strong> {{ $detail->formasi_jabatan->spfj }}</li>
												<li><strong>Legacy Code:</strong> {{ $detail->formasi_jabatan->legacy_code }}</li>
											</ul>
										</td>
										<td>
											<ul class="list-unstyled">
												<li>Existing</li>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<hr class="nomargin-top" />

						<div class="row">

							<div class="col-md-6">
								<h4><strong>Unit</strong> Peminta</h4>
								<address>
									<strong>{{$detail->personnel_area_pengusul->nama}}<br>{{$detail->personnel_area_pengusul->direktorat->nama}}</strong>
								</address>
							</div>

							@if ($detail->skstg)
								<div class="col-md-6 pull-right text-right">
									<h4>Lihat <strong>SK</strong></h4>
									<a href="/download/{{ $detail->registry_number }}/{{ $detail->skstg->filename_dokumen_sk }}" class="btn btn-sm btn-3d btn-red">{{ $detail->skstg->no_sk }}</a>
								</div>
							@endif

							@if (session('success'))
								<div class="col-md-6 text-right">
									<a href="/dashboard" class="btn btn-lg btn-primary btn-3d">
										<i class="fa fa-home"></i>
										Kembali Ke Beranda
									</a>
								</div>
							@endif

						</div>

					</div>
				
				</div>

			</div>
		</div>
		<!-- /WRAPPER -->



	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '/assets/plugins/';</script>
		<script type="text/javascript" src="/assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/app.js"></script>

		<script type="text/javascript">
			// window.print();
		</script>

		@include('includes.notifications')

	</body>
</html>