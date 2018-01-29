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
				<!-- <div class="btn-group" style="text-align: right;">
					<ul class="dropdown-menu " role="menu">
						<li class="divider"></li>
						<li><a href="/dashboard/dataevaluasi" onClick ="$('#customers').tableExport({type:'excel',escape:'false'});"> <img src='/assets/icons/xls.png' width='24px'> XLS</a></li>
						<li><a href="#" onClick ="$('#customers').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"><img src='/assets/icons/pdf.png' width='24px'> PDF</a></li>	
					</ul>
				</div> -->

				<div class="panel panel-default text-left">
					<div class="panel-body">
						<a class="btn btn-success btn-3d" href="/dashboard/dataevaluasi"><i class="fa fa-file-excel-o"></i> GENERATE DATA EVALUASI</a>
					</div>
				</div>

				<!-- <button type="button" class="btn btn-default"><a href="/dashboard/dataevaluasi">Export All Tabels</a></button> -->

				<table class="footable" id="footable" id="customers" data-filter="#filter1" >
					<thead>
						<tr>
							<th style="text-align: center;">
								 Pengusul
							</th>
							<th style="text-align: center;" width="100">
								 Surat Perintah Cetak SK
							</th>
							<th style="text-align: center;">
								 Surat Usulan Mutasi
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
							<th data-type="numeric" data-hide = "all" class=""><strong>Evaluasi dan Tindak Lanjut</strong></th>
							<th data-type="numeric" data-hide = "all" class="">Sisa Masa Kerja</th>
							<th data-type="numeric" data-hide = "all" class="">Masa Kerja di Jabatan Terakhir</th>
							<th data-type="numeric" data-hide = "all" class="">Mutasi</th>
							<th data-type="numeric" data-hide = "all" class="">Diklat Penjenjangan Terakhir</th>
							<th data-type="numeric" data-hide = "all" class="">No Sertifikat</th>
							<th data-type="numeric" data-hide = "all" class="">Jalur Mutasi</th>
							<th data-type="numeric" data-hide = "all" class="">PERDIR Formasi Jabatan untuk Unit yang dituju</th>
							<th data-type="numeric" data-hide = "all" class="">Letak Domisili dengan Unit Mutasi</th>
							<th data-type="numeric" data-hide = "all" class="">Suami/Istri</th>
							<th data-type="numeric" data-hide = "all" class="">Tindak Lanjut</th>
							<th data-type="numeric" data-hide = "all" class="">Tanggal Aktivasi</th>
							<!-- <th data-type="numeric" data-hide = "" class="">Tindak Lanjut</th> -->
						</tr>
					</thead>
					<tbody>
						@foreach ($mrp_e as $mrp)
						<tr>
							<td>
								{{ $mrp->personnel_area_pengusul->nama_pendek }}
							</td> <!-- pengusul -->

							<td>
								<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_respon_sdm }}" class="btn btn-info">{{ $mrp->no_dokumen_respon_sdm }}</a>
							</td> <!-- surat perintah -->
							<td>
								<a href="/download/{{ $mrp->registry_number }}/{{ $mrp->filename_dokumen_unit_usul }}" class="btn btn-info">{{ $mrp->no_dokumen_unit_usul }}</a>
							</td> <!-- surat perintah -->
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
								<button type="submit" class="btn btn-success approveBtn" style="height: 35px;" value="{{ $mrp->id }}">Approve</button>
								<button type="submit" class="btn btn-danger rejectBtn" style="height: 35px" value="{{ $mrp->id }}">Reject</button>
							{{-- </form> --}}
							</td> <!-- tindak lanjut -->

							<td>{{$mrp->pegawai->ps_group}}</td><!-- ps group -->

							<td><strong>{{$mrp->pegawai->formasi_jabatan->formasi}} {{$mrp->pegawai->formasi_jabatan->jabatan}}</strong> <br>{{$mrp->pegawai->formasi_jabatan->posisi}}<br></td><!-- jabatan lama -->
							
							<td><strong>{{ $mrp->formasi_jabatan->formasi}} {{ $mrp->formasi_jabatan->jabatan}}</strong> <br> {{ $mrp->formasi_jabatan->posisi}}<br></td> <!-- jabatan baru -->
							
							<td></td>

							<td>
								 {{ $mrp->pegawai->year_diff_decimal(Carbon::now('Asia/Jakarta'), Carbon::parse($mrp->pegawai->tanggal_lahir)->addYears(56)) }} Tahun <!-- sisa masa kerja -->
							</td>
							<td>
								 s.d. {{ $mrp->pegawai->year_diff_decimal(Carbon::parse($mrp->pegawai->start_date), Carbon::now('Asia/Jakarta')) }} Tahun <!-- masa kerja di jab terakhir -->
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
								 {{ $mrp->requested_tindak_lanjut}} <!-- tindak lanjut -->
							</td>
							<td>
								 {{ $mrp->requested_tanggal_aktivasi}} <!-- tanggal aktivasi -->
							</td>
						</tr>
						
						@endforeach
					</tbody>
				</table>

			</div>
			<!-- /panel content -->

		</div>
		<!-- /PANEL -->

	</div>

	<form action="/dashboard/karir2_respond" method="POST" id="respond_form">
		{{ csrf_field() }}
		<input type="hidden" name="mrp_id" value="" id="mrp_id_form">
		<input type="hidden" name="action" value="" id="action">
	</form>
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
		$(".rejectBtn").click(function(e){
			if(!confirm('Apakah anda yakin akan tolak permintaan mutasi ini?'))
			{
				e.preventDefault();
			}
			else
			{
				$("#mrp_id_form").val($(this).val());
				$("#action").val('0');
				$("#respond_form").submit();
			}
		});

		$(".approveBtn").click(function(e){
			$("#mrp_id_form").val($(this).val());
			$("#action").val('1');
			$("#respond_form").submit();
		});
	</script>

	<!-- JAVASCRIPT FILES -->
		{{-- <script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
		<script type="text/javascript" src="tableExport.js"></script>
		<script type="text/javascript" src="jquery.base64.js"></script>
		<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
		<script type="text/javascript" src="jspdf/jspdf.js"></script>
		<script type="text/javascript" src="jspdf/libs/base64.js"></script> --}}
@endsection