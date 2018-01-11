@extends('layouts.master')

@section('title', 'Tabel MRP')

@section('leftbar')
	@include('includes.sdm.leftbar')
@endsection

@section('includes-styles')
	@parent

	<link href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

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
		                            <button class="btn btn-xs btn-green detail" data-toggle="modal" data-target="#detailModal"><i class="fa fa-list"></i> Detail & Edit</button>
		                            <button class="btn btn-xs btn-red"><i class="fa fa-trash"></i> Hapus</button>
		                            <br>
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
		                            <button class="btn btn-xs btn-green detail" data-toggle="modal" data-target="#detailModal"><i class="fa fa-list"></i> Detail & Edit</button>
		                            <button class="btn btn-xs btn-red"><i class="fa fa-trash"></i> Hapus</button>
		                            <br>
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
		                            <button class="btn btn-xs btn-green detail" data-toggle="modal" data-target="#detailModal"><i class="fa fa-list"></i> Detail & Edit</button>
		                            <button class="btn btn-xs btn-red"><i class="fa fa-trash"></i> Hapus</button>
		                            <br>
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
		                            <button class="btn btn-xs btn-green detail" data-toggle="modal" data-target="#detailModal"><i class="fa fa-list"></i> Detail & Edit</button>
		                            <button class="btn btn-xs btn-red"><i class="fa fa-trash"></i> Hapus</button>
		                            <br>
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
							<h1 class="text-center">Sutri</h1>
							<table id="user" class="table">
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
					{{-- </div> 
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
					</div> --}}
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
	<script type="text/javascript">
		jQuery(window).load(function() { /** required .load **/

			loadScript(plugin_path + 'x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js', function() {
				loadScript(plugin_path + 'x-editable/src/inputs-ext/address/address.js', function() {
					loadScript(plugin_path + 'x-editable/src/inputs-ext/typeaheadjs/lib/typeahead.js', function() {
						loadScript(plugin_path + 'x-editable/src/inputs-ext/typeaheadjs/typeaheadjs.js', function() {
							loadScript(plugin_path + 'moment.js', function() {
								loadScript(plugin_path + 'require.js', function() {
									loadScript(plugin_path + 'select2/js/select2.full.js', function() {

										jQuery(function(){
										  
										   //defaults
										   jQuery.fn.editable.defaults.url = 'dummy.html'; 

											//enable / disable
										   jQuery('#enable').click(function() {
											   jQuery('#user .editable').editable('toggleDisabled');
										   });    
											
											//editables 
											jQuery('#username').editable({
												   url: 'dummy.html',
												   type: 'text',
												   pk: 1,
												   name: 'username',
												   title: 'Enter username'
											});
											
											jQuery('#firstname').editable({
												validate: function(value) {
												   if(jQuery.trim(value) == '') return 'This field is required';
												}
											});
											
											jQuery('#sex').editable({
												prepend: "not selected",
												source: [
													{value: 1, text: 'Male'},
													{value: 2, text: 'Female'}
												],
												display: function(value, sourceData) {
													 var colors = {"": "gray", 1: "green", 2: "blue"},
														 elem = jQuery.grep(sourceData, function(o){return o.value == value;});
														 
													 if(elem.length) {    
														 jQuery(this).text(elem[0].text).css("color", colors[value]); 
													 } else {
														 jQuery(this).empty(); 
													 }
												}   
											});    
											
											jQuery('#status').editable();   
											
											jQuery('#group').editable({
											   showbuttons: false 
											});   

											jQuery('#vacation').editable({
												datepicker: {
													todayBtn: 'linked'
												} 
											});  
												
											jQuery('#dob').editable();
												  
											jQuery('#event').editable({
												placement: 'right',
												combodate: {
													firstItem: 'name'
												}
											});      
											
											jQuery('#meeting_start').editable({
												format: 'yyyy-mm-dd hh:ii',    
												viewformat: 'dd/mm/yyyy hh:ii',
												validate: function(v) {
												   if(v && v.getDate() == 10) return 'Day cant be 10!';
												},
												datetimepicker: {
												   todayBtn: 'linked',
												   weekStart: 1
												}        
											});            
											
											jQuery('#comments').editable({
												showbuttons: 'bottom'
											}); 
											
											jQuery('#note').editable(); 
											jQuery('#pencil').click(function(e) {
												e.stopPropagation();
												e.preventDefault();
												jQuery('#note').editable('toggle');
										   });   
										   
											jQuery('#state').editable({
												source: ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]
											}); 
											
											jQuery('#state2').editable({
												value: 'California',
												typeahead: {
													name: 'state',
													local: ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]
												}
											});   
										   
										   jQuery('#fruits').editable({
											   pk: 1,
											   limit: 3,
											   source: [
												{value: 1, text: 'banana'},
												{value: 2, text: 'peach'},
												{value: 3, text: 'apple'},
												{value: 4, text: 'watermelon'},
												{value: 5, text: 'orange'}
											   ]
											}); 
											
											jQuery('#tags').editable({
												inputclass: 'input-large',
												select2: {
													tags: ['html', 'javascript', 'css', 'ajax'],
													tokenSeparators: [",", " "]
												}
											});   

											var countries = [];
											jQuery.each({"BD": "Bangladesh", "BE": "Belgium", "BF": "Burkina Faso", "BG": "Bulgaria", "BA": "Bosnia and Herzegovina", "BB": "Barbados", "WF": "Wallis and Futuna", "BL": "Saint Bartelemey", "BM": "Bermuda", "BN": "Brunei Darussalam", "BO": "Bolivia", "BH": "Bahrain", "BI": "Burundi", "BJ": "Benin", "BT": "Bhutan", "JM": "Jamaica", "BV": "Bouvet Island", "BW": "Botswana", "WS": "Samoa", "BR": "Brazil", "BS": "Bahamas", "JE": "Jersey", "BY": "Belarus", "O1": "Other Country", "LV": "Latvia", "RW": "Rwanda", "RS": "Serbia", "TL": "Timor-Leste", "RE": "Reunion", "LU": "Luxembourg", "TJ": "Tajikistan", "RO": "Romania", "PG": "Papua New Guinea", "GW": "Guinea-Bissau", "GU": "Guam", "GT": "Guatemala", "GS": "South Georgia and the South Sandwich Islands", "GR": "Greece", "GQ": "Equatorial Guinea", "GP": "Guadeloupe", "JP": "Japan", "GY": "Guyana", "GG": "Guernsey", "GF": "French Guiana", "GE": "Georgia", "GD": "Grenada", "GB": "United Kingdom", "GA": "Gabon", "SV": "El Salvador", "GN": "Guinea", "GM": "Gambia", "GL": "Greenland", "GI": "Gibraltar", "GH": "Ghana", "OM": "Oman", "TN": "Tunisia", "JO": "Jordan", "HR": "Croatia", "HT": "Haiti", "HU": "Hungary", "HK": "Hong Kong", "HN": "Honduras", "HM": "Heard Island and McDonald Islands", "VE": "Venezuela", "PR": "Puerto Rico", "PS": "Palestinian Territory", "PW": "Palau", "PT": "Portugal", "SJ": "Svalbard and Jan Mayen", "PY": "Paraguay", "IQ": "Iraq", "PA": "Panama", "PF": "French Polynesia", "BZ": "Belize", "PE": "Peru", "PK": "Pakistan", "PH": "Philippines", "PN": "Pitcairn", "TM": "Turkmenistan", "PL": "Poland", "PM": "Saint Pierre and Miquelon", "ZM": "Zambia", "EH": "Western Sahara", "RU": "Russian Federation", "EE": "Estonia", "EG": "Egypt", "TK": "Tokelau", "ZA": "South Africa", "EC": "Ecuador", "IT": "Italy", "VN": "Vietnam", "SB": "Solomon Islands", "EU": "Europe", "ET": "Ethiopia", "SO": "Somalia", "ZW": "Zimbabwe", "SA": "Saudi Arabia", "ES": "Spain", "ER": "Eritrea", "ME": "Montenegro", "MD": "Moldova, Republic of", "MG": "Madagascar", "MF": "Saint Martin", "MA": "Morocco", "MC": "Monaco", "UZ": "Uzbekistan", "MM": "Myanmar", "ML": "Mali", "MO": "Macao", "MN": "Mongolia", "MH": "Marshall Islands", "MK": "Macedonia", "MU": "Mauritius", "MT": "Malta", "MW": "Malawi", "MV": "Maldives", "MQ": "Martinique", "MP": "Northern Mariana Islands", "MS": "Montserrat", "MR": "Mauritania", "IM": "Isle of Man", "UG": "Uganda", "TZ": "Tanzania, United Republic of", "MY": "Malaysia", "MX": "Mexico", "IL": "Israel", "FR": "France", "IO": "British Indian Ocean Territory", "FX": "France, Metropolitan", "SH": "Saint Helena", "FI": "Finland", "FJ": "Fiji", "FK": "Falkland Islands (Malvinas)", "FM": "Micronesia, Federated States of", "FO": "Faroe Islands", "NI": "Nicaragua", "NL": "Netherlands", "NO": "Norway", "NA": "Namibia", "VU": "Vanuatu", "NC": "New Caledonia", "NE": "Niger", "NF": "Norfolk Island", "NG": "Nigeria", "NZ": "New Zealand", "NP": "Nepal", "NR": "Nauru", "NU": "Niue", "CK": "Cook Islands", "CI": "Cote d'Ivoire", "CH": "Switzerland", "CO": "Colombia", "CN": "China", "CM": "Cameroon", "CL": "Chile", "CC": "Cocos (Keeling) Islands", "CA": "Canada", "CG": "Congo", "CF": "Central African Republic", "CD": "Congo, The Democratic Republic of the", "CZ": "Czech Republic", "CY": "Cyprus", "CX": "Christmas Island", "CR": "Costa Rica", "CV": "Cape Verde", "CU": "Cuba", "SZ": "Swaziland", "SY": "Syrian Arab Republic", "KG": "Kyrgyzstan", "KE": "Kenya", "SR": "Suriname", "KI": "Kiribati", "KH": "Cambodia", "KN": "Saint Kitts and Nevis", "KM": "Comoros", "ST": "Sao Tome and Principe", "SK": "Slovakia", "KR": "Korea, Republic of", "SI": "Slovenia", "KP": "Korea, Democratic People's Republic of", "KW": "Kuwait", "SN": "Senegal", "SM": "San Marino", "SL": "Sierra Leone", "SC": "Seychelles", "KZ": "Kazakhstan", "KY": "Cayman Islands", "SG": "Singapore", "SE": "Sweden", "SD": "Sudan", "DO": "Dominican Republic", "DM": "Dominica", "DJ": "Djibouti", "DK": "Denmark", "VG": "Virgin Islands, British", "DE": "Germany", "YE": "Yemen", "DZ": "Algeria", "US": "United States", "UY": "Uruguay", "YT": "Mayotte", "UM": "United States Minor Outlying Islands", "LB": "Lebanon", "LC": "Saint Lucia", "LA": "Lao People's Democratic Republic", "TV": "Tuvalu", "TW": "Taiwan", "TT": "Trinidad and Tobago", "TR": "Turkey", "LK": "Sri Lanka", "LI": "Liechtenstein", "A1": "Anonymous Proxy", "TO": "Tonga", "LT": "Lithuania", "A2": "Satellite Provider", "LR": "Liberia", "LS": "Lesotho", "TH": "Thailand", "TF": "French Southern Territories", "TG": "Togo", "TD": "Chad", "TC": "Turks and Caicos Islands", "LY": "Libyan Arab Jamahiriya", "VA": "Holy See (Vatican City State)", "VC": "Saint Vincent and the Grenadines", "AE": "United Arab Emirates", "AD": "Andorra", "AG": "Antigua and Barbuda", "AF": "Afghanistan", "AI": "Anguilla", "VI": "Virgin Islands, U.S.", "IS": "Iceland", "IR": "Iran, Islamic Republic of", "AM": "Armenia", "AL": "Albania", "AO": "Angola", "AN": "Netherlands Antilles", "AQ": "Antarctica", "AP": "Asia/Pacific Region", "AS": "American Samoa", "AR": "Argentina", "AU": "Australia", "AT": "Austria", "AW": "Aruba", "IN": "India", "AX": "Aland Islands", "AZ": "Azerbaijan", "IE": "Ireland", "ID": "Indonesia", "UA": "Ukraine", "QA": "Qatar", "MZ": "Mozambique"}, function(k, v) {
												countries.push({id: k, text: v});
											}); 
											jQuery('#country').editable({
												source: countries,
												select2: {
													width: 200,
													placeholder: 'Select country',
													allowClear: true
												} 
											});      


											
											jQuery('#address').editable({
												url: 'dummy.html',
												value: {
													city: "Moscow", 
													street: "Lenina", 
													building: "12"
												},
												validate: function(value) {
													if(value.city == '') return 'city is required!'; 
												},
												display: function(value) {
													if(!value) {
														jQuery(this).empty();
														return; 
													}
													var html = '<b>' + jQuery('<div>').text(value.city).html() + '</b>, ' + jQuery('<div>').text(value.street).html() + ' st., bld. ' + jQuery('<div>').text(value.building).html();
													jQuery(this).html(html); 
												}         
											});              
												 
										   jQuery('#user .editable').on('hidden', function(e, reason){
												if(reason === 'save' || reason === 'nochange') {
													var $next = jQuery(this).closest('tr').next().find('.editable');
													if(jQuery('#autoopen').is(':checked')) {
														setTimeout(function() {
															$next.editable('show');
														}, 300); 
													} else {
														$next.focus();
													} 
												}
										   });
										   
										});

									});
								});
							});
						});
					});
				});
			});

		});
	</script>




@endsection