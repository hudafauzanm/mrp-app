<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Smarty Admin</title>
		<meta name="description" content="" />
		<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
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
		<div id="wrapper">

			<div class="padding-20">

				<div class="panel panel-default">
				
					<div class="panel-body">

						<div class="row">

							<div class="col-md-12 col-xs-12">

								<h4 style="text-align: center;"><strong>DATA EVALUASI</strong></h4>
								<hr>
							</div>
						</div>

						<div class="btn-group" style="text-align: right;">
							<button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars" ></i> Export Table Data</button>
							<ul class="dropdown-menu " role="menu">
								<li class="divider"></li>
								<li><a href="#" onClick ="$('#customers').tableExport({type:'excel',escape:'false'});"> <img src='/assets/icons/xls.png' width='24px'> XLS</a></li>
								<li><a href="#" onClick ="$('#customers').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"><img src='/assets/icons/pdf.png' width='24px'> PDF</a></li>	
							</ul>
						</div>

						<!-- <button type="button" class="btn btn-default"><a href="dataevaluasi-print.html">Back</a></button> -->

						<div class="">
							<table id="customers" class="">
								<thead>
									<tr class="warning">
										<th>No. Surat Nota Dinas</th>
										<th>Registry Number</th>
										<th width="100">NIP</th>
										<th width="200">Nama Pegawai</th>
										<th width="50">PS GROUP</th>
										<th width="300">Jabatan Lama</th>
										<th width="300">Jabatan Baru</th>
										<th width="350">Evaluasi dan Tindak Lanjut</th>
										<th width="350">Konfirmasi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>01205/SDM.03.01/KSPI/2017-R<br>Konfirmasi Manajemen SPI</td>
										<td>6693102Z.R.1010101010</td>
										<td>6693102Z</td>
										<td>DIRGO WAHANTO</td>
										<td>OPT04</td>
										<td><strong>Analyst</strong> Distribusi Bali</td>
										<td><strong>Deputi Manajer</strong> Distribusi Bali</td>
										<td>Sisa Masa Kerja : 6 Tahun ; Masa Kerja di Jabatan Terakhir : s.d. 1 Tahun<br>
											Mutasi : Dinas (Rotasi)<br>
											Diklat Penjenjangan Terakhir : EE III ; No. Sertifikat : C.2.0.0.04.2.10.13.11.6693102Z<br>
											Jalur Mutasi : Intern Divisi Antar Bidang<br>
											PERDIR Formasi Jabatan untuk Unit yang dituju : 0146.P/DIR/2016<br>
											Letak Domisili dengan Unit Mutasi: Beda Pulau<br>
											Suami/Istri : Non-PLN ; N/A ; N/A<br>
											Tindaklanjut : Cetak SK Definitif<br>
											Tanggal Aktivasi : 01.01.2018<br>
										</td>
									</tr>
								</tbody>
							</table> 

							<table class="minimalistBlack">
								<thead>
								<tr>
								<th>head1</th>
								<th>head2</th>
								<th>head3</th>
								<th>head4</th>
								<th>head5</th>
								<th>head6</th>
								<th>head7</th>
								<th>head8</th>
								<th>head9</th>
								<th>head10</th>
								</tr>
								</thead>
								<tbody>
								<tr>
								<td>cell1_1</td>
								<td>cell2_1</td>
								<td>cell3_1</td>
								<td>cell4_1</td>
								<td>cell5_1</td>
								<td>cell6_1</td>
								<td>cell7_1</td>
								<td>cell8_1</td>
								<td>cell9_1</td>
								<td>cell10_1</td>
								</tr>
								<tr>
								<td>cell1_2</td>
								<td>cell2_2</td>
								<td>cell3_2</td>
								<td>cell4_2</td>
								<td>cell5_2</td>
								<td>cell6_2</td>
								<td>cell7_2</td>
								<td>cell8_2</td>
								<td>cell9_2</td>
								<td>cell10_2</td>
								</tr>
								<tr>
								<td>cell1_3</td>
								<td>cell2_3</td>
								<td>cell3_3</td>
								<td>cell4_3</td>
								<td>cell5_3</td>
								<td>cell6_3</td>
								<td>cell7_3</td>
								<td>cell8_3</td>
								<td>cell9_3</td>
								<td>cell10_3</td>
								</tr>
								<tr>
								<td>cell1_4</td>
								<td>cell2_4</td>
								<td>cell3_4</td>
								<td>cell4_4</td>
								<td>cell5_4</td>
								<td>cell6_4</td>
								<td>cell7_4</td>
								<td>cell8_4</td>
								<td>cell9_4</td>
								<td>cell10_4</td>
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
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
		<script type="text/javascript" src="tableExport.js"></script>
		<script type="text/javascript" src="jquery.base64.js"></script>
		<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
		<script type="text/javascript" src="jspdf/jspdf.js"></script>
		<script type="text/javascript" src="jspdf/libs/base64.js"></script>

		<!-- <script type="text/javascript">
			window.print();
		</script> -->

	</body>
</html>