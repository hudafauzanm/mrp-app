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
					@if(request('act')=='req')
						<strong>Status Mutasi - Membursakan Pegawai</strong>
					@elseif(request('act')=='reqjab')
						<strong>Status Mutasi - Membursakan Jabatan</strong>
					@elseif(request('act')=='minta')
						<strong>Status Mutasi - Permintaan Pegawai</strong>
					@endif
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
	                            @if(request('act')!='reqjab')
	                            <th>NIP</th>
	                            <th>Nama</th>
	                            <th>Posisi & Unit Asal</th>
	                            @endif
	                            <th>Posisi & Unit Tujuan</th>
	                            @if(request('act')=='reqjab')
	                            <th>Source</th>
	                            @endif
	                            <th >Status</th>
	                            <th >Lihat Detail</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach ($mrp as $mrps) 
							<tr>
								<td>{{$mrps->registry_number}}</td>
								@if(request('act')!='reqjab')
								<td>{{$mrps->pegawai->nip}}</td>
								<td>{{$mrps->pegawai->nama_pegawai}}</td>
								<td>
									<strong>{{$mrps->pegawai->formasi_jabatan->formasi}} {{$mrps->pegawai->formasi_jabatan->jabatan}}</strong>
									<br>{{$mrps->pegawai->formasi_jabatan->posisi}}<br>
									<strong>{{$mrps->pegawai->formasi_jabatan->personnel_area->nama_pendek}}</strong>
								</td>
								@endif
								<td>
									@if(isset($mrps->formasi_jabatan_id))
										<strong>{{$mrps->formasi_jabatan->formasi}} {{$mrps->formasi_jabatan->jabatan}}</strong>
										<br>{{$mrps->formasi_jabatan->posisi}}
										<br><strong>{{$mrps->formasi_jabatan->personnel_area->nama_pendek}}</strong>
									@else
										Perlu saran
									@endif
								</td>
								@if(request('act')=='reqjab')
	                            <td>Existing</td>
	                            @endif
								<td>
									@if($mrps->status == 1)
										<span class="label label-primary">Diajukan</span>
									@elseif($mrps->status == 2 || $mrps->status == 3 || ($mrps->status == 97 && $mrps->tipe != 1))
										<span class="label label-warning">Proses Evaluasi (Kantor Pusat)</span>
									@elseif($mrps->status == 4)
										<span class="label label-success">Proses SK</span>
									@elseif($mrps->status == 5)
										<span class="label label-success">SK Tercetak</span>
									@elseif($mrps->status == 6)
										<span class="label label-success">SK Pending</span>
									@elseif($mrps->status == 7)
										<span class="label label-success">Clear</span>
									@elseif($mrps->status == 99)
										<span class="label label-danger">Ditolak (SDM Pusat)</span>
									@elseif($mrps->status == 98)
										<span class="label label-danger">Ditolak (Karir II Pusat)</span>
									@elseif($mrps->status == 97 && $mrps->tipe == 1)
										<span class="label label-danger">Ditolak ({{ $mrps->pegawai->formasi_jabatan->personnel_area->nama_pendek }})</span>
									@else
										<span class="label label-danger">???</span>
									@endif
								</td>
								@if($mrps->tipe == 1)
									<td><a href="/status/detail/{{ $mrps->registry_number }}" class="btn btn-primary" target="_blank"><i class="fa fa-list"> Detail</i></a></td>
								@else
									<td><a href="/status/detail/{{ $mrps->registry_number }}" class="btn btn-primary" target="_blank"><i class="fa fa-list"> Detail</i></a></td>
								@endif
							</tr>
							
							@endforeach
	                    </tbody>
	                </table>
				{{-- </div> --}}
			</div>
			<!-- /panel content -->
		</div>
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

    <script>
    	$(".btnApprove").click(function(){
    		$("#reg_num").val($(this).val());
    	});

    	$(".btnDecline").click(function(e){
    		if(!confirm('Apakah anda yakin akan menolak permintaan mutasi ini?'))
    			e.preventDefault();
    	});
    </script>
    
    {{--<script>
    	function aprBtn(id){
    		$(".approve").val();
    		$.ajax({
				'url': '/status/approve/val',
				'type': 'post',
				'data': {
					'_token': '{{ csrf_token() }}',
					'id': id
				},
				'dataType': 'json',
				error: function(){

				},
				success: function(data){
					if(data)
					{
						$("tr#"+id).remove();
					}
				}
			});
    	})
    </script>--}}

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