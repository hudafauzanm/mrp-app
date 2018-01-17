@extends('layouts.master')

@section('title', 'Edit Data')

@section('leftbar')
	@include('includes.sdm.leftbar')
@endsection

@section('content')
	<!-- page title -->
	<header id="page-header">
		<h1>Edit 8005002H2.Promosi.151663040401_151663040401</h1>
	</header>
	<!-- /page title -->

	<div id="content" class="padding-20">
		<div class="row">
			<div class="col-md-6 scrollable" >
				<form class="validate" action="php/contact.php" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
				<div id="content" >
					<!-- data pegawainya -->
					<div class="panel panel-default">
						<div class="panel-heading panel-heading-transparent">
							<strong>DATA PEGAWAI</strong>
						</div>

						<div class="panel-body">
							<fieldset>
								<!-- required [php action request] -->
								<input type="hidden" name="action" value="contact_send" />

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>NIP *</label>
											<input type="text" name="nip" value="" class="form-control required">
										</div>
										<div class="col-md-6 col-sm-6">
											<label>NIP Sutri *</label>
											<input type="text" name="nip" value="" class="form-control required">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Nomor Nota Dinas</label>
											<input type="email" name="contact[email]" value="" class="form-control required">
										</div>
									
										<div class="col-md-6 col-sm-6">
											<label>Tanggal Nota Dinas</label>
											<input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false">
										</div>													
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>
												File Attachment 
												<small class="text-muted">Nota Dinas / Surat</small>
												<!-- pas attach, database langsung nyimpen tgl pooling -->
											</label>

											<!-- custom file upload -->
											<div class="fancy-file-upload fancy-file-primary">
												<i class="fa fa-upload"></i>
												<input type="file" class="form-control" name="attachmentMintaPegawai" onchange="jQuery(this).next('input').val(this.value);" />
												<input type="text" class="form-control" placeholder="no file selected" readonly="" />
												<span class="button">Choose File</span>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>

				<div id="content" >
					<div class="panel panel-default">
						<div class="panel-heading panel-heading-transparent">
							<strong>DATA MUTASI</strong>
						</div>
						<div class="panel-body">
							<fieldset>
								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Jenis Mutasi *</label>
											<select name="" class="form-control pointer required">
													<option value="">--- Jenis Mutasi ---</option>
													<option value="1">APS</option>
													<option value="2">Dinas</option>
													<option value="3">Non-Dinas</option>
											</select>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Mutasi *</label>
											<select name="" class="form-control pointer required">
												<option value="">--- Mutasi ---</option>
												<option value="1">Rotasi</option>
												<option value="2">Promosi</option>
												<option value="3">Demosi</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Jalur Mutasi</label>
											<select name="" class="form-control pointer required">
												<option value="">--- Jalur Mutasi ---</option>
												<option value="1">Aktif dari Tugas Belajar</option>
												<option value="2">Antar Unit</option>
												<option value="3">Ct Diluar Tanggungan</option>
												<option value="4">Definitif</option>
												<option value="5">Intern Bidang Antar Sub Bidang</option>
												<option value="6">Intern Divisi Antar Bidang</option>
												<option value="7">Intern KP Antar Divisi</option>
												<option value="8">Intern Sub Bidang Antar Divisi</option>
											</select> 
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Proyeksi Jabatan (?)</label>
											<select name="contact[position]" class="form-control pointer required">
												<option value="">--- Select ---</option>
												<option value="Marketing">PR &amp; Marketing</option>
												<option value="Developer">Web Developer</option>
												<option value="php">PHP Programmer</option>
												<option value="Javascript">Javascript Programmer</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Employee Sub Group MRP</label>
											<select name="" class="form-control pointer required">
												<option value="">--- Employee Sub Group ---</option>
												<option value="Aktif">Aktif</option>
												<option value="OAP">Organik Anak Perusahaan</option>
												<option value="TB">Tugas Belajar</option>
												<option value="cdt">Cuti Diluar Tanggungan</option>
											</select> 	
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>PS Group MRP</label>
											<select name="" class="form-control pointer required">
												<option value="">--- PS Group ---</option>
												<option value="SYS01">SYS01</option>
												<option value="SYS02">SYS02</option>
												<option value="SYS03">SYS03</option>
												<option value="SYS04">SYS04</option>
												<option value="SPE01">SPE01</option>
												<option value="SPE02">SPE02</option>
												<option value="SPE03">SPE03</option>
												<option value="SPE04">SPE04</option>
												<option value="OPT01">OPT01</option>
												<option value="OPT02">OPT02</option>
												<option value="OPT03">OPT03</option>
												<option value="OPT04">OPT04</option>
												<option value="BAS01">BAS01</option>
												<option value="BAS02">BAS02</option>
											</select> 							
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Jenjang - Main Group MRP</label>
											<select name="" class="form-control pointer required">
												<option value="">--- Jenjang - Main Group ---</option>
												<option value="str">Struktural</option>
												<option value="fung">Fungsional</option>
											</select> 
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Jenjang - Sub Group MRP</label>
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
											<label>Unit MRP</label>
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
											<label>Direktorat MRP</label>
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
											<label>Personel Area MRP</label>
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
											<label>Bidang MRP</label>
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
											<label>Sub Bidang MRP</label>
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
											<label>Formasi MRP</label>
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
											<label>Jabatan MRP</label>
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
											<label>Posisi Pada Unit MRP(?)</label>
											<input type="text" name="contact[phone]" value="" class="form-control required">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>SPFJ MRP</label>
											<input type="text" name="contact[phone]" value="" class="form-control required">
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Legacy Code MRP</label>
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
										<div class="col-md-12 col-sm-12">
											<label>Tanggal </label>
											<input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false">
										
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Nomor Dokumen Mutasi</label>
											<input type="text" name="contact[phone]" value="" class="form-control required">
										</div>
										<div class="col-md-6 col-sm-6">
											<label>
												Tanggal Dokumen Mutasi
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
												File Attachment 
												<small class="text-muted">Nota Dinas / Surat</small>
												<!-- pas attach, database langsung nyimpen tgl pooling -->
											</label>

											<!-- custom file upload -->
											<div class="fancy-file-upload fancy-file-primary">
												<i class="fa fa-upload"></i>
												<input type="file" class="form-control" name="attachmentMintaPegawai" onchange="jQuery(this).next('input').val(this.value);" />
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

				<div id="content" >
					<div class="panel panel-default">
						<div class="panel-heading panel-heading-transparent">
							<strong>DATA PENGAJU</strong>
						</div>
						<div class="panel-body">
							<fieldset>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Pemberi Rekomendasi</label>
											<input type="text" name="contact[phone]" value="" class="form-control required col-md-6" placeholder="Nama">
											<input type="text" name="contact[phone]" value="" class="form-control required col-md-6" placeholder="Formasi Jabatan">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Penyetuju</label>
											<input type="text" name="contact[phone]" value="" class="form-control required col-md-6" placeholder="Nama">
											<input type="text" name="contact[phone]" value="" class="form-control required col-md-6" placeholder="Formasi Jabatan">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Administrator</label>
											<input type="text" name="contact[phone]" value="" class="form-control required col-md-6" placeholder="Nama">
											<input type="text" name="contact[phone]" value="" class="form-control required col-md-6" placeholder="Formasi Jabatan">
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>

				<div id="content" >
					<div class="panel panel-default">
						<div class="panel-heading panel-heading-transparent">
							<strong>MRP</strong>
						</div>
						<div class="panel-body">
							<fieldset>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Status</label>
											<select class="form-control select2">
												<option value="1">Diajukan</option>
												<option value="2">Ditolak Oleh Unit Tujuan</option>
												<option value="3">Pending - SDM</option>
												<option value="4">Ditolak Oleh SDM</option>
												<option value="5">Pending - Proses SK</option>
												<option value="6">SK Terbit</option>
												<option value="7">SK Menunggu Aktifasi</option>
												<option value="8">SK Aktifasi</option>
											</select>

										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Penyetuju</label>
											<input type="text" name="contact[phone]" value="" class="form-control required col-md-6" placeholder="Nama">
											<input type="text" name="contact[phone]" value="" class="form-control required col-md-6" placeholder="Formasi Jabatan">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Administrator</label>
											<input type="text" name="contact[phone]" value="" class="form-control required col-md-6" placeholder="Nama">
											<input type="text" name="contact[phone]" value="" class="form-control required col-md-6" placeholder="Formasi Jabatan">
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