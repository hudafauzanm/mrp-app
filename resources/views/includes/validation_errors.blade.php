@if (count($errors))
	@foreach (array_chunk($errors->all(), 3) as $error)
		<div class="row">
			@foreach ($error as $err)
				<div class="col-md-4">
					<div class="alert alert-danger margin-bottom-30"><!-- DANGER -->
						<strong>Error:</strong> {{ $err }}
					</div>
				</div>
			@endforeach
		</div>
	@endforeach
@endif