@extends('layouts.master')

@section('title', 'Edit Data')

@section('leftbar')
	@include('includes.sdm.leftbar')
@endsection

@section('content')
	<!-- page title -->
	<header id="page-header">
		<h1>Edit {{ $mrp->registry_number }}</h1>
	</header>
	<!-- /page title -->

	<div id="content" class="padding-20">
		<div class="row">
			<form action="/mrp/edit" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="mrp_id" value="{{ $mrp->id }}">

				<div class="col-md-6" >
					<!-- data pegawainya -->
					<div class="panel panel-default">
						<div class="panel-heading panel-heading-transparent">
							<strong>DATA PEGAWAI</strong>
						</div>

						<div class="panel-body">
							<fieldset>
								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>NIP *</label>
											<input type="text" name="nip" value="{{ $mrp->pegawai ? $mrp->pegawai->nip : '' }}" class="form-control">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Nomor Nota Dinas</label>
											<input type="text" name="mrp[no_dokumen_unit_asal]" value="{{ $mrp->no_dokumen_unit_asal }}" class="form-control">
										</div>
									
										<div class="col-md-6 col-sm-6">
											<label>Tanggal Nota Dinas</label>
											<input type="text" class="form-control datepicker" name="mrp[tgl_dokumen_unit_asal]" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" value="{{ $mrp->tgl_dokumen_unit_asal }}">
										</div>													
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>
												Edit Lampiran
												<small class="text-muted">Nota Dinas / Surat</small>
											</label>

											<!-- custom file upload -->
											<div class="fancy-file-upload fancy-file-primary">
												<i class="fa fa-upload"></i>
												<input type="file" class="form-control" name="unit_asal_attachment" onchange="jQuery(this).next('input').val(this.value);" />
												<input type="text" class="form-control" placeholder="no file selected" readonly="" />
												<span class="button">Choose File</span>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>

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
											<select name="mrp[jenis_mutasi]" class="form-control pointer">
													<option value="">--- Jenis Mutasi ---</option>
													@if ($mrp->jenis_mutasi == 'APS')
														<option value="APS" selected>APS</option>
														<option value="Dinas">Dinas</option>
														<option value="Non-Dinas">Non-Dinas</option>
													@elseif ($mrp->jenis_mutasi == 'Dinas')
														<option value="APS">APS</option>
														<option value="Dinas" selected>Dinas</option>
														<option value="Non-Dinas">Non-Dinas</option>
													@elseif ($mrp->jenis_mutasi == 'Non-Dinas')
														<option value="APS">APS</option>
														<option value="Dinas">Dinas</option>
														<option value="Non-Dinas" selected>Non-Dinas</option>
													@endif
											</select>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Mutasi *</label>
											<select name="mrp[mutasi]" class="form-control pointer">
												<option value="">--- Mutasi ---</option>
												@if ($mrp->mutasi == 'Rotasi')
													<option value="Rotasi" selected>Rotasi</option>
													<option value="Promosi">Promosi</option>
													<option value="Demosi">Demosi</option>
												@elseif($mrp->mutasi == 'Promosi')
													<option value="Rotasi">Rotasi</option>
													<option value="Promosi" selected>Promosi</option>
													<option value="Demosi">Demosi</option>
												@elseif($mrp->mutasi == 'Demosi')
													<option value="Rotasi">Rotasi</option>
													<option value="Promosi">Promosi</option>
													<option value="Demosi" selected>Demosi</option>
												@endif
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Jalur Mutasi</label>
											<select name="mrp[jalur_mutasi]" class="form-control pointer" id="jalur_mutasi">
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
											<label>Unit Mutasi / Proyeksi</label>
											<select class="form-control select2" id="rekom_unit">
											@if ($unit_tujuan)
												@foreach ($all_unit as $unit)
													<option value="{{ $unit->id }}" {{ $unit_tujuan->id == $unit->id ? 'selected="selected"' : ''}}>
														{{$unit->nama}}
													</option>
												@endforeach
											@else
												<option>-- Belum ada proyeksi / unit tujuan --</option>
												@foreach ($all_unit as $unit)
													<option value="{{ $unit->id }}">
														{{$unit->nama}}
													</option>
												@endforeach
											@endif
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Formasi</label>
											@if ($unit_tujuan)
												<select class="form-control select2" name="" id="rekom_formasi">
												@foreach ($formasi as $for)
													<option value="{{ $for->id }}" {{ $formasi_selected == $for->formasi ? 'selected="selected"' : '' }}>{{ $for->formasi }}</option>
												@endforeach
											@else
												<select class="form-control select2" name="" id="rekom_formasi" disabled>
											@endif
												</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Jabatan</label>
											@if ($unit_tujuan)
												<select class="form-control select2" name="kode_olah" id="rekom_jabatan">
												@foreach ($jabatan as $jab)
													<option value="{{ $jab->id }}" {{ $jabatan_selected == $for->jabatan ? 'selected="selected"' : '' }}>{{ $jab->jabatan }}</option>
												@endforeach
											@else
												<select class="form-control select2" name="kode_olah" id="rekom_jabatan" disabled>
											@endif
												</select>
											</option>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Nomor Dokumen Mutasi</label>
											<input type="text" name="mrp[no_dokumen_unit_mutasi]" value="{{ $mrp->no_dokumen_unit_mutasi }}" class="form-control">
										</div>
										<div class="col-md-6 col-sm-6">
											<label>
												Tanggal Dokumen Mutasi
											</label>
											<!-- date picker -->
											<input type="text" class="form-control datepicker" name="mrp[tgl_dokumen_unit_mutasi]" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" value="{{ $mrp->tgl_dokumen_unit_mutasi }}">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>
												File Attachment 
												<small class="text-muted">Edit Lampiran</small>
											</label>

											<!-- custom file upload -->
											<div class="fancy-file-upload fancy-file-primary">
												<i class="fa fa-upload"></i>
												<input type="file" class="form-control" name="unit_mutasi_attachment" onchange="jQuery(this).next('input').val(this.value);" />
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

					{{-- <div class="panel panel-default">
						<div class="panel-heading panel-heading-transparent">
							<strong>SK / STg</strong>
						</div>
						<div class="panel-body">
							<fieldset>
								
							</fieldset>
						</div>
					</div> --}}
				</div>

				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading panel-heading-transparent">
							<strong>DATA PENGUSUL</strong>
						</div>
						<div class="panel-body">
							<fieldset>
								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>NIP Pengusul</label>
											<input type="text" name="mrp[nip_pengusul]" value="{{ $pengusul->nip }}" class="form-control required col-md-6 nip_to_nama" target="#nama_pengusul">
										</div>

										<div class="col-md-6 col-sm-6">
											<label>NIP Operator</label>
											<input type="text" name="mrp[nip_operator]" value="{{ $operator->nip }}" class="form-control required col-md-6 nip_to_nama" target="#nama_operator">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Alasan Memutasi *</label>
											<textarea rows="3" name="mrp[alasan_mutasi]" class="form-control" required>{{ $mrp->alasan_mutasi }}</textarea>
										</div>
									</div>
								</div>

								{{-- <div class="row">
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
								</div> --}}
							</fieldset>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading panel-heading-transparent">
							<strong>MRP</strong>
						</div>
						<div class="panel-body">
							<fieldset>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Tipe</label>
											<select class="form-control" name="mrp[tipe]">
												@if ($mrp->tipe == 1)
													<option value="1" selected>1</option>
													<option value="2">2</option>
													<option value="3">3</option>
												@elseif ($mrp->tipe == 2)
													<option value="1">1</option>
													<option value="2" selected>2</option>
													<option value="3">3</option>
												@elseif ($mrp->tipe == 3)
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3" selected>3</option>
												@endif
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Status</label>
											<select class="form-control" name="mrp[status]" id="status">
												<option value="0">Ditolak</option>
												<option value="1">Diajukan</option>
												<option value="2">Proses Evaluasi (SDM)</option>
												<option value="3">Proses Evaluasi (Karir II)</option>
												<option value="4">Proses Evaluasi (Karir II)</option>
												<option value="5">Proses SK</option>
												<option value="6">SK Tercetak</option>
												<option value="7">SK Pending</option>
												<option value="8">Clear</option>
												<option value="99">Ditolak (SDM Pusat)</option>
												<option value="98">Ditolak (Karir II Pusat)</option>
												<option value="">???</option>
											</select>

										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Tanggal Pooling</label>
											<input type="text" class="form-control datepicker" name="mrp[tgl_pooling]" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" value="{{ $mrp->tgl_pooling }}">
										</div>

										<div class="col-md-6 col-sm-6">
											<label>Tanggal Dokumen Mutasi</label>
											<input type="text" class="form-control datepicker" name="mrp[tgl_dokumen_mutasi]" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" value="{{ $mrp->tgl_dokumen_mutasi }}">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Tindak Lanjut</label>
											<textarea rows="3" name="mrp[tindak_lanjut]" class="form-control" required>{{ $mrp->tindak_lanjut }}</textarea>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
					

					<div class="row">
						<div class="col-md-6">
							<button type="button" class="btn btn-3d btn-red btn-xlg btn-block margin-top-30" id="backButton">
								KEMBALI
							</button>
						</div>

						<div class="col-md-6">
							<button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30">
								SIMPAN PERUBAHAN
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('includes-scripts')
	@parent

	<script>
		$("#backButton").click(function(){
			if(confirm("Apakah anda yakin akan meninggalkan halaman ini? (Semua perubahan tidak akan disimpan)"))
			{
				console.log('oke');
				window.location.href = "/mrp";
			}
		})
	</script>

	<script>
		$(document).ready(function(){
			@if ($mrp->jalur_mutasi)
				$("#jalur_mutasi").children('option').each(function(){
					if($(this).val() == {{ $mrp->jalur_mutasi }})
					{
						$(this).attr('selected', 'selected');
						break;
					}
				});
			@endif
			$("#status").children('option').each(function(){
				if($(this).val() == {{ $mrp->status }})
				{
					$(this).attr('selected', 'selected');
					return;
				}
			});
		});
	</script>

	<script>
		$("#rekom_unit").change(function(){
			var unit_id = $(this).val();

			$.ajax({
				'url': '/mutasi/pengajuan/getFormasi',
				'type': 'GET',
				'data': {
					'unit_id': unit_id,
				},
				'dataType': 'json',
				error: function(){
					console.log('error');
				},
				success: function(data){
					var formasi = $("#rekom_formasi");
					formasi.empty();
					formasi.append('<option>--- Formasi ---</option>');
					formasi.removeAttr('disabled');
					$.each(data, function(key, value){
						console.log(value);
						formasi.append('<option value="'+value.formasi+'">'+value.formasi+'</option>');
					});
				}
			});
		});

		$("#rekom_formasi").change(function(){
			var formasi = $(this).val();
			var unit_id = $("#rekom_unit").val();

			$.ajax({
				'url': '/mutasi/pengajuan/getJabatan',
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
					var jabatan = $("#rekom_jabatan");
					jabatan.empty();
					jabatan.append('<option>--- Jabatan ---</option>');
					jabatan.removeAttr('disabled');
					$.each(data, function(key, value){
						console.log(value);
						jabatan.append('<option value="'+key+'">'+value+'</option>');
					});
				}
			});
		})
	</script>
@endsection