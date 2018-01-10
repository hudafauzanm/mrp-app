@extends('layouts.master')

@section('title', 'Tabel MRP')

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
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover dataTable js-exportable" id="mrpTable">
	                    <thead>
	                        <tr>
	                            {{-- <th>Registry Number</th> --}}
	                            <th>NIP</th>
	                            <th>Nama</th>
	                            <th>Tipe</th>
	                            <th>Status</th>
	                            <th>Posisi & Unit Asal</th>
	                            <th>Posisi & Unit Tujuan</th>
	                            <th></th>
	                        </tr>
	                    </thead>
	                    <tfoot>
	                        <tr>
	                            {{-- <th>Registry Number</th> --}}
	                            <th>NIP</th>
	                            <th>Nama</th>
	                            <th>Tipe</th>
	                            <th>Status</th>
	                            <th>Posisi & Unit Asal</th>
	                            <th>Posisi & Unit Tujuan</th>
	                            <th></th>
	                        </tr>
	                    </tfoot>
	                    <tbody>
	                        <tr>
	                            <td>8007317Z</td>
	                            <td>NOOR RAHMANIA</td>
	                            <td>I</td>
	                            <td><span class="label label-info">Verifikasi SDM</span></td>
	                            <td>ANALYST PERENCANAAN PINJAMAN DAN HIBAH LUAR NEGERI (PLT DEPUTI MANAJERADMINISTRASI PERENCANAAN PINJAMAN DAN HIBAH LUAR NEGERI)SUB BIDANG ADMINISTRASI PERENCANAAN PINJAMAN DAN HIBAH LUAR NEGERI BIDANG PERENCANAAN PINJAMAN DAN HIBAH LUAR NEGERI DIVISI PERENCANAAN KORPORAT DIREKTORAT PERENCANAAN KORPORAT PT PLN (PERSERO) KANTOR PUSAT</td>
	                            <td>DEPUTI MANAJER ADMINISTRASI PERENCANAAN PINJAMAN DAN HIBAH LUAR NEGERI BIDANG PERENCANAAN PINJAMAN DAN HIBAH LUAR NEGERI DIVISI PERENCANAAN KORPORAT DIREKTORAT PERENCANAAN KORPORAT PT PLN (PERSERO) KANTOR PUSAT</td>
	                            <td>
		                            <button class="btn btn-xs btn-blue"><i class="fa fa-edit"></i> Edit</button>
		                            <br>
		                            <button class="btn btn-xs btn-red"><i class="fa fa-trash"></i> Hapus</button>
		                            <br>
		                            <button class="btn btn-xs btn-green" data-toggle="modal" data-target="#detailModal"><i class="fa fa-list"></i> Detail</button>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>7292109M</td>
	                            <td>RASTITO</td>
	                            <td>II</td>
	                            <td><span class="label label-warning">Pending - Karir II</span></td>
	                            <td>ANALYST ANGGARAN (PLT DEPUTI MANAJER ANGGARAN 2) SUB BIDANG ANGGARAN 2 BIDANG ANGGARAN II DIVISI ANGGARAN DIREKTORAT KEUANGAN PT PLN (PERSERO) KANTOR PUSAT</td>
	                            <td>DEPUTI MANAJER ANGGARAN 2 BIDANG ANGGARAN II DIVISI ANGGARAN DIREKTORAT KEUANGAN PT PLN (PERSERO) KANTOR PUSAT</td>
	                            <td>
	                            	<button class="btn btn-xs btn-blue"><i class="fa fa-edit"></i> Edit</button>
		                            <br>
		                            <button class="btn btn-xs btn-red"><i class="fa fa-trash"></i> Hapus</button>
		                            <br>
		                            <button class="btn btn-xs btn-green" data-toggle="modal" data-target="#detailModal"><i class="fa fa-list"></i> Detail</button>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>7502017F</td>
	                            <td>WILLIAM RANDA KASOA</td>
	                            <td>III</td>
	                            <td><span class="label label-warning">Pending - Unit Tujuan</span></td>
	                            <td>DEPUTI MANAJER SISTEM PROTEKSI DAN SCADATEL BIDANG TRANSMISI DAN DISTRIBUSI PT PLN (PERSERO) WILAYAH SULUTTENGGO</td>
	                            <td>DEPUTI MANAJER PERENCANAAN REGIONAL BIDANG PERENCANAAN DAN PENGENDALIAN REGIONAL SULAWESI DAN NUSA TENGGARA DIVISI PENGEMBANGAN REGIONAL SULAWESI DAN NUSA TENGGARA DIREKTORAT BISNIS REGIONAL SULAWESI DAN NUSA TENGGARA PT PLN (PERSERO) KANTOR PUSAT</td>
	                            <td>
	                            	<button class="btn btn-xs btn-blue"><i class="fa fa-edit"></i> Edit</button>
		                            <br>
		                            <button class="btn btn-xs btn-red"><i class="fa fa-trash"></i> Hapus</button>
		                            <br>
		                            <button class="btn btn-xs btn-green" data-toggle="modal" data-target="#detailModal"><i class="fa fa-list"></i> Detail</button>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>8306665Z</td>
	                            <td>MOHAMAD ISWANDI</td>
	                            <td>I</td>
	                            <td><span class="label label-success">Cetak SK</span></td>
	                            <td>ASSISTANT ANALYST PENGEMBANGAN SISTEM MANAJEMEN KINERJA PEGAWAI BIDANG MANAJEMEN KINERJA PEGAWAI DIVISI HUMAN CAPITAL MANAGEMENT SYSTEM DIREKTORAT HUMAN CAPITAL MANAGEMENT PT PLN (PERSERO) KANTOR PUSAT</td>
	                            <td>ASSISTANT ANALYST PEMASARAN DAN PELAYANAN PELANGGAN SEKSI PELAYANAN PELANGGAN BAGIAN PELAYANAN DAN ADMINISTRASI AREA DEPOK PT PLN (PERSERO) DISTRIBUSI JAWA BARAT</td>
	                            <td>
	                            	<button class="btn btn-xs btn-blue"><i class="fa fa-edit"></i> Edit</button>
		                            <br>
		                            <button class="btn btn-xs btn-red"><i class="fa fa-trash"></i> Hapus</button>
		                            <br>
		                            <button class="btn btn-xs btn-green" data-toggle="modal" data-target="#detailModal"><i class="fa fa-list"></i> Detail</button>
	                            </td>
	                        </tr>
	                    </tbody>
	                </table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true" id="detailModal">
		<div class="modal-dialog modal-full">
			<div class="modal-content">

				<!-- header modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="detailModalLabel">7292109M.Promosi.151666020202_151666020202 | <span class="label label-warning">Pending - Karir II</span></h4>
				</div>

				<!-- body modal -->
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<h1 class="text-center">Pegawai</h1>
							<table id="user" class="table table-bordered table-striped">
								<tbody> 
									<tr>         
										<td width="35%">Simple text field</td>
										<td width="65%"><a href="#" id="username" data-type="text" data-pk="1" data-title="Enter username">superuser</a></td>
									</tr>
									<tr>         
										<td>Empty text field, required</td>
										<td><a href="#" id="firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname"></a></td>
									</tr>  
									<tr>         
										<td>Select, local array, custom display</td>
										<td><a href="#" id="sex" data-type="select" data-pk="1" data-value="" data-title="Select sex"></a></td>
									</tr>
									<tr>         
										<td>Select, remote array, no buttons</td>
										<td><a href="#" id="group" data-type="select" data-pk="1" data-value="5" data-source="/groups" data-title="Select group">Admin</a></td>
									</tr> 
									<tr>         
										<td>Select, error while loading</td>
										<td><a href="#" id="status" data-type="select" data-pk="1" data-value="0" data-source="/status" data-title="Select status">Active</a></td>
									</tr>  
										 
									<tr>         
										<td>Datepicker</td>
										<td>
										
										<span><a href="#" id="vacation" data-type="date" data-viewformat="dd.mm.yyyy" data-pk="1" data-placement="right" data-original-title="When you want vacation to start?">29.06.2014</a></span>
											
										</td>
									</tr>
									<tr>         
										<td>Combodate (date)</td>
										<td><a href="#" id="dob" data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1"  data-title="Select Date of birth"></a></td>
									</tr> 
									<tr>         
										<td>Combodate (datetime)</td>
										<td><a href="#" id="event" data-type="combodate" data-template="D MMM YYYY  HH:mm" data-format="YYYY-MM-DD HH:mm" data-viewformat="MMM D, YYYY, HH:mm" data-pk="1"  data-title="Setup event date and time"></a></td>
									</tr> 

									<tr>         
										<td>Textarea, buttons below. Submit by <i>ctrl+enter</i></td>
										<td><a href="#" id="comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments">awesome user!</a></td>
									</tr> 

									<tr>         
										<td>Twitter typeahead.js</td>
										<td><a href="#" id="state2" data-type="typeaheadjs" data-pk="1" data-placement="right" data-title="Start typing State.."></a></td>
									</tr>                       

									<tr>         
										<td>Checklist</td>
										<td><a href="#" id="fruits" data-type="checklist" data-value="2,3" data-title="Select fruits"></a></td>
									</tr>

									<tr>         
										<td>Select2 (tags mode)</td>
										<td><a href="#" id="tags" data-type="select2" data-pk="1" data-title="Enter tags">html, javascript</a></td>
									</tr>                    

									<tr>         
										<td>Select2 (dropdown mode)</td>
										<td><a href="#" id="country" data-type="select2" data-pk="1" data-value="BS" data-title="Select country"></a></td>
									</tr>  
									
									<tr>         
										<td>Custom input, several fields</td>
										<td><a href="#" id="address" data-type="address" data-pk="1" data-title="Please, fill address"></a></td>
									</tr>

								</tbody>
							</table>

						</div>

						<div class="col-md-6">
							<h1 class="text-center">Sutri</h1>
							<table id="user" class="table table-bordered table-striped">
								<tbody> 
									<tr>         
										<td width="35%">Simple text field</td>
										<td width="65%"><a href="#" id="username" data-type="text" data-pk="1" data-title="Enter username">superuser</a></td>
									</tr>
									<tr>         
										<td>Empty text field, required</td>
										<td><a href="#" id="firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname"></a></td>
									</tr>  
									<tr>         
										<td>Select, local array, custom display</td>
										<td><a href="#" id="sex" data-type="select" data-pk="1" data-value="" data-title="Select sex"></a></td>
									</tr>
									<tr>         
										<td>Select, remote array, no buttons</td>
										<td><a href="#" id="group" data-type="select" data-pk="1" data-value="5" data-source="/groups" data-title="Select group">Admin</a></td>
									</tr> 
									<tr>         
										<td>Select, error while loading</td>
										<td><a href="#" id="status" data-type="select" data-pk="1" data-value="0" data-source="/status" data-title="Select status">Active</a></td>
									</tr>  
										 
									<tr>         
										<td>Datepicker</td>
										<td>
										
										<span><a href="#" id="vacation" data-type="date" data-viewformat="dd.mm.yyyy" data-pk="1" data-placement="right" data-original-title="When you want vacation to start?">29.06.2014</a></span>
											
										</td>
									</tr>
									<tr>         
										<td>Combodate (date)</td>
										<td><a href="#" id="dob" data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1"  data-title="Select Date of birth"></a></td>
									</tr> 
									<tr>         
										<td>Combodate (datetime)</td>
										<td><a href="#" id="event" data-type="combodate" data-template="D MMM YYYY  HH:mm" data-format="YYYY-MM-DD HH:mm" data-viewformat="MMM D, YYYY, HH:mm" data-pk="1"  data-title="Setup event date and time"></a></td>
									</tr> 

									<tr>         
										<td>Textarea, buttons below. Submit by <i>ctrl+enter</i></td>
										<td><a href="#" id="comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments">awesome user!</a></td>
									</tr> 

									<tr>         
										<td>Twitter typeahead.js</td>
										<td><a href="#" id="state2" data-type="typeaheadjs" data-pk="1" data-placement="right" data-title="Start typing State.."></a></td>
									</tr>                       

									<tr>         
										<td>Checklist</td>
										<td><a href="#" id="fruits" data-type="checklist" data-value="2,3" data-title="Select fruits"></a></td>
									</tr>

									<tr>         
										<td>Select2 (tags mode)</td>
										<td><a href="#" id="tags" data-type="select2" data-pk="1" data-title="Enter tags">html, javascript</a></td>
									</tr>                    

									<tr>         
										<td>Select2 (dropdown mode)</td>
										<td><a href="#" id="country" data-type="select2" data-pk="1" data-value="BS" data-title="Select country"></a></td>
									</tr>  
									
									<tr>         
										<td>Custom input, several fields</td>
										<td><a href="#" id="address" data-type="address" data-pk="1" data-title="Please, fill address"></a></td>
									</tr>

								</tbody>
							</table>

						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h1 class="text-center">Mutasi</h1>
							<table id="user" class="table table-bordered table-striped">
								<tbody> 
									<tr>         
										<td width="35%">Simple text field</td>
										<td width="65%"><a href="#" id="username" data-type="text" data-pk="1" data-title="Enter username">superuser</a></td>
									</tr>
									<tr>         
										<td>Empty text field, required</td>
										<td><a href="#" id="firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname"></a></td>
									</tr>  
									<tr>         
										<td>Select, local array, custom display</td>
										<td><a href="#" id="sex" data-type="select" data-pk="1" data-value="" data-title="Select sex"></a></td>
									</tr>
									<tr>         
										<td>Select, remote array, no buttons</td>
										<td><a href="#" id="group" data-type="select" data-pk="1" data-value="5" data-source="/groups" data-title="Select group">Admin</a></td>
									</tr> 
									<tr>         
										<td>Select, error while loading</td>
										<td><a href="#" id="status" data-type="select" data-pk="1" data-value="0" data-source="/status" data-title="Select status">Active</a></td>
									</tr>  
										 
									<tr>         
										<td>Datepicker</td>
										<td>
										
										<span><a href="#" id="vacation" data-type="date" data-viewformat="dd.mm.yyyy" data-pk="1" data-placement="right" data-original-title="When you want vacation to start?">29.06.2014</a></span>
											
										</td>
									</tr>
									<tr>         
										<td>Combodate (date)</td>
										<td><a href="#" id="dob" data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1"  data-title="Select Date of birth"></a></td>
									</tr> 
									<tr>         
										<td>Combodate (datetime)</td>
										<td><a href="#" id="event" data-type="combodate" data-template="D MMM YYYY  HH:mm" data-format="YYYY-MM-DD HH:mm" data-viewformat="MMM D, YYYY, HH:mm" data-pk="1"  data-title="Setup event date and time"></a></td>
									</tr> 

									<tr>         
										<td>Textarea, buttons below. Submit by <i>ctrl+enter</i></td>
										<td><a href="#" id="comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments">awesome user!</a></td>
									</tr> 

									<tr>         
										<td>Twitter typeahead.js</td>
										<td><a href="#" id="state2" data-type="typeaheadjs" data-pk="1" data-placement="right" data-title="Start typing State.."></a></td>
									</tr>                       

									<tr>         
										<td>Checklist</td>
										<td><a href="#" id="fruits" data-type="checklist" data-value="2,3" data-title="Select fruits"></a></td>
									</tr>

									<tr>         
										<td>Select2 (tags mode)</td>
										<td><a href="#" id="tags" data-type="select2" data-pk="1" data-title="Enter tags">html, javascript</a></td>
									</tr>                    

									<tr>         
										<td>Select2 (dropdown mode)</td>
										<td><a href="#" id="country" data-type="select2" data-pk="1" data-value="BS" data-title="Select country"></a></td>
									</tr>  
									
									<tr>         
										<td>Custom input, several fields</td>
										<td><a href="#" id="address" data-type="address" data-pk="1" data-title="Please, fill address"></a></td>
									</tr>

								</tbody>
							</table>

						</div>

						<div class="col-md-6">
							<h1 class="text-center">SK</h1>
							<table id="user" class="table table-bordered table-striped">
								<tbody> 
									<tr>         
										<td width="35%">Simple text field</td>
										<td width="65%"><a href="#" id="username" data-type="text" data-pk="1" data-title="Enter username">superuser</a></td>
									</tr>
									<tr>         
										<td>Empty text field, required</td>
										<td><a href="#" id="firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname"></a></td>
									</tr>  
									<tr>         
										<td>Select, local array, custom display</td>
										<td><a href="#" id="sex" data-type="select" data-pk="1" data-value="" data-title="Select sex"></a></td>
									</tr>
									<tr>         
										<td>Select, remote array, no buttons</td>
										<td><a href="#" id="group" data-type="select" data-pk="1" data-value="5" data-source="/groups" data-title="Select group">Admin</a></td>
									</tr> 
									<tr>         
										<td>Select, error while loading</td>
										<td><a href="#" id="status" data-type="select" data-pk="1" data-value="0" data-source="/status" data-title="Select status">Active</a></td>
									</tr>  
										 
									<tr>         
										<td>Datepicker</td>
										<td>
										
										<span><a href="#" id="vacation" data-type="date" data-viewformat="dd.mm.yyyy" data-pk="1" data-placement="right" data-original-title="When you want vacation to start?">29.06.2014</a></span>
											
										</td>
									</tr>
									<tr>         
										<td>Combodate (date)</td>
										<td><a href="#" id="dob" data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1"  data-title="Select Date of birth"></a></td>
									</tr> 
									<tr>         
										<td>Combodate (datetime)</td>
										<td><a href="#" id="event" data-type="combodate" data-template="D MMM YYYY  HH:mm" data-format="YYYY-MM-DD HH:mm" data-viewformat="MMM D, YYYY, HH:mm" data-pk="1"  data-title="Setup event date and time"></a></td>
									</tr> 

									<tr>         
										<td>Textarea, buttons below. Submit by <i>ctrl+enter</i></td>
										<td><a href="#" id="comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments">awesome user!</a></td>
									</tr> 

									<tr>         
										<td>Twitter typeahead.js</td>
										<td><a href="#" id="state2" data-type="typeaheadjs" data-pk="1" data-placement="right" data-title="Start typing State.."></a></td>
									</tr>                       

									<tr>         
										<td>Checklist</td>
										<td><a href="#" id="fruits" data-type="checklist" data-value="2,3" data-title="Select fruits"></a></td>
									</tr>

									<tr>         
										<td>Select2 (tags mode)</td>
										<td><a href="#" id="tags" data-type="select2" data-pk="1" data-title="Enter tags">html, javascript</a></td>
									</tr>                    

									<tr>         
										<td>Select2 (dropdown mode)</td>
										<td><a href="#" id="country" data-type="select2" data-pk="1" data-value="BS" data-title="Select country"></a></td>
									</tr>  
									
									<tr>         
										<td>Custom input, several fields</td>
										<td><a href="#" id="address" data-type="address" data-pk="1" data-title="Please, fill address"></a></td>
									</tr>

								</tbody>
							</table>

						</div>
					</div>
				</div>

				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>

			</div>
		</div>
	</div>
@endsection

@section('includes-scripts')
	@parent
	<script>
        $(function(){
            $('#mrpTable').DataTable({
                // "processing": true,
                // "serverSide": true,
                // "autoWidth": false,
                // "ajax":{
                //     "url": "/jadwal/datatables/paginate",
                //     "dataType": "json",
                //     "type": "POST",
                //     "data":{ _token: ""}
                // },
                // "columns": [
                //     { "width": "10%"},
                //     { "width": "10%"},
                //     { "width": "5%"},
                //     { "width": "5%"},
                //     { "width": "27.5%"},
                //     { "width": "27.5%"},
                //     { "orderable": false, "width": "15%"}
                // ]
            });
        });
    </script>

	<script src="/assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="/assets/plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
	<script src="/assets/plugins/x-editable/src/inputs-ext/address/address.js"></script>
	<script src="/assets/plugins/x-editable/src/inputs-ext/typeaheadjs/lib/typeahead.js"></script>
	<script src="/assets/plugins/x-editable/src/inputs-ext/typeaheadjs/typeaheadjs.js"></script>
	<script src="/assets/plugins/moment.js"></script>
	<script src="/assets/plugins/require.js"></script>
	<script src="/assets/plugins/select2/js/select2.full.js"></script>

@endsection