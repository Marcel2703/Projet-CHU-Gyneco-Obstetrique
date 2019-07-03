$(function(){
	remplirListeRegistre();

        //boucle                
          setInterval(function()
            {
              remplirListeRegistre();
            },500);
          $('#rechercheRegistre').keyup(function()
        {
          var rechercheRegistre=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/registre/listeRechercheRegistre.php",
                  type: "POST",
                  data: {rechercheRegistre: rechercheRegistre},
                  success: function(server_response)
                    {
                      if(rechercheRegistre!=''){
                        $("#contenuRegistre").fadeOut(('fast'));
                        $("#contenuRechercheRegistre").fadeIn('fast');
                        $("#contenuRechercheRegistre").html(server_response);
                      }
                      else
                      {
                        $("#contenuRechercheRegistre").fadeOut(('fast'));
                        $("#contenuRegistre").fadeIn('fast');
                      }         
                    }
                });   
        });
})
function remplirListeRegistre()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/registre/listeRegistre.php",function(data){
        $("#contenuRegistre").html(data);
    });
    }
