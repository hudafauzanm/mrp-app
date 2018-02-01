<?php 
use Carbon\Carbon;

?>
@extends('layouts.master')

@section('title', 'MRP Dashboard')

@section('leftbar')
	@include('includes.sdm.leftbar')
@endsection

@section('includes-styles')
	@parent

	<!-- FOOTABLE TABLE -->
	<link href="/assets/plugins/footable/css/footable.core.min.css" rel="stylesheet" type="text/css" />
	<link href="/assets/plugins/footable/css/footable.standalone.css" rel="stylesheet" type="text/css" />
	<link href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="/assets/css/sdm_dashboard.css" rel="stylesheet" type="text/css" />

	<style>
		canvas {
			height: 400px;
			max-height: 400px;
		}

		.dataTable th, .dataTable td {
			font-size: 11px;
		}
	</style>

@endsection

@section('content')

	<div id="content" class="padding-20">
		@include('includes.validation_errors')

		<div class="row">
			<div class="col-md-6">
				{{-- <h4>Monitoring</h4>	 --}}
				<div id="panel-1" class="panel panel-default">
					<div class="panel-heading">
						<!-- tabs nav -->
						<ul class="nav nav-tabs pull-left">
							<li class="active">
								<a class="tabselect monitoring_tab" href="#formasi_jabatan" data-toggle="tab">Formasi Jabatan</a>
							</li>
							<li class="">
								<a  class="tabselect monitoring_tab" href="#sk" data-toggle="tab" id="tabnya_sk">Pergerakan SK</a>
							</li>
						</ul>									

						<span class="title elipsis pull-right">
							<strong>MONITORING</strong> <!-- panel title -->
						</span>
					</div>

					<!-- panel content -->
					<div class="panel-body" style="overflow-y: scroll" id="monitoring_body">
						<div class="tab-content transparent ">
							<div id="formasi_jabatan" class="tab-pane active">
								<div class="row">
									<div class="col-md-6">
										<select class="form-control select2" id="unit_level_filter">
											<option value="all">--- ALL LEVEL ---</option>
											<option value="KP">KP</option>
											<option value="UI">UI</option>
											<option value="UIP">UIP</option>
											<option value="SUP">SUP</option>
										</select>
									</div>

									<div class="col-md-6">
										<select class="form-control select2" id="unit_filter">
											<option value="all">--- ALL PERSONNEL AREA ---</option>
											@foreach ($personnels as $pers)
												<option value="{{ $pers->username }}">{{ $pers->nama_pendek }}</option>
											@endforeach
										</select>
									</div>

								</div>

								<div class="row">
									<div class="col-md-6">
										<div id="struktural_monitoring" class="panel panel-default">

											<div class="panel-heading">

												<span class="elipsis"><!-- panel title -->
													<strong>Struktural</strong>
												</span>

												<!-- right options -->
												<ul class="options pull-right list-inline">
													<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
												</ul>
												<!-- /right options -->


											</div>

											<!-- panel content -->
											<div class="panel-body nopadding">
												<canvas id="struktural_chart"></canvas>
											</div>
											<!-- /panel content -->

										</div>
									</div>

									<div class="col-md-6">
										<div id="fungsional_monitoring" class="panel panel-default">

											<div class="panel-heading">

												<span class="elipsis"><!-- panel title -->
													<strong>Fungsional</strong>
												</span>

												<!-- right options -->
												<ul class="options pull-right list-inline">
													<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
												</ul>
												<!-- /right options -->


											</div>

											<!-- panel content -->
											<div class="panel-body nopadding" id="fungsio_container">
											</div>
											<!-- /panel content -->

										</div>
									</div>

								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="table-responsive">
											<table class="table table-bordered dataTable" id="forja_table">
												<thead>
													<tr>
														<th>No</th>
														<th>Direktorat</th>
														<th>Personnel Area</th>
														<th>Formasi</th>
														<th>Jabatan</th>
														<th>Jenjang</th>
														<th>Status</th>
														<th>NIP</th>
														<th>Nama</th>
													</tr>
												</thead>

												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>



							<div id="sk" class="tab-pane">
								<div class="row">
									<div class="col-md-6 pull-right">
										<select class="form-control select2" style="width: 100%" id="sk_unit_filter">
											<option value="all">--- ALL PERSONNEL AREA ---</option>
											@foreach ($personnels as $pers)
												<option value="{{ $pers->username }}">{{ $pers->nama_pendek }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div id="sk_pane" class="panel panel-default">

											<div class="panel-heading">

												<span class="elipsis"><!-- panel title -->
													<strong>Kantor Pusat</strong>
												</span>

												<!-- right options -->
												<ul class="options pull-right list-inline">
													<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
												</ul>
												<!-- /right options -->


											</div>

											<!-- panel content -->
											<div class="panel-body nopadding" id="sk_chart_container">
											</div>
											<!-- /panel content -->

										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div id="sk_table_pane" class="panel panel-default">
											<table class="table table-bordered dataTable" id="sk_table">
												<thead>
													<tr>
														<th>No</th>
														<th>NIP</th>
														<th>Nama</th>
														<th>Unit Asal</th>
														<th>Unit Tujuan</th>
														<th>Status</th>
													</tr>
												</thead>

												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- <div class="panel-heading">
						<!-- right options -->
						<ul class="options pull-right list-inline">
							<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
							<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
						</ul>
						<!-- /right options -->
					</div>

					<!-- panel content -->
					<div class="panel-body" style="overflow-y: auto" id="monitoring_body">
						<div class="tab-content transparent">
							<div class="row">
								<div class="col-md-4 pull-right"> 
									<input type="text" class="form-control rangepicker" value="2015-01-01 - 2016-12-31" data-format="yyyy-mm-dd" data-from="2015-01-01" data-to="2016-12-31">
								</div>
							</div>		
							<div id="ttab1_nobg" class="tab-pane active">

								<div class="panel-heading">
									<span class="elipsis">
										<strong>Sales Graph</strong>
									</span>
								</div>
								<div class="panel-body nopadding">
									<div id="flot-pie" class="flot-chart"></div>
								</div>


								<div class="panel-heading">
									<span class="elipsis">
										<strong>Sales Graph</strong>
									</span>
								</div>
								<div class="panel-body nopadding">
									<div id="flot-bar-horizontal" class="flot-chart"></div>
								</div>


								<div class="panel-heading">
									<span class="elipsis">
										<strong>Sales Graph</strong>
									</span>
								</div>
								<div class="panel-body nopadding">
									<div id="flot-bar" class="flot-chart"></div>
								</div>
								
							</div>
						</div>
					</div> --}}
					<!-- /panel content -->

				</div>
			</div>

			<div class="col-md-6">
				{{-- <h4>Verifikasi</h4> --}}
				<div id="panel-2" class="panel panel-default ">
					<div class="panel-heading">
						<!-- tabs nav -->
						<ul class="nav nav-tabs pull-left">
							<li class="active">
								<a class="tabselect" href="#meminta" data-toggle="tab">Meminta Pegawai</a>
							</li>
							<li class="">
								<a  class="tabselect" href="#bursa" data-toggle="tab">Bursa Pegawai</a>
							</li>
							<li class="">
								<a class="tabselect" href="#request" data-toggle="tab">Bursa Jabatan</a>
							</li>
						</ul>									

						<span class="title elipsis pull-right">
							<strong>EVALUASI</strong> <!-- panel title -->
						</span>
					</div>

					<!-- panel content -->
					<div class="panel-body" style="overflow-y: auto" id="verifikasi_body">
						<div class="tab-content transparent ">
							<div id="meminta" class="tab-pane active">
								@if ($mrp_1->count())
								<div class="row">
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="Search" id="filter1">
									</div>
								</div>
								
								<br>
								<table class="footable" id="footable1" data-filter="#filter1">
									<thead>
										<tr>
											<th class="foo-cell">Registry Number</th>
											<th data-type="numeric" data-hide = "all" class="">NIP<br></th>
											<th data-type="numeric" data-hide = "" class="">Nama</th>
											<th data-type="numeric" data-hide = "all" class="">Grade</th>
											<th data-type="numeric" data-hide = "all" class="">Jabatan Saat Ini</th>
											<th data-type="numeric" data-hide = "all" class="">Proyeksi Jabatan</th>
											<th data-type="numeric" data-hide = "all" class="">Masa Kerja</th>
											<th data-type="numeric" data-hide = "all" class="">Sisa Masa Kerja</th>
											<th data-type="numeric" data-hide = "all" class="">Unit Peminta</th>
											<th data-type="numeric" data-hide = "all" class="">Alasan</th>
											<th data-type="numeric" data-hide = "all" class="">Penilaian</th>
											<th data-type="numeric" data-hide = "" class="">Dokumen</th>
											<th data-type="numeric" data-hide = "" class="">Tindak Lanjut</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($mrp_1 as $mrp)
										<tr>
											<td class="foo-cell">{{ $mrp->registry_number }}</td>
											<td>{{$mrp->pegawai->nip}}</td>
											<td>{{$mrp->pegawai->nama_pegawai}}</td>
											<td>{{$mrp->pegawai->ps_group}}</td>
											<td><strong>{{$mrp->formasi_jabatan_asal->formasi}} {{$mrp->formasi_jabatan_asal->jabatan}}</strong> {{$mrp->formasi_jabatan_asal->posisi}}<br><small>{{$mrp->formasi_jabatan_asal->personnel_area->nama_pendek}}</small></td>
											<td>
											@if($mrp->formasi_jabatan_tujuan)
												<strong>{{$mrp->formasi_jabatan_tujuan->formasi}} {{$mrp->formasi_jabatan_tujuan->jabatan}}</strong> {{$mrp->formasi_jabatan_tujuan->posisi}}
												<br><small>{{$mrp->formasi_jabatan_tujuan->personnel_area->nama_pendek}}</small>
											@else
												(Perlu saran)
											@endif
											</td>
											<td>{{$mrp->pegawai->time_diff(Carbon::parse($mrp->pegawai->start_date), Carbon::now('Asia/Jakarta'))}}</td>
											<td>{{$mrp->pegawai->time_diff(Carbon::now('Asia/Jakarta'), Carbon::parse($mrp->pegawai->end_date))}}</td>
											<td>{{$mrp->personnel_area_pengusul->nama_pendek}}</td>
											<td>{{$mrp->alasan_mutasi}}</td>
											@if (!$mrp->pegawai->penilaian_pegawai->count())
												<td class="text-center">
													Data nilai tidak ditemukan
												</td>	
											@else
												<td class="text-center">
													<button type="button" class="btn btn-3d btn-sm btn-green nilaiBtn" data-toggle="modal" data-target="#ceknilai" onclick="getNilaiWithPegawai('{{ $mrp->pegawai->id }}');">
														<i class="fa fa-check-circle"></i>
														<span>Nilai terbaru</span>
													</button>
												</td>
											@endif
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Download <span class="caret"></span></button>
													<ul class="dropdown-menu" role="menu">
														<li><a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_unit_usul }}"><i class="fa fa-question-circle"></i> Usulan</a></li>
														<li><a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_unit_jawab }}"><i class="fa fa-edit"></i> Lolos Butuh</a></li>
													</ul>
												</div>
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#approveModal" onclick="rejectApproveFunct('{{ $mrp->id }}', '{{ $mrp->registry_number }}');">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red" data-toggle="modal" data-target="#rejectModal" onclick="rejectApproveFunct('{{ $mrp->id }}', '{{ $mrp->registry_number }}');">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>
										@endforeach	
									</tbody>
								</table>
								@else
									<h3 class="text-center">Tidak ada data</h3>
								@endif
							</div>

							<div id="bursa" class="tab-pane">
								@if($mrp_2->count())
								<div class="row">
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="Search" id="filter2">
									</div>
								</div>
								<br>
								<table class="footable" id="footable2" data-filter="#filter2">
									<thead>
										<tr>
											<th class="foo-cell">Registry Number</th>
											<th data-type="numeric" data-hide = "all" class="">NIP<br></th>
											<th data-type="numeric" data-hide = "" class="">Nama</th>
											<th data-type="numeric" data-hide = "all" class="">Grade</th>
											<th data-type="numeric" data-hide = "all" class="">Jabatan Saat Ini</th>
											<th data-type="numeric" data-hide = "all" class="">Proyeksi Jabatan</th>
											<th data-type="numeric" data-hide = "all" class="">Masa Kerja</th>
											<th data-type="numeric" data-hide = "all" class="">Sisa Masa Kerja</th>
											<th data-type="numeric" data-hide = "all" class="">Unit Peminta</th>
											<th data-type="numeric" data-hide = "all" class="">Alasan</th>
											<th data-type="numeric" data-hide = "all" class="">Penilaian</th>
											<th data-type="numeric" data-hide = "" class="">Respon Unit Proyeksi</th>
											<th data-type="numeric" data-hide = "" class="">Dokumen</th>
											<th data-type="numeric" data-hide = "" class="">Tindak Lanjut</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($mrp_2 as $mrp)
										<tr id="{{ $mrp->id }}">
											<td class="foo-cell">{{ $mrp->registry_number }}</td>
											<td>{{$mrp->pegawai->nip}}</td>
											<td>{{$mrp->pegawai->nama_pegawai}}</td>
											<td>{{$mrp->pegawai->ps_group}}</td>
											<td><strong>{{$mrp->formasi_jabatan_asal->formasi}} {{$mrp->formasi_jabatan_asal->jabatan}}</strong> {{$mrp->formasi_jabatan_asal->posisi}}<br><small>{{$mrp->formasi_jabatan_asal->personnel_area->nama_pendek}}</small>
											</td>
											<td>
											@if($mrp->formasi_jabatan_tujuan)
												<strong>{{$mrp->formasi_jabatan_tujuan->formasi}}{{$mrp->formasi_jabatan_tujuan->jabatan}}</strong> {{$mrp->formasi_jabatan_tujuan->posisi}}
												<br><small>{{$mrp->formasi_jabatan_tujuan->personnel_area->nama_pendek}}</small>
											@else
												(Perlu saran)
											@endif
											</td>
											<td>{{$mrp->pegawai->time_diff(Carbon::parse($mrp->pegawai->start_date), Carbon::now('Asia/Jakarta'))}}</td>
											<td>{{$mrp->pegawai->time_diff(Carbon::now('Asia/Jakarta'), Carbon::parse($mrp->pegawai->end_date))}}</td>
											<td>{{$mrp->personnel_area_pengusul->nama}}</td>
											<td>{{$mrp->alasan_mutasi}}</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green nilaiBtn" data-toggle="modal" data-target="#ceknilai" onclick="getNilaiWithMRP('{{ $mrp->id }}');">
													<i class="fa fa-check-circle"></i>
													<span>Nilai {{$mrp->pegawai->nama_pegawai}}</span>
												</button>													
											</td>
											<td class="text-center">
												@if ($mrp->formasi_jabatan_id)
													@if ($mrp->status == 1)
														Belum ada respon
													@elseif ($mrp->status == 2)
														Diterima
													@elseif($mrp->status == 97)
														Ditolak
													@endif
												@else
													Proyeksi tidak ditentukan
												@endif
											</td>
											<td class="text-center">
												@if ($mrp->status == 1 || $mrp->status == 97)
													<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_unit_usul }}" class="btn btn-3d btn-sm btn-primary">
														<i class="fa fa-arrow-circle-down"></i>
														<span>Download</span>
													</a>
												@elseif ($mrp->status == 2)
													<div class="btn-group">
													<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Download <span class="caret"></span></button>
													<ul class="dropdown-menu" role="menu">
														<li><a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_unit_usul }}"><i class="fa fa-question-circle"></i> Usulan</a></li>
														<li><a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_unit_jawab }}"><i class="fa fa-edit"></i> Lolos Butuh</a></li>
													</ul>
												</div>
												@endif
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#approveModal" onclick="rejectApproveFunct('{{ $mrp->id }}', '{{ $mrp->registry_number }}');">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red" data-toggle="modal" data-target="#rejectModal" onclick="rejectApproveFunct('{{ $mrp->id }}', '{{ $mrp->registry_number }}');">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>
										@endforeach	
									</tbody>
								</table>
								@else
									<h3 class="text-center">Tidak ada data</h3>
								@endif
							</div>

							<div id="request" class="tab-pane">
								@if ($mrp_3->count())
								<div class="row">
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="Search" id="filter2">
									</div>
								</div>
								
								<br>
								<table class="footable" id="footable3" data-filter="#filter3">
									<thead>
										<tr>
											<th class="foo-cell">Registry Number</th>
											<th data-type="numeric" data-hide = "" class="">Unit Peminta</th>
											<th data-type="numeric" data-hide = "" class="">Proyeksi Formasi</th>
											<th data-type="numeric" data-hide = "" class="">Proyeksi Jabatan</th>
											<th data-type="numeric" data-hide = "all" class="">Pengusul</th>
											<th data-type="numeric" data-hide = "all" class="">Source</th>
											<th data-type="numeric" data-hide = "all" class="">Perkiraan Tanggal Aktivasi</th>
											<th data-type="numeric" data-hide = "" class="">Dokumen</th>
											<th data-type="numeric" data-hide = "" class="">Tindak Lanjut</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($mrp_3 as $mrp)
										<tr>
											<td class="foo-cell">{{ $mrp->registry_number }}</td>
											<td>{{ $mrp->personnel_area_pengusul->nama_pendek }}</td>
											<td>{{ $mrp->formasi_jabatan_tujuan->formasi }}</td>
											<td>{{ $mrp->formasi_jabatan_tujuan->jabatan }}</td>
											<td>{{ $mrp->pegawai_pengusul->nama_pegawai }} ({{ $mrp->nip_pengusul }})</td>
											<td>Existing</td>
											<td>{{ $mrp->requested_tgl_aktifasi ? $mrp->requested_tgl_aktifasi->format('j F Y') : '-' }}</td>
											<td class="text-center">
												<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_unit_usul }}" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#approveReqJabatan" onclick="rejectApproveFunct('{{ $mrp->id }}', '{{ $mrp->registry_number }}');">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red" data-toggle="modal" data-target="#rejectModal" onclick="rejectApproveFunct('{{ $mrp->id }}', '{{ $mrp->registry_number }}');">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>
										@endforeach	
									</tbody>
								</table>
								@else
									<h3 class="text-center">Tidak ada data</h3>
								@endif
							</div>
						</div>
					</div>
					<!-- /panel content -->
				</div>
		    </div>
		</div>
	</div>

	<div id="ceknilai" class="modal right fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<!-- header modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myLargeModalLabel">Penilaian <span id="created_at">25 Januari</span></h4>
				</div>

				<!-- body modal -->
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div id="panel-graphs-flot-1" class="panel panel-default">
								<div class="panel-heading">
									<span class="elipsis"><!-- panel title -->
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
												
												<td><div class="rating rating-0 size-13 width-100" id="enthusiastic"><!-- rating-0 ... rating-5 --></div></td>
												
											</tr>
											<tr>
												<td>Creative & Innovative</td>
												<td><div class="rating rating-0 size-13 width-100" id="creative"><!-- rating-0 ... rating-5 --></div></td>
											</tr>
											<tr>
												<td>Building Business Partnership</td>
												<td><div class="rating rating-0 size-13 width-100" id="building"><!-- rating-0 ... rating-5 --></div></td>
											</tr>
											<tr>
												<td>Strategic Orientation</td>
												<td><div class="rating rating-0 size-13 width-100" id="strategic"><!-- rating-0 ... rating-5 --></div></td>
											</tr>
											<tr>
												<td>Customer Focus Oriented</td>
												<td><div class="rating rating-0 size-13 width-100" id="customer"><!-- rating-0 ... rating-5 --></div></td>
											</tr>
											<tr>
												<td>Driving Execution</td>
												<td><div class="rating rating-0 size-13 width-100" id="driving"><!-- rating-0 ... rating-5 --></div></td>
											</tr>
											<tr>
												<td>Visionary Leadership</td>
												<td><div class="rating rating-0 size-13 width-100" id="visionary"><!-- rating-0 ... rating-5 --></div></td>
											</tr>
											<tr>
												<td>Empowering / Developing Others</td>
												<td><div class="rating rating-0 size-13 width-100" id="empowering"><!-- rating-0 ... rating-5 --></div></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div id="panel-graphs-flot-2" class="panel panel-default">

								<div class="panel-heading">
									<span class="elipsis"><!-- panel title -->
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
												<td><div class="rating rating-0 size-13 width-100" id="komunikasi"><!-- rating-0 ... rating-5 --></div></td>
											</tr>
											<tr>
												<td>KH2</td>
												<td><div class="rating rating-0 size-13 width-100" id="team_work"><!-- rating-0 ... rating-5 --></div></td>
											</tr>
											<tr>
												<td>Bahasa Indonesia</td>
												<td><div class="rating rating-0 size-13 width-100" id="bahasa_1_nilai"><!-- rating-0 ... rating-5 --></div></td>
											</tr>
											<tr>
												<td>Bahasa Inggris</td>
												<td><div class="rating rating-0 size-13 width-100" id="bahasa_2_nilai"><!-- rating-0 ... rating-5 --></div></td>
											</tr>
											<tr>
												<td id="bahasa_3" default="-">-</td>
												<td><div class="rating rating-0 size-13 width-100" id="bahasa_3_nilai"><!-- rating-0 ... rating-5 --></div></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div id="panel-graphs-flot-1" class="panel panel-default">

						<div class="panel-heading">
							<span class="elipsis"><!-- panel title -->
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
											<th>Keterangan</th>
											<th>Uraian</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><b>Internal Readiness</td>
											<td>Kesehatan</td>
											<td id="kesehatan"></td>
										</tr>
										<tr>
											<td></td>
											<td>Career Willingness</td>
											<td id="career_willingness"></td>
										</tr>
										<tr>
											<td><b>External Readiness</b></td>
											<td>Keluarga</td>
											<td id="external_rediness"></td>
										</tr>
										<tr>
											<td><b>Hubungan Dengan Rekan Kerja (peer)</b></td>
											<td></td>
											<td id="hubungan_sesama"></td>
										</tr>
										<tr>
											<td><b>Hubungan Dengan Atasan</b></td>
											<td></td>
											<td id="hubungan_atasan"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
	
    <div id="approveModal" class="modal right fade" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="approveModalLabel">Approve <a href="" class="btn btn-primary edit_link" target="_blank">Edit data transaksi</a></h4>
				</div>

				<!-- Modal Body -->
				<form action="/dashboard/approve_mutasi" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input class="mrp_id" type="hidden" name="id" value="">
					<div class="modal-body">
						
						<div class="row form-group">
							<div class="col-md-12 col-sm-12">
								<label class="switch switch" data-toggle="collapse" data-target="#rekom_group">
									<input type="checkbox" name="rekom_checkbox" id="rekom_checkbox" value="0" autocomplete="off">
									<span class="switch-label" data-on="YES" data-off="NO"></span>
									<span> Ubah Formasi Jabatan Mutasi? </span>
								</label>
							</div>
						</div>
						
						<div class="collapse" id="rekom_group">
							<div class="row">
								<div class="col-md-12">
									<select class="form-control select2" id="rekom_unit" style="width: 100%" disabled onchange="getFormasi(this)">
										<option>--- Pilih Unit ---</option>
									</select>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-6 col-sm-6">
									<select class="form-control" id="rekom_formasi" disabled onchange="getJabatan(this)">
										<option>--- Formasi ---</option>
									</select>
								</div>

								<div class="col-md-6 col-sm-6">
									<select class="form-control" name="kode_olah" id="rekom_jabatan" disabled>
										<option>--- Jabatan ---</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group"> 
							<h4>Perintah Cetak SK *</h4>
							<input class="custom-file-upload" type="file" id="file" name="dokumen_mutasi" id="contact:attachment" data-btn-text="Select a File" required="" />
							<small class="text-muted block">Max file size: 10Mb (pdf)</small>
						</div>
						
						<div class="form-group">
							<h4>No. Dokumen *</h4>
							<input type="text" class="form-control" name="no_dokumen_respon_sdm" required="">
						</div>

						<div class="form-group">
							<h4>Tindak Lanjut *</h4>
							<!-- select -->
							<div class="fancy-form fancy-form-select">
								<select class="form-control" name="tindak_lanjut" required="">
									<option>--- PILIH ---</option>
									<option value="Cetak SK Definitif">Cetak SK Definitif</option>
									<option value="Cetak SK Fungsional">Cetak SK Fungsional</option>
									<option value="Cetak SK Fungsional & Surat Tugas PLT">Cetak SK Fungsional & Surat Tugas PLT</option>
									<option value="Cetak SK Fungsional Pembatalan SK Lama">Cetak SK Fungsional Pembatalan SK Lama</option>
									<option value="Cetak SK Ijin di Luar Tanggungan">Cetak SK Ijin di Luar Tanggungan</option>
									<option value="Cetak Surat Tugas PLT">Cetak Surat Tugas PLT</option>
									<option value="Pending">Pending</option>
								</select>
								<i class="fancy-arrow"></i>
							</div>
						</div>
					</div>

					<!-- Modal Footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
						{{-- <button type="button" class="btn btn-primary toastr-notify" data-progressBar="true" data-position="top-right" data-notifyType="success" data-message="Berhasil disimpan dan Dikirim" data-dismiss="modal">Simpan</button> --}}
					</div>
				</form>
			</div>
		</div>
    </div>

    <div id="approveReqJabatan" class="modal right fade" tabindex="-1" role="dialog" aria-labelledby="approveReqJabatanLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="approveReqJabatanLabel">Approve <a href="" class="btn btn-primary edit_link" target="_blank">Edit data transaksi</a></h4>
				</div>

				<!-- Modal Body -->
				<form action="/dashboard/approve_mutasi" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input class="mrp_id" type="hidden" name="id" value="">
					<div class="modal-body">

						<div class="form-group">
							<h4>NIP Penerima Mutasi *</h4>
							<input type="text" class="form-control" style="text-transform: uppercase" name="nip" required="">
						</div>
							
						<div class="form-group"> 
							<h4>Perintah Cetak *</h4>
							<input class="custom-file-upload" type="file" id="file" name="dokumen_mutasi" id="contact:attachment" data-btn-text="Select a File" required="" />
							<small class="text-muted block">Max file size: 10Mb (pdf)</small>
						</div>
						
						<div class="form-group">
							<h4>No. Dokumen *</h4>
							<input type="text" class="form-control" name="no_dokumen_respon_sdm" required="">
						</div>

						<div class="form-group">
							<h4>Tindak Lanjut *</h4>
							<!-- select -->
							<div class="fancy-form fancy-form-select">
								<select class="form-control" name="tindak_lanjut" required="">
									<option>--- PILIH ---</option>
									<option value="Cetak SK Definitif">Cetak SK Definitif</option>
									<option value="Cetak SK Fungsional">Cetak SK Fungsional</option>
									<option value="Cetak SK Fungsional & Surat Tugas PLT">Cetak SK Fungsional & Surat Tugas PLT</option>
									<option value="Cetak SK Fungsional Pembatalan SK Lama">Cetak SK Fungsional Pembatalan SK Lama</option>
									<option value="Cetak SK Ijin di Luar Tanggungan">Cetak SK Ijin di Luar Tanggungan</option>
									<option value="Cetak Surat Tugas PLT">Cetak Surat Tugas PLT</option>
									<option value="Pending">Pending</option>
								</select>
								<i class="fancy-arrow"></i>
							</div>
						</div>
					</div>

					<!-- Modal Footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
						{{-- <button type="button" class="btn btn-primary toastr-notify" data-progressBar="true" data-position="top-right" data-notifyType="success" data-message="Berhasil disimpan dan Dikirim" data-dismiss="modal">Simpan</button> --}}
					</div>
				</form>
			</div>
		</div>
    </div>

    <div id="rejectModal" class="modal right fade" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="rejectModalLabel">Reject <a href="" class="btn btn-primary edit_link" target="_blank">Edit data transaksi</a></h4>
				</div>

				<!-- Modal Body -->
				<form action="/dashboard/reject_mutasi" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input class="mrp_id" type="hidden" name="id" value="">
					<div class="modal-body">
							
						<div class="form-group"> 
							<h4>Surat Penolakan *</h4>
							<input class="custom-file-upload" type="file" name="dokumen_mutasi" id="file" id="contact:attachment" data-btn-text="Select a File" required />
							<small class="text-muted block">Max file size: 10Mb (pdf)</small>
						</div>
						
						<div class="form-group">
							<h4>No. Dokumen *</h4>
							<input type="text" class="form-control" name="no_dokumen_respon_sdm" required>
						</div>
					</div>

					<!-- Modal Footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
    </div>	
@endsection

@section('includes-scripts')
	@parent


	<script>
        $(function(){
        	window.table_forja = $('#forja_table').DataTable({
        		"order": [[ 1, 'asc' ]],
        		"autoWidth": false,
        		"columns": [
                    { "data": "no", "orderable": false, width: "2%" },
                    { "data": "direktorat" },
                    { "data": "personnel_area" },
                    { "data": "formasi" },
                    { "data": "jabatan" },
                    { "data": "jenjang" },
                    { "data": "status" },
                    { "data": "nip"},
                    { "data": "nama"}
                ],
            });

            table_forja.on('order.dt search.dt', function () {
		        table_forja.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		            cell.innerHTML = i+1;
		        } );
		    }).draw();

            window.table_sk = $('#sk_table').DataTable({
				"order": [[ 1, 'asc' ]],
        		"autoWidth": false,
        		"columns": [
                    { "data": "no", "orderable": false, width: "2%" },
                    { "data": "nip" },
                    { "data": "nama" },
                    { "data": "unit_asal" },
                    { "data": "unit_tujuan" },
                    { "data": "status" }
                ],
            });

            table_sk.on('order.dt search.dt', function () {
		        table_sk.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		            cell.innerHTML = i+1;
		        } );
		    }).draw();
        });
    </script>

	<script src="/bower_components/chart.js/dist/Chart.min.js"></script>
	<script src="/assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		loadScript(plugin_path + "footable/dist/footable.min.js", function(){
			loadScript(plugin_path + "footable/dist/footable.sort.min.js", function(){
				loadScript(plugin_path + "footable/dist/footable.paginate.min.js", function(){ 
					loadScript(plugin_path + "footable/dist/footable.filter.min.js", function(){ 

						// footable
						var $ftable = jQuery('.footable');


						/** 01. FOOTABLE INIT
						******************************************* **/
						$ftable.footable({
						});


						/** 01. PER PAGE SWITCH
						******************************************* **/
						// jQuery('#change-page-size').change(function (e) {
						// 	e.preventDefault();
						// 	var pageSize = jQuery(this).val();
						// 	$ftable.data('page-size', pageSize);
						// 	$ftable.trigger('footable_initialized');
						// });

						jQuery('#change-nav-size').change(function (e) {
							e.preventDefault();
							var navSize = jQuery(this).val();
							$ftable.data('limit-navigation', navSize);
							$ftable.trigger('footable_initialized');
						});


						/** 02. BOOTSTRAP 3.x PAGINATION FIX
						******************************************* **/
						jQuery("div.pagination").each(function() {
							jQuery("div.pagination ul").addClass('pagination');
							jQuery("div.pagination").removeClass('pagination');
						});
					});
				});
			});
		});
	});
		
	</script>

	<script>
		function getNilaiWithMRP(id){
			$.ajax({
				'url': '/dashboard/get_pegawai_nilai',
				'type': 'GET',
				'data': {
					'mrp_id': id
				},
				'dataType': 'json',
				error: function(){

				},
				success: function(data){
					for(var prop in data.bintang) {
						if(!!data.bintang[prop])
						{
							var angka = Math.ceil(data.bintang[prop] / 20);
							$('#'+prop).removeClass().addClass('rating rating-'+angka+' size-13 width-100');
						}
						else
							$('#'+prop).removeClass().addClass('rating rating-0 size-13 width-100');
					}

					for(var prop in data) {
						if(!!data[prop])
						{
							if(prop == 'bintang')
								break;
							$("#"+prop).empty().html(data[prop]);	
						}
						else
							$("#"+prop).empty().html($("#"+prop).attr('default'));	
					}
				}
			});
		}

		function getNilaiWithPegawai(id){
			$.ajax({
				'url': '/dashboard/get_pegawai_nilai',
				'type': 'GET',
				'data': {
					'pegawai_id': id
				},
				'dataType': 'json',
				error: function(){

				},
				success: function(data){
					for(var prop in data.bintang) {
						if(!!data.bintang[prop])
						{
							var angka = Math.ceil(data.bintang[prop] / 20);
							$('#'+prop).removeClass().addClass('rating rating-'+angka+' size-13 width-100');
						}
						else
							$('#'+prop).removeClass().addClass('rating rating-0 size-13 width-100');
					}

					for(var prop in data) {
						if(!!data[prop])
						{
							if(prop == 'bintang')
								break;
							$("#"+prop).empty().html(data[prop]);	
						}
						else
							$("#"+prop).empty().html($("#"+prop).attr('default'));	
					}
				}
			});
		}
	</script>

	<script>
		function rejectApproveFunct(id, reg_num){
			$(".mrp_id").val(id);
			$(".edit_link").attr('href', '/mrp/edit/'+reg_num);
		};
	</script>

	<script>
		// expected value parameter
		// value
		// 	|_ labels
		// 	|_ data
		// 		|_ isi
		// 		|_ akan
		// 		|_ pagu
		function drawChart(target, value = null)
		{
			var options = {
				responsive: true,
    			maintainAspectRatio: true,
				tooltips: {
			        enabled: false
			    },
			    hover: {
					mode: false
				},
				scales: {
					yAxes: [{
						stacked: true,
					}],
					xAxes: [{
						stacked: false,
					ticks: {
						beginAtZero: true
					},
					}]
				},
				animation: { 
	                onProgress: function () { 
	                    var chartInstance = this.chart;
	                    var width = chartInstance.width;
	                    var ctx = chartInstance.ctx; 
	                    ctx.textAlign = "left"; 
	                    ctx.font = "9px Open Sans"; 
	                    ctx.fillStyle = "#000"; 
	 
	                    Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) { 
	                        var meta = chartInstance.controller.getDatasetMeta(i); 
	                        Chart.helpers.each(meta.data.forEach(function (bar, index) { 
	                            data = dataset.data[index]; 
	                            if(i==0){
	                                ctx.fillText(data, width-25, bar._model.y-10);
	                            } else if (i==1) { 
	                                ctx.fillText(data, width-25, bar._model.y);
	                            } else if (i==2) { 
	                                ctx.fillText(data, width-25, bar._model.y+10);
	                            }
	                        }),this) 
	                    }),this);
					}
				}
			};

			if(target.substring(0,2) == 'SK')
			{
				var data = {
				    labels: value.labels,
				    datasets: [
				        {
				            label: "Batal",
				            // backgroundColor: 'rgba(255, 99, 132, 0.2)',
				            borderWidth: 1,
				            data: value.data.batal,
				            backgroundColor: '#4b77a3'
				        },
				        {
				            label: "Cetak",
				            // backgroundColor: 'rgba255(, 206, 86, 0.2)',
				            borderWidth: 1,
				            data: value.data.cetak,
				            backgroundColor: '#a4a6a8'
				        },
				        {
				            label: "Kirim",
				            // backgroundColor: 'rgba255(, 206, 86, 0.2)',
				            borderWidth: 1,
				            data: value.data.kirim,
				            backgroundColor: '#9db6e0'
				        }
				    ]
				};	
				options.scales.yAxes[0].stacked = false;
			}
			else
			{
				var data = {
				    labels: value.labels,
				    datasets: [
				        {
				            label: "Isi",
				            // backgroundColor: 'rgba(255, 99, 132, 0.2)',
				            borderWidth: 1,
				            data: value.data.isi,
				            backgroundColor: '#4b77a3'
				        },
				        {
				            label: "Akan",
				            // backgroundColor: 'rgba255(, 206, 86, 0.2)',
				            borderWidth: 1,
				            data: value.data.akan,
				            backgroundColor: '#a4a6a8'
				        },
				        {
				            label: "Kosong",
				            // backgroundColor: 'rgba255(, 206, 86, 0.2)',
				            borderWidth: 1,
				            data: value.data.pagu,
				            backgroundColor: '#9db6e0'
				        }
				    ]
				};
			}

			var ctx = document.getElementById(target).getContext("2d");
			// ctx.height = 400;
			var newChart = new Chart(ctx, {
			    type: 'horizontalBar',
			    data: data,
			    options: options
			});
			var obj = {};
			obj.name = target;
			obj.chart_obj = newChart;
			chart.push(obj);
		};
	</script>

	<script>
		$(document).ready(function() { 
			window.chart = [];
			$('.tabselect').click(function (e) {
				e.preventDefault(); //prevents re-size from happening before tab shown
				$(this).tab('show'); //show tab panel 
				$('.footable').trigger('footable_resize'); //fire re-size of footable
			});

			var height = $(document).height();
			$("#monitoring_body").css('height', height*0.55);
			$("#monitoring_body").css('max-height', height*0.55);
			$("#verifikasi_body").css('height', height*0.55);
			$("#verifikasi_body").css('max-height', height*0.55);

			// drawChart("struktural_chart");
			// drawChart("fungsional_chart");
			callAjaxFJChart();

			$('#tabnya_sk').on("shown.bs.tab",function(){
				callAjaxSKChart();
				$('#tabnya_sk').off();//to remove the binded event after initial rendering
			});
		}); 
	</script>

	<script>
		$("#rekom_checkbox").click(function(e){
			var on_off = $(this).val();
			$(this).val( on_off == '0' ? '1' : '0');

			if($(this).val() == '1')
			{
				if($("#rekom_unit").children().length <= 1)
				{
					$.ajax({
						'url': '/dashboard/get_all_unit',
						'type': 'GET',
						'dataType': 'json',
						error: function(){

						},
						success: function(data){
							var unit = $("#rekom_unit");
							unit.empty();
							unit.append('<option>--- Unit ---</option>');
							unit.removeAttr('disabled');
							$.each(data, function(key, value){
								unit.append('<option value="'+key+'">'+value+'</option>');
							});
						}
					});
				}
				else
					$("#rekom_unit").removeAttr('disabled');
			}

			// $('#rekom_unit').prop('disabled', function(i, v) { return !v; });
			$('#rekom_unit').prop('required', function(i, v) { return !v; });
			$('#rekom_formasi').prop('required', function(i, v) { return !v; });
			$('#rekom_jabatan').prop('required', function(i, v) { return !v; });

			if($(this).val() == '0')
			{
				$('#rekom_unit').attr('disabled', 'true');
				$('#rekom_jabatan').attr('disabled', 'true');
				$('#rekom_formasi').attr('disabled', 'true');
			}
		});
	</script>

	<script>
		function getFormasi(element) {
			var unit_id = element.value;
			console.log(unit_id);
			$.ajax({
				'url': '/dashboard/get_formasi',
				'type': 'GET',
				'data': {
					'unit_id': unit_id,
				},
				'dataType': 'json',
				error: function(){

				},
				success: function(data){
					var formasi = $("#rekom_formasi");
					formasi.empty();
					formasi.append('<option>--- Formasi ---</option>');
					formasi.removeAttr('disabled');
					$.each(data, function(key, value){
						formasi.append('<option value="'+value.formasi+'">'+value.formasi+'</option>');
					});
				}
			});
		};

		function getJabatan(element) {
			var unit_id = $("#rekom_unit").val();
			var formasi = element.value;
			$.ajax({
				'url': '/dashboard/get_jabatan',
				'type': 'GET',
				'data': {
					'unit_id': unit_id,
					'formasi': formasi,
					'kode_olah': $("#kode_olah_pegawai").val(),
				},
				'dataType': 'json',
				error: function(){

				},
				success: function(data){
					var jabatan = $("#rekom_jabatan");
					jabatan.empty();
					jabatan.append('<option>--- Jabatan ---</option>');
					jabatan.removeAttr('disabled');
					$.each(data, function(key, value){
						console.log(value);
						jabatan.append('<option value="'+key+'">'+value+'</option>');
					});
				}
			});
		};
	</script>

	<script>
		function callAjaxFJChart(){
			var level = $("#unit_level_filter").val();
			var unit = $("#unit_filter").val();

			$.ajax({
				'url': '/monitoring/ajax/getRealisasiPagu',
				'type': 'GET',
				'data': {
					'level': level,
					'unit': unit
				},
				'dataType': 'json',
				error: function(data){

				},
				success: function(data){
					var value = {labels: [], data:{isi: [], akan:[], pagu:[]}};

					$.each(data.struktural, function(key_jen, val_jen){ //key = jenjang
						$.each(val_jen, function(key_lvl, val_lvl){ //key = level
							value.labels.push(key_jen+'_'+key_lvl);
							value.data.isi.push(val_lvl.isi);
							value.data.akan.push(val_lvl.akan);
							value.data.pagu.push(val_lvl.pagu);
						});
					});
					drawChart("struktural_chart", value);

					var value = [];

					$.each(data.fungsional, function(key_unit, val_unit){ //key = unit
						// console.log(val_unit.length);
						if(val_unit.length != 0)
						{
							var obj = {unit: '', chart_data: {labels: [], data:{isi: [], akan:[], pagu:[]}}}
							obj.unit = key_unit;
							$.each(val_unit, function(key_lvl, val_lvl){ //key = lvl
								obj.chart_data.labels.push(key_lvl);
								obj.chart_data.data.isi.push(val_lvl.isi);
								obj.chart_data.data.akan.push(val_lvl.akan);
								obj.chart_data.data.pagu.push(val_lvl.pagu);
							});
							value.push(obj);
						}
					});

					$.each(value, function(key, val){
						$("#fungsio_container").append('<h4 class="unit_name">'+val.unit+'</h4>');
						$("#fungsio_container").append('<canvas id="'+val.unit+'"></canvas>');
						// console.log(val);
						drawChart(val.unit, val.chart_data);
					});

					table_forja.clear();
					table_forja.rows.add(data.table);
					table_forja.draw();
				}
			});
		};
	</script>

	<script>
		function callAjaxSKChart(){
			var unit = $("#sk_unit_filter").val();

			$.ajax({
				'url': '/monitoring/ajax/getPergerakanSK',
				'type': 'GET',
				'data': {
					'unit': unit
				},
				'dataType': 'json',
				error: function(data){

				},
				success: function(data){
					var value = [];

					$.each(data.chart, function(key_unit, val_unit){ //key = unit
						var obj = {unit: '', chart_data: {labels: [], data:{cetak: [], kirim:[], batal:[]}}}
						obj.unit = key_unit;
						obj.chart_data.data.cetak.push(val_unit.cetak);
						obj.chart_data.data.kirim.push(val_unit.kirim);
						obj.chart_data.data.batal.push(val_unit.batal);
						value.push(obj);
						// obj.chart_data.labels.push(Object.keys(val_unit));
					});

					$.each(value, function(key, val){
						// console.log(val);
						$("#sk_chart_container").append('<h4 class="unit_name">'+val.unit+'</h4>');
						$("#sk_chart_container").append('<canvas id="SK_'+val.unit+'"></canvas>');
						drawChart('SK_'+val.unit, val.chart_data);
					});

					table_sk.clear();
					table_sk.rows.add(data.table);
					table_sk.draw();
				}
			});
		};
	</script>

	<script>
		$("#unit_level_filter, #unit_filter").change(function(){
			$("#fungsio_container").empty();
			$.each(chart, function(key, val){
				if(val.name.substring(0,2) != 'SK')
				{
					val.chart_obj.destroy();
				}
			});
			callAjaxFJChart();
		});
	</script>

	<script>
		$("#sk_unit_filter").change(function(){
			$("#sk_chart_container").empty();
			$.each(chart, function(key, val){
				if(val.name.substring(0,2) == 'SK')
				{
					val.chart_obj.destroy();
				}
			});
			callAjaxSKChart();
		});
	</script>
@endsection