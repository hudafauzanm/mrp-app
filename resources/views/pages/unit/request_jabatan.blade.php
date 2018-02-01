@extends('layouts.master')

@section('title', 'Request Jabatan')

@section('leftbar')
	@include('includes.unit.leftbar')
@endsection

@section('includes-styles')
	@parent

	<link href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	<style>
		.dataTable th, .dataTable td {
			font-size: 12px;
		}
	</style>
@endsection

@section('content')
	<!-- page title -->
	<header id="page-header">
		<h1>Form Bursa Jabatan</h1>
		<button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#helpModal"><i class="fa fa-question-circle"></i> Petunjuk Pengisian</button>
	</header>
	<!-- /page title -->

	<div id="content" class="padding-20">
		@include('includes.validation_errors')

		<div class="row">
			<div class="col-md-6">
				<form class="" action="/mutasi/pengajuan/submit_form" method="post" enctype="multipart/form-data" autocomplete="on">
				<div id="content" >
					{{ csrf_field() }}
					<input type="hidden" name="mrp[tipe]" value="{{ request('tipe') }}">
					<input type="hidden" id="kode_olah_pegawai" value="">
					<!-- data pegawainya -->
					<div class="panel panel-default">
						<div class="panel-heading panel-heading-transparent">
							<strong>DATA JABATAN</strong>
						</div>
						<div class="panel-body">
							<fieldset>
								<!-- required [php action request] -->
								<input type="hidden" name="action" value="contact_send" />

								

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Unit</label>
											<input type="text" class="form-control"  id="unit_id" class="form-control pointer required" required value="{{$personnelarea->nama}}" disabled>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Formasi</label>
												<select class="form-control select2" name="formasi" id="formasi_id" required> 
													<option>---Pilih Formasi---</option>
													@foreach($formasis as $formasi)
														<option value="{{$formasi->formasi}}"> {{$formasi->formasi }} </option>
													@endforeach
												</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Jabatan</label>
												<select class="form-control select2" name="kode_olah" id="jabatan_id" disabled>
													<option>---Pilih Jabatan---</option>
												</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Jenjang</label>
											<input type="text" class="form-control required"  name="jenjang" id="jenjang_id" disabled>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Posisi</label>
											<input type="text" class="form-control" id="posisi_id" name="posisi" class="form-control pointer required" disabled>
										</div>
									</div>
								</div>


								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>SPFJ</label>
											<input type="text" name="spfj" id="spfj_id" value="" class="form-control required" disabled>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Legacy Code</label>
											<input type="text" class="form-control" id="lc_id" name="legacy" class="form-control pointer required" disabled>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>NIP Pengusul*</label>
											<input type="text" name="mrp[nip_pengusul]" id="nip_pengusul" value="{{ old('mrp.nip_pengusul') }}" class="form-control required" autocomplete="off" required style="text-transform: uppercase">
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Nama Pengusul</label>
											<input type="text" name="dis_pengusul" id="nama_pengusul" value="{{ old('dis_pengusul') }}" class="form-control" disabled>
										</div>
									</div>
								</div>	

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Source <small class="text-muted block">(sesuai kebutuhan)</small></label>
											<select name="source" id="sourceid" class="form-control pointer required" required>
												<option value="">--- Source ---</option>
												<option id="frs1" value="frs1">FRS-FreshGraduate</option>
												<option value="frs2">EXT-Pro</option>
												<option value="exist">Existing</option>
											</select> 
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Jumlah yang Dibutuhkan <small class="text-muted block">(per formasi)</small></label>
											<select name="jumlah" id="jumlahid" class="form-control pointer required" required>
												<option>---Pilih Jumlah---</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>	
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Jurusan</label>
											<input type="text" name="jrsn" value="" class="form-control required" disabled>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Konsentrasi</label>
											<input type="text" name="kons" value="" class="form-control required" disabled>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Pendidikan</label>
											<input type="text" name="spfj" value="" class="form-control required" disabled>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Level Pendidikan</label>
											<select name="lvpdn" class="form-control pointer required" disabled>
												<option value="">--- Level Pendidikan ---</option>
												<option value="smp">SMP</option>
												<option value="sma">SMA</option>
												<option value="smk">SMK</option>
												<option value="D1">D1</option>
												<option value="D2">D2</option>
												<option value="D3">D3</option>
												<option value="D4">D4</option>
												<option value="S1">S1</option>
												<option value="S2">S2</option>
												<option value="S3">S3</option>
											</select> 
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>
												Perkiraan Tanggal Aktivasi*
											</label>
											<!-- date picker -->
											<input type="text" name="mrp[requested_tgl_aktivasi]" class="form-control datepicker" id="tgl_aktivasi" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false">
										</div>
									</div>
								</div>


								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>No. Dokumen Mutasi *</label>
											<input type="text" name="mrp[no_dokumen_unit_usul]" value="{{ old('mrp.no_dokumen_unit_usul') }}" class="form-control required" required style="text-transform: uppercase">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Tanggal Dokumen Mutasi *</label>
											<input type="text" name="mrp[tgl_dokumen_unit_usul]" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" value="{{ old('mrp.tgl_dokumen_unit_usul') }}" required>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<div class="form-group"> 
												<label>Lampiran Dokumen 
													<small class="text-muted">Nota Dinas - *</small>
												</label>
												<input class="custom-file-upload" type="file" id="file" name="file_dokumen_mutasi" id="contact:attachment" data-btn-text="Select a File" />
												<small class="text-muted block">Max file size: 10Mb (pdf)</small>
											</div>
										</div>
									</div>
								</div>

							</fieldset>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30">
							KIRIM
						</button>
					</div>
				</div>

				</form>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<!-- Bar Chart -->
								<div id="panel-graphs-flot-1" class="panel panel-default">

									<div class="panel-heading">

										<span class="elipsis"><!-- panel title -->
											<strong>Pagu Unit</strong>
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
									<div class="panel-body nopadding">
										<canvas id="pagu_unit"></canvas>
									</div>
									<!-- /panel content -->

								</div>
								<!-- /Bar Chart -->
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<!-- Bar Chart Horizontal -->
								<div id="panel-graphs-flot-1" class="panel panel-default">

									<div class="panel-heading">

										<span class="elipsis"><!-- panel title -->
											<strong>Pagu Struktural</strong>
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
									<div class="panel-body nopadding">

										<canvas id="struktural_chart"></canvas>

									</div>
									<!-- /panel content -->

								</div>
								<!-- /Bar Chart Horizontal -->
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<!-- Pie Chart -->
								<div id="panel-graphs-flot-1" class="panel panel-default">

									<div class="panel-heading">

										<span class="elipsis"><!-- panel title -->
											<strong>Pagu Fungsional</strong>
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
									<div class="panel-body nopadding">
										<canvas id="fungsional_chart"></canvas>
									</div>
									<!-- /panel content -->

								</div>
								<!-- /Pie Chart -->
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<!-- TABEL -->
								<div id="panel-graphs-flot-1" class="panel panel-default">
									<div class="panel-heading">
										<span class="elipsis"><!-- panel title -->
											<strong>Tabel Formasi Jabatan Kosong</strong>
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
									<div class="panel-body padding-3">
										<div class="table-responsive">
											<table class="table table-bordered nomargin dataTables" id="fj_kosong_table">
												<thead>
													<tr>
														<th>Formasi</th>
														<th>Jabatan</th>
														<th>Kosong</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
									<!-- /panel content -->
								</div>
								<!-- /TABEL -->
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true" id="helpModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

							<!-- header modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="helpModalLabel">Petunjuk Pengisian</h4>
				</div>

							<!-- body modal -->
				<div class="modal-body">
					<ol>
						<li>Isi kolom bertanda * (maka kolom lain akan otomatis terisi)</li>
						<li>Anda hanya bisa mengusulkan mutasi untuk pegawai di unit anda</li>
						<li>Dokumen yang dilampirkan berupa CV, Nota Dinas, dan dokumen lain yang diperlukan, dijadikan satu file dengan format .pdf</li>
					</ol>
				</div>

			</div>
		</div>
	</div>
@endsection

@section('includes-scripts')
	@parent

	<script>
		$(function(){
			window.table_fj = $('#fj_kosong_table').DataTable({
	    		"columns": [
	                { "data": "formasi" },
	                { "data": "jabatan" },
	                { "data": "kosong" }
	            ],
	        });
	    });
	</script>

	<script src="/bower_components/chart.js/dist/Chart.min.js"></script>
	<script src="/assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

	<script>
		$("#jabatan_id").change(function(){
			var formasis = $(this).val();

			$.ajax({
				'url' : '/mutasi/pengajuan/getJabatanInfo',
				'type' : 'GET',
				'data' : {
					'jabatan_id' : formasis,
				},
				'dataType' : 'json',
				error: function(data){

				},
				success: function(data){

					$("#jenjang_id").val(data.jenjang_txt+' ('+data.jenjang_id+')');
					$("#posisi_id").val(data.posisi);
					$("#spfj_id").val(data.spfj);
					$("#lc_id").val(data.legacy_code);
				}
			});
		});
	</script>

	<script>
		$("#formasi_id").change(function(){
			var formasi = $(this).val();
			var unit_id = $("#unit_id").val();

			$.ajax({
				'url': '/mutasi/pengajuan/getFormasiJabs',
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
					var jabatan = $("#jabatan_id");
					jabatan.empty();
					jabatan.append('<option>---Pilih Jabatan---</option>');
					jabatan.removeAttr('disabled');
					$.each(data, function(key, value){
						console.log(value);
						jabatan.append('<option value="'+key+'">'+value+'</option>');
					});
				}
			});
		})
	</script>
	<script>
		$("#nip_pengusul").on('keyup paste', function(){
			var nip = $(this).val();
			if(nip.length >= 6)
			{
				$.ajax({
					'url': '/mutasi/pengajuan/get_pegawai_info',
					'type': 'GET',
					'data': {
						'nip': nip
					},
					'dataType': 'json',
					error: function(){

					},
					success: function(data){
						if(data)
						{
							$("#nama_pengusul").val(data.nama_pegawai);
						}
					}
				});

			}
			else
			{
				$("#nama_pengusul").val('');
			}
		});
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
			        mode: 'label',
			        callbacks: {
		                label: function(tooltipItem, data) {
		                	var datasetIndex = tooltipItem['datasetIndex'];
		                	if(datasetIndex == 1)
		                	{
		                		//akan terisi (human readable) = akan terisi - realisasi
		                		return data['datasets'][datasetIndex]['label']+': '+(data['datasets'][1]['data'][tooltipItem['index']] - data['datasets'][0]['data'][tooltipItem['index']]);
		                	}
		                  	return data['datasets'][datasetIndex]['label']+': '+data['datasets'][datasetIndex]['data'][tooltipItem['index']];
		                }
		            },
			    },
			    hover: {
					mode: true
				},
				scales: {
					yAxes: [{
						stacked: false,
						ticks: {
							beginAtZero: true
						}
					}],
					xAxes: [{
						stacked: true,
					}]
				}
			};

		    console.log(value.data);
			var data = {
			    labels: value.labels,
			    datasets: [
			        {
			            label: "Realisasi",
			            // backgroundColor: 'rgba(255, 99, 132, 0.2)',
			            borderWidth: 1,
			            data: value.data.isi,
			            backgroundColor: '#4b77a3'
			        },
			        {
			            label: "Akan Terisi",
			            // backgroundColor: 'rgba255(, 206, 86, 0.2)',
			            borderWidth: 1,
			            data: value.data.akan,
			            backgroundColor: '#a4a6a8'
			        },
			        {
			            label: "Pagu",
			            // backgroundColor: 'rgba255(, 206, 86, 0.2)',
			            borderWidth: 1,
			            data: value.data.pagu,
			            backgroundColor: '#9db6e0'
			        }
			    ]
			};

			var ctx = document.getElementById(target).getContext("2d");
			// ctx.height = 400;
			var newChart = new Chart(ctx, {
			    type: 'bar',
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
			callAjaxChart();
		}); 
	</script>

	<script>
		function callAjaxChart(){
			$.ajax({
				'url': '/monitoring/ajax/getRealisasiPagu',
				'type': 'GET',
				'data': {
					'unit': '{{ auth()->user()->username }}',
					'level': 'all',
					'is_unit': true
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
						// $("#fungsio_container").append('<h4 class="unit_name">'+val.unit+'</h4>');
						// $("#fungsio_container").append('<canvas id="'+val.unit+'"></canvas>');
						// console.log(val);
						drawChart('fungsional_chart', val.chart_data);
					});

					table_fj.clear();
					table_fj.rows.add(data.table);
					table_fj.draw();
				}
			});
		};
	</script>
@endsection