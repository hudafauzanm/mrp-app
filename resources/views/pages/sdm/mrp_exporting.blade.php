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
						<td width="5">Registry Number</td>
						<td width="15">Status Proses</td>
						<td width="20">Fitur</td>
						<td width="12">Source</td>
						<td width="20">Jenis Mutasi</td>
						<td width="7">Mutasi</td>
						<td width="30">Jalur Mutasi (pengembangan)</td>
						<td width="30">Perner</td>
						<td width="50">NIP</td>
						<td width="10">Nama</td>
						<td width="10">PS Group</td>
						<td width="10">Tanggal Lahir</td>
						<td width="10">Sisa Masa Kerja</td>
						<td width="10">Sutri</td>
						<td width="10">NIP Sutri</td>
						<td width="10">Nama Sutri</td>
						<td width="10">Personnel Area Sutri</td>
						<td width="10">Status Evaluasi Sutri (pengembangan)</td>
						<td width="10">Diklat Penjenjangan</td>
						<td width="10">No. Sertifikat</td>
						<td width="10">Tgl. Sertifikat</td>
						<td width="10">Status Domisili</td>
						<td width="10">Masa Kerja Jab. Terakhir</td>
						<td width="10">No. Dokumen Mutasi</td>
						<td width="10">Tgl. Dokumen Mutasi</td>
						<td width="10">No. Dokumen Jawab</td>
						<td width="10">Tgl. Dokumen Jawab</td>
						<td width="10">Tgl. Evaluasi</td>
						<td width="10">Jenjang</td>
						<td width="10">SPFJ</td>
						<td width="10">Legacy Code</td>
						<td width="10">Company Code</td>
						<td width="10">Personnel Area</td>
						<td width="10">Formasi Jabatan</td>
						<td width="10">Posisi</td>
						<td width="10">Formasi Jabatan Tujuan</td>
						<td width="10">Posisi Tujuan</td>
						<td width="10">Jenjang Tujuan</td>
						<td width="10">SPFJ Tujuan</td>
						<td width="10">Legacy Code Tujuan</td>
						<td width="10">Company Code Tujuan</td>
						<td width="10">Personnel Area Tujuan</td>
						<td width="10">Tindak Lanjut</td>
						<td width="10">Tgl. Aktivasi</td>
						<td width="10">No. Dokumen Proses SK</td>
						<td width="10">Thn. STg</td>
						<td width="10">No. SK</td>
						<td width="10">No. STg</td>
						<td width="10">No. Dokumen Kirim SK</td>
						<td width="10">Tgl. Kirim SK.STg</td>
					</tr>
				</thead>
				<tbody >
				@foreach ($mrp_e1 as $mrp)
					<tr style="font-size: 10px; height: 140px;">
						<td valign="top">{{ $no++ }}</td>
					</tr>
				@endforeach

				</tbody>
				</table>
			
		</div>

	</body>
</html>