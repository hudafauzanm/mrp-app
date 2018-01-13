@extends('layouts.master')

@section('title', 'Bursa Pegawai')

@section('leftbar')
	@include('includes.unit.leftbar')
@endsection

@section('content')
	<!-- page title -->
	<header id="page-header">
		<h1>Form Membursakan Pegawai</h1>
	</header>
	<!-- /page title -->

	<div id="content" class="padding-20" >
		<div class="row">
			<!-- formulir -->
			<div class="col-md-6 scrollable">
			
				<!-- ------ -->
				<form class="validate" action="php/contact.php" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
					<input type="hidden" name="action" value="contact_send" />
					
					<!-- data pegawai -->
					<div class="panel panel-default">
						<div class="panel-heading panel-heading-transparent">
							<strong>DATA PEGAWAI</strong>
						</div>

						<fieldset>
							<!-- required [php action request] -->
							<div class="panel-body">
									<div class="row">
										<div class="form-group">
											<div class="col-md-6 col-sm-6">
												<label>NIP *</label>
												<input type="text" name="contact[first_name]" value="" class="form-control required">
											</div>
											<div class="col-md-6 col-sm-6">
												<label>Nama Pegawai</label>
												<input type="text" name="contact[last_name]" value="" class="form-control required">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group">
							                <div class="col-md-12 col-sm-12">
							                    <label>Direktorat</label>
												<input type="text" name="contact[last_name]" value="" class="form-control required" list="daftarnama">
												<datalist id="daftarnama">
							                        <option value="AB"></option>
						                        	<option value="AB"></option>
					                        		<option value="AC"></option>
				                        			<option value="AD"></option>
							                    </datalist>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group">
							                <div class="col-md-12 col-sm-12">
							                    <label>Personel Area</label>
												<input type="text" name="contact[last_name]" value="" class="form-control required" list="daftarnama">
												<datalist id="daftarnama">
							                        <option value="AB"></option>
						                        	<option value="AB"></option>
					                        		<option value="AC"></option>
				                        			<option value="AD"></option>
							                    </datalist>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group">
							                <div class="col-md-12 col-sm-12">
							                    <label>Posisi Pada Unit</label>
												<input type="text" name="contact[last_name]" value="" class="form-control required" list="daftarnama">
												<datalist id="daftarnama">
							                        <option value="AB"></option>
						                        	<option value="AB"></option>
					                        		<option value="AC"></option>
				                        			<option value="AD"></option>
							                    </datalist>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group">
											<div class="col-md-12 col-sm-12">
												<label>Formasi Jabatan</label>
												<input type="text" name="contact[last_name]" value="" class="form-control required" list="daftarnama">
												<datalist id="daftarnama">
							                        <option value="AB"></option>
						                        	<option value="AB"></option>
					                        		<option value="AC"></option>
				                        			<option value="AD"></option>
							                    </datalist>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="form-group">
											<div class="col-md-6 col-sm-6">
												<label>Masa Kerja <small class="text-muted">(di Jabatan Terakhir)</small></label>
												<input type="text" name="contact[first_name]" value="" class="form-control required">
											</div>
											<div class="col-md-6 col-sm-6">
												<label>Sisa Masa Kerja</label>
												<input type="text" name="contact[phone]" value="" class="form-control required">
											</div>
										</div>
									</div>
							</div>
						</fieldset>
					</div>

					<!-- data pengusul -->
					<div class="panel panel-default">
						<div class="panel-heading panel-heading-transparent">
							<strong>DATA PENGUSUL MUTASI</strong>
						</div>

						<fieldset>
							<!-- required [php action request] -->
							<div class="panel-body">
									<div class="row">
										<div class="form-group">
											<div class="col-md-6 col-sm-6">
												<label>NIP Pengusul*</label>
												<input type="text" name="contact[first_name]" value="" class="form-control required">
											</div>
											<div class="col-md-6 col-sm-6">
												<label>Nama Pengusul</label>
												<input type="text" name="contact[last_name]" value="" class="form-control required">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group">
							                <div class="col-md-12 col-sm-12">
							                    <label>Direktorat</label>
												<input type="text" name="contact[last_name]" value="" class="form-control required" list="daftarnama">
												<datalist id="daftarnama">
							                        <option value="AB"></option>
						                        	<option value="AB"></option>
					                        		<option value="AC"></option>
				                        			<option value="AD"></option>
							                    </datalist>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group">
							                <div class="col-md-12 col-sm-12">
							                    <label>Personel Area</label>
												<input type="text" name="contact[last_name]" value="" class="form-control required" list="daftarnama">
												<datalist id="daftarnama">
							                        <option value="AB"></option>
						                        	<option value="AB"></option>
					                        		<option value="AC"></option>
				                        			<option value="AD"></option>
							                    </datalist>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group">
							                <div class="col-md-12 col-sm-12">
							                    <label>Posisi Pada Unit</label>
												<input type="text" name="contact[last_name]" value="" class="form-control required" list="daftarnama">
												<datalist id="daftarnama">
							                        <option value="AB"></option>
						                        	<option value="AB"></option>
					                        		<option value="AC"></option>
				                        			<option value="AD"></option>
							                    </datalist>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group">
											<div class="col-md-12 col-sm-12">
												<label>Formasi Jabatan</label>
												<input type="text" name="contact[last_name]" value="" class="form-control required" list="daftarnama">
												<datalist id="daftarnama">
							                        <option value="AB"></option>
						                        	<option value="AB"></option>
					                        		<option value="AC"></option>
				                        			<option value="AD"></option>
							                    </datalist>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group">
											<div class="col-md-12 col-sm-12">
												<label>Alasan Memutasi *</label>
												<textarea rows="3" class="form-control" placeholder=""></textarea>
											</div>
										</div>
									</div>
							</div>
						</fieldset>
					</div>

					<!-- data mutasi -->
					<div class="panel panel-default">
						<div class="panel-heading panel-heading-transparent">
							<strong>DATA MUTASI</strong>
						</div>

						<fieldset>
							<div class="panel-body">
								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Jenis Mutasi *</label>
											<select name="contact[position]" class="form-control pointer required">
												<option value="">--- Pilih ---</option>
												<option value="Dinas">Dinas</option>
												<option value="APS">APS</option>
												<option value="Non-dinas">Non-dinas</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Rekomendasi Proyeksi Jabatan <small class="text-muted">- opsional</small></label>
											<select name="contact[position]" class="form-control pointer required">
												<option value="">--- Pilih ---</option>
												<option value="SDM">Pohon Profesi SDM</option>
												<option value="Developer">Web Developer</option>
												<option value="php">PHP Programmer</option>
												<option value="Javascript">Javascript Programmer</option>
											</select>
										</div>
									</div>
								</div>

								<!-- <div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Rekomendasi Proyeksi Personel Area <small class="text-muted">- opsional</small></label>
											<select name="contact[position]" class="form-control pointer required">
												<option value="">--- Pilih ---</option>
												<option value="SDM">Pohon Profesi SDM</option>
												<option value="Developer">Web Developer</option>
												<option value="php">PHP Programmer</option>
												<option value="Javascript">Javascript Programmer</option>
											</select>
										</div>
									</div>
								</div> -->

								<!-- <div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Rekomendasi Proyeksi Unit/Divisi/Satuan <small class="text-muted">- opsional</small></label>
											<select name="contact[position]" class="form-control pointer required">
												<option value="">--- Pilih ---</option>
												<option value="SDM">Pohon Profesi SDM</option>
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
											<label>Rekomendasi Proyeksi Unit/Divisi/Satuan <small class="text-muted">- opsional</small></label>
											<select name="contact[position]" class="form-control pointer required">
												<option value="">--- Pilih ---</option>
												<option value="SDM">Pohon Profesi SDM</option>
												<option value="Developer">Web Developer</option>
												<option value="php">PHP Programmer</option>
												<option value="Javascript">Javascript Programmer</option>
											</select>
										</div>
									</div>
								</div> -->

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>No. Dokumen Mutasi *</label>
											<input type="text" name="contact[first_name]" value="" class="form-control required">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Tanggal Dokumen Mutasi *</label>
											<input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>
												Lampiran Dokumen 
												<small class="text-muted">Curriculum Vitae dan Nota Dinas - *</small>
											</label>

											<!-- custom file upload -->
											<div class="fancy-file-upload fancy-file-primary">
												<i class="fa fa-upload"></i>
												<input type="file" class="form-control" name="contact[attachment]" onchange="jQuery(this).next('input').val(this.value);" />
												<input type="text" class="form-control" placeholder="no file selected" readonly="" />
												<span class="button">Pilih Dokumen</span>
											</div>
											<small class="text-muted block">File Maksimal 10 MB (zip/rar)</small>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30">
											KIRIM
											<!-- <span class="block font-lato">We'll get back to you within 48 hours</span> -->
										</button>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</form>
			</div>

			<!-- TATA CARA -->
			<div class="col-md-6">

				<div class="panel panel-default">
					<div class="panel-body">

						<h4>Tata Cara Pengisian Form</h4>
						<!-- <p><em>This is a vrey unique feature because you don't need PHP programming if you want to send the form directly to email.</em></p>
						<hr /> -->
						<p>
							1. Isi kolom bertanda * (maka kolom lain akan otomatis terisi).<br>
							2. Dokumen yang dilampirkan berupa CV, Nota Dinas, dan dokumen lain yang diperlukan, dijadikan satu folder dalam bentuk zip/rar.
						</p>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection