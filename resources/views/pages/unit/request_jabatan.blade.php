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
		<div class="row">
			<div class="col-md-6 scrollable">
				<form class="validate" action="php/contact.php" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
				<div id="content" >
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
										<div class="col-md-6 col-sm-6">
											<label>Jenjang - Main Group</label>
											<select name="" class="form-control pointer required">
												<option value="">--- Jenjang - Main Group ---</option>
												<option value="str">Struktural</option>
												<option value="fung">Fungsional</option>
											</select> 
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Jenjang - Sub Group</label>
											<select name="" class="form-control pointer required">
												<option value="">--- Jenjang - Sub Group ---</option>
												<option value="F1">Fungsional III</option>
												<option value="F2">Fungsional IV</option>
												<option value="F3">Fungsional V</option>
												<option value="F4">Fungsional VI</option>
												<option value="SD">Supervisori Dasar</option>
												<option value="SA">Supervisori Atas</option>
												<option value="MD">Manajemen Dasar</option>
											</select> 
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Unit</label>
											<input type="text" class="form-control" list="unitsi" name="" class="form-control pointer required">
											<datalist id="unitsi">
												<option value="PLN Kantor Pusat">
												<option value="Distribusi A-Z">
												<option value="Wilayah A-Z">
											</datalist>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Direktorat</label>
											<input type="text" class="form-control" list="dirsi" name="" class="form-control pointer required">
											<datalist id="dirsi">
												<option value="dari database">
											</datalist>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Personel Area</label>
											<input type="text" class="form-control" list="pasi" name="" class="form-control pointer required">
											<datalist id="pasi">
												<option value="dari database">
											</datalist>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Bidang</label>
											<input type="text" class="form-control" list="pasi" name="" class="form-control pointer required">
											<datalist id="pasi">
												<option value="dari database">
											</datalist>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Sub Bidang</label>
											<input type="text" class="form-control" list="pasi" name="" class="form-control pointer required">
											<datalist id="pasi">
												<option value="dari database">
											</datalist>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Formasi</label>
											<input type="text" class="form-control" list="forsi" name="" class="form-control pointer required">
											<datalist id="forsi">
												<option value="dari database">
											</datalist>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Jabatan</label>
											<input type="text" class="form-control" list="jbtnsi" name="" class="form-control pointer required">
											<datalist id="jbtnsi">
												<option value="dari database">
											</datalist>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Posisi Pada Unit(?)</label>
											<input type="text" name="contact[phone]" value="" class="form-control required">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>SPFJ *</label>
											<input type="text" name="contact[phone]" value="" class="form-control required">
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Legacy Code</label>
											<input type="text" class="form-control" list="daftarLC" name="" class="form-control pointer required">
											<datalist id="daftarLC">
												<option value="1">
												<option value="2">
												<option value="3">
												<option value="4">
												<option value="5">
												<option value="6">
												<option value="7">
											</datalist>
										</div>
									</div>
								</div>	

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Source</label>
											<select name="src" class="form-control pointer required">
												<option value="">--- Source ---</option>
												<option value="frs1">FRS Fresh Graduate</option>
												<option value="frs2">FRS PRO</option>
												<option value="exist">Exist</option>
											</select> 
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Jumlah yang Dibutuhkan <small class="text-muted block">(per formasi)</small></label>
											<input type="text" class="form-control" list="jml" name="jml" class="form-control pointer required">
											<datalist id="jml">
												<option value="1">
												<option value="2">
												<option value="3">
												<option value="4">
												<option value="5">
											</datalist>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Jurusan</label>
											<input type="text" name="jrsn" value="" class="form-control required">
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Konsentrasi</label>
											<input type="text" name="kons" value="" class="form-control required">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Pendidikan</label>
											<input type="text" name="spfj" value="" class="form-control required">
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Level Pendidikan</label>
											<select name="lvpdn" class="form-control pointer required">
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
												Tanggal Aktifasi
											</label>
											<!-- date picker -->
											<input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false">
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
												<input type="file" class="form-control" name="attachmentRequest" onchange="jQuery(this).next('input').val(this.value);" />
												<input type="text" class="form-control" placeholder="no file selected" readonly="" />
												<span class="button">Choose File</span>
											</div>
											<small class="text-muted block">Max file size: 10Mb (zip/rar/pdf)</small>
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
@endsection