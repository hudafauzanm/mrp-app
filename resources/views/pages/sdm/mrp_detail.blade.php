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
									<li><strong>Sisa Masa Kerja:</strong> {{ $pegawai->time_diff(Carbon::now('Asia/Jakarta'), Carbon::parse($pegawai->end_date)) }}</li>
									<li><strong>Lama & Kali Jenjang:</strong> {{ $pegawai->time_diff(Carbon::parse($pegawai->start_date), Carbon::now('Asia/Jakarta')) }}, {{ $pegawai->kali_jenjang }}x</li>
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
							<div class="col-md-6 col-xs-6 text-right">
								<h4><strong>Download</strong> Dokumen</h4>
								<ul class="list-unstyled ">
									@if ($mrp->no_dokumen_unit_usul)
										<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_unit_usul }}" class="btn btn-sm btn-3d btn-blue">{{ $mrp->filename_dokumen_unit_usul }}</a>
									@endif
									@if ($mrp->no_dokumen_unit_jawab)
										<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_unit_jawab }}" class="btn btn-sm btn-3d btn-info">{{ $mrp->filename_dokumen_unit_jawab }}</a>
									@endif
									@if ($mrp->no_dokumen_respon_sdm)
										<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_respon_sdm }}" class="btn btn-sm btn-3d btn-red">{{ $mrp->filename_dokumen_respon_sdm }}</a>
									@endif
									@if ($mrp->sk_stg_id)
										<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->skstg->filename_dokumen_sk }}" class="btn btn-sm btn-3d btn-red">{{ $mrp->skstg->filename_dokumen_sk }}</a>
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
												<li><strong>Tanggal Permintaan:</strong> {{ $mrp->created_at->format("d F Y h:i:s") }}</li>
												<li><strong>Permintaan Tanggal Aktivasi:</strong> {{ $mrp->requested_tgl_aktivasi->format("d F Y") }}
												</li>
												<li><strong>Tanggal Aktivasi:</strong> {{ $skstg ? $skstg->tgl_aktivasi->format("d F Y") : '-' }}
												</li>
												<li><strong>Jenis Mutasi:</strong> {{ $mrp->jenis_mutasi }}</li>
												<li><strong>Mutasi:</strong> {{ $mrp->mutasi }}</li>
												<li><strong>Jalur Mutasi:</strong> {{ $mrp->jalur_mutasi ? $mrp->jalur_mutasi : '-' }}
												</li>
											</ul>
										</td>
										<td>
											<div><strong>{{ $proyeksi ? $proyeksi->formasi.' '.$proyeksi->jabatan : '-' }}</strong></div>
											<small>{{ $proyeksi ? $proyeksi->posisi.' '.$proyeksi->personnel_area->nama : '' }}</small>
										</td>
										<td>
											<div><strong>{{ $mrp->formasi_jabatan_asal->formasi.' '.$mrp->formasi_jabatan_asal->jabatan }}</strong></div>
											<small>{{ $mrp->formasi_jabatan_asal->posisi.' '.$mrp->formasi_jabatan_asal->personnel_area->nama }}</small>
										</td>
										<td>{{ $mrp->tipe }}</td>
										<td>
											@if($mrps->status == 1)
												<span class="label label-primary">Diajukan</span>
											@elseif($mrps->status == 2)
												<span class="label label-warning">Proses Evaluasi (SDM)</span>
											@elseif($mrps->status == 3)
												<span class="label label-warning">Proses Evaluasi (Karir II)</span>
											@elseif($mrps->status == 4)
												<span class="label label-success">Proses SK</span>
											@elseif($mrps->status == 5)
												<span class="label label-success">SK Tercetak</span>
											@elseif($mrps->status == 6)
												<span class="label label-success">SK Pending</span>
											@elseif($mrps->status == 7)
		    									<span class="label label-success">Lewat Masa Aktifasi (unconfirmed)</span>
											@elseif($mrps->status == 8)
		    									<span class="label label-success">Clear</span>
											@elseif($mrps->status == 99)
												<span class="label label-danger">Ditolak (SDM Pusat)</span>
											@elseif($mrps->status == 98)
												<span class="label label-danger">Ditolak (Karir II Pusat)</span>
											@elseif($mrps->status == 97 && $mrps->tipe == 1)
												<span class="label label-danger">Ditolak ({{ $mrps->pegawai->formasi_jabatan->personnel_area->nama_pendek }})</span>
											@else
												<span class="label label-danger">???</span>
											@endif
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<hr class="nomargin-top" />

						<div class="row">

							<div class="col-xs-6">
								<h4><strong>Unit</strong> Peminta</h4>
								<address>
									<strong>{{ $pengusul->nama }}</strong><br>
									{{ $pengusul->alamat }}<br>
									{{ $pengusul->kota }} {{ $pengusul->provinsi }}<br>
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