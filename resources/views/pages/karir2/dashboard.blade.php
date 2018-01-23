<?php 
use Carbon\Carbon;

?>

@extends('layouts.master')

@section('title', 'MRP Dashboard')

@section('leftbar')
	@include('includes.karir2.leftbar')
@endsection

@section('includes-styles')
	@parent

	<link href="/assets/css/layout-datatables.css" rel="stylesheet" type="text/css" />
	<!-- FOOTABLE TABLE -->
	<link href="/assets/plugins/footable/css/footable.core.min.css" rel="stylesheet" type="text/css" />
	<link href="/assets/plugins/footable/css/footable.standalone.css" rel="stylesheet" type="text/css" />
	<link href="/assets/css/sdm_dashboard.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
	<div id="content" class="padding-20">

		<!-- 
			PANEL CLASSES:
				panel-default
				panel-danger
				panel-warning
				panel-info
				panel-success

			INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
					All pannels should have an unique ID or the panel collapse status will not be stored!
		-->
		<div id="panel-3" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong>DATA EVALUASI MUTASI</strong> <!-- panel title -->
				</span>

				<!-- right options -->
				<ul class="options pull-right list-inline">
					<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
					<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
					<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
				</ul>
				<!-- /right options -->

			</div>

			<!-- panel content -->
			<div class="panel-body" >
				<div class="btn-group" style="text-align: right;">
					<button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars" ></i> Export Table Data</button>
					<ul class="dropdown-menu " role="menu">
						<li class="divider"></li>
						<li><a href="#" onClick ="$('#customers').tableExport({type:'excel',escape:'false'});"> <img src='/assets/icons/xls.png' width='24px'> XLS</a></li>
						<li><a href="#" onClick ="$('#customers').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"><img src='/assets/icons/pdf.png' width='24px'> PDF</a></li>	
					</ul>
				</div>

				<!-- <button type="button" class="btn btn-default"><a href="/dashboard/dataevaluasi">Export All Tabels</a></button> -->

				<table class="footable" id="footable" id="sample_1" data-filter="#filter1" >
					<thead>
						<tr>
							<th style="text-align: center;">
								 Pengusul
							</th>
							<th style="text-align: center;">
								 Surat Perintah Cetak SK
							</th>
							<th style="text-align: center;">
								 No. Surat Nota Dinas
							</th>
							<th style="text-align: center;">
								 Registry Number
							</th>
							<th style="text-align: center;">
								 NIP
							</th>
							<th class="hidden-xs" style="text-align: center;">
								 Nama Pegawai
							</th>
							<th class="hidden-xs" style="text-align: center;" width="200">
								 Tindak Lanjut
							</th>
							<th data-type="numeric" data-hide = "all" class="">PS GROUP<br></th>
							<!-- <th data-type="numeric" data-hide = "" class="">Nama</th> -->
							<th data-type="numeric" data-hide = "all" class="">Jabatan Lama</th>
							<th data-type="numeric" data-hide = "all" class="">Jabatan Baru</th>
							<th data-type="numeric" data-hide = "all" class="">Evaluasi dan Tindak Lanjut</th>
							<th data-type="numeric" data-hide = "all" class="">Sisa Masa Kerja</th>
							<th data-type="numeric" data-hide = "all" class="">Masa Kerja di Jabatan Terakhir</th>
							<th data-type="numeric" data-hide = "all" class="">Mutasi</th>
							<th data-type="numeric" data-hide = "all" class="">Diklat Penjenjangan Terakhir</th>
							<th data-type="numeric" data-hide = "all" class="">No Sertifikat</th>
							<th data-type="numeric" data-hide = "all" class="">Jalur Mutasi</th>
							<th data-type="numeric" data-hide = "all" class="">PERDIR Formasi Jabatan untuk Unit yang dituju</th>
							<th data-type="numeric" data-hide = "all" class="">Letak Domisili dengan Unit Mutasi</th>
							<th data-type="numeric" data-hide = "all" class="">Suami/Istri</th>
							<th data-type="numeric" data-hide = "all" class="">Tindaklanjut</th>
							<th data-type="numeric" data-hide = "all" class="">Tanggal Aktivasi</th>
							<!-- <th data-type="numeric" data-hide = "" class="">Tindak Lanjut</th> -->
						</tr>
					</thead>
					<tbody>
						@foreach ($mrp_e as $mrp)
						<tr>
							<td>{{$mrp->unit_pengusul}}</td> <!-- pengusul -->
							<td></td> <!-- surat perintah -->
							<td>
								 {{$mrp->no_dokumen_unit_asal}} <!-- no dokumen asal -->
							</td>
							<td>
								 {{$mrp->registry_number}} <!-- registry number -->
							</td>
							<td>
								 {{$mrp->pegawai->nip}} <!-- nip pegawai -->
							</td>
							<td>
								 {{$mrp->pegawai->nama_pegawai}} <!-- nama pegawai -->
							</td>
							<td style="text-align: center;">
								 <button type="button" class="btn btn-success" style="height: 35px;">Approve</button> <button type="button" class="btn btn-danger" style="height: 35px">Reject</button>
							</td> <!-- tindak lanjut -->

							<td>{{$mrp->pegawai->ps_group}}</td><!-- ps group -->

							<td><strong>{{$mrp->pegawai->formasi_jabatan->formasi}} {{$mrp->pegawai->formasi_jabatan->jabatan}}</strong> {{$mrp->pegawai->formasi_jabatan->posisi}}<br></td><!-- jabatan lama -->

							<td><strong>{{ $mrp->formasi_jabatan->formasi}} {{ $mrp->formasi_jabatan->jabatan}}</strong> {{ $mrp->formasi_jabatan->posisi}}<br></td> <!-- jabatan baru -->
							
							<td></td>

							<td>
								 ... Tahun <!-- sisa masa kerja -->
							</td>
							<td>
								 s.d. .... Tahun <!-- masa kerja di jab terakhir -->
							</td>
							<td>
								 {{$mrp->jenis_mutasi}} ({{$mrp->mutasi}}) <!-- jenis mutasi -->
							</td>
							<td>
								 {{ App\DiklatPenjenjangan::where('pegawai_id', $mrp->pegawai->id)->pluck('jenis_diklat')->first() }} <!-- jenis diklat -->
							</td>
							<td>
								 {{ App\DiklatPenjenjangan::where('pegawai_id', $mrp->pegawai->id)->pluck('nomor_sertifikat')->first() }} <!-- no sertif -->

							</td>
							<td>
								 {{ $mrp->jalur_mutasi }} <!-- jalur mutasi -->
							</td>
							<td>
								 {{ $mrp->formasi_jabatan->spfj}} <!-- perdir untuk unit yang dituju -->
							</td>
							<td>
								 {{ $mrp->pegawai->status_domisili}} <!-- status domisili -->
							</td>
							<td> <!-- sutri -->
								@if(isset($mrp->pegawai->nip_sutri))
									<strong>PLN</strong> ; {{ \App\Pegawai::where('nip', $mrp->pegawai->nip_sutri)->pluck('nip')->first() }} ; {{ $mrp->pegawai->formasi_jabatan->personnel_area->nama_pendek}}
								@else
									Non-PLN ; N/A ; N/A
								@endif
							</td>
							<td>
								 {{ $mrp->tindak_lanjut}} <!-- tindak lanjut -->
							</td>
							<td>
								 Tanggal Aktivasi <!-- tanggal aktivasi -->
							</td>
						</tr>
						
						@endforeach
					</tbody>
				</table>

			</div>
			<!-- /panel content -->

			<!-- panel footer -->
			<div class="panel-footer">



			</div>
			<!-- /panel footer -->

		</div>
		<!-- /PANEL -->


		


	</div>
@endsection

@section('includes-scripts')
	@parent

	<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">
			loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
				loadScript(plugin_path + "datatables/js/dataTables.tableTools.min.js", function(){
					loadScript(plugin_path + "datatables/js/dataTables.colReorder.min.js", function(){
						loadScript(plugin_path + "datatables/js/dataTables.scroller.min.js", function(){
							loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){
								loadScript(plugin_path + "select2/js/select2.full.min.js", function(){

									if (jQuery().dataTable) {

										// Datatable with TableTools
										function initTable1() {
											var table = jQuery('#sample_1');

											/* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

											/* Set tabletools buttons and button container */

											jQuery.extend(true, jQuery.fn.DataTable.TableTools.classes, {
												"container": "btn-group pull-right tabletools-topbar",
												"buttons": {
													"normal": "btn btn-sm btn-default",
													"disabled": "btn btn-sm btn-default disabled"
												},
												"collection": {
													"container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
												}
											});

											var oTable = table.dataTable({
												"order": [
													[0, 'asc']
												],
												
												"lengthMenu": [
													[5, 15, 20, -1],
													[5, 15, 20, "All"] // change per page values here
												],
												// set the initial value
												"pageLength": 10,

												"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

												"tableTools": {
													"sSwfPath": plugin_path + "datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
													"aButtons": [{
														"sExtends": "pdf",
														"sButtonText": "PDF"
													}, {
														"sExtends": "csv",
														"sButtonText": "CSV"
													}, {
														"sExtends": "xls",
														"sButtonText": "Excel"
													}, {
														"sExtends": "print",
														"sButtonText": "Print",
														"sInfo": 'Please press "CTR+P" to print or "ESC" to quit',
														"sMessage": "Generated by DataTables"
													}]
												}
											});

											var tableWrapper = jQuery('#sample_1_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

											tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
										}

										// Datatable with TableTools
										function initTable2() {
											var table = jQuery('#sample_2');

											/* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

											/* Set tabletools buttons and button container */

											jQuery.extend(true, jQuery.fn.DataTable.TableTools.classes, {
												"container": "btn-group tabletools-btn-group pull-right",
												"buttons": {
													"normal": "btn btn-sm btn-default",
													"disabled": "btn btn-sm btn-default disabled"
												}
											});

											var oTable = table.dataTable({
												"order": [
													[0, 'asc']
												],
												"lengthMenu": [
													[5, 15, 20, -1],
													[5, 15, 20, "All"] // change per page values here
												],

												// set the initial value
												"pageLength": 10,
												"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

												"tableTools": {
													"sSwfPath":plugin_path +  "datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
													"aButtons": [{
														"sExtends": "pdf",
														"sButtonText": "PDF"
													}, {
														"sExtends": "csv",
														"sButtonText": "CSV"
													}, {
														"sExtends": "xls",
														"sButtonText": "Excel"
													}, {
														"sExtends": "print",
														"sButtonText": "Print",
														"sInfo": 'Please press "CTRL+P" to print or "ESC" to quit',
														"sMessage": "Generated by DataTables"
													}, {
														"sExtends": "copy",
														"sButtonText": "Copy"
													}]
												}
											});

											var tableWrapper = jQuery('#sample_2_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
											tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
										}

										// Show/Hide Columns
										function initTable3() {
											var table = jQuery('#sample_3');

											/* Formatting function for row expanded details */
											// show detail
											function fnFormatDetails(oTable, nTr) {
												var aData = oTable.fnGetData(nTr);
												var sOut = '<table>';
												sOut += '<tr><th><strong>PS Group</strong></th> <td valign="top" width="5">' + ':' + '</td> <td>' + 'OPT04' + '</td></tr>';
												sOut += '<tr><th width="250" valign="top"><strong>Jabatan Lama</strong></th> <td valign="top" width="5">' + ':' + '</td> <td>' + 'DEPUTY GROUP AUDIT REGIONAL 11C <br> pada GROUP HEAD AUDIT REGIONAL 11 INSPEKTORAT AUDIT <br> REGIONAL JAWA BAGIAN TIMUR <br>SATUAN PENGAWASAN INTERN PT PLN (PERSERO) KANTOR PUSAT' + '</td></tr>';
												sOut += '<tr><td valign="top"><strong>Jabatan Baru</strong></td><td valign="top" width="5">' + ':' + '</td><td>' + 'DEPUTY GROUP AUDIT REGIONAL 12A <br> pada GROUP HEAD AUDIT REGIONAL 12 INSPEKTORAT AUDIT <br> REGIONAL JAWA BAGIAN TIMUR DAN BALI <br> SATUAN PENGAWASAN INTERN PT PLN (PERSERO) KANTOR PUSAT' + '</td></tr>';
												sOut += '</table>';

												sOut += '<table>';
												sOut += '<tr><td valign="top" width="230"><strong>Evaluasi dan Tindak Lanjut</strong></td><td valign="top" >' + ':' + '</td></tr>';
												sOut += '</table>';

												sOut += '<table>';
												sOut += '<tr><th valign="top" width="150"><strong>Sisa Masa Kerja</strong></th> <td valign="top" >' + ':' + '</td> <td width="5">' + ' ' + '</td> <td width="150">' + '6' +' ' +'Tahun'+ '</td> </tr>';
												sOut += '<tr><th valign="top" width="230"><strong>Masa Kerja di Jabatan Terakhir</strong></th> <td valign="top" >' + ':' + '</td> <td width="5">' + ' ' + '</td> <td width="150">' + ' '+ 's.d.' +' '+ '1' +' ' +'Tahun'+ '</td> </tr>';
												sOut += '<tr></tr>';
												sOut += '<tr><th valign="top" width="150"><strong>Mutasi</strong></th> <td valign="top" >' + ':' + '</td> <td width="5">' + ' ' + '</td> <td width="150">' + 'Dinas' +' ' +'(Rotasi)'+ '</td></tr>';
												sOut += '</table>';

												sOut += '<table>';
												sOut += '<tr><th valign="top" width="230"><strong>Diklat Penjenjangan Terakhir</strong></th> <td valign="top" >' + ':' + '</td> <td width="5">' + ' ' + '</td> <td width="150">' + 'EE' +' ' +'III'+ '</td> </tr>';
												sOut += '<tr><th valign="top" width="230"><strong>No. Sertifikat</strong></th> <td valign="top" >' + ':' + '</td> <td width="5">' + ' ' + '</td> <td width="150">' + 'C.2.0.0.04.2.10.13.11.6693102Z' + '</td> </tr>';
												sOut += '</table>';

												sOut += '<table>';
												sOut += '<tr><th valign="top" width="230"><strong>Jalur Mutasi</strong></th> <td valign="top" >' + ':' + '</td> <td width="5">' + ' ' + '</td> <td width="150">' + 'Intern Divisi Antar Bidang' + '</td></tr>';
												sOut += '</table>';

												sOut += '<table>';
												sOut += '<tr><th valign="top" width="230"><strong>PERDIR Formasi Jabatan untuk Unit yang dituju</strong></th> <td valign="top" >' + ':' + '</td> <td width="5">' + ' ' + '</td> <td width="150" valign="top">' + '0146.P/DIR/2016' + '</td></tr>';
												sOut += '<tr><th valign="top" width="230"><strong>Letak Domisili dengan Unit Mutasi</strong></th> <td valign="top" >' + ':' + '</td> <td width="5">' + ' ' + '</td> <td width="150" valign="top">' + 'Beda Pulau' + '</td></tr>';
												sOut += '</table>';

												sOut += '<table>';
												sOut += '<tr><th valign="top" width="230"><strong>Suami/Istri</strong></th> <td valign="top" >' + ':' + '</td> <td width="5">' + ' ' + '</td> <td width="150">' + 'Non-PLN' + ' ' + ';' + ' ' + 'N/A' + ' ' + ';' + ' ' + 'N/A' +'</td></tr>';
												sOut += '<tr><th valign="top" width="230"><strong>Tindak Lanjut</strong></th> <td valign="top" >' + ':' + '</td> <td width="5">' + ' ' + '</td> <td width="150">' + 'Cetak SK Definitif' + '</td></tr>';
												sOut += '<tr><th valign="top" width="230"><strong>Tanggal Aktivasi</strong></th> <td valign="top" >' + ':' + '</td> <td width="5">' + ' ' + '</td> <td width="150">' + '01.01.2018' + '</td></tr>';
												sOut += '</table>';

												return sOut;
											}

											/*
											 * Insert a 'details' column to the table
											 */
											var nCloneTh = document.createElement('th');
											nCloneTh.className = "table-checkbox";
											
											var nCloneTd = document.createElement('td');
											nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

											table.find('thead tr').each(function () {
												this.insertBefore(nCloneTh, this.childNodes[0]);
											});

											table.find('tbody tr').each(function () {
												this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
											});

											var oTable = table.dataTable({
												"columnDefs": [{
													"orderable": false,
													"targets": [0]
												}],
												"order": [
													[1, 'asc']
												],
												"lengthMenu": [
													[5, 15, 20, -1],
													[5, 15, 20, "All"] // change per page values here
												],
												// set the initial value
												"pageLength": 10,
											});

											var tableWrapper = jQuery('#sample_4_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
											var tableColumnToggler = jQuery('#sample_4_column_toggler');

											/* modify datatable control inputs */
											tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

											/* Add event listener for opening and closing details
											 * Note that the indicator for showing which row is open is not controlled by DataTables,
											 * rather it is done here
											 */
											table.on('click', ' tbody td .row-details', function () {
												var nTr = jQuery(this).parents('tr')[0];
												if (oTable.fnIsOpen(nTr)) {
													/* This row is already open - close it */
													jQuery(this).addClass("row-details-close").removeClass("row-details-open");
													oTable.fnClose(nTr);
												} else {
													/* Open this row */
													jQuery(this).addClass("row-details-open").removeClass("row-details-close");
													oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
												}
											});

											/* handle show/hide columns*/
											jQuery('input[type="checkbox"]', tableColumnToggler).change(function () {
												/* Get the DataTables object again - this is not a recreation, just a get of the object */
												var iCol = parseInt(jQuery(this).attr("data-column"));
												var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
												oTable.fnSetColumnVis(iCol, (bVis ? false : true));
											});
										}

										// Scroller
										function initTable4() {

											var table = jQuery('#sample_4');

											/* Fixed header extension: http://datatables.net/extensions/scroller/ */

											var oTable = table.dataTable({
												"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // datatable layout without  horizobtal scroll
												"scrollY": "300",
												"deferRender": true,
												"order": [
													[0, 'asc']
												],
												"lengthMenu": [
													[5, 15, 20, -1],
													[5, 15, 20, "All"] // change per page values here
												],
												"pageLength": 10 // set the initial value            
											});


											var tableWrapper = jQuery('#sample_5_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
											tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
										}

										// Columns Reorder
										function initTable5() {

											var table = jQuery('#sample_5');

											/* Fixed header extension: http://datatables.net/extensions/keytable/ */

											var oTable = table.dataTable({
												"order": [
													[0, 'asc']
												],
												"lengthMenu": [
													[5, 15, 20, -1],
													[5, 15, 20, "All"] // change per page values here
												],
												"pageLength": 10, // set the initial value,
												"columnDefs": [{  // set default column settings
													'orderable': false,
													'targets': [0]
												}, {
													"searchable": false,
													"targets": [0]
												}],
												"order": [
													[1, "asc"]
												]           
											});

											var oTableColReorder = new jQuery.fn.dataTable.ColReorder( oTable );

											var tableWrapper = jQuery('#sample_6_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
											tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
										}


										// Init each table
										initTable1();
										initTable2();
										initTable3();
										initTable4();
										initTable5();

									}

								});
							});
						});
					});
				});
			});
		</script>

	
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

			var height = $(document).height();
			$("#monitoring_body").css('height', height*0.45);
			$("#verifikasi_body").css('height', height*0.45);
		}); 
	</script> 

	<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
		<script type="text/javascript" src="tableExport.js"></script>
		<script type="text/javascript" src="jquery.base64.js"></script>
		<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
		<script type="text/javascript" src="jspdf/jspdf.js"></script>
		<script type="text/javascript" src="jspdf/libs/base64.js"></script>
@endsection