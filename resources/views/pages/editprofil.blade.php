@extends('layouts.master')

@section('title','Edit Profil')

@section('leftbar')
	@include('includes.unit.leftbar')
@endsection

@section('content')

				<!-- page title -->
				<header id="page-header">
					<h1>User Profile</h1>
					<ol class="breadcrumb">
						<li><a href="#">Pages</a></li>
						<li class="active">User Profile</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="page-profile">

						<div class="row">

							<!-- COL 1 -->
							<div class="col-md-4 col-lg-3">
								<section class="panel">
									<div class="panel-body noradius padding-10">

										<figure class="margin-bottom-10"><!-- image -->
											<img class="img-responsive" src="assets/images/noavatar.jpg" alt="" />
										</figure><!-- /image -->

										<hr class="half-margins" />
										
										<!-- About -->
										<h3 class="text-black" > 
											<small class="text-gray size-14">{{ $personnelarea->nama }} </small>
										</h3>
										<p class="size-12">{{$personnelarea->alamat}}</p>

									</div>
								</section>
							</div><!-- /COL 1 -->

							<!-- COL 2 -->
							<div class="col-md-8 col-lg-6">

								<div class="tabs white nomargin-top">
									<ul class="nav nav-tabs tabs-primary">
										<li>
											<a href="active" data-toggle="tab">Edit</a>
										</li>
									</ul> 

									<div class="tab-content">

										<!-- Edit -->
										<div id="edit" class="tab-pane active">

											<form class="form-horizontal" method="POST" action="{{URL('profil/edit')}}">
												<h4>Informasi Umum</h4>

											{{csrf_field()}}
												<fieldset>
													<div class="form-group">
														<label class="col-md-4 control-label" for="profileAlamat">Alamat</label>
														<div class="col-md-8">
															<input type="text" class="form-control" name="alamat" id="profileAlamat" value="{{ $personnelarea->alamat }}">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label" for="profileProvinsi">Provinsi</label>
														<div class="col-md-8">
															<select class="form-control select2" name="provinsi" id="provinsiid">
																<option>Pilih Provinsi</option>
																@if($personnelarea->provinsi)
																	@foreach($provinsis as $provinsi)
																		<option value="{{$provinsi->id}}" {{ $selectedprovinsi == $provinsi->id ? 'selected="selected"' : ''}}>{{$provinsi->provinsi}}</option>
																	@endforeach
																@endif

															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label" for="profileKota">Kota</label>
														<div class="col-md-8">
															@if($personnelarea->kota)
																<select class="form-control select2" name="kota" id="kotaid" >
																	@foreach($kotas as $kota)	
																		<option value= "{{$kota->id}}" {{$selectedkota == $kota->id  ? 'selected="selected"' : '' }}>{{$kota->kota}}</option>
																	@endforeach	
																</select>
															@else
																<select class="form-control select2" name="kota" id="kotaid" disabled="" >
																		<option>Pilih Kota</option>
																</select>
															@endif
														</div>
													</div>
												</fieldset>
												<hr />

												<h4>Ganti Password</h4>
												<fieldset class="mb-xl">
													<div class="form-group">
														<label class="col-md-4 control-label" for="profileNewPassword">Password Baru</label>
														<div class="col-md-8">
															<input type="password" class="form-control" name="password" id="profileNewPassword" placeholder="Optional">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label" for="profileNewPasswordRepeat">Konfirmasi Password</label>
														<div class="col-md-8">
															<input type="password" name="password_confirmation" class="form-control" id="profileNewPasswordRepeat" placeholder="Diisi sama dengan password baru">
														</div>
													</div>
												</fieldset>

												<div class="row">
													<div class="col-md-8 col-md-offset-4">
														<button type="submit" class="btn btn-primary">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>

											</form>

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
	<script>
		$("#provinsiid").change(function(){
			var provinsi_id = $(this).val();

			$.ajax({
				url : '/profil/getKota',
				type : 'GET',
				data : { 'provinsi_id': provinsi_id, },
				dataType : 'json',

				error: function(){

				},

				success: function (data){
					var kota = $("#kotaid");
					kota.empty();
					kota.append('<option>Pilih Provinsi</option>');
					kota.removeAttr('disabled');
					$.each(data, function(key, value){
						console.log(value);
						kota.append('<option value="'+value.id+'">'+value.kota+'</option>');
					});
				}
			});
		});
	</script>
@endsection