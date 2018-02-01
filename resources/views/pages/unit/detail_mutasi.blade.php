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
								@if ($detail->skstg)
									<a href="/download/{{ $detail->registry_number }}/{{ $detail->skstg->filename_dokumen_sk }}" class="btn btn-sm btn-3d btn-red">{{ $detail->skstg->filename_dokumen_sk }}</a>
								@endif
							</div>
						</div>

						<h4>Informasi<strong> Mutasi</strong></h4>
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
												<li><strong>NIP:</strong> {{ $detail->pegawai->nip }}</li>
												<li><strong>Nama:</strong> {{ $detail->pegawai->nama_pegawai }}</li>
												<li><strong>Grade:</strong> {{ $detail->pegawai->ps_group }}</li>
											</ul>
										</td>
										<td>
											<ul class="list-unstyled">
												<li><strong>Tanggal Aktivasi:</strong> {{ $detail->requested_tgl_aktivasi->format('d F Y') }}</li>
												<li><strong>Jenis Mutasi:</strong> {{ $detail->jenis_mutasi}}</li>
												<li><strong>Tipe Mutasi:</strong> {{ $detail->mutasi }}</li>
												<!-- <li><strong>Jalur Mutasi:</strong> {{ $detail->jalur_mutasi}}</li> -->
											</ul>
										</td>
										<td>
											@if($detail->formasi_jabatan_tujuan)
											<div><strong>{{$detail->formasi_jabatan_tujuan->formasi}} {{$detail->formasi_jabatan_tujuan->jabatan}}</strong></div>
											<small>{{$detail->formasi_jabatan_tujuan->posisi}}</small>
											@else
												Perlu saran
											@endif
										</td>
										<td>
											<div><strong>{{$detail->formasi_jabatan_asal->formasi}} {{$detail->formasi_jabatan_asal->jabatan}}</strong></div>
											<small>{{$detail->formasi_jabatan_asal->posisi}}</small>
										</td>

										<td>{{$detail->pegawai->time_diff(Carbon::parse($detail->pegawai->start_date), Carbon::now('Asia/Jakarta'))}}</td>
										<td>{{$detail->pegawai->time_diff(Carbon::now('Asia/Jakarta'), Carbon::parse($detail->pegawai->end_date))}}</td>
										
									</tr>
								</tbody>
							</table>
						</div>

						<h4>Informasi<strong> Penilaian Pegawai</strong></h4>
						<div class="row">
							<div class="col-md-8">
								<div class="table-responsive">
									<table class="table table-condensed nomargin">
										<thead>
											<tr>
												<th>Key Competencies</th>
												<th>Kompetensi Harian</th>
												<th>Deskripsi Penilaian</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<ul class="list-unstyled">
														<li><strong>Enthusiastic For Challenge:</strong> {{$waktunilai->enthusiastic}}</li>
														<li><strong>Creative and Innovative:</strong> {{$waktunilai->creative}}</li>
														<li><strong>Building Business Partnership:</strong> {{$waktunilai->building}}</li>
														<li><strong>Strategic Orientation:</strong> {{$waktunilai->strategic}}</li>
														<li><strong>Customer Focus Oriented:</strong> {{$waktunilai->customer}}</li>
														<li><strong>Driving Execution:</strong> {{$waktunilai->driving}}</li>
														<li><strong>Visionary Leadership:</strong> {{$waktunilai->visionary}}</li>
														<li><strong>Empowering / Developing Others:</strong> {{$waktunilai->empowering}}</li>
													</ul>
												</td>
												<td>
													<ul class="list-unstyled">
														<li><strong>Komunikasi:</strong> {{$waktunilai->komunikasi}}</li>
														<li><strong>Team Work:</strong> {{$waktunilai->team_work}}</li>
														<li><strong>Bahasa Indonesia:</strong> {{$waktunilai->bahasa_1_nilai}}</li>
														<li><strong>Bahasa Inggris:</strong> {{$waktunilai->bahasa_2_nilai}}</li>
														@if(isset($waktunilai->bahasa_3))
														<li><strong>{{$waktunilai->bahasa_3}}:</strong> {{$waktunilai->bahasa_3_nilai}}</li>
														@endif
													</ul>
												</td>
												<td>
													<ul class="list-unstyled">
														<li>
															<strong>Internal Readiness</strong>
															<ul>
																<li><strong>Career Willingness:</strong> {{$waktunilai->career_willingness}}</li>
																<li><strong>Kesehatan:</strong> {{$waktunilai->kesehatan}}</li>
															</ul>
														</li>
														<li><strong>Eksternal Readiness: </strong> {{$waktunilai->external_rediness}}</li>
														<li><strong>Hubungan dengan Rekan Kerja:</strong> {{$waktunilai->hubungan_sesama}}</li>
														<li><strong>Hubungan dengan Atasan:</strong> {{$waktunilai->hubungan_atasan}}</li>
													</ul>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-md-4 text-right">
								<br><br><br><br><h4><strong>Unit</strong> Peminta</h4>
								<address>
									<strong>{{$detail->personnel_area_pengusul->nama}}<br>{{$detail->personnel_area_pengusul->direktorat->nama}}</strong>
								</address>
							</div>
						</div>	

						<hr class="nomargin-top" />

						<div class="row">

							
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