<?php 
use Carbon\Carbon;

?>
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
			<div class="padding-20">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 col-xs-3">
								<h4>Data<strong> Pegawai</strong></h4>
								<ul class="list-unstyled">
									<li><strong>NIP:</strong> {{ $pegawai->nip }}</li>
									<li><strong>Nama:</strong> {{ $pegawai->nama_pegawai }}</li>
									<li><strong>Grade:</strong> {{ $pegawai->ps_group }} </li>
									<li><strong>Subgroup:</strong> {{ $pegawai->employee_subgroup }}</li>
									<li><strong>Jenjang:</strong> {{ $pegawai->formasi_jabatan->jenjang_txt }} ({{  $pegawai->formasi_jabatan->jenjang_id }})</li>
									<li><strong>Sisa Masa Kerja:</strong> {{ $pegawai->time_diff(\Carbon\Carbon::now('Asia/Jakarta'), \Carbon\Carbon::parse($pegawai->end_date)) }}</li>
									<li><strong>Lama & Kali Jenjang:</strong> {{ $pegawai->time_diff(\Carbon\Carbon::parse($pegawai->start_date), \Carbon\Carbon::now('Asia/Jakarta')) }}, {{ $pegawai->kali_jenjang }}x</li>
									{{-- <li><strong>Diklat Penjenjangan:</strong> EE III</li> --}}
								</ul>
							</div>
							<div class="col-md-3 col-xs-3">
								<h4>Data<strong> Sutri</strong></h4>
								@if ($sutri)
									<ul class="list-unstyled">
										<li><strong>NIP:</strong> {{ $sutri->nip }}</li>
										<li><strong>Nama:</strong> {{ $sutri->nama_pegawai }}</li>
										<li><strong>Unit:</strong> {{ $sutri->formasi_jabatan->personnel_area->nama }}</li>
										<li><strong>(Beda Unit)</strong></li>
									</ul>
								@else
									<p>Sutri tidak bekerja di PLN</p>
								@endif
							</div>
							<div class="col-md-3 col-xs-3 text-right">
							</div>
							<div class="col-md-3 col-xs-3 text-right">
								<h4><strong>Download</strong> Dokumen</h4>
								<ul class="list-unstyled ">
									@if ($mrp->no_dokumen_unit_asal)
										<button type="button" class="btn btn-sm btn-3d btn-blue">{{ $mrp->no_dokumen_unit_asal }}</button>
									@endif
									@if ($mrp->no_dokumen_unit_mutasi)
										<button type="button" class="btn btn-sm btn-3d btn-info">{{ $mrp->no_dokumen_unit_mutasi }}</button>
									@endif
									@if ($mrp->sk_stg_id)
										<button type="button" class="btn btn-sm btn-3d btn-red">{{ $mrp->skstg->no_dokumen_proses_sk }}</button>
									@endif
								</ul>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table table-condensed nomargin">
								<thead>
									<tr>
										<th width="22%">Detail Mutasi</th>
										<th width="30%">Proyeksi Jabatan</th>
										<th width="30%">Jabatan Saat Ini</th>
										<th width="3%">Tipe</th>
										<th width="3%">Status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<ul class="list-unstyled">
												<li><strong>Tanggal Aktifasi:</strong> 1 September 2017</li>
												<li><strong>Tanggal Permintaan:</strong> 30 Februari 2018</li>
												<li><strong>Tanggal Pooling:</strong> 2 Maret 2018</li>
												<li><strong>Jenis Mutasi:</strong> Dinas</li>
												<li><strong>Mutasi:</strong> Rotasi</li>
												<li><strong>Jalur Mutasi:</strong> Intern Divisi Antar Bidang</li>
											</ul>
										</td>
										<td>
											<div><strong>ANALYST MANAJEMEN PROGRAM DAN SUMBER DAYA TEKNOLOGI INFORMASI (PLT DEPUTI MANAJER MANAJEMEN PROGRAM DAN SUMBER DAYA TEKNOLOGI INFORMASI)</strong></div>
											<small>SUB BIDANG MANAJEMEN PROGRAM DAN SUMBER DAYA TEKNOLOGI INFORMASI BIDANG PENGEMBANGAN APLIKASI TEKNOLOGI INFORMASI DIVISI SISTEM DAN TEKNOLOGI INFORMASI DIREKTORAT KEUANGAN PT PLN (PERSERO) KANTOR PUSAT</small>
										</td>
										<td>
											<div><strong>ANALYST STRATEGI DAN ARSITEKTUR TEKNOLOGI INFORMASI (PLT DEPUTI MANAJERSTRATEGI DAN ARSITEKTUR TEKNOLOGI INFORMASI)</strong></div>
											<small>SUB BIDANG STRATEGI DAN ARSITEKTUR TEKNOLOGI INFORMASI BIDANG PERENCANAAN DAN ARSITEKTUR TEKNOLOGI INFORMASI DIVISI SISTEM DAN TEKNOLOGI INFORMASI DIREKTORAT KEUANGAN PT PLN (PERSERO) KANTOR PUSAT</small>
										</td>
										<td>1</td>
										<td>Pending</td>
									</tr>
								</tbody>
							</table>
						</div>

						<hr class="nomargin-top" />

						<div class="row">

							<div class="col-xs-6">
								<h4><strong>Unit</strong> Peminta</h4>
								<address>
									<strong>Kantor Pusat PLN</strong><br>
									Jalan Trunojoyo Blok M – I No 135<br>
									Kebayoran Baru, Jakarta 12160, Indonesia<br>
									Telp : 021 – 7251234, 7261122<br>
									fax : 021 – 7221330
								</address>

							</div>
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