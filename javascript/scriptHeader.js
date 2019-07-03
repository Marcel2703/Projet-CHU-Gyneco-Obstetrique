	$(document).ready(function()
    {
	window.onload = date_heure('date_heure');
	$(".anim").mouseover(function(){
        $(this).stop().animate({paddingLeft:"25px",paddingRight:"25px","font-size":"20px","font-weight":"bold"},200);
      }
      );
      $(".anim").mouseout(function(){
        $(this).stop().animate({paddingLeft:"10px",paddingRight:"10px","font-size":"18px","font-weight":"none"},200);
      }
      );
	});
function date_heure(id)
{
date = new Date;
annee = date.getFullYear();
moi = date.getMonth();
mois = new Array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
j = date.getDate();
jour = date.getDay();
jours = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
h = date.getHours();
if(h<10)
{
h = "0"+h;
}
m = date.getMinutes();
if(m<10)
{
m = "0"+m;
}
s = date.getSeconds();
if(s<10)
{
s = "0"+s;
}
resultat = jours[jour]+' '+j+' '+mois[moi]+' '+annee+' à '+h+':'+m+':'+s;
document.getElementById(id).innerHTML = resultat;
setTimeout('date_heure("'+id+'")','1000');
return true;
}