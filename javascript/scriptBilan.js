$(function() 
  { 
    setTimeout("diaporama()",0);  
      //patients
       $("#menu_vue a").mouseover(function(){
        $(this).stop().animate({padding:"20px"},300)
      }
      );
      $("#menu_vue a").mouseout(function(){
        $(this).stop().animate({padding:"10px"},300)
      }
      );
   });
var i=0;
function diaporama()
    {
        var j=i%3;
      if (j==0) 
      {
          if (i==0) {
            precedent = '#img2';
          }
          else{
            precedent = '#img2';
            var srcPrec=$(precedent).attr("src");
            $('#contenu1').css('background-image','url('+srcPrec+')');
        }
      }
      else{
        precedent = '#img' + (j-1);
        var srcPrec=$(precedent).attr("src");
        $('#contenu1').css('background-image','url('+srcPrec+')');
          }
        var actuel = '#img' + j;
        var srcActuel=$(actuel).attr("src");
        $(precedent).fadeOut(2000);
        $(actuel).fadeIn(2000);
        i++;
      setTimeout("diaporama()",3000); 
    }