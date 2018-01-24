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
							<div class="col-md-3 col-xs-6">
								<h4>Unit<strong> Pengusul</strong></h4>
								<ul class="list-unstyled">
									<li><strong>Unit:</strong> {{ $pengusul->nama }}</li>
									<li><strong>Alamat:</strong> {{ $pengusul->alamat }}</li>
									<li><strong>Kota:</strong> {{ $pengusul->kota }}</li>
									<li><strong>Provinsi:</strong> {{ $pengusul->provinsi }}</li>
									{{-- <li><strong>Diklat Penjenjangan:</strong> EE III</li> --}}
								</ul>
							</div>
							<div class="col-md-3 col-xs-6 pull-right text-right">
								<h4><strong>Download</strong> Dokumen</h4>
								<ul class="list-unstyled ">
									@if ($mrp->no_dokumen_unit_usul)
										<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_unit_usul }}" class="btn btn-sm btn-3d btn-blue">{{ $mrp->no_dokumen_unit_usul }}</a>
									@endif
									@if ($mrp->no_dokumen_unit_jawab)
										<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_unit_jawab }}" class="btn btn-sm btn-3d btn-info">{{ $mrp->no_dokumen_unit_jawab }}</a>
									@endif
									@if ($mrp->no_dokumen_respon_sdm)
										<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_respon_sdm }}" class="btn btn-sm btn-3d btn-red">{{ $mrp->skstg->no_dokumen_proses_sk }}</a>
									@endif
									@if ($mrp->sk_stg_id)
										<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->skstg->filename_dokumen_proses_sk }}" class="btn btn-sm btn-3d btn-red">{{ $mrp->skstg->no_dokumen_proses_sk }}</a>
									@endif
								</ul>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table table-condensed nomargin">
								<thead>
									<tr>
										<th width="28%">Detail Mutasi</th>
										<th width="36%">Jabatan yang Dibursakan</th>
										<th width="30%">Source</th>
										<th width="3%">Tipe</th>
										<th width="3%">Status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<ul class="list-unstyled">
												<li><strong>Tanggal Permintaan:</strong> {{ $mrp->created_at->format("d F Y h:i:s") }}</li>
												<li><strong>Tanggal Pooling:</strong> {{ $mrp->tgl_pooling ? $mrp->tgl_pooling->format("d F Y") : '-' }}
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
											<div><strong>{{ $jabatan ? $jabatan->formasi.' '.$jabatan->jabatan : '-' }}</strong></div>
											<small>{{ $jabatan ? $jabatan->posisi.' '.$jabatan->personnel_area->nama : '' }}</small>
										</td>
										<td>Pegawai Existing</td>
										<td>{{ $mrp->tipe }}</td>
										<td>
											@if($mrp->status == 0)
												<span class="label label-danger">Ditolak</span>
											@elseif($mrp->status == 1)
												<span class="label label-primary">Diajukan</span>
											@elseif($mrp->status == 2)
												<span class="label label-warning">Proses Evaluasi (SDM)</span>
											@elseif($mrp->status == 3)
												<span class="label label-info">Proses Evaluasi (Karir II)</span>
											@elseif($mrp->status == 4)
												<span class="label label-info">Proses Evaluasi (Karir II)</span>
											@elseif($mrp->status == 5)
												<span class="label label-success">Proses SK</span>
											@elseif($mrp->status == 6)
												<span class="label label-success">SK Tercetak</span>
											@elseif($mrp->status == 7)
												<span class="label label-success">SK Pending</span>
											@elseif($mrp->status == 8)
												<span class="label label-success">Clear</span>
											@elseif($mrp->status == 99)
												<span class="label label-success">Ditolak (SDM Pusat)</span>
											@elseif($mrp->status == 98)
												<span class="label label-success">Ditolak (Karir II Pusat)</span>
											@else											   
												<span class="label label-danger">???</span>
											@endif
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<hr class="nomargin-top" />

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