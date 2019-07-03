$(function(){
	
	//startLoading();
	$('#my_form').ajaxForm({
		beforeSend:function(){
			$('#progress').progressbar();
			$('#info').text("En attente du chargement...");
			//$(".progress").show;
		},
		uploadProgress:function(event,position,total,percentComplete){
			$('#progress').width(percentComplete+'%');
    		$('#statustxt').html(percentComplete + '%');
    		$('#info').text("Progression du chargement!"+$("#progress").progressbar("value")+"%"); //update status text
    		if(percentComplete>0)
        {
            $('#statustxt').css('color','#fff'); //change status text to white after 50%
        }

			/*$('.progress-bar').width(percentComplete+'%');
			$('.sr-only').html(percentComplete+'%');*/
		},
		success:function(){
			//$('.progress').hide();
		},
		complete:function(response){
			if(response.responseText=="Non"){
				$('#progress').width('1%');
				$('#statustxt').css('color','#000000');
				$('#statustxt').html('0%');
				$('#info').html("<p style='color:red'>Téléchargement impossible!<br/>Fichier incompatible ou trop volumineu</p>");
				$('.image').html("<img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/erreur.png'/>")
			}
			else{
				$('.image').html("<img src='"+response.responseText+"' width='40%'/>");
				$('#info').text("Téléchargement terminé!");
			}
		}
	});
	$('#progress').progressbar({
		value: 0,
		create: function(){
			$('#info').text("En attente du chargement...");
		},
		change: function(){
			$('#info').text("Progression du chargement!"+$("#progress").progressbar("value")+"%");
		},
		complete: function(){
		$('#info').text("Téléchargement terminé!");
			
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