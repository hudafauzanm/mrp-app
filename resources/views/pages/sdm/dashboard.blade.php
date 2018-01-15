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
					<div class="panel-body scrollable" style="height: 580px;">
						<div class="tab-content transparent">
							<div class="row">
									<div class=" col-md-4"> 
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
								<a class="tabselect" href="#request" data-toggle="tab">Request</a>
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
					<div class="panel-body scrollable"  style="height: 580px;">
						<div class="tab-content transparent ">
							<div id="meminta" class="tab-pane active">
								<div class="row">
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="Search" id="filter2">
									</div>
								</div>
								
								<br>
								<table class="footable" id="footable1" data-filter="#filter1">
									<thead>
										<tr>
											<th data-type="numeric" data-hide = "" class="">Evaluasi/Dokumen</th>
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
											<th data-type="numeric" data-hide = "" class="">Tindak Lanjut</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>
											
									</tbody>
								</table>
								<!-- </div> -->
							</div>

							<div id="bursa" class="tab-pane">
								<div class="row">
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="Search" id="filter2">
									</div>
								</div>
								<br>
								<table class="footable" id="footable2" data-filter="#filter2">
									<thead>
										<tr>
											<th data-type="numeric" data-hide = "" class="">Evaluasi/Dokumen</th>
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
											<th data-type="numeric" data-hide = "" class="">Tindak Lanjut</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>akjalgjlkajlka</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>
											
									</tbody>
								</table>
								<!-- </div> -->
							</div>

							<div id="request" class="tab-pane">
								<div class="row">
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="Search" id="filter2">
									</div>
								</div>
								<br>
								<table class="footable" id="footable3" data-filter="#filter3">
									<thead>
										<tr>
											<th data-type="numeric" data-hide = "" class="">Evaluasi/Dokumen</th>
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
											<th data-type="numeric" data-hide = "" class="">Tindak Lanjut</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>
										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>
										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<a href="#" class="btn btn-3d btn-sm btn-primary">
													<i class="fa fa-arrow-circle-down"></i>
													<span>Download</span>
												</a>
											</td>
											<td class="foo-cell">8510412Z.Rotasi.152019030430_151666040601</td>
											<td>85107001</td>
											<td>DESTA AGUNG SWANDITA</td>
											<td>SPE02</td>
											<td>SUPERVISOR PELAKSANA PENGADAAN</td>
											<td>ASSISTANT ANALYST ASURANSI</td>
											<td>7</td>
											<td>7</td>
											<td>SEKTOR PEMBANGKITAN ASAM-ASAM PT PLN (PERSERO) WILAYAH KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</td>
											<td>xxx</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#ceknilai">
													<i class="fa fa-check-circle"></i>
													<span>Nilai</span>
												</button>														
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-3d btn-sm btn-green" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-check-circle"></i>
													<span>Approve</span>
												</button>
												<button type="button" class="btn btn-3d btn-sm btn-red">
													<i class="fa fa-minus-circle"></i>
													<span>Reject</span>
												</button>
											</td>
										</tr>
											
									</tbody>
								</table>
								<!-- </div> -->
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
									<div class="table-responsive">
										<table class="table table-bordered table-vertical-middle nomargin">
											<thead>
												<tr>
													<th>Uraian</th>
													<th>Skor</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Enthusiasthic for Challenge</td>
													<td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
												</tr>
												<tr>
													<td>Creative & Innovative</td>
													<td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
												</tr>
												<tr>
													<td>Building Business Partnership</td>
													<td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
												</tr>
												<tr>
													<td>Strategic Orientation</td>
													<td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
												</tr>
												<tr>
													<td>Customer Focus Oriented</td>
													<td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
												</tr>
												<tr>
													<td>Driving Execution</td>
													<td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
												</tr>
												<tr>
													<td>Visionary Leadership</td>
													<td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
												</tr>
												<tr>
													<td>Empowering / Developing Others</td>
													<td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
												</tr>
											</tbody>
										</table>
									</div>
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
									<div class="table-responsive">
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
													<td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
												</tr>
												<tr>
													<td>KH2</td>
													<td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
												</tr>
												<tr>
													<td>Bahasa Inggris</td>
													<td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
												</tr>
												<tr>
													<td>Bahasa Mandarin</td>
													<td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
												</tr>
												<tr>
													<td>Bahasa Jawa</td>
													<td><div class="rating rating-0 size-13 width-100"><!-- rating-0 ... rating-5 --></div></td>
												</tr>
											</tbody>
										</table>
									</div>
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
											<th>Uraian</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Internal Readiness</td>
											<td>Kesehatan</td>
											<td><a href="#" class="btn btn-3d btn-xs btn-primary">
											<i class="fa fa-arrow-circle-down"></i>
											<span>Download</span>
											</a>
										</td>
										</tr>
										<tr>
											<td></td>
											<td>Career Willingness</td>
											<td> Aasdasdwa dasdasdasd asd asdas asd sdasdasd asda sdaasdasdasd asdasda asdas </td>
										</tr>
										<tr>
											<td>External Readiness</td>
											<td>Keluarga</td>
											<td></td>
										</tr>
										<tr>
											<td>Hubungan Dengan Sesama</td>
											<td></td>
											<td></td>
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

    <div id="myModal" class="modal right fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Approve</h4>
				</div>

				<!-- Modal Body -->
				<div class="modal-body">
					
					<div class="form-group"> 
					<h4>Perintah Cetak</h4>
					<input class="custom-file-upload" type="file" id="file" name="contact[attachment]" id="contact:attachment" data-btn-text="Select a File" />
					<small class="text-muted block">Max file size: 10Mb (zip/pdf/jpg/png)</small>
					</div>

					<div class="form-group">

					<h4>Tanggal Aktifasi</h4>
					<input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false">
					</div>
				</div>

				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<button type="button" class="btn btn-primary toastr-notify data-progressBar="true" data-position="top-right" data-notifyType="success" data-message="Berhasil disimpan dan Dikirim" data-dismiss="modal">Simpan</button>
				</div>
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
		$(document).ready(function() { 
		     $('.tabselect').click(function (e) {
		           e.preventDefault(); //prevents re-size from happening before tab shown
		           $(this).tab('show'); //show tab panel 
		           $('.footable').trigger('footable_resize'); //fire re-size of footable
		      });
		}); 
	</script>
@endsection