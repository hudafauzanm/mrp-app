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
							<div class="col-md-6 col-xs-6 text-right">
								<h4>Registry<strong> Number</strong></h4>
								<ul class="list-unstyled ">
									<li><strong>{{$detail->registry_number}}</strong></li>
								</ul>
							</div>
							<div class="col-md-6 col-xs-6 text-left">
								<h4><strong>Nomor</strong> Nota Dinas</h4>
								<ul class="list-unstyled ">
									<li><strong>{{$detail->no_dokumen_unit_asal}}</strong></li>
								</ul>
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
												<li><strong>NIP:</strong> {{$detail->pegawai->nip}}</li>
												<li><strong>Nama:</strong> {{$detail->pegawai->nama_pegawai}}</li>
												<li><strong>Grade:</strong> {{$detail->pegawai->ps_group}}</li>
											</ul>
										</td>
										<td>
											<ul class="list-unstyled">
												<li><strong>Tanggal Aktifasi:</strong> {{ $detail->tgl_pooling}}</li>
												<li><strong>Jenis Mutasi:</strong> {{ $detail->jenis_mutasi}}</li>
												<li><strong>Tipe Mutasi:</strong> {{ $detail->mutasi }}</li>
												<!-- <li><strong>Jalur Mutasi:</strong> {{ $detail->jalur_mutasi}}</li> -->
											</ul>
										</td>
										<td>
											@if(isset($detail->formasi_jabatan))
											<div><strong>{{$detail->formasi_jabatan->formasi}} {{$detail->formasi_jabatan->jabatan}}</strong></div>
											<small>{{$detail->formasi_jabatan->posisi}}</small>
											@else
												Perlu saran
											@endif
										</td>
										<td>
											<div><strong>{{$detail->pegawai->formasi_jabatan->formasi}} {{$detail->pegawai->formasi_jabatan->jabatan}}</strong></div>
											<small>{{$detail->pegawai->formasi_jabatan->posisi}}</small>
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
															<br><strong>-Career Willingness:</strong> {{$waktunilai->career_willingness}}
															<br><strong>-Kesehatan:</strong> {{$waktunilai->kesehatan}}
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
									<strong>{{$detail->pegawai->formasi_jabatan->personnel_area->nama}}<br>{{$detail->pegawai->formasi_jabatan->personnel_area->direktorat->nama}}</strong><!-- <br>
									Jalan Trunojoyo Blok M – I No 135<br>
									Kebayoran Baru, Jakarta 12160, Indonesia<br>
									Telp : 021 – 7251234, 7261122<br>
									fax : 021 – 7221330 -->
								</address>
							</div>
						</div>	

						<hr class="nomargin-top" />

						<!-- <div id="ceknilai">
							<div class="row">
								<div class="col-md-6">
									<div id="panel-graphs-flot-1" class="panel panel-default">
										<div class="panel-heading">
											<span class="elipsis">
												<strong>Key Competences</strong>
											</span>
											<ul class="options pull-right list-inline">
												<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
												<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
											</ul>
										</div>
										<div class="panel-body nopadding">
											<table class="table table-bordered table-vertical-middle nomargin">
												<thead>
													<tr>
														<th>Uraian</th>
														<th>Skor</th>
													</tr>
												</thead>
												<tbody>

													<tr>
														<td>Enthusiastic for Challenge</td>
														
														<td><div class="rating rating-0 size-13 width-100" id="enthusiastic"></div></td>
														
													</tr>
													<tr>
														<td>Creative & Innovative</td>
														<td><div class="rating rating-0 size-13 width-100" id="creative"></div></td>
													</tr>
													<tr>
														<td>Building Business Partnership</td>
														<td><div class="rating rating-0 size-13 width-100" id="building"></div></td>
													</tr>
													<tr>
														<td>Strategic Orientation</td>
														<td><div class="rating rating-0 size-13 width-100" id="strategic"></div></td>
													</tr>
													<tr>
														<td>Customer Focus Oriented</td>
														<td><div class="rating rating-0 size-13 width-100" id="customer"></div></td>
													</tr>
													<tr>
														<td>Driving Execution</td>
														<td><div class="rating rating-0 size-13 width-100" id="driving"></div></td>
													</tr>
													<tr>
														<td>Visionary Leadership</td>
														<td><div class="rating rating-0 size-13 width-100" id="visionary"></div></td>
													</tr>
													<tr>
														<td>Empowering / Developing Others</td>
														<td><div class="rating rating-0 size-13 width-100" id="empowering"></div></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div id="panel-graphs-flot-2" class="panel panel-default">

										<div class="panel-heading">
											<span class="elipsis">
												<strong>Kompetensi Harian</strong>
											</span>
											<ul class="options pull-right list-inline">
												<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
												<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
											</ul>
										</div>

										<div class="panel-body nopadding">
											<table class="table table-bordered table-vertical-middle nomargin">
												<thead>
													<tr>
														<th>Uraian</th>
														<th>Skor</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Komunikasi</td>
														<td><div class="rating rating-0 size-13 width-100" id="komunikasi"></div></td>
													</tr>
													<tr>
														<td>KH2</td>
														<td><div class="rating rating-0 size-13 width-100" id="team_work"></div></td>
													</tr>
													<tr>
														<td>Bahasa Indonesia</td>
														<td><div class="rating rating-0 size-13 width-100" id="bahasa_1_nilai"></div></td>
													</tr>
													<tr>
														<td>Bahasa Inggris</td>
														<td><div class="rating rating-0 size-13 width-100" id="bahasa_2_nilai"></div></td>
													</tr>
													<tr>
														<td id="bahasa_3">Bahasa 3</td>
														<td><div class="rating rating-0 size-13 width-100" id="bahasa_3_nilai"></div></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div id="panel-graphs-flot-1" class="panel panel-default">

								<div class="panel-heading">
									<span class="elipsis">
										<strong>Personal Endurance</strong>
									</span>

									<ul class="options pull-right list-inline">
										<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
										<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
									
									</ul>
								</div>

								<div class="panel-body nopadding">
									<div class="table-responsive">
										<table class="table table-bordered table-vertical-middle nomargin">
											<thead>
												<tr>
													<th></th>
													<th>Uraian</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Internal Readiness</td>
													<td><b>Kesehatan</b></td>
													<td id="kesehatan"></td>
												</tr>
												<tr>
													<td></td>
													<td><b>Career Willingness</b></td>
													<td id="career_willingness"></td>
												</tr>
												<tr>
													<td>External Readiness</td>
													<td><b>Keluarga</b></td>
													<td id="external_rediness"></td>
												</tr>
												<tr>
													<td>Hubungan Dengan Sesama</td>
													<td></td>
													<td id="hubungan_sesama"></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div> -->

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