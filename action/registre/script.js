$(function(){
	$('#progress').progressbar();
	$('#progress').progressbar({
		value: 0,
		create: function(){
			$('#info').text("En attente du chargement...");
		},
		change: function(){
			$('#info').text("Progression du chargement!"+$("#progress").progressbar("value")+"%");
		},
		complete: function(){
		$('#info').text("Chargement terminé!");
			
		}
	});

	startLoading();
	$('#my_form').ajaxForm({
		beforeSend:function(){
			$(".progress").show;
		},
		uploadProgress:function(event,position,total,percentComplete){
			$('.progress-bar').width(percentComplete+'%');
			$('.sr-only').html(percentComplete+'%');
		},
		success:function(){
			$('.progress').hide();
		},
		complete:function(response){
			$('.image').html("<img src='"+response.responseText+"' width='40%'/>")
		}
	});
	$(".progress").hide();
})
function startLoading(){
	var nValue = 0;
	var oTimer= setInterval(function(){
		$('#progress').progressbar("value",nValue);
		nValue++;
		if(nValue>100) clearInterval(oTimer);
	},33)
}