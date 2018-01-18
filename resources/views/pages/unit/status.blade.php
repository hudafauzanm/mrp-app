@extends('layouts.master')

@section('title', 'Progress Mutasi')

@section('leftbar')
	@include('includes.unit.leftbar')
@endsection

@section('includes-styles')
	@parent

	<link href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
@endsection

@section('content')
	<div id="content" class="dashboard padding-20">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong>Status Mutasi</strong> <!-- panel title -->
				</span>

				<!-- right options -->
				<ul class="options pull-right list-inline">
					<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
					<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
				</ul>
				<!-- /right options -->

			</div>

			<!-- panel content -->
			<div class="panel-body">
				{{-- <div class="table-responsive"> --}}
					<table class="table table-striped table-hover dataTable js-exportable" id="statusTable">
	                    <thead>
	                        <tr>

	                            <th width="20%">Registry Number</th>
	                            <th width="10%">NIP</th>
	                            <th width="10%">Nama</th>
	                            <th width="20%">Posisi & Unit Asal</th>
	                            <th width="20%">Posisi & Unit Tujuan</th>
	                            <th width="10%">Status</th>
	                            <th width="10%">Lihat Detail</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach ($mrp as $mrps) 
	                    		
							<tr>
								
								<td>{{ $mrps->registry_number }}</td>
								<td>{{$mrps->pegawai->nip}}</td>
								<td>{{$mrps->pegawai->nama_pegawai}}</td>
								<td><strong>{{$mrps->pegawai->formasi_jabatan->formasi}} {{$mrps->pegawai->formasi_jabatan->jabatan}}</strong> {{$mrps->pegawai->formasi_jabatan->posisi}}<br><small>{{$mrps->pegawai->formasi_jabatan->personnel_area->username}}</small></td>
								<td>
									@if(isset($mrps->formasi_jabatan))
										<strong>{{$mrps->formasi_jabatan->formasi}}{{$mrps->formasi_jabatan->jabatan}}</strong> {{$mrps->formasi_jabatan->posisi}}
										<br><small>{{$mrps->formasi_jabatan->personnel_area->username}}</small>
									@else
										Perlu saran
									@endif
								</td>
								<td>{{$mrps->status}}</td>
								<td><a href="/status/detail/{{ $mrps->registry_number }}" class="btn btn-primary" target="_blank"><i class="fa fa-list"> Detail</i></a></td>
								
							</tr>
							
							@endforeach
	                    </tbody>
	                </table>
				{{-- </div> --}}
			</div>
			<!-- /panel content -->
		</div>

		{{-- <div id="panel-2" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong>Status Mutasi</strong> <!-- panel title -->
				</span>

				<!-- right options -->
				<ul class="options pull-right list-inline">
					<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
					<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
				</ul>
				<!-- /right options -->

			</div> --}}

			<!-- panel content -->
			{{-- <div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<label for="mySearchBox">Cari:</label>
						<input type="text" class="form-control pull-right" id="mySearchBox" placeholder="NIP">
					</div>
				</div>
				<br>
				<div id="items">
					<div class="row" id="93162702ZY">
	    				<div class="col-md-4">
	    					<p style="margin: 5px" class="size-16 weight-600">Registry Number:</p>
	    					<p style="margin: 5px">93162702ZY.Rotasi.15160103_1516012201</p>
	    					<p style="margin: 5px" class="size-16 weight-600">NIP & Nama:</p>
	    					<p style="margin: 5px">(93162702ZY) SAKINAH AMALIYAH </p>
	                        <p style="margin: 5px" class="size-16 weight-600">Status: 
	                            <span class="label label-primary">Diajukan</span>
	                        </p>
	                        <p style="margin-top: 10px; margin-left: 5px" class="size-16 weight-600">
	                        	<span class="label label-info"><button data-toggle="modal" data-target="#detailPemesanan" id="detailPemesananButton" value="3"><i class="fa fa-list"></i> Lihat Detail</button></span>
	                        </p>
	    				</div>

	    				<div class="col-md-4">
	    					<p style="margin: 5px" class="size-16 weight-600">Unit Asal:</p>
	    					<p style="margin: 5px" >ASSISTANT ANALYST AUDIT KHUSUS BIDANG AUDIT KHUSUS SATUAN PENGAWASAN INTERN PT PLN (PERSERO) KANTOR PUSAT</p>
	    				</div>

	    				<div class="col-md-4">
	    					<p style="margin: 5px" class="size-16 weight-600">Unit Tujuan:</p>
	    					<p style="margin: 5px">ASSISTANT ANALYST AUDIT KHUSUS DEPUTY GROUP AUDIT KHUSUS A GROUP HEAD AUDIT KHUSUS SATUAN PENGAWASAN INTERN PT PLN (PERSERO) KANTOR PUSAT</p>
	    				</div>

	    			</div>
	    			<hr>

					<div class="row" id="73162702ZY">
	    				<div class="col-md-4">
	    					<p style="margin: 5px" class="size-16 weight-600">Registry Number:</p>
	    					<p style="margin: 5px">93162702ZY.Rotasi.15160103_1516012201</p>
	    					<p style="margin: 5px" class="size-16 weight-600">NIP & Nama:</p>
	    					<p style="margin: 5px">(93162702ZY) SAKINAH AMALIYAH </p>
	                        <p style="margin: 5px" class="size-16 weight-600">Status: 
	                            <span class="label label-primary">Diajukan</span>
	                        </p>
	                        <p style="margin-top: 10px; margin-left: 5px" class="size-16 weight-600">
	                        	<span class="label label-info"><button data-toggle="modal" data-target="#detailPemesanan" id="detailPemesananButton" value="3"><i class="fa fa-list"></i> Lihat Detail</button></span>
	                        </p>
	    				</div>

	    				<div class="col-md-4">
	    					<p style="margin: 5px" class="size-16 weight-600">Unit Asal:</p>
	    					<p style="margin: 5px" >ASSISTANT ANALYST AUDIT KHUSUS BIDANG AUDIT KHUSUS SATUAN PENGAWASAN INTERN PT PLN (PERSERO) KANTOR PUSAT</p>
	    				</div>

	    				<div class="col-md-4">
	    					<p style="margin: 5px" class="size-16 weight-600">Unit Tujuan:</p>
	    					<p style="margin: 5px">ASSISTANT ANALYST AUDIT KHUSUS DEPUTY GROUP AUDIT KHUSUS A GROUP HEAD AUDIT KHUSUS SATUAN PENGAWASAN INTERN PT PLN (PERSERO) KANTOR PUSAT</p>
	    				</div>

	    			</div>
	    			<hr>

	    			<div class="row" id="83162702ZY">
	    				<div class="col-md-4">
	    					<p style="margin: 5px" class="size-16 weight-600">Registry Number:</p>
	    					<p style="margin: 5px">93162702ZY.Rotasi.15160103_1516012201</p>
	    					<p style="margin: 5px" class="size-16 weight-600">NIP & Nama:</p>
	    					<p style="margin: 5px">(93162702ZY) SAKINAH AMALIYAH </p>
	                        <p style="margin: 5px" class="size-16 weight-600">Status: 
	                            <span class="label label-primary">Diajukan</span>
	                        </p>
	                        <p style="margin-top: 10px; margin-left: 5px" class="size-16 weight-600">
	                        	<span class="label label-info"><button data-toggle="modal" data-target="#detailPemesanan" id="detailPemesananButton" value="3"><i class="fa fa-list"></i> Lihat Detail</button></span>
	                        </p>
	    				</div>

	    				<div class="col-md-4">
	    					<p style="margin: 5px" class="size-16 weight-600">Unit Asal:</p>
	    					<p style="margin: 5px" >ASSISTANT ANALYST AUDIT KHUSUS BIDANG AUDIT KHUSUS SATUAN PENGAWASAN INTERN PT PLN (PERSERO) KANTOR PUSAT</p>
	    				</div>

	    				<div class="col-md-4">
	    					<p style="margin: 5px" class="size-16 weight-600">Unit Tujuan:</p>
	    					<p style="margin: 5px">ASSISTANT ANALYST AUDIT KHUSUS DEPUTY GROUP AUDIT KHUSUS A GROUP HEAD AUDIT KHUSUS SATUAN PENGAWASAN INTERN PT PLN (PERSERO) KANTOR PUSAT</p>
	    				</div>

	    			</div>
	    			<hr>
				</div>
			</div>
		</div> --}}
	</div>
@endsection


@section('includes-scripts')
	@parent
	<script>
        $(function(){
            $('#statusTable').DataTable({                
            });
        });
    </script>

	<script src="/assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

    {{-- <script>
    	$("#mySearchBox").keyup(function(){
    		console.log("pressed");
    		var items = $("#items>div");
    		var keyword = $(this).val().toLowerCase();
    		console.log(keyword);
    		if(keyword = '') {
    			items.css('display');
    			console.log('kosong');
    			return;
    		}


    		for (var i = 0; i < items.length; i++) {
    			var item = $(items[i]);
    			if (item.attr('id').toLowerCase().indexOf(keyword) > -1)
    				item.css('display');
    			else
    				item.css('display', 'none');
    		}
    	});
    </script> --}}
@endsection