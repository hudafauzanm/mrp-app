$(document).ready(function(){
	$(".markRead").click(function(){
		var id = $(this).attr('target');

		$.ajax({
			'url': '/notifications/read',
			'type': 'POST',
			'data': {
				'_token': $('meta[name="csrf-token"]').attr('content'),
				'id': id,
			},
			'dataType': 'json',
			error: function(){

			},
			success: function(data){
				if(data)
				{
					$("#notif_"+data).remove();
					if(!$.trim($(".drop-content").html()))
					{
						$(".drop-content").html('<div class="col-md-12 col-sm-12 col-xs-12 text-center"><p>Tidak ada notifikasi baru</p></div>');
						$("#star").remove();
					}
					var dec = parseInt($("#notif_count").html()) - 1;
					$("#notif_count").html(dec);
				}
			}
		});
	});

	$("#markAllRead").click(function(){
		$.ajax({
			'url': '/notifications/readAll',
			'type': 'POST',
			'data': {
				'_token': $('meta[name="csrf-token"]').attr('content'),
			},
			'dataType': 'json',
			error: function(){

			},
			success: function(data){
				if(data)
				{
					$(".drop-content").empty();
					$(".drop-content").html('<div class="col-md-12 col-sm-12 col-xs-12 text-center"><p>Tidak ada notifikasi baru</p></div>');
					$("#notif_count").html('0');
					$("#star").remove();
				}
			}
		});
	});
});