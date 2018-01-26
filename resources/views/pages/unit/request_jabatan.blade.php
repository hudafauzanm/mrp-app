@extends('layouts.master')

@section('title', 'Request Jabatan')

@section('leftbar')
	@include('includes.unit.leftbar')
@endsection

@section('content')
	<!-- page title -->
	<header id="page-header">
		<h1>Form Request Jabatan</h1>
	</header>
	<!-- /page title -->

	<div id="content" class="padding-20">
		@include('includes.validation_errors')

		<div class="row">
			<div class="col-md-6 scrollable">
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
											<label>Source</label>
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
												Perkiraan Tanggal Aktifasi*
											</label>
											<!-- date picker -->
											<input type="text" name="mrp[requested_tgl_aktifasi]" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false">
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
											<label>
												Upload Dokumen
											</label>

											<!-- custom file upload -->
											<div class="fancy-file-upload fancy-file-primary">
												<i class="fa fa-upload"></i>
												<input type="file" class="form-control" name="file_dokumen_mutasi" onchange="jQuery(this).next('input').val(this.value);" />
												<input type="text" class="form-control" placeholder="no file selected" readonly="" />
												<span class="button">Choose File</span>
											</div>
											<small class="text-muted block">Max file size: 10Mb (pdf)</small>
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

			<div class="col-md-6 scrollable">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
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

									<div id="flot-bar" class="flot-chart"><!-- FLOT CONTAINER --></div>

								</div>
								<!-- /panel content -->

							</div>
							<!-- /Bar Chart -->
						</div>
						<div class="row">
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

									<div id="flot-bar-horizontal" class="flot-chart"><!-- FLOT CONTAINER --></div>

								</div>
								<!-- /panel content -->

							</div>
							<!-- /Bar Chart Horizontal -->
						</div>
						<div class="row">

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

									<div id="flot-pie" class="flot-chart"><!-- FLOT CONTAINER --></div>

								</div>
								<!-- /panel content -->

							</div>
							<!-- /Pie Chart -->
						</div>
						<div class="row">
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
									<table class="table table-bordered nomargin">
										<thead>
											<tr>
												<th>Formasi</th>
												<th>Jabatan</th>
												<th>Kosong</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Junior Analyst</td>
												<td>Kompetensi Organisasi </td>
												<td>3</td>
											</tr>
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
									loadScript("/assets/js/view/demo.graphs.flot.js");

								});
							});
						});
					});
				});
			});
		});
	</script>

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

		})
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
@endsection