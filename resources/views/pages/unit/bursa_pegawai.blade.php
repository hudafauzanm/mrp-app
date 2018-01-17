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
			
				<form action="/mutasi/pengajuan/submit_form" method="post" enctype="multipart/form-data" autocomplete="on">
					{{ csrf_field() }}
					<input type="hidden" name="mrp[tipe]" value="{{ request('tipe') }}">
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
											<input type="text" name="nip" id="nip" value="{{ old('nip') }}" class="form-control required" autocomplete="off" required>
											<span class="tooltip tooltip-top-right" id="error_tooltip" style="display: none"></span>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Nama Pegawai</label>
											<input type="text" id="nama_pegawai" value="" class="form-control" disabled>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
						                <div class="col-md-12 col-sm-12">
						                    <label>Personel Area</label>
											<input type="text" id="personnel_area" value="" class="form-control" disabled>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Formasi Jabatan</label>
											<textarea type="text" rows="2" id="formasi_jabatan" value="" class="form-control" disabled></textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
						                <div class="col-md-12 col-sm-12">
						                    <label>Pada</label>
											<textarea type="text" id="posisi" value="" class="form-control" disabled></textarea>
										</div>
									</div>
								</div>


								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Masa Kerja <small class="text-muted">(di Jabatan Terakhir)</small></label>
											<input type="text" id="masa_kerja" value="" class="form-control" disabled>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Sisa Masa Kerja</label>
											<input type="text" id="sisa_kerja" value="" class="form-control" disabled>
										</div>
									</div>
								</div>
								<hr>
								<p><strong>KEY COMPETENCIES</strong></p>
								<div class="row">
									<div class="form-group">
										<div class="col-md-5 col-sm-5">
											<label>Enthusiastic For Challenge</label>
										</div>
										<div class="col-md-3 col-sm-3">
											<input type="number" name="nilai[enthusiastic]" value="{{ old('nilai["enthusiastic"]') }}" min="0" max="100" class="form-control required rating_number" required target="#rating1" placeholder="0-100">
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="rating rating-0 size-13 width-100" id="rating1"><!-- rating-0 ... rating-5 --></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-5 col-sm-5">
											<label>Creative and Innovative</label>
										</div>
										<div class="col-md-3 col-sm-3">
											<input type="number" name="nilai[creative]" value="{{ old('nilai["creative"]') }}" min="0" max="100" class="form-control required rating_number" required target="#rating2" placeholder="0-100">
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="rating rating-0 size-13 width-100 " id="rating2"><!-- rating-0 ... rating-5 --></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-5 col-sm-5">
											<label>Building Business Partnership</label>
										</div>
										<div class="col-md-3 col-sm-3">
											<input type="number" name="nilai[building]" min="0" max="100" value="{{ old('nilai["building"]') }}" class="form-control required rating_number" required target="#rating3" placeholder="0-100">
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="rating rating-0 size-13 width-100 " id="rating3"><!-- rating-0 ... rating-5 --></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-5 col-sm-5">
											<label>Strategic Orientation</label>
										</div>
										<div class="col-md-3 col-sm-3">
											<input type="number" name="nilai[strategic]" min="0" max="100" value="{{ old('nilai["strategic"]') }}" class="form-control required rating_number" required target="#rating4" placeholder="0-100">
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="rating rating-0 size-13 width-100 " id="rating4"><!-- rating-0 ... rating-5 --></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-5 col-sm-5">
											<label>Customer Focus Oriented</label>
										</div>
										<div class="col-md-3 col-sm-3">
											<input type="number" name="nilai[customer]" min="0" max="100" value="{{ old('nilai["customer"]') }}" class="form-control required rating_number" required target="#rating5" placeholder="0-100">
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="rating rating-0 size-13 width-100 " id="rating5"><!-- rating-0 ... rating-5 --></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-5 col-sm-5">
											<label>Driving Execution</label>
										</div>
										<div class="col-md-3 col-sm-3">
											<input type="number" name="nilai[driving]" min="0" max="100" value="{{ old('nilai["driving"]') }}" class="form-control required rating_number" required target="#rating6" placeholder="0-100">
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="rating rating-0 size-13 width-100 " id="rating6"><!-- rating-0 ... rating-5 --></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-5 col-sm-5">
											<label>Visionary Leadership</label>
										</div>
										<div class="col-md-3 col-sm-3">
											<input type="number" name="nilai[visionary]" min="0" max="100" value="{{ old('nilai["visionary"]') }}" class="form-control required rating_number" required target="#rating7" placeholder="0-100">
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="rating rating-0 size-13 width-100" id="rating7"><!-- rating-0 ... rating-5 --></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-5 col-sm-5">
											<label>Empowering / Developing Others</label>
										</div>
										<div class="col-md-3 col-sm-3">
											<input type="number" name="nilai[empowering]" min="0" max="100" value="{{ old('nilai["empowering"]') }}" class="form-control required rating_number" required target="#rating8" placeholder="0-100">
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="rating rating-0 size-13 width-100" id="rating8"><!-- rating-0 ... rating-5 --></div>
										</div>
									</div>
								</div>

								<hr>
								<p><strong>KOMPETENSI HARIAN</strong></p>
								<div class="row">
									<div class="form-group">
										<div class="col-md-5 col-sm-5">
											<label>Komunikasi</label>
										</div>
										<div class="col-md-3 col-sm-3">
											<input type="number" name="nilai[komunikasi]" min="0" max="100" value="{{ old('nilai["komunikasi"]') }}" class="form-control required rating_number" required target="#rating9" placeholder="0-100">
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="rating rating-0 size-13 width-100" id="rating9"><!-- rating-0 ... rating-5 --></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-5 col-sm-5">
											<label>Team Work</label>
										</div>
										<div class="col-md-3 col-sm-3">
											<input type="number" name="nilai[team_work]" min="0" max="100" value="{{ old('nilai["team_work"]') }}" class="form-control required rating_number" required target="#rating10" placeholder="0-100">
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="rating rating-0 size-13 width-100" id="rating10"><!-- rating-0 ... rating-5 --></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-5 col-sm-5">
											<label>Bahasa Indonesia</label>
										</div>
										<div class="col-md-3 col-sm-3">
											<input type="number" name="nilai[bahasa_1_nilai]" min="0" max="100" value="{{ old('nilai["bahasa_1_nilai"]') }}" class="form-control required rating_number" required target="#rating11" placeholder="0-100">
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="rating rating-0 size-13 width-100" id="rating11"><!-- rating-0 ... rating-5 --></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-5 col-sm-5">
											<label>Bahasa Inggris</label>
										</div>
										<div class="col-md-3 col-sm-3">
											<input type="number" name="nilai[bahasa_2_nilai]" min="0" max="100" value="{{ old('nilai["bahasa_2_nilai"]') }}" class="form-control required rating_number" required target="#rating12" placeholder="0-100">
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="rating rating-0 size-13 width-100" id="rating12"><!-- rating-0 ... rating-5 --></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-5 col-sm-5">
											<input type="text" name="nilai[bahasa_3]" id="bahasa_3" min="0" max="100" value="{{ old('nilai["bahasa_3"]') }}" class="form-control required" placeholder="Bahasa .... (opsional)">
										</div>
										<div class="col-md-3 col-sm-3">
											<input type="number" name="nilai[bahasa_3_nilai]" min="0" max="100" value="{{ old('nilai["bahasa_3_nilai"]') }}" class="form-control required rating_number" required target="#rating13" placeholder="0-100">
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="rating rating-0 size-13 width-100" id="rating13"><!-- rating-0 ... rating-5 --></div>
										</div>
									</div>
								</div>

								<hr>
								<p><strong>DESKRIPSI PENILAIAN</strong></p>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Internal Readiness</label>
											<input type="text" name="nilai[kesehatan]" value="{{ old('nilai["kesehatan"]') }}" class="form-control required col-md-6" placeholder="Kesehatan" required>
											<input type="text" name="nilai[career_willingness]" value="{{ old('nilai["career_willingness"]') }}" class="form-control required col-md-6" placeholder="Career Willingness">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>External Readiness</label>
											<input type="text" name="nilai[external_rediness]" value="{{ old('nilai["external_rediness"]') }}" class="form-control required col-md-6" placeholder="From family, friends, etc" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Hubungan dengan Sesama</label>
											<label class="radio">
												<input type="radio" name="hds" value="Sangat Bagus - " checked="checked">
												<i></i> Sangat Bagus
											</label>

											<label class="radio">
												<input type="radio" name="hds" value="Bermasalah - ">
												<i></i> Bermasalah
											</label>
											<input type="text" name="nilai[hubungan_sesama]" value="{{ old('nilai["hubungan_sesama"]') }}" class="form-control required col-md-6" placeholder="Deskripsi" required>
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
											<input type="text" name="mrp[nip_pengusul]" id="nip_pengusul" value="{{ old('mrp["nip_pengusul"]') }}" class="form-control required" autocomplete="off" required>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Nama Pengusul</label>
											<input type="text" id="nama_pengusul" value="" class="form-control" disabled>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Alasan Memutasi *</label>
											<textarea rows="3" name="mrp[alasan_mutasi]" value="{{ old('mrp["alasan_mutasi"]]') }}" class="form-control" placeholder="" required></textarea>
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
										<div class="col-md-6 col-sm-6">
											<label>Jenis Mutasi *</label>
											<select name="mrp[jenis_mutasi]" class="form-control required" required>
												<option>--- Pilih ---</option>
												<option value="Dinas">Dinas</option>
												<option value="APS">APS</option>
												<option value="Non-dinas">Non-dinas</option>
											</select>
										</div>

										<div class="col-md-6 col-sm-6">
											<label>Tipe</label>
											<select name="mrp[mutasi]" class="form-control required" required>
												<option>--- Pilih ---</option>
												<option value="Rotasi">Rotasi</option>
												<option value="Promosi">Promosi</option>
												<option value="Demosi">Demosi</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Rekomendasi Proyeksi Jabatan <small class="text-muted">- opsional</small></label>
											<select class="form-control required" required>
												<option>--- Pilih ---</option>
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
											<label>No. Dokumen Mutasi *</label>
											<input type="text" name="mrp[no_dokumen_unit_asal]" value="{{ old('mrp["no_dokumen_unit_asal"]') }}" class="form-control required" required>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Tanggal Dokumen Mutasi *</label>
											<input type="text" name="mrp[tgl_dokumen_unit_asal]" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" required>
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

											<div class="fancy-file-upload fancy-file-primary">
												<i class="fa fa-upload"></i>
												<input type="file" name="file_dokumen_mutasi" class="form-control" name="contact[attachment]" onchange="jQuery(this).next('input').val(this.value);" required />
												<input type="text" class="form-control" placeholder="no file selected" readonly="" />
												<span class="button">Pilih Dokumen</span>
											</div>
											<small class="text-muted block">File Maksimal 10 MB (zip/rar)</small>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30" id="next1">
											KIRIM
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
						<ol>
							<li>Isi kolom bertanda * (maka kolom lain akan otomatis terisi)</li>
							<li>Anda hanya bisa mengusulkan mutasi untuk pegawai di unit anda</li>
							<li>Dokumen yang dilampirkan berupa CV, Nota Dinas, dan dokumen lain yang diperlukan, dijadikan satu folder dalam bentuk zip/rar</li>
						</ol>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('includes-scripts')
	@parent

	<script>
		$(".rating_number").keyup(function(){
			var masukan = $(this).val();

			if(masukan != "")
			{
				var angka = parseInt(masukan / 20) + 1;
				$($(this).attr('target')).removeClass().addClass('rating rating-'+angka+' size-13 width-100');
			}
			else
			{
				$($(this).attr('target')).removeClass().addClass('rating rating-0 size-13 width-100');	
			}
		});
	</script>

	<script>
		$("#nip_pengusul").on('keyup paste', function(){
			var nip = $(this).val();
			if(nip.length >= 6)
			{
				$.ajax({
					'url': '/mutasi/pengajuan/get_pegawai_info',
					'type': 'POST',
					'data': {
						'_token': '{{ csrf_token() }}',
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

		$("#nip").keyup(function(){
			var nip = $(this).val();

			if(nip.length >= 6)
			{
				$.ajax({
					'url': '/mutasi/pengajuan/get_pegawai_info',
					'type': 'POST',
					'data': {
						'_token': '{{ csrf_token() }}',
						'nip': nip
					},
					'dataType': 'json',
					error: function(data){
						
					},
					success: function(data){
						if(data)
						{
							$("#nama_pegawai").val(data.nama_pegawai);
							$("#personnel_area").val(data.personnel_area);
							$("#formasi_jabatan").val(data.forja);
							$("#posisi").val(data.posisi);
							$("#masa_kerja").val(data.masa_kerja);
							$("#sisa_kerja").val(data.sisa_masa_kerja);
						}
						else
						{
							$("#nama_pegawai").val('');
							$("#personnel_area").val('');
							$("#formasi_jabatan").val('');
							$("#posisi").val('');
							$("#masa_kerja").val('');
							$("#sisa_kerja").val('');
						}
					}
				});
			}
			else
			{
				$("#nama_pegawai").val('');
				$("#personnel_area").val('');
				$("#formasi_jabatan").val('');
				$("#posisi").val('');
				$("#masa_kerja").val('');
				$("#sisa_kerja").val('');
			}
		});
	</script>
@endsection