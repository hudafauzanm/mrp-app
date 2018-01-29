@extends('layouts.master')

@section('title', 'Daftar SK')

@section('leftbar')
	@include('includes.sdm.leftbar')
@endsection

@section('includes-styles')
	@parent

	<link href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
@endsection

@section('content')
	<div id="content" class="dashboard padding-20">
		@include('includes.validation_errors')
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<!-- tabs nav -->
				<ul class="nav nav-tabs pull-left">
					<li class="active">
						<a  class="tabselect" href="#upload" data-toggle="tab">Upload SK</a>
					</li>
					<li>
						<a class="tabselect" href="#daftar" data-toggle="tab">Daftar SK</a>
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
					<div id="upload" class="tab-pane active">

						<table class="table table-bordered table-striped table-hover dataTable" id="upload_table">
							<thead>
								<tr>
									<th>Registry Number</th>
									<th>NIP</th>
									<th>Nama</th>
									<th>Posisi & Unit Asal</th>
									<th>Posisi & Unit Tujuan</th>
									<th>Tindak Lanjut</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($mrpsk as $mrp)
								<tr>
									<td>{{ $mrp->registry_number }}</td>
									<td>{{ $mrp->pegawai->nip }}</td>
									<td>{{ $mrp->pegawai->nama_pegawai }}</td>
									<td><strong>{{ $mrp->pegawai->formasi_jabatan->formasi.' '.$mrp->pegawai->formasi_jabatan->jabatan }}</strong>
										<br>
										{{ $mrp->pegawai->formasi_jabatan->posisi }}
									</td>
									<td><strong>{{ $mrp->formasi_jabatan->formasi.' '.$mrp->formasi_jabatan->jabatan }}</strong>
										<br>
										{{ $mrp->formasi_jabatan->posisi }}
									</td>
									<td style="text-align: center;">
										<button type="button" class="btn btn-primary btnUpload" data-toggle="modal" data-target="#uploadSKModal" value="{{ $mrp->id }}"><i class="fa fa-upload"></i> Upload SK</button>
									</td>
								</tr>
								@endforeach	
							</tbody>
						</table>
					</div>

					<!-- upload sk -->
					<div id="daftar" class="tab-pane">
						<table class="table table-bordered table-striped table-hover dataTable" id="sk_table">
							<thead>
								<tr>
									<th>Tgl. Kirim</th>
									<th>No. SK</th>
									<th>No. STg</th>
									<th>Tahun</th>
									<th>No. Dokumen Kirim</th>
									<th>Tgl. Aktivasi</th>
									<th>Dokumen</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- /panel content -->
		</div>
	</div>

	<!-- modal lihat sk -->
	<div id="uploadSKModal" class="modal right fade" tabindex="-1" role="dialog" aria-labelledby="uploadSKModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="uploadSKModalLabel">Upload SK</h4>
				</div>

				<!-- Modal Body -->
				<form action="/sk/upload" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						{{ csrf_field() }}
						<input type="hidden" name="mrp_id" id="mrp_id" value="">
						<div class="row">
							<div class="form-group">
								<div class="col-md-12">
									<label>Upload File</label>
									<i class="fa fa-upload"></i>
									<input class="custom-file-upload" type="file" id="file" name="file_dokumen_sk"  data-btn-text="Select a File" />
									<small class="text-muted block">File Max. 10 MB (pdf)</small>
								</div>
							</div>
						</div>

						<!-- tahun sk -->
						<div class="row">
							<div class="form-group">
								<div class="col-md-6 col-sm-6">
									<label>No. SK *</label>
									<input type="text" name="no_sk" id="no_sk" value="{{ old('no_sk') }}" class="form-control"  required>
								</div>

								<div class="col-md-6 col-sm-6">
									<label>Tahun SK *</label>
									<input type="text" name="tahun_sk" id="tahun_sk" value="{{ old('tahun_sk') }}" class="form-control" required>
								</div>
							</div>
						</div>

						<!-- no dokumen kirim sk -->
						<div class="row">
							<div class="form-group">
								<div class="col-md-6 col-sm-6">
									<label>No. Dokumen Kirim SK *</label>
									<input type="text" name="no_dokumen_kirim_sk" id="no_dokumen_kirim_sk" value="{{ old('no_dokumen_kirim_sk') }}" class="form-control" required>
								</div>

								<div class="col-md-6 col-sm-6">
									<label>Tanggal Kirim SK/STg. *</label>
									<input type="text" name="tgl_kirim_sk" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" value="{{ old('tgl_kirim_sk') }}" required>
								</div>
							</div>
						</div>

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
									<label>Tanggal Aktivasi *</label>
									<input type="text" name="tgl_aktivasi" id="tgl_aktivasi" value="{{ old('tgl_aktivasi') }}" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" required="">
								</div>
							</div>
						</div>
					</div>

					<!-- Modal Footer -->
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Upload</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					</div>
				</form>
			</div>
		</div>
    </div>	
@endsection

@section('includes-scripts')
	@parent

	<script src="/assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

    <script>
    	$(".btnUpload").click(function(){
    		$("#mrp_id").val($(this).val());
    	});
    </script>

    <script>
        $('#sk_table').DataTable({
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url": "/sk/datatables/ajax",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{ csrf_token() }}"}
            },
            "columns": [
                { "data": "tgl_kirim_sk" },
                { "data": "no_sk" },
                { "data": "no_stg" },
                { "data": "tahun_sk" },
                { "data": "no_dokumen_kirim_sk" },
                { "data": "tgl_aktivasi" },
                { "data": "dokumen", "orderable": false}
            ]
        });

        $('#upload_table').DataTable({});
    </script>
@endsection