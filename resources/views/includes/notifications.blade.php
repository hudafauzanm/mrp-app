@if (session('error'))
	<script>
		_toastr("{{ session('error') }}","top-center","error",false);
	</script>
@endif

@if (session('success'))
	<script>
		_toastr("{{ session('success') }}","top-center","success",false);
	</script>
@endif

@if (session('info'))
	<script>
		_toastr("{{ session('info') }}","top-center","info",false);
	</script>
@endif
