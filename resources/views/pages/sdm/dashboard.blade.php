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
	<link href="/assets/css/sdm_dashboard.css" rel="stylesheet" type="text/css" />

@endsection

@section('content')

	<div id="content" class="padding-20">
		@include('includes.validation_errors')

		<div class="row">
			<div class="col-md-6">
				<h4>Monitoring</h4>	
				<div id="panel-1" class="panel panel-default">
					<div class="panel-heading">
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
					</div>
					<!-- /panel content -->

				</div>
			</div>

			<div class="col-md-6">
				<h4>Verifikasi</h4>
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
								<a class="tabselect" href="#request" data-toggle="tab">Request Jabatan</a>
							</li>
						</ul>									

						<!-- right options -->
						<ul class="options pull-right list-inline">
							<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
							<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
						</ul>
						<!-- /right options -->
					</div>

					<!-- panel content -->
					<div class="panel-body" style="overflow-y: auto" id="verifikasi_body">
						<div class="tab-content transparent ">
							<div id="meminta" class="tab-pane active">
								@if ($mrp_1->count())
								<div class="row">
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="Search" id="filter2">
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
											<td><strong>{{$mrp->pegawai->formasi_jabatan->formasi}} {{$mrp->pegawai->formasi_jabatan->jabatan}}</strong> {{$mrp->pegawai->formasi_jabatan->posisi}}<br><small>{{$mrp->pegawai->formasi_jabatan->personnel_area->username}}</small></td>
											<td>
												@if(isset($mrp->formasi_jabatan_id))
													<strong>{{$mrp->formasi_jabatan->formasi}}{{$mrp->formasi_jabatan->jabatan}}</strong> {{$mrp->formasi_jabatan->posisi}}
													<br><small>{{$mrp->formasi_jabatan->personnel_area->username}}</small>
												@else
													Perlu saran
												@endif
											</td>
											<td>{{$mrp->pegawai->time_diff(Carbon::parse($mrp->pegawai->start_date), Carbon::now('Asia/Jakarta'))}}</td>
											<td>{{$mrp->pegawai->time_diff(Carbon::now('Asia/Jakarta'), Carbon::parse($mrp->pegawai->end_date))}}</td>
											<td>{{$mrp->pegawai->formasi_jabatan->personnel_area->nama}}<br>{{$mrp->pegawai->formasi_jabatan->personnel_area->direktorat->nama}}</td>
											<td>{{$mrp->alasan_mutasi}}</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green nilaiBtn" data-toggle="modal" data-target="#ceknilai" onclick="getNilai('{{ $mrp->pegawai->id }}');">
													<i class="fa fa-check-circle"></i>
													<span>Nilai {{$mrp->pegawai->nama_pegawai}}</span>
												</button>												
											</td>
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
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#approveModal" onclick="rejectApproveFunct('{{ $mrp->id }}');">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red" data-toggle="modal" data-target="#rejectModal" onclick="rejectApproveFunct('{{ $mrp->id }}');">
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
											<td><strong>{{$mrp->pegawai->formasi_jabatan->formasi}} {{$mrp->pegawai->formasi_jabatan->jabatan}}</strong> {{$mrp->pegawai->formasi_jabatan->posisi}}<br><small>{{$mrp->pegawai->formasi_jabatan->personnel_area->username}}</small></td>
											<td>
												@if(isset($mrp->formasi_jabatan_id))
													<strong>{{$mrp->formasi_jabatan->formasi}}{{$mrp->formasi_jabatan->jabatan}}</strong> {{$mrp->formasi_jabatan->posisi}}
													<br><small>{{$mrp->formasi_jabatan->personnel_area->username}}</small>
												@else
													Perlu saran
												@endif
											</td>
											<td>{{$mrp->pegawai->time_diff(Carbon::parse($mrp->pegawai->start_date), Carbon::now('Asia/Jakarta'))}}</td>
											<td>{{$mrp->pegawai->time_diff(Carbon::now('Asia/Jakarta'), Carbon::parse($mrp->pegawai->end_date))}}</td>
											<td>{{$mrp->pegawai->formasi_jabatan->personnel_area->nama}}<br>{{$mrp->pegawai->formasi_jabatan->personnel_area->direktorat->nama}}</td>
											<td>{{$mrp->alasan_mutasi}}</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green nilaiBtn" data-toggle="modal" data-target="#ceknilai" onclick="getNilai('{{ $mrp->pegawai->id }}');">
													<i class="fa fa-check-circle"></i>
													<span>Nilai {{$mrp->pegawai->nama_pegawai}}</span>
												</button>													
											</td>
											<td class="text-center">
												<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_unit_usul }}" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#approveReqJabatan" onclick="rejectApproveFunct('{{ $mrp->id }}');">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red" data-toggle="modal" data-target="#rejectModal" onclick="rejectApproveFunct('{{ $mrp->id }}');">
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
											<td>{{ $mrp->formasi_jabatan->formasi }}</td>
											<td>{{ $mrp->formasi_jabatan->jabatan }}</td>
											<td>{{ \App\Pegawai::where('nip', $mrp->nip_pengusul)->first()->nama_pegawai }} ({{ $mrp->nip_pengusul }})</td>
											<td>Existing</td>
											<td>{{ $mrp->requested_tgl_aktifasi ? $mrp->requested_tgl_aktifasi->format('j F Y') : '-' }}</td>
											<td class="text-center">
												<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_unit_usul }}" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#approveReqJabatan" onclick="rejectApproveFunct('{{ $mrp->id }}');">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red" data-toggle="modal" data-target="#rejectModal" onclick="rejectApproveFunct('{{ $mrp->id }}');">
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
					<h4 class="modal-title" id="myLargeModalLabel">Penilaian</h4>
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
												<td id="bahasa_3">Bahasa 3</td>
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
					<h4 class="modal-title" id="approveModalLabel">Approve</h4>
				</div>

				<!-- Modal Body -->
				<form action="/dashboard/approve_mutasi" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input class="mrp_id" type="hidden" name="id" value="">
					<div class="modal-body">
							
						<div class="form-group"> 
							<h4>Perintah Cetak</h4>
							<input class="custom-file-upload" type="file" id="file" name="dokumen_mutasi" id="contact:attachment" data-btn-text="Select a File" />
							<small class="text-muted block">Max file size: 10Mb (pdf)</small>
						</div>
						
						<div class="form-group">
							<h4>No. Dokumen</h4>
							<input type="text" class="form-control" name="no_dokumen_respon_sdm">
						</div>

						<div class="form-group">
							<h4>Tindak Lanjut</h4>
							<!-- select -->
							<div class="fancy-form fancy-form-select">
								<select class="form-control" name="tindak_lanjut">
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
					<h4 class="modal-title" id="approveReqJabatanLabel">Approve</h4>
				</div>

				<!-- Modal Body -->
				<form action="/dashboard/approve_mutasi" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input class="mrp_id" type="hidden" name="id" value="">
					<div class="modal-body">

						<div class="form-group">
							<h4>NIP Penerima Mutasi</h4>
							<input type="text" class="form-control" style="text-transform: uppercase" name="nip">
						</div>
							
						<div class="form-group"> 
							<h4>Perintah Cetak</h4>
							<input class="custom-file-upload" type="file" id="file" name="dokumen_mutasi" id="contact:attachment" data-btn-text="Select a File" />
							<small class="text-muted block">Max file size: 10Mb (pdf)</small>
						</div>
						
						<div class="form-group">
							<h4>No. Dokumen</h4>
							<input type="text" class="form-control" name="no_dokumen_respon_sdm">
						</div>

						<div class="form-group">
							<h4>Tindak Lanjut</h4>
							<input type="text" class="form-control" name="tindak_lanjut">
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
					<h4 class="modal-title" id="rejectModalLabel">Reject</h4>
				</div>

				<!-- Modal Body -->
				<form action="/dashboard/reject_mutasi" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input class="mrp_id" type="hidden" name="id" value="">
					<div class="modal-body">
							
						<div class="form-group"> 
							<h4>Surat Penolakan</h4>
							<input class="custom-file-upload" type="file" name="dokumen_mutasi" id="file" id="contact:attachment" data-btn-text="Select a File" />
							<small class="text-muted block">Max file size: 10Mb (pdf)</small>
						</div>
						
						<div class="form-group">
							<h4>No. Dokumen</h4>
							<input type="text" class="form-control" name="no_dokumen_respon_sdm">
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

	<script type="text/javascript">
		loadScript(plugin_path + "chart.flot/jquery.flot.min.js", function(){
			loadScript(plugin_path + "chart.flot/jquery.flot.resize.min.js", function(){
				loadScript(plugin_path + "chart.flot/jquery.flot.time.min.js", function(){
					loadScript(plugin_path + "chart.flot/jquery.flot.fillbetween.min.js", function(){
						loadScript(plugin_path + "chart.flot/jquery.flot.orderBars.min.js", function(){
							loadScript(plugin_path + "chart.flot/jquery.flot.pie.min.js", function(){
								loadScript(plugin_path + "chart.flot/jquery.flot.tooltip.min.js", function(){
								
									// demo js script
									loadScript("assets/js/view/demo.graphs.flot.js");

								});
							});
						});
					});
				});
			});
		});
	</script>
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
		function getNilai(id){
			$.ajax({
				'url': '/dashboard/get_pegawai_nilai',
				'type': 'GET',
				'data': {
					'pegawai': id
				},
				'dataType': 'json',
				error: function(){

				},
				success: function(data){
					if(data)
					{
						for(var prop in data.bintang) {
							var angka = Math.ceil(data.bintang[prop] / 20);
							$('#'+prop).removeClass().addClass('rating rating-'+angka+' size-13 width-100');
						}

						for(var prop in data) {
							if(prop == 'bintang')
								break;
							$("#"+prop).empty().html(data[prop]);
						}
					}
				}
			});
		}
	</script>

	<script>
		function rejectApproveFunct(id){
			$(".mrp_id").val(id);
			// if(confirm('Anda yakin akan reject permintaan mutasi ini?'))
			// {
			// 	$.ajax({
			// 		'url': '/dashboard/reject_mutasi',
			// 		'type': 'post',
			// 		'data': {
			// 			'_token': '{{ csrf_token() }}',
			// 			'id': id
			// 		},
			// 		'dataType': 'json',
			// 		error: function(){

			// 		},
			// 		success: function(data){
			// 			if(data)
			// 			{
			// 				$("tr#"+id).remove();
			// 			}
			// 		}
			// 	});
			// }
		};
	</script>

	<script>
		$(document).ready(function() { 
			$('.tabselect').click(function (e) {
				e.preventDefault(); //prevents re-size from happening before tab shown
				$(this).tab('show'); //show tab panel 
				$('.footable').trigger('footable_resize'); //fire re-size of footable
			});

			var height = $(document).height();
			$("#monitoring_body").css('height', height*0.45);
			$("#verifikasi_body").css('height', height*0.45);
		}); 
	</script>
@endsection