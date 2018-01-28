@extends('layouts.master')

@section('title', 'Meminta Pegawai')

@section('leftbar')
	@include('includes.unit.leftbar')
@endsection

@section('content')
	<!-- page title -->
	<header id="page-header">
		<h1>Form Meminta Pegawai</h1>
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
							<strong>DATA PEGAWAI</strong>
						</div>

						<div class="panel-body">
							<fieldset>
								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>NIP *</label>
											<input type="text" name="nip" style="text-transform: uppercase" id="nip" value="{{ old('nip') }}" class="form-control required" autocomplete="off" required>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Nama Pegawai</label>
											<input type="text" name="dis_nama" id="nama_pegawai" value="{{ old('dis_nama') }}" class="form-control" disabled>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Personnel Area</label>
											<input type="text" name="dis_pa" id="personnel_area" value="{{ old('dis_pa') }}" class="form-control" disabled>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>Formasi Jabatan</label>
											<textarea type="text" name="dis_fj" rows="2" id="formasi_jabatan" class="form-control" disabled>{{ old('dis_fj') }}</textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
						                <div class="col-md-12 col-sm-12">
						                    <label>Pada</label>
											<textarea type="text" name="dis_pada" id="posisi" value="" class="form-control" disabled>{{ old('dis_pada') }}</textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Masa Kerja <small class="text-muted">(di Jabatan Terakhir)</small></label>
											<input type="text" name="dis_mk" id="masa_kerja" value="{{ old('dis_mk') }}" class="form-control" disabled>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Sisa Masa Kerja</label>
											<input type="text" name="dis_sisa" id="sisa_kerja" value="{{ old('dis_sisa') }}" class="form-control" disabled>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-6 col-sm-6">
											<label>Lama Menjabat <small class="text-muted">(di Jabatan Terakhir)</small></label>
											<input type="text" id="lama_menjabat" value="" class="form-control" disabled>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Kali jenjang</label>
											<input type="text" id="kali_jenjang" value="" class="form-control" disabled>
										</div>
									</div>
								</div>											
							</fieldset>
						</div>
					</div>
				</div>

				<div id="content">
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
												<input type="text"  style="text-transform: uppercase" name="mrp[nip_pengusul]" id="nip_pengusul" value="{{ old('mrp.nip_pengusul') }}" class="form-control required" autocomplete="off" required>
											</div>
											<div class="col-md-6 col-sm-6">
												<label>Nama Pengusul</label>
												<input type="text" name="dis_pengusul" id="nama_pengusul" value="{{ old('dis_pengusul') }}" class="form-control" disabled>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group">
											<div class="col-md-12 col-sm-12">
												<label>Alasan Memutasi *</label>
												<textarea rows="3" name="mrp[alasan_mutasi]" class="form-control" placeholder="" required>{{ old('mrp.alasan_mutasi') }}</textarea>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
					</div>
				</div>	


				<div id="content" >
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
												<option value="Dinas" {{ old('mrp.jenis_mutasi') == 'Dinas' ? 'selected="selected"' : "" }}>Dinas</option>
												{{-- <option value="APS" {{ old('mrp.jenis_mutasi') == 'APS' ? 'selected="selected"' : '' }}>APS</option>
												<option value="Non-dinas" {{ old('mrp.jenis_mutasi') == 'Non-dinas' ? 'selected="selected"' : "" }}>Non-dinas</option> --}}
											</select>
										</div>

										<div class="col-md-6 col-sm-6">
											<label>Tipe *</label>
											<select name="mrp[mutasi]" class="form-control required" required>
												<option>--- Pilih ---</option>
												<option value="Tugas Belajar" {{ old('mrp.mutasi') == 'Tugas Belajar' ? 'selected="selected"' : "" }}>Tugas Belajar</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>
												Tanggal Aktivasi*
											</label>
											<!-- date picker -->
											<input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12 col-sm-12">
											<label>No. Dokumen Mutasi *</label>
											<input type="text" name="mrp[no_dokumen_unit_usul]" value="{{ old('mrp.no_dokumen_unit_usul') }}" class="form-control required" required>
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
								
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<label class="switch switch">
											<input type="checkbox" name="rekom_checkbox" id="rekom_checkbox" value="0" autocomplete="off">
											<span class="switch-label" data-on="YES" data-off="NO"></span>
											<span> Rekomendasikan proyeksi jabatan? <small> - opsional</small></span>
										</label>
									</div>
								</div>

								<div id="rekom_proyeksi">
									<div class="row">
										<div class="form-group">
											<div class="col-md-12 col-sm-12">
												<label>Unit</label>
												<input type="text" class="form-control"  id="rekom_unit" class="form-control pointer required" required value="{{$personnelarea->nama}}" disabled>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="form-group">
											<div class="col-md-6 col-sm-6">
												<select class="form-control" id="rekom_formasi" disabled>
													<option>---Pilih Formasi---</option>
													@foreach($formasis as $formasi)
														<option value="{{$formasi->formasi}}"> {{$formasi->formasi }} </option>
													@endforeach
												</select>
											</div>

											<div class="col-md-6 col-sm-6">
												<select class="form-control" name="kode_olah" id="rekom_jabatan" disabled>
													<option>--- Jabatan ---</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				<div id="content">	
						<div class="panel panel-default">
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30">
											KIRIM
									</button>
								</div>
							</div>
						</div>
				</div>
			</form>
			</div>
			<div class="col-md-6">
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
		$(".rating_number").keyup(function(){
			var masukan = $(this).val();

			if(masukan != "")
			{
				var angka = Math.ceil(masukan / 20);
				$($(this).attr('target')).removeClass().addClass('rating rating-'+angka+' size-13 width-100');
			}
			else
			{
				$($(this).attr('target')).removeClass().addClass('rating rating-0 size-13 width-100');	
			}
		});
	</script>

	<script>
		$("#rekom_checkbox").click(function(e){
			if(!$("#kode_olah_pegawai").val())
			{
				alert('NIP tidak ditemukan, pastikan informasi pegawai telah muncul');
				e.preventDefault();
				return;
			}

			var on_off = $(this).val();
			$(this).val( on_off == '0' ? '1' : '0');
			$('#rekom_formasi').prop('disabled', function(i, v) { return !v; });
			$('#rekom_formasi').prop('required', function(i, v) { return !v; });
			$('#rekom_jabatan').prop('required', function(i, v) { return !v; });

			if($(this).val() == '0')
			{
				$('#rekom_jabatan').attr('disabled', 'true');
				$('#rekom_formasi').attr('disabled', 'true');
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

		$("#nip").keyup(function(){
			var nip = $(this).val();

			if(nip.length >= 6)
			{
				$.ajax({
					'url': '/mutasi/pengajuan/get_pegawai_info',
					'type': 'GET',
					'data': {
						'nip': nip,
						'option': true
					},
					'dataType': 'json',
					error: function(data){
						
					},
					success: function(data){
						if(!!data)
						{
							$("#nama_pegawai").val(data.nama_pegawai);
							$("#personnel_area").val(data.personnel_area);
							$("#formasi_jabatan").val(data.forja);
							$("#posisi").val(data.posisi);
							$("#masa_kerja").val(data.masa_kerja);
							$("#sisa_kerja").val(data.sisa_masa_kerja);
							$("#lama_menjabat").val(data.lama_menjabat);
							$("#kali_jenjang").val(data.kali_jenjang);
							$("#kode_olah_pegawai").val(data.kode_olah_forja);
						}
						else
						{
							$("#nama_pegawai").val('');
							$("#personnel_area").val('');
							$("#formasi_jabatan").val('');
							$("#posisi").val('');
							$("#masa_kerja").val('');
							$("#sisa_kerja").val('');
							$("#lama_menjabat").val('');
							$("#kali_jenjang").val('');
							$("#kode_olah_pegawai").val('');
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
				$("#lama_menjabat").val('');
				$("#kali_jenjang").val('');
				$("#kode_olah_pegawai").val('');
			}
		});
	</script>

	<script>
		$("#rekom_formasi").change(function(){
			var formasi = $(this).val();

			$.ajax({
				'url': '/mutasi/pengajuan/getFormasiJabs',
				'type': 'GET',
				'data': {
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