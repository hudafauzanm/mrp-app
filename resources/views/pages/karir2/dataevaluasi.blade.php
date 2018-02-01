<!doctype html>
<html>
	<head>
		<link href="{{ base_path() }}/public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
	    <link href="{{ base_path() }}/public/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" /> 
	    <link href="{{ base_path() }}/public/assets/css/dataeval.css" rel="stylesheet" type="text/css" /> 
	</head>
	<body>
		<div>
			<p>Data Evaluasi Mutasi, {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l j F Y h:i:s A') }}</p>
			<table>
				<thead>
					<tr class="tbl-head">
						<td width="5">No</td>
						<td width="15">No. Surat Nota Dinas</td>
						<td width="20">Registry Number</td>
						<td width="12">NIP</td>
						<td width="20">Nama Pegawai</td>
						<td width="7">PS GROUP</td>
						<td width="30">Jabatan Lama</td>
						<td width="30">Jabatan Baru</td>
						<td width="50">Evaluasi dan Tindak Lanjut</td>
						<td width="10">Konfirmasi</td>
					</tr>
				</thead>
				<tbody >
				@foreach ($mrp_e1 as $mrp)
					<tr style="font-size: 10px; height: 150px;">
					<td valign="top">{{ $no++ }}</td>
					<td valign="top">
						{{$mrp->no_dokumen_unit_usul}} <br>
						@if ($mrp->no_dokumen_unit_jawab)
							{{$mrp->no_dokumen_unit_jawab}} <br>
						@endif
						{{$mrp->no_dokumen_respon_sdm}} <br>
					</td>
					<td valign="top">{{$mrp->registry_number}} <!-- registry number --></td>
					<td valign="top">{{$mrp->pegawai->nip}} <!-- nip pegawai --></td>
					<td valign="top">{{$mrp->pegawai->nama_pegawai}} <!-- nama pegawai --></td>
					<td valign="top">{{$mrp->pegawai->ps_group}} <!-- ps group --></td>
					<td valign="top">{{$mrp->pegawai->formasi_jabatan->formasi}} {{$mrp->pegawai->formasi_jabatan->jabatan}} <br>{{$mrp->pegawai->formasi_jabatan->posisi}}<br> <!-- jabatan lama --></td>
					<td valign="top">{{ $mrp->formasi_jabatan->formasi}} {{ $mrp->formasi_jabatan->jabatan}} <br> {{ $mrp->formasi_jabatan->posisi}}<br> <!-- jabatan baru --></td>
					<!-- evaluasi dan tindak lanjut -->
					<td valign="top">
						Sisa Masa Kerja : 6 Tahun ;<br>
						Masa Kerja di Jabatan Terakhir : s.d. 1 Tahun<br>
						Mutasi : {{$mrp->jenis_mutasi}} ({{$mrp->mutasi}})<br>
						Alasan Mutasi : {{$mrp->alasan_mutasi}}<br>
						Diklat Penjenjangan Terakhir : {{ App\DiklatPenjenjangan::where('pegawai_id', $mrp->pegawai->id)->pluck('jenis_diklat')->first() }} ;<br>
						No. Sertifikat : {{ App\DiklatPenjenjangan::where('pegawai_id', $mrp->pegawai->id)->pluck('nomor_sertifikat')->first() }}<br>
						Jalur Mutasi : {{ $mrp->jalur_mutasi }}<br>
						PERDIR Formasi Jabatan untuk Unit yang dituju : {{ $mrp->formasi_jabatan->spfj}}<br>
						Letak Domisili dengan Unit Mutasi: {{ $mrp->pegawai->status_domisili}}<br>
						Suami/Istri :
							@if(isset($mrp->pegawai->nip_sutri))
								PLN ; {{ \App\Pegawai::where('nip', $mrp->pegawai->nip_sutri)->pluck('nip')->first() }} ; {{ $mrp->pegawai->formasi_jabatan->personnel_area->nama_pendek}}
							@else
								Non-PLN ; N/A ; N/A
							@endif<br>
						Tindaklanjut : {{ $mrp->tindak_lanjut}}<br>
						Tanggal Aktivasi : {{ $mrp->requested_tgl_aktivasi->format('d F Y') }}<br>
					</td>
					

					<td></td>
					</tr>
				@endforeach

				</tbody>
			</table>

			<table style="border: 0">
				<tbody >
					<tr style="height: 50px; text-align: center;">
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 1px solid #000000">DIRHCM</td>
						<td style="border: 1px solid #000000"></td>
						<td style="border: 0"></td>
					</tr>
					<tr style="height: 50px; text-align: center">
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 1px solid #000000">KADIV TLN</td>
						<td style="border: 1px solid #000000"></td>
						<td style="border: 0"></td>
					</tr>
					<tr style="height: 50px; text-align: center">
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 0"></td>
						<td style="border: 1px solid #000000">MS</td>
						<td style="border: 1px solid #000000"></td>
						<td style="border: 0"></td>
					</tr>
				</tbody>
			</table>
			
		</div>

	</body>
</html>