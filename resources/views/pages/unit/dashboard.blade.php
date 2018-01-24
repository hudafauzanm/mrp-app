@extends('layouts.master')

@section('title', 'Beranda')

@section('leftbar')
	@include('includes.unit.leftbar')
@endsection

@section('content')
	<div id="content" class="dashboard padding-20">
		<!-- 
			PANEL CLASSES:
				panel-default
				panel-danger
				panel-warning
				panel-info
				panel-success

			INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
					All pannels should have an unique ID or the panel collapse status will not be stored!
		-->
		<div class="row">
			<div class="col-md-6 margin-top-30">
				<div class="text-center">
					@foreach ($nama as $name)
					<h2 class="text-primary weight-600">Selamat Datang {{auth()->user()->nama_pendek}}</h2>
					<h4 class="text-primary weight-400">Operator: {{$name->nama_pegawai}} - {{$nip}}</h4> 
					@endforeach
				</div>
					
			</div>

			<div class="col-md-6">
				<div class="row margin-top-20">
					<div class="col-md-4">
						<div class="box success"><!-- default, danger, warning, info, success -->
							
							<div class="box-title"><!-- add .noborder class if box-body is removed -->
								<h4>{{$ajumut}} Pengajuan Pegawai</h4>
								<small class="block">periksa tindak lanjut</small>
								<i class="fa fa-exclamation"></i>
							</div>

							<div class="box-body text-center">
								<a href="/status?act=req" class="btn btn-3d btn-leaf margin-top-6">
									<i class="fa fa-arrow-circle-right"></i> Lihat Mutasi Diajukan
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box default"><!-- default, danger, warning, info, success -->

							<div class="box-title"><!-- add .noborder class if box-body is removed -->
								<h4>{{$ajumutj}} Pengajuan Jabatan</h4>
								<small class="block">periksa tindak lanjut</small>
								<i class="fa fa-exclamation"></i>
							</div>

							<div class="box-body text-center">
								<a href="/status?act=reqjab" class="btn btn-3d btn-leaf margin-top-6">
									<i class="fa fa-arrow-circle-left"></i> Lihat Mutasi Diajukan
								</a>
							</div>

						</div>
					</div>
					<div class="col-md-4">
						<div class="box info"><!-- default, danger, warning, info, success -->

							<div class="box-title"><!-- add .noborder class if box-body is removed -->
								<h4>{{$dptmut}} Permintaan Mutasi</h4>
								<small class="block">berikan respon</small>
								<i class="fa fa-exclamation"></i>
							</div>

							<div class="box-body text-center">
								<a href="/status?act=res" class="btn btn-3d btn-leaf margin-top-6">
									<i class="fa fa-arrow-circle-left"></i> Lihat Mutasi Diterima
								</a>
							</div>

						</div>
					</div>
				</div>
				
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div id="panelHelp" class="panel panel-default">
					<div class="panel-heading">
						<span class="elipsis"><!-- panel title -->
							<strong>PETUNJUK PENGGUNAAN</strong>
						</span>
						<ul class="options pull-right list-inline">
							<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
						</ul>

					</div>

					<div class="panel-body">
						<div class="row tabs nomargin">
							<!-- tabs -->
							<div class="col-md-3 col-sm-3 nopadding-right nopadding-left">
								<ul class="nav nav-tabs nav-stacked">
									<li class="active">
										<a href="#tab_a" data-toggle="tab">
											<span class="badge badge-warning pull-right">3</span>
											Meminta Pegawai
										</a>
									</li>
									<li>
										<a href="#tab_b" data-toggle="tab">
											Membursakan Pegawai
										</a>
									</li>
									<li>
										<a href="#tab_c" data-toggle="tab">
											Membursakan Jabatan
										</a>
									</li>
								</ul>
							</div>

							<!-- tabs content -->
							<div class="col-md-9 col-sm-9 nopadding-right nopadding-left">
								<div class="tab-content">
									<div id="tab_a" class="tab-pane active">
										<h4>Stacked left</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Ut enim massa, sodales tempor convallis et, iaculis ac massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Ut enim massa, sodales tempor convallis et, iaculis ac massa.</p>
									</div>

									<div id="tab_b" class="tab-pane">
										<h4>Stacked left</h4>
										<p>Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Ut enim massa, sodales tempor convallis et, iaculis ac massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									</div>

									<div id="tab_c" class="tab-pane">
										<h4>Stacked left</h4>
										<p>Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Ut enim massa, sodales tempor convallis et, iaculis ac massa.</p>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div id="panelHelp" class="panel panel-default">
					<div class="panel-heading">
						<span class="elipsis"><!-- panel title -->
							<strong>PETUNJUK PENGGUNAAN</strong>
						</span>
						<ul class="options pull-right list-inline">
							<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
						</ul>

					</div>

					<div class="panel-body">
						<div class="row tabs nomargin">
							<!-- tabs -->
							<div class="col-md-3 col-sm-3 nopadding-right nopadding-left">
								<ul class="nav nav-tabs nav-stacked">
									<li class="active">
										<a href="#tab_d" data-toggle="tab">
											<span class="badge badge-warning pull-right">3</span>
											Meminta Pegawai
										</a>
									</li>
									<li>
										<a href="#tab_e" data-toggle="tab">
											Membursakan Pegawai
										</a>
									</li>
									<li>
										<a href="#tab_f" data-toggle="tab">
											Membursakan Jabatan
										</a>
									</li>
								</ul>
							</div>

							<!-- tabs content -->
							<div class="col-md-9 col-sm-9 nopadding-right nopadding-left">
								<div class="tab-content">
									<div id="tab_d" class="tab-pane active">
										<h4>Stacked left</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Ut enim massa, sodales tempor convallis et, iaculis ac massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Ut enim massa, sodales tempor convallis et, iaculis ac massa.</p>
									</div>

									<div id="tab_e" class="tab-pane">
										<h4>Stacked left</h4>
										<p>Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Ut enim massa, sodales tempor convallis et, iaculis ac massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									</div>

									<div id="tab_f" class="tab-pane">
										<h4>Stacked left</h4>
										<p>Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Ut enim massa, sodales tempor convallis et, iaculis ac massa.</p>
									</div>
								</div>
							</div>

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
	/* 
		Toastr Notification On Load 

		TYPE:
			primary
			info
			error
			success
			warning

		POSITION
			top-right
			top-left
			top-center
			top-full-width
			bottom-right
			bottom-left
			bottom-center
			bottom-full-width
			
		false = click link (example: "http://www.stepofweb.com")
	*/
	// _toastr("Welcome, you have 2 new orders","top-right","success",false);




	/** SALES CHART
	******************************************* **/
	loadScript(plugin_path + "chart.flot/jquery.flot.min.js", function(){
		loadScript(plugin_path + "chart.flot/jquery.flot.resize.min.js", function(){
			loadScript(plugin_path + "chart.flot/jquery.flot.time.min.js", function(){
				loadScript(plugin_path + "chart.flot/jquery.flot.fillbetween.min.js", function(){
					loadScript(plugin_path + "chart.flot/jquery.flot.orderBars.min.js", function(){
						loadScript(plugin_path + "chart.flot/jquery.flot.pie.min.js", function(){
							loadScript(plugin_path + "chart.flot/jquery.flot.tooltip.min.js", function(){

								if (jQuery("#flot-sales").length > 0) {

									/* DEFAULTS FLOT COLORS */
									var $color_border_color = "#eaeaea",		/* light gray 	*/
										$color_second 		= "#5a6667";		/* blue      	*/


									var d = [
										[1196463600000, 0], [1196550000000, 0], [1196636400000, 0], [1196722800000, 77], [1196809200000, 3636], [1196895600000, 3575], [1196982000000, 2736], [1197068400000, 1086], [1197154800000, 676], [1197241200000, 1205], [1197327600000, 906], [1197414000000, 710], [1197500400000, 639], [1197586800000, 540], [1197673200000, 435], [1197759600000, 301], [1197846000000, 575], [1197932400000, 481], [1198018800000, 591], [1198105200000, 608], [1198191600000, 459], [1198278000000, 234], [1198364400000, 4568], [1198450800000, 686], [1198537200000, 4122], [1198623600000, 449], [1198710000000, 468], [1198796400000, 392], [1198882800000, 282], [1198969200000, 208], [1199055600000, 229], [1199142000000, 177], [1199228400000, 374], [1199314800000, 436], [1199401200000, 404], [1199487600000, 544], [1199574000000, 500], [1199660400000, 476], [1199746800000, 462], [1199833200000, 500], [1199919600000, 700], [1200006000000, 750], [1200092400000, 600], [1200178800000, 500], [1200265200000, 900], [1200351600000, 930], [1200438000000, 1200], [1200524400000, 980], [1200610800000, 950], [1200697200000, 900], [1200783600000, 1000], [1200870000000, 1050], [1200956400000, 1150], [1201042800000, 1100], [1201129200000, 1200], [1201215600000, 1300], [1201302000000, 1700], [1201388400000, 1450], [1201474800000, 1500], [1201561200000, 1510], [1201647600000, 1510], [1201734000000, 1510], [1201820400000, 1700], [1201906800000, 1800], [1201993200000, 1900], [1202079600000, 2000], [1202166000000, 2100], [1202252400000, 2200], [1202338800000, 2300], [1202425200000, 2400], [1202511600000, 2550], [1202598000000, 2600], [1202684400000, 2500], [1202770800000, 2700], [1202857200000, 2750], [1202943600000, 2800], [1203030000000, 3245], [1203116400000, 3345], [1203202800000, 3000], [1203289200000, 3200], [1203375600000, 3300], [1203462000000, 3400], [1203548400000, 3600], [1203634800000, 3700], [1203721200000, 3800], [1203807600000, 4000], [1203894000000, 4500]];
								
									for (var i = 0; i < d.length; ++i) {
										d[i][0] += 60 * 60 * 1000;
									}
								
									var options = {

										xaxis : {
											mode : "time",
											tickLength : 5
										},

										series : {
											lines : {
												show : true,
												lineWidth : 1,
												fill : true,
												fillColor : {
													colors : [{
														opacity : 0.1
													}, {
														opacity : 0.15
													}]
												}
											},
										   //points: { show: true },
											shadowSize : 0
										},

										selection : {
											mode : "x"
										},

										grid : {
											hoverable : true,
											clickable : true,
											tickColor : $color_border_color,
											borderWidth : 0,
											borderColor : $color_border_color,
										},

										tooltip : true,

										tooltipOpts : {
											content : "Sales: %x <span class='block'>$%y</span>",
											dateFormat : "%y-%0m-%0d",
											defaultTheme : false
										},

										colors : [$color_second],
								
									};
								
									var plot = jQuery.plot(jQuery("#flot-sales"), [d], options);
								}

							});
						});
					});
				});
			});
		});
	});
	</script>
@endsection