<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Data Evaluasi Mutasi</title>
		<meta name="description" content="" />
		<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="/assets/plugins/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="/assets/css/essentials.css" rel="stylesheet" type="text/css" />

		<link href="/assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />

	</head>
	<!--
		.boxed = boxed version
	-->
	<body>


		<!-- WRAPPER -->
		

			

				<div class="panel panel-default">
				
					<div class="panel-body">

						<div class="row">

							<div class="col-md-12 col-xs-12">

								<h4 style="text-align: center; font-size: 28px"><strong>DATA EVALUASI MUTASI</strong></h4>
								<hr>
							</div>
						</div>

						<!-- <div class="btn-group" style="text-align: right;">
							<ul class="dropdown-menu " role="menu">
								<li class="divider"></li>
								<li><a href="/dashboard/dataevaluasi" onClick ="$('#customers').tableExport({type:'excel',escape:'false'});"> <img src='/assets/icons/xls.png' width='24px'> XLS</a></li>
								<li><a href="#" onClick ="$('#customers').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"><img src='/assets/icons/pdf.png' width='24px'> PDF</a></li>	
							</ul>
						</div> -->

						<!-- button -->
						<a href="/dashboard" ><button type="button" class="btn btn-info btn-3d btn-blue" ><i class="fa fa-chevron-circle-left"></i>Back</button></a> <br>
						<hr>

						<!-- pdf -->
						<a href="#" ><button type="button" class="btn btn-sucess btn-3d btn-red" onclick="myFunction()"><img src='/assets/icons/pdf.png' width='24px'>Export to PDF</button></a>

						<!-- excel -->
						<a href="#" onClick ="$('#customers').tableExport({type:'excel',escape:'false'});"><button type="button" class="btn btn-sucess btn-3d btn-green"><img src='/assets/icons/xls.png' width='24px'>Export to Excel</button></a>
						<hr>



						<div >

							<table class="minimalistBlack" id="customers">
								<thead>
								<tr>
								<th width="20" style="text-align: center;">No</th>
								<th width="200" style="text-align: center;">No. Surat Nota Dinas</th>
								<th width="300" style="text-align: center;">Registry Number</th>
								<th width="100" style="text-align: center;">NIP</th>
								<th width="250" style="text-align: center;">Nama Pegawai</th>
								<th width="50" style="text-align: center;">PS GROUP</th>
								<th width="350" style="text-align: center;">Jabatan Lama</th>
								<th width="350" style="text-align: center;">Jabatan Baru</th>
								<th width="550" style="text-align: center;">Evaluasi dan Tindak Lanjut</th>
								<th width="100" style="text-align: center;">Konfirmasi</th>
								</tr>
								</thead>
								<tbody>
								@foreach ($mrp_e1 as $mrp)
									<tr>
									<td valign="top">1</td>
									<td valign="top">{{$mrp->no_dokumen_unit_usul}} <!-- no dokumen asal --></td>
									<td valign="top">{{$mrp->registry_number}} <!-- registry number --></td>
									<td valign="top">{{$mrp->pegawai->nip}} <!-- nip pegawai --></td>
									<td valign="top">{{$mrp->pegawai->nama_pegawai}} <!-- nama pegawai --></td>
									<td valign="top">{{$mrp->pegawai->ps_group}} <!-- ps group --></td>
									<td valign="top"><strong>{{$mrp->pegawai->formasi_jabatan->formasi}} {{$mrp->pegawai->formasi_jabatan->jabatan}}</strong> <br>{{$mrp->pegawai->formasi_jabatan->posisi}}<br> <!-- jabatan lama --></td>
									<td valign="top"><strong>{{ $mrp->formasi_jabatan->formasi}} {{ $mrp->formasi_jabatan->jabatan}}</strong> <br> {{ $mrp->formasi_jabatan->posisi}}<br> <!-- jabatan baru --></td>
									<!-- evaluasi dan tindak lanjut -->
									<td valign="top">
										<strong>Sisa Masa Kerja :</strong> 6 Tahun ;<br>
										<strong>Masa Kerja di Jabatan Terakhir :</strong> s.d. 1 Tahun<br>
										<strong>Mutasi :</strong> {{$mrp->jenis_mutasi}} ({{$mrp->mutasi}})<br>
										<strong>Diklat Penjenjangan Terakhir :</strong> {{ App\DiklatPenjenjangan::where('pegawai_id', $mrp->pegawai->id)->pluck('jenis_diklat')->first() }} ;<br>
										<strong>No. Sertifikat :</strong> {{ App\DiklatPenjenjangan::where('pegawai_id', $mrp->pegawai->id)->pluck('nomor_sertifikat')->first() }}<br>
										<strong>Jalur Mutasi :</strong> {{ $mrp->jalur_mutasi }}<br>
										<strong>PERDIR Formasi Jabatan untuk Unit yang dituju :</strong> {{ $mrp->formasi_jabatan->spfj}}<br>
										<strong>Letak Domisili dengan Unit Mutasi:</strong> {{ $mrp->pegawai->status_domisili}}<br>
										<strong>Suami/Istri :</strong>
											@if(isset($mrp->pegawai->nip_sutri))
												PLN ; {{ \App\Pegawai::where('nip', $mrp->pegawai->nip_sutri)->pluck('nip')->first() }} ; {{ $mrp->pegawai->formasi_jabatan->personnel_area->nama_pendek}}
											@else
												Non-PLN ; N/A ; N/A
											@endif<br>
										<strong>Tindaklanjut :</strong> {{ $mrp->tindak_lanjut}}<br>
										<strong>Tanggal Aktivasi :</strong> {{ $mrp->tanggal_aktivasi}}<br>
									</td>
									

									<td>(isinya ttd)</td>
									</tr>
								@endforeach

								</tbody>
								</table>
							
						</div>

						<hr class="nomargin-top" />

						

					</div>
				
				</div>

			

		[]
		<!-- /WRAPPER -->


@section('includes-scripts')
	@parent
	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '/assets/plugins/';</script>
		<script type="text/javascript" src="/assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/app.js"></script>
		<!-- <script type="text/javascript" src="/tableExport.js"></script>
		<script type="text/javascript" src="/jquery.base64.js"></script>
		<script type="text/javascript" src="/jspdf/libs/sprintf.js"></script>
		<script type="text/javascript" src="/jspdf/jspdf.js"></script>
		<script type="text/javascript" src="/jspdf/libs/base64.js"></script> -->
		
		<!-- <script type="text/javaScript">	
			$(document).ready(function(){		
			});
		</script> -->

		<script>
			function myFunction() {
			    window.print();
			}
		</script>
@endsection

	</body>
</html>