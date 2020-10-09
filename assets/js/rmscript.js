$(function(){
	 var Rooms = $.ajax({
					type:"POST",
					url: BaseURL + "/rooms/loadrooms",
					async: false
				}).responseText;
	
	var Rms = [];
	
	$(".rooms").hide();
	
	if(Rooms){
		var rms = JSON.parse(Rooms.split(","));
		for(var i = 0; i < rms.length; i++){
			 Rms.push(rms[i]);
		}
	}
	
	LoadSessionRooms();
	
	function LoadSessionRooms(){
		$.each(Rms, function(val, text){
			$("#cmbSessionRooms").append(new Option(text));
		});
	}
	
	var typingTimer;
	var doneTypingInterval = 700;
	
	$("#txtBarcode").keyup(function(e){
		clearTimeout(typingTimer);
		typingTimer = setTimeout(check, doneTypingInterval);
	});
	
	$("#txtBarcode").keydown(function(){
		clearTimeout(typingTimer);
	});
	
	function check(){
		var code = $("#txtBarcode").val();
		var room = $("#cmbSessionRooms").val();
		$.ajax({
			type:"POST",
			url: BaseURL + "/rooms/checkbcode",
			data:{code:code, room:room},
			async: true,
			beforeSend: function(){
				$(".rooms").show();
			},
			success: function(html){
				
				$(".result").empty().html(html);
				$("#txtBarcode").val("");
				$("#txtBarcode").focus();
				
			},
			complete: function(){
				$(".rooms").hide();
			}
		});
	}
	
});