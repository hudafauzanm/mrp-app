@extends('layouts.master')

@section('title', 'MRP Dashboard')

@section('leftbar')
	@include('includes.karir2.leftbar')
@endsection

@section('includes-styles')
	@parent

	<link href="/assets/css/layout-datatables.css" rel="stylesheet" type="text/css" />
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

				<table class="table table-striped table-bordered table-hover" id="sample_3" id="sample_1">
					<thead>
						<tr>
							<th>
								 No. Surat Nota Dinas
							</th>
							<th>
								 Registry Number
							</th>
							<th class="hidden-xs">
								 NIP
							</th>
							<th class="hidden-xs">
								 Nama Pegawai
							</th>
							<th class="hidden-xs" style="text-align: center;" width="200">
								 Tindak Lanjut
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								 01205/SDM.03.01/KSPI/2017-R<br>Konfirmasi Manajemen SPI
							</td>
							<td>
								 6693102Z.R.1010101010
							</td>
							<td>
								 6693102Z
							</td>
							<td>
								 DIRGO WAHANTO
							</td>
							<td style="text-align: center;">
								 <button type="button" class="btn btn-success" style="height: 35px;">Approve</button> <button type="button" class="btn btn-danger" style="height: 35px">Reject</button>
							</td>
						</tr>
						<tr>
							<td>
								 Trident
							</td>
							<td>
								 Internet Explorer 5.0
							</td>
							<td>
								 Win 95+
							</td>
							<td>
								 5
							</td>
							<td>
								 C
							</td>
						</tr>
						
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
@endsection