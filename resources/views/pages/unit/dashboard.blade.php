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
												<li>Pilih menu Bursa Pegawai pada side bar yang ada di kiri layar anda.</li>
												<li>Akan muncul halaman yang terbagi 2 sisi. Sisi kiri adalah form bursa pegawai, sisi kanan adalah penilaian untuk pegawai tersebut.</li>
												<li>Masukkan NIP pegawai yang akan anda bursakan, apabila NIP ditemukan, maka informasi detail pegawai akan otomatis muncul.</li>
												<li>Masukkan data pengusul mutasi dan sertakan alasan anda membursakan pegawai tersebut pada kolom alasan mutasi.</li>
												<li>Lalu masukkan alasan untuk memutasi pegawai yang diminta dengan mengisi kolom alasan.</li>
												<li>Selanjutnya memilih jenis mutasi yang sesuai lalu memilih tipe mutasi tersebut.</li>
												<li>Lengkapi data dokumen mutasi.</li>
												<li>Selanjutnya upload dokumen mutasi tersebut <b>dalam format .pdf</b> dengan <b>maksimal file 10MB</b></li>
												<li>Pilih proyeksi unit dan jabatan pegawai (opsional)</li>
												<li>Dibagian panel kanan terdapat nilai pegawai</li>
												<li>Masukkan skor nilai dari range 1 sampai 100 disetiap Key Competences</li>
												<li>Berikutnya masukkan skor nilai dari range 1 sampai 100 disetiap Kompetensi Harian
												<small>*untuk bahasa yang ketiga pilih salah satu mana yang dikuasi dengan skor tertinggi bila tidak ada bahasa yang sesuai dengan 
												yang disediakan maka masukkan bahasa yang anda inginkan</small></li>
												<li>Selanjutnya lengkapi bagian deskripsi penilaian.</li>
												<li>Jika permintaan mutasi berhasil dikirim maka akan muncul informasi detail mutasi anda.</li>
												<li>Jika data sudah benar klik tombol Kembali Ke Beranda untuk melakukan aktifitas lainnya.</li>
												<li>Anda dapat melihat status permintaan pegawai di menu Mutasi Diajukan > Pengajuan Pegawai.</li>
											</ol>
									</div>

									<div id="tab_c" class="tab-pane">
										Bursa jabatan adalah fitur MRP dimana anda dapat membursakan jabatan kosong di unit anda untuk diisi.
										<h4>Tata Cara Bursa Jabatan</h4>
											<ol style="text-align: justify; font-size: 14px; ">
												<li>Pilih menu Bursa Pegawai pada side bar yang ada di kiri layar anda.</li>
												<li>Akan muncul halaman yang terbagi 2 sisi. Sisi kiri adalah form permintaan pegawai, sisi kanan adalah monitoring FTK unit anda.</li>
												<li>Isilah formasi jabatan yang akan dibursakan.</li>
												<li>Pastikan informasi terkait mengenai formasi jabatan tersebut akan muncul secara otomatis.</li>
												<li>Masukkan data pengusul mutasi dan sertakan alasan membursakan jabatan tersebut pada kolom alasan mutasi.</li>
												<li>Pilihkan source dari yang diinginkan untuk mengisi jabatan tersebut <small><strong>*untuk saat ini hanya ada existing</strong></small></li>
												<li>Selanjutnya pilih jumlah pegawai yang dibutuhkan untuk mengisi jabatan tersebut.</li>
												<li>Isi perkiraan Tanggal Aktifasi untuk merequest kapan waktu jabatan yang dibursakan mulai diisi.</li>
												<li>Lengkapi data dokumen mutasi.</li>
												<li>Selanjutnya upload dokumen mutasi tersebut <b>dalam format .pdf</b> dengan <b>maksimal file 10MB</b></li>
												<li>Lalu Pilihlah tombol Kirim untuk mengirim semua data diatas.</li>
												<li>Jika permintaan mutasi berhasil dikirim maka akan muncul informasi detail mutasi anda.</li>
												<li>Jika data sudah benar klik tombol Kembali Ke Beranda untuk melakukan aktifitas lainnya.</li>
												<li>Anda dapat melihat status permintaan pegawai di menu Mutasi Diajukan > Pengajuan Pegawai.</li>
											</ol>
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
