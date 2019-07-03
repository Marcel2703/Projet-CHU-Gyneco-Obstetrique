$(function(){
	remplirTableSejour();

        //boucle                
          setInterval(function()
            {
              remplirTableSejour();
            },500);
          //event
          $('#rechercheSejour').keyup(function()
        {
          var rechercheSejour=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/tableRechercheSejour.php",
                  type: "POST",
                  data: {rechercheSejour: rechercheSejour},
                  success: function(data)
                    {
                      if(rechercheSejour!=''){
                        $("#tabSejour").css('display','none');
                        $("#tableRechercheSejour").css('display','block');
                        $("#tableRechercheSejour").html(data);
                      }
                      else
                      {
                        $("#tableRechercheSejour").css('display','none');
                        $("#tabSejour").css('display','block');
                      }         
                    }
                });    
        });
})

 function ajoutSejour()
    {
      var numSejour = $("#numSejour").val();
      var numChambre = $("#numChambre").val();
      var numLit = $("#numLit").val();
      var numRegistre = $("#numRegistre").val();
      var nomPatiente = $("#nomPatiente").val();
      if(numSejour == "" || numChambre == "" || numLit == "")
      {
      alert('erreur');
      }
    else if(!numSejour.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/sejour/ajoutSejour.php",
        type: "POST",
        data: {idSejour: numSejour, idChambre: numChambre, idLit: numLit,idRegistre: numRegistre, nomPatiente:nomPatiente },
        success: function(data)
        {
          alert(data);
        }});     
      }
    }
    function remplirTableSejour()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/tableSejour.php",function(data){
      $("#tabSejour").html(data);
    });
    }
    function choixSejour(lien){
   $.get(lien,function(data){
    var tabHaza = data.split(',');
    var nomPatiente=tabHaza[4];
      if (confirm('Voulez-vous passer à la modification du séjour de Mme '+nomPatiente+' ?'))
        {
           var idSejour=tabHaza[0];
           var idChambre=tabHaza[1];
           var idLit=tabHaza[2];
           var idRegistre=tabHaza[3];
           var dateEntree=tabHaza[5];
           var dateSortie=tabHaza[6];
           $('#liste').slideToggle();
           $('#zoneModify').slideToggle();
           $('#nomPatiente').empty();
           $('#nomPatiente').append(nomPatiente);
           $('#numSejour').attr('value',idSejour);
           $('#numChambre').attr('value',idChambre);
           $('#numLit').attr('value',idLit);
           $('#numRegistre').attr('value',idRegistre);
           $('#nom_patiente').attr('value',nomPatiente);
           $('#dateEntree').attr('value',dateEntree);
           $('#dateSortie').attr('value',dateSortie);
           $('#btnModify').css('display','inline-block');
           $('#btnAnnuler').css('display','inline-block');
        }   
    });
}
function enregistrerSejour()
    {
      var idSejour = $("#numSejour").val();
      var idChambre = $("#numChambre").val();
      var idLit = $("#numLit").val();
      var idRegistre = $("#numRegistre").val();
      var nomPatiente = $("#nom_patiente").val();
      var dateEntree = $("#dateEntree").val();
      var dateSortie = $("#dateSortie").val();
      if(idSejour == "" || idChambre == "" || idLit == "" || idRegistre == "" || nomPatiente == "" || dateEntree == "" || dateSortie == "")
      {
      alert('erreur');
      }
    else if(!idSejour.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/sejour/modifySejour.php",
        type: "POST",
        data: {idSejour: idSejour, idChambre: idChambre, idLit: idLit, idRegistre: idRegistre , nomPatiente: nomPatiente, dateEntree: dateEntree, dateSortie: dateSortie},
        success: function(data)
        {
           $('#numSejour').attr('value','');
           $('#numChambre').attr('value','');
           $('#numLit').attr('value','');
           $('#numRegistre').attr('value','');
           $('#nom_patiente').attr('value','');
           $('#dateEntree').attr('value','');
           $('#dateSortie').attr('value','');
           $('#btnModify').css('display','none');
           $('#btnAnnuler').css('display','none');
           $('#zoneModify').slideToggle();
           $('#liste').slideToggle();
           $('#nomPatiente').empty();
          alert(data);
        }});     
      }
    }
function annulerSejour()
    {
           $('#numSejour').attr('value','');
           $('#numChambre').attr('value','');
           $('#numLit').attr('value','');
           $('#numRegistre').attr('value','');
           $('#nom_patiente').attr('value','');
           $('#dateEntree').attr('value','');
           $('#dateSortie').attr('value','');
           $('#btnModify').css('display','none');
           $('#btnAnnuler').css('display','none');
           $('#zoneModify').slideToggle();
           $('#liste').slideToggle();
           $('#nomPatiente').empty(); 
    }