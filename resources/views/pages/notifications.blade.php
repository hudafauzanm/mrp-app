@extends('layouts.master')

@section('title', 'All Notifications')

@section('leftbar')
	@if (auth()->user()->user_role === 1)
		@include('includes.unit.leftbar')
	@elseif (auth()->user()->user_role === 2)
		@include('includes.karir2.leftbar')
	@elseif (auth()->user()->user_role === 3)
		@include('includes.sdm.leftbar')
	@endif
@endsection

@section('content')
	<div id="content" class="dashboard padding-20">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading panel-heading-transparent">
				<span class="title elipsis">
					<strong>NOTIFIKASI</strong>
				</span>
				@if ($notif_count && $unread_notif_count)
				<ul class="pull-right list-inline">
					<li>
						<button id="markAllRead"><i class="fa fa-check"></i> Tandai sudah dibaca semua</button>
					</li>
				</ul>
				@endif
			</div>

			<div class="panel-body">
				@if ($notif_count)
	            	@foreach ($notifications as $notification)
						<div class="row" id="notif_{{ $notification->id }}">
		            		<div class="col-md-1 col-sm-1 col-xs-1 text-center">
		            			<h1><i class="fa fa-check"></i></h1>
		            		</div>
		            		<div class="col-md-10 col-sm-10 col-xs-10">
		            			<a href="" style="padding-left: 0">{{ $notification->data['message'] }}</a>
		            			<br>
			            		<p class="time">{{ $notification->created_at->toDayDateTimeString() }}</p>
		            		</div>
		            		<div class="col-md-1 col-sm-1 col-xs-1">
		            			@if (!$notification->read_at)
		            				<button class="markRead" title="Tandai sudah dibaca" target="{{ $notification->id }}"><i class="fa fa-dot-circle-o"></i></button>
		            			@endif
		            		</div>
	        			</div>
	        			<hr>
	            	@endforeach
				@else
					<h2 class="text-center">Tidak ada notifikasi</h2>
				@endif
			</div>
		</div>
	</div>
@endsection