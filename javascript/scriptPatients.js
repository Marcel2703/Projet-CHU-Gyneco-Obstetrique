$(function() 
  { 
    setTimeout("diaporama()",0); 
      //patients
      $("#menu_patients a").click(function()
                {
              lien=$(this).attr("href");
              $('#bloc_patients').empty();       
              $('#bloc_patients').append("<img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/loading.gif' width='950' height='450'/>");
              
              setTimeout("requete(lien); ",1000);  
              return false;
                });
       $("#menu_patients a").mouseover(function(){
        $(this).stop().animate({padding:"20px"},300)
      }
      );
      $("#menu_patients a").mouseout(function(){
        $(this).stop().animate({padding:"10px"},300)
      }
      );
   });
function requete(lien){
      $.ajax(
              {
              url:lien,
              cache:true,
              success:function(data){afficher(data);
               },
              error:function(){alert('Erreur détecté');}
              }
                    )
    }
function afficher(data)
        {
            $("#bloc_patients").fadeOut(0,function(){
            $("#bloc_patients").empty();
            $("#bloc_patients").append(data);
            $("#bloc_patients").fadeIn(500);
          }) 

        }
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
    