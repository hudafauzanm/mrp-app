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
										<h3 class="text-black">
											Nama 
											<small class="text-gray size-14"> / Unit</small>
										</h3>
										<p class="size-12">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat volutpat.</p>

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
														<label class="col-md-3 control-label" for="profileAlamat">Alamat</label>
														<div class="col-md-8">
															<input type="text" class="form-control" name="alamat" id="profileAlamat" value="{{ $personnelarea->alamat }}">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileProvinsi">Provinsi</label>
														<div class="col-md-9">
															<select class="form-control select2" name="provinsi">
																<option></option>
																<option value="1">Jawa Timur</option>
																<option value="2">Jawa Tengah</option>
																<option value="3">Jawa Barat</option>
																<option value="4">DIY</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileKota">Kota</label>
														<div class="col-md-9">
															<select class="form-control select2" name="kota">
																<option></option>
																<option value="1">Yogya</option>
																<option value="2">Jogja</option>
																<option value="3">Yogyakarta</option>
																<option value="4">Jogjakarta</option>
															</select>
														</div>
													</div>
												</fieldset>
												<hr />

												<h4>Ganti Password</h4>
												<fieldset class="mb-xl">
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileNewPassword">Password Baru</label>
														<div class="col-md-8">
															<input type="password" class="form-control" name="password" id="profileNewPassword">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileNewPasswordRepeat">Konfirmasi Password</label>
														<div class="col-md-8">
															<input type="password" name="password_confirmation" class="form-control" id="profileNewPasswordRepeat">
														</div>
													</div>
												</fieldset>

												<div class="row">
													<div class="col-md-9 col-md-offset-3">
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