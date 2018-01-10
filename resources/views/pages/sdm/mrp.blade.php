@extends('layouts.master')

@section('title', 'Tabel MRP')

@section('leftbar')
	@include('includes.sdm.leftbar')
@endsection

@section('includes-styles')
	@parent

	<link rel="stylesheet" href="/assets/plugins/handsontable/dist/handsontable.full.css">
@endsection

@section('content')
	<div id="content" class="dashboard padding-20">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong>Tabel MRP</strong> <!-- panel title -->
				</span>

				<!-- right options -->
				<ul class="options pull-right list-inline">
					<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand"></i></a></li>
				</ul>
				<!-- /right options -->

			</div>

			<!-- panel content -->
			<div class="panel-body">
				
				<div id="mrp-table"></div>
			</div>
		</div>
	</div>
@endsection

@section('includes-scripts')
	@parent

	<script src="/assets/plugins/handsontable/dist/handsontable.full.js"></script>
	<script>
		var
		  data = [
		    ['', 'Maserati', 'Mazda', 'Mercedes', 'Mini', 'Mitsubishi'],
		    ['2009', 0, 2941, 4303, 354, 5814],
		    ['2010', 3, 2905, 2867, 412, 5284],
		    ['2011', 4, 2517, 4822, 552, 6127],
		    ['2012', 2, 2422, 5399, 776, 4151]
		  ],
		  container = document.getElementById('mrp-table'),
		  hot;

		hot = new Handsontable(container, {
		  data: data,
		  minSpareRows: 1,
		  colHeaders: true,
		  contextMenu: true,
		  colHeaders: ['Pers. No','NIP','Nama Pegawai', 'Jenis Mutasi', 'Mutasi', 'Jalur Mutasi', 'No.Dokumen Mutasi', 'Tanggal Dokumen', 'Tanggal Pooling', 'Employee Group', 'Employee Subgroup', 'PS Group', 'Jenjang ID', 'Jenjang', 'Jenjang Sub ID', 'Jenjang Sub', 'Posisi Saat Ini', 'Posisi Pada Unit', 'SPFJ', '']
		});

	</script>
@endsection