$(function(){
  recupDateVisite()
	remplirTableOpVisite();
        //boucle                
          setInterval(function()
            {
              remplirTableOpVisite();
            },500); 
  remplirListeVisite();                
          setInterval(function()
            {
              remplirListeVisite();
            },500);
            //event
          $('#rechercheVisite').keyup(function()
        {
          var rechercheVisite=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/tableRechercheVisite.php",
                  type: "POST",
                  data: {rechercheVisite: rechercheVisite},
                  success: function(data)
                    {
                      if(rechercheVisite!=''){
                        $("#tabOpVisite").css('display','none');
                        $("#tabRechercheVisite").css('display','block');
                        $("#tabRechercheVisite").html(data);
                      }
                      else
                      {
                        $("#tabRechercheVisite").css('display','none');
                        $("#tabOpVisite").css('display','block');
                      }         
                    }
                });    
        });     
})
function recupDateVisite()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/dateVisite.php",function(data){
     $('#dateVisite').attr('value',data);
    });
    }
function remplirTableOpVisite()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/tableOpVisite.php",function(data){
        $("#tabOpVisite").html(data);
    });
    }
function remplirListeVisite()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/listeVisite.php",function(data){
        $("#tabListeVisite").html(data);
    });
    }
function choixVisite(lien){
  $.get(lien,function(data){
      var tabHaza = data.split(',');
      var longue=tabHaza.length;
      var idRegistre=tabHaza[0];
      var nom=tabHaza[1];
      if (confirm('Voulez-vous passer à l\'écritures des visites journalières de Mme '+nom+' ?')){
           $('#nomPatiente').empty();
           $('#nomPatiente').append(nom);
           $('#idRegistre').attr('value',idRegistre);
           $('#tableAfenina,#ajouter,#terminer').fadeIn('slow');
           $('#liste').slideToggle('slow'); 
         }
        });
    
        
}
function ajoutVisite()
    {
      var idVisite = $("#idVisite").val();
      var idRegistre = $("#idRegistre").val();     
      var dateVisite = $("#dateVisite").val();
      var visiteDemande = $("#visiteDemande").val();
      var resultat = $("#resultat").val();
      var observation = $("#observation").val();
      if(idRegistre == "" || dateVisite == "" || visiteDemande == "" || resultat == "" || observation == "")
      {
      alert('erreur');
      }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/visite/ajoutVisite.php",
        type: "POST",
        data: {idVisite: idVisite, idRegistre: idRegistre, dateVisite: dateVisite, visiteDemande: visiteDemande , resultat: resultat, observation: observation},
        success: function(data)
        {
        }});     
      }
    }
    function terminerVisite(){
           $('#nomPatiente').empty();
           $('#tableAfenina,#ajouter,#terminer').fadeOut();
           $('#idRegistre').attr('value','');
           $('#liste').slideToggle('slow');                     
  }