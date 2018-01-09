@if (session('error'))
	<script>
		_toastr("{{ session('error') }}","top-center","danger",false);
	</script>
@endif
{{-- @if (count($errors))
	@foreach ($errors->all() as $error)
		<script>
			_toastr("{{ $error }}","top-right","danger",false);
		</script>
	@endforeach
	<div class="alert alert-danger noborder text-center weight-400 nomargin noradius">
		Invalid Email or Password!
	</div>
@endif --}}
{{-- 
@if (count($errors))
	<div class="container">
		<div class="form-group">
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $err)
						<li>{{ $err }}</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endif --}}

@if (session('success'))
	<script>
		_toastr("{{ session('success') }}","top-center","success",false);
	</script>
@endif

@if (session('warning'))
	<script>
		_toastr("{{ session('warning') }}","top-center","warning",false);
	</script>
@endif

{{-- <div class="alert alert-warning noborder text-center weight-400 nomargin noradius">
	Account Inactive!
</div>

<div class="alert alert-default noborder text-center weight-400 nomargin noradius">
	<strong>Too many failures!</strong> <br />
	Please wait: <span class="inlineCountdown" data-seconds="180"></span>
</div>
 --}}