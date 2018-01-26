@extends('layouts.master')

@section('title', 'Daftar SK')

@section('leftbar')
	@include('includes.sdm.leftbar')
@endsection

@section('includes-styles')
	@parent

	<link href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="/assets/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
	<link href="/assets/plugins/x-editable/src/inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.css" rel="stylesheet" />
	<link href="/assets/plugins/x-editable/src/inputs-ext/address/address.css" rel="stylesheet" />
@endsection

@section('content')
	<div id="content" class="dashboard padding-20">
		<div id="panel-1" class="panel panel-default">

			<div class="col-md-12">
				<h4>Daftar SK</h4>
				<div id="panel-2" class="panel panel-default ">
					<div class="panel-heading">
						<!-- tabs nav -->
						<ul class="nav nav-tabs pull-left">
							<li class="active">
								<a class="tabselect" href="#daftar" data-toggle="tab">Daftar SK</a>
							</li>
							<li class="">
								<a  class="tabselect" href="#upload" data-toggle="tab">Upload SK</a>
							</li>
						</ul>							 		

						<!-- right options -->
						<ul class="options pull-right list-inline">
							<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
							<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
						</ul>
						<!-- /right options -->
					</div>

					<!-- panel content -->
					<div class="panel-body" style="overflow-y: auto" id="verifikasi_body">
						<div class="tab-content transparent ">

							<!-- daftar sk -->
							<div id="daftar" class="tab-pane active">
								
								<div class="row">
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="Search" id="filter2">
									</div>
								</div>
								
								<br>
								
									<table class="table table-bordered table-striped table-hover dataTable js-exportable">
									<thead>
										<tr>
											<th data-type="numeric" data-hide = "" class="">No. Dokumen Proses SK</th>
											<th data-type="numeric" data-hide = "all" class="">Tanggal Aktivasi</th>
											<th class="foo-cell">Tahun SK</th>
											<th class="foo-cell">Nomor SK</th>
											<!-- <th data-type="numeric" data-hide = "all" class="">Tahun STg<br></th> -->
											<th data-type="numeric" data-hide = "all" class="">Nomor STg<br></th>
											<th data-type="numeric" data-hide = "" class="">No. Dokumen Kirim SK</th>
											<th data-type="numeric" data-hide = "all" class="">Tanggal Kirim SK/STg</th>
											<th data-type="numeric" data-hide = "all" class="">Lihat SK</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($mrpsk as $mrp)
										<tr>
											<td>{{ $mrp->skstg->no_dokumen_kirim_sk }}</td>
											<td>{{ $mrp->skstg->tgl_aktivasi }}</td>
											<td>{{ $mrp->skstg->tahun_sk }}</td>
											<td>{{ $mrp->skstg->no_sk }}</td>
											<td>{{ $mrp->skstg->no_stg }}</td>
											<td>{{ $mrp->skstg->no_dokumen_kirim_sk }}</td>
											<td>{{ $mrp->skstg->tgl_kirim_sk }}</td>
											<td style="text-align: center;">
												<button type="button" class="btn btn-3d btn-info" data-toggle="modal" data-target="#myModal">
													<span>Lihat SK</span>
												</button>
											</td>
										</tr>
										@endforeach	
									</tbody>
								</table>
							</div>

							<!-- upload sk -->
							<div id="upload" class="tab-pane">
								<div id="content" class="padding-20">

									<div class="row">

										<!-- DA-SK -->
										<div class="col-md-6 scrollable">
											<div class="panel panel-default">
												<div class="panel-heading panel-heading-transparent">
													<strong>UPLOAD SK dan/atau STg.</strong>
													<small class="pull-right">(*) wajib diisi</small>
												</div>

												<div class="panel-body">
													<form action="{{URL('/mrp/sk/upload')}}" method="post" enctype="multipart/form-data" autocomplete="on">
														{{ csrf_field() }}
														<fieldset>
															<input class="mrp_id" type="hidden" name="id" value="">
															<!-- upload dokumen -->
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12">
																		<label>
																			Upload File
																		</label>

																		<div class="fancy-file-upload fancy-file-primary">
																			<i class="fa fa-upload"></i>
																			<input type="file" name="file_dokumen_sk" class="form-control"  name="contact[attachment]" onchange="jQuery(this).next('input').val(this.value);" required />
																			<input type="text" class="form-control" placeholder="no file selected" readonly="" />
																			<span class="button">Pilih Dokumen</span>
																		</div>
																		<small class="text-muted block">File Maksimal 10 MB (pdf)</small>
																	</div>
																</div>
															</div>

															<!-- tahun sk -->
															<div class="row">
																<div class="form-group">
																		<div class="col-md-12 col-sm-12">
																			<label>Registry Number *</label>
																			<input type="text" name="registry_number" id="registry_number" value="{{ old('registry_number') }}" class="form-control" required>
																		</div>
																</div>
															</div>

															<!-- tahun sk -->
															<div class="row">
																<div class="form-group">
																		<div class="col-md-12 col-sm-12">
																			<label>Tahun SK *</label>
																			<input type="text" name="tahun_sk" id="tahun_sk" value="{{ old('tahun_sk') }}" class="form-control" required>
																		</div>
																</div>
															</div>

															<!-- no sk -->
															<div class="row">
																<div class="form-group">
																		<div class="col-md-12 col-sm-12">
																			<label>No. SK *</label>
																			<input type="text" name="no_sk" id="no_sk" value="{{ old('no_sk') }}" class="form-control"  required>
																		</div>
																</div>
															</div>

															<!-- no dokumen kirim sk -->
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>No. Dokumen Kirim SK *</label>
																		<input type="text" name="no_dokumen_kirim_sk" id="no_dokumen_kirim_sk" value="{{ old('no_dokumen_kirim_sk') }}" class="form-control" required>
																	</div>
																</div>
															</div>

															<!-- tgl kirim sk -->
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>Tanggal Kirim SK/STg. *</label>
																		<input type="text" name="tanggal_kirim_sk" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" value="{{ old('tanggal_kirim_sk') }}" required>
																	</div>
																</div>
															</div>

															<!-- tgl kirim sk -->
															<div class="row">
																<div class="form-group">
																	<div class="col-md-12 col-sm-12">
																		<label>Tanggal Aktivasi *</label>
																		<input type="text" name="tanggal_aktivasi" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" value="{{ old('tanggal_aktivasi') }}" required>
																	</div>
																</div>
															</div>

															<!-- tahun stg -->
															<!-- <div class="row">
																<div class="form-group">
																		<div class="col-md-12 col-sm-12">
																			<label>Tahun STg.</label>
																			<input type="text" name="tahun_stg" id="tahun_stg" value="{{ old('tahun_stg') }}" class="form-control ">
																		</div>
																</div>
															</div> -->

															<!-- no stg -->
															<div class="row">
																<div class="form-group">
																		<div class="col-md-12 col-sm-12">
																			<label>No. STg.</label>
																			<input type="text" name="no_stg" id="no_stg" value="{{ old('no_stg') }}" class="form-control ">
																		</div>
																</div>
															</div>

															<div class="row">
																<div class="form-group">
																		<div class="col-md-12 col-sm-12">
																			<label>MRP ID</label>
																			<input type="text" name="mrp_id" id="mrp_id" value="{{ old('mrp_id') }}" class="form-control ">
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

															</fieldset>
														</form>
												</div>
											</div>
										</div>

										<!-- TATA CARA -->
										<div class="col-md-6">

											<div class="panel panel-default">
												<div class="panel-body">

													<h4>Tata Cara Pengisian Form</h4>
													<!-- <p><em>This is a vrey unique feature because you don't need PHP programming if you want to send the form directly to email.</em></p>
													<hr /> -->
													<p>
														1. Kolom bertanda * wajib diisi.<br>
														2. Dokumen yang dilampirkan berupa dokumen SK dan/atau STg., dan dokumen lain yang diperlukan dalam bentuk pdf.
													</p>

												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /panel content -->
				</div>
		    </div>
		</div>
	</div>

	<!-- modal lihat sk -->
	<div id="myModal" class="modal right fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">File SK</h4>
				</div>

				<!-- Modal Body -->
				<div class="modal-body">
					<div class="form-group" >
						<td>{{ $mrp->skstg->filename_dokumen_sk }}</td>
					</div>
				</div>

				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
    </div>	
@endsection