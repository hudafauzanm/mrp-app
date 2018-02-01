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
			<div class="col-md-4 margin-top-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">
							@foreach ($nama as $name)
							<h3 class="text-primary weight-600">SELAMAT DATANG {{auth()->user()->nama_pendek}}</h2>
							<h4 class="text-primary weight-400">Operator: {{$name->nama_pegawai}} - {{$nip}}</h4> 
							@endforeach
						</div>
					</div>
				</div>		
			</div>

			<div class="col-md-8">
				<div class="row margin-top-10">
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
			<div class="col-md-12">
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
								<ul class="nav nav-tabs nav-stacked"  style="font-size: 14px;">
									<li class="active">
										<a href="#tab_a" data-toggle="tab">
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
								<div class="tab-content slimscroll height-410"  data-slimscroll-visible="true" style="overflow-y: hidden;width:auto; ">
									<div id="tab_a" class="tab-pane active " style="width: auto; height: 415px;">
										Meminta pegawai adalah fitur MRP dimana anda dapat meminta pegawai dari unit lain untuk dimutasi ke unit anda.
										<h4>Tata Cara Meminta Pegawai</h4>
											<ol class=""  style="text-align: justify; font-size: 14px; " >
												<li>Pilih menu Meminta Pegawai pada side bar.</li>
												<li>Akan muncul halaman yang terbagi 2 sisi. Sisi kiri adalah form permintaan pegawai, sisi kanan adalah monitoring FTK unit anda.</li>
												<li>Masukkan NIP pegawai yang akan anda minta, apabila NIP nitemukan, maka informasi detail pegawai akan otomatis muncul.</li>
												<li>Masukkan data pengusul mutasi dan sertakan alasan anda meminta pegawai tersebut pada kolom alasan mutasi.</li>
												<li>Pilih jenis dan tipe mutasi yang sesuai.</li>
												<li>Isi tanggal aktifasi yang berisi perkiraan tanggal pegawai yang diminta untuk mulai aktif bekerja.</li>
												<li>Lengkapi data dokumen mutasi</li>
												<li>Selanjutnya upload dokumen mutasi tersebut <b>dalam format .pdf</b> dengan <b>maksimal file 10MB</b></li>
												<li>Pilih proyeksi jabatan pegawai yang diminta (opsional)</li>
												<li>Lalu Pilihlah tombol Kirim untuk mengirim semua data diatas.</li>
												<li>Jika permintaan mutasi berhasil dikirim maka akan muncul informasi detail mutasi anda.</li>
												<li>Jika data sudah benar klik tombol Kembali Ke Beranda untuk melakukan aktifitas lainnya.</li>
												<li>Anda dapat melihat status permintaan pegawai di menu Mutasi Diajukan > Permintaan Pegawai</li>
											</ol>

									</div>

									<div id="tab_b" class="tab-pane">
										Bursa pegawai adalah fitur MRP dimana anda dapat membursakan pegawai anda untuk dimutasi ke unit lain.
										<h4>Tata Cara Bursa Pegawai</h4>
											<ol style="text-align: justify; font-size: 14px; ">
												<li>Pilihlah Menu Bursa Pegawai pada side bar yang ada di kiri layar anda.</li>
												<li>Setelah masuk akan terdapat 2 panel yang dimana dibagian kiri untuk Memasukkn Data Bursa Pegawai dan dibagian kanan untuk memasukkan nilai pegawai.</li>
												<li>Berikutnya masukkan NIP untuk Pegawai yang akan anda minta,setelah itu data seperti Nama Pegawai,Personnel Area,Formasi Jabatan Pada,Masa Kerja,Lama Menjabat,Sisa Masa Kerja,Kali Jenjang</li>
												<li>Selanjutnya masukkan data pengusul mutasi dengan memasukkan NIP Pengusul,maka nama akan ikut muncul juga.</li>
												<li>Lalu masukkan alasan untuk memutasi pegawai yang diminta dengan mengisi kolom alasan.</li>
												<li>Selanjutnya memilih jenis mutasi yang sesuai lalu memilih tipe mutasi tersebut.</li>
												<li>Memasukkan nomer dokumen mutasi.</li>
												<li>Memasukkan tanggal sesuai dengan tanggal dokumen mutasi.</li>
												<li>Selanjutnya upload dokumen mutasi tersebut dalam format .pdf dengan maksimal file 10MB.</li>
												<li>Lalu jika ada rekomendasi jabatan ,maka pilih ya dan pilih unit mana akan di rekomendasikan jabatannya</li>
												<li>Dibagian panel kanan terdapat nilai pegawai</li>
												<li>Masukkan skor nilai dari range 1 sampai 100 disetiap Key Competences</li>
												<li>Berikutnya masukkan skor nilai dari range 1 sampai 100 disetiap Kompetensi Harian
												<small>*buat bahasa yang ketiga pilih salah satu mana yang dikuasi dengan skor tertinggi bila tidak ada bahasa yang sesuai dengan 
												yang disediakan maka masukkan bahasa yang anda inginkan</small></li>
												<li>Selanjutnya masukkan penilaian Internal Readiness,Externall Readiness ,Hubungan dengan Rekan Kerja,Hubungan dengan Sesama.</li>
												<li>Jika data berhasil terkirim maka anda akan dikirim sebuah invoice dari data yang telah dimasukkan tadi.</li>
												<li>Jika data sudah benar klik tombol Kembali Ke Beranda untuk melakukan aktifitas lainnya.</li>
												<li>Terima Kasih</li>
											</ol>
									</div>

									<div id="tab_c" class="tab-pane">
										<h4>Tata Cara Bursa Jabatan</h4>
											<ol style="text-align: justify; font-size: 14px; ">
												<li>Pilihlah Menu Bursa Jabatan pada side bar yang ada di kiri layar anda.</li>
												<li>Setelah masuk akan terdapat 2 panel yang dimana dibagian kiri untuk Memasukkan Data Mutasi dan dibagian kanan untuk memonitoring Pagu Unit Anda.</li>
												<li>Berikutnya nama Unit Anda sudah otomatis tercantumkan.</li>
												<li>Lalu Pilih Formasi yang kosong pada Unit anda.</li>
												<li>Maka Jabatan pada Formasi yang anda pilih akan tersedia di field Jabatan,Pilihlah salah satunya.</li>
												<li>Lalu Jenjang,Posisi,SPFJ dan Legacy Code akan muncul sesuai dengan Formasi Jabatan yang dipilih.</li>
												<li>Selanjutnya masukkan data pengusul mutasi dengan memasukkan NIP Pengusul,maka nama akan ikut muncul juga.</li>
												<li>Pilihkan source dari yang diinginkan untuk mengisi jabatan tersebut <small><strong>*untuk saat ini masih ada existing</strong></small></li>
												<li>Selanjutnya pilih jumlah pegawai yang dibutuhkan untuk mengisi jabatan tersebut.</li>
												<li>Mengisi Tanggal Aktifasi untuk memberi kapan waktu Pegawai yang diminta untuk mulai aktif bekerja.</li>
												<li>Memasukkan nomor dokumen mutasi yang sesuai.</li>
												<li>Memasukkan tanggal sesuai dengan tanggal dokumen mutasi.</li>
												<li>Selanjutnya upload dokumen mutasi tersebut dalam format .pdf dengan maksimal file 10MB.</li>
												<li>Lalu Pilihlah tombol Kirim untuk mengirim semua data diatas.</li>
												<li>Jika data berhasil terkirim maka anda akan dikirim sebuah invoice dari data yang telah dimasukkan tadi.</li>
												<li>Jika data sudah benar klik tombol Kembali Ke Beranda untuk melakukan aktifitas lainnya.</li>
												<li>Terima Kasih</li>
											</ol>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			{{-- <div class="col-md-4">
				<div id="panelHelp" class="panel panel-default">
					<div class="panel-heading">
						<span class="elipsis"><!-- panel title -->
							<strong>PAGU UNIT</strong>
						</span>
						<ul class="options pull-right list-inline">
							<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
						</ul>

					</div>

					<div class="panel-body" style="height: 445px">
						<div class="row">
							<div class="col-md-6" style="height: 300px">
								<h4 style="text-align: center;color: red;"><strong> JABATAN KOSONG</strong></h4>
							</div>
							<div class="col-md-6" style="height: 300px">
								<h4 class="text-primary" style="text-align: center"><strong>JABATAN TERISI</strong></h4>
							</div>
						</div>

					</div>
				</div>
			</div> --}}
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