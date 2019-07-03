$(function(){
	//evenement chambre
      $('#rechercheChambre').keyup(function()
        {
          var rechercheChambre=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/tableRechercheChambre.php",
                  type: "POST",
                  data: {rechercheChambre: rechercheChambre},
                  success: function(data)
                    {
                      if(rechercheChambre!=''){
                        $("#tabChambre").css('display','none');
                        $("#tabRechercheChambre").css('display','block');
                        $("#tabRechercheChambre").html(data);
                      }
                      else
                      {
                        $("#tabRechercheChambre").css('display','none');
                        $("#tabChambre").css('display','block');
                      }         
                    }
                });    
        });
      //fin chambre
      remplirTableChambre();
			setInterval(function()
            {
              remplirTableChambre();
            },500);
      nbPlaceAuto();
      setInterval(function()
            {
              nbPlaceAuto();
            },500);
      remplirSelect();
      totalChambre();
      setInterval(function()
            {
              totalChambre();
            },1000);
})
 function ajoutChambre()
    {
      var numChambre = $("#numChambre").val();
      var numCategorie = $("#numCategorie").val();
      if(numChambre == "" || numCategorie == "")
      {
      alert('erreur');
      }
    else if(!numChambre.match(/[0-9]+$/))
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/chambre/ajoutChambre.php",
        type: "POST",
        data: {idChambre: numChambre, codeCategorie: numCategorie},
        success: function(data)
        {
          if(data=='no'){
            alert('Cette chambre existe déjà')
          }
          else{
            informer('Nouvelle chambre bien ajouté');
          }
        }});     
      }
    }
    function remplirTableChambre()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/tableChambre.php",function(data){
      $("#tabChambre").html(data);
    });
    }
    function nbPlaceAuto()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/chambre/nbPlaceAuto.php",function(data){
    });
    }
    function remplirSelect()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/chambre/selectCategorie.php",function(data){
      $("select#numCategorie").html(data);
    });
    }
    function totalChambre(){
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/totalChambre.php",function(data){
        if(data<=1){
          $('label#totalChambre').html(data+' Chambre');
        }
        else{
          $('label#totalChambre').html(data+' Chambres');
        }
          
    });
    }
    function choixChambre(lien){
   $.get(lien,function(data){
    var tabHaza = data.split(',');
      if (confirm('Voulez-vous passer à la modification de cette chambre?'))
        {
           var idChambre=tabHaza[0];
           var codeCategorie=tabHaza[1];
           $('#listeChambre').slideToggle();
           $('#numChambre').attr('value',idChambre);
           var modifIdChambre = document.getElementById('numChambre');
          modifIdChambre.disabled = true;
           $('#btnAjouter').css('display','none');
           $('#btnModify').css('display','inline-block');
           $('#btnAnnuler').css('display','inline-block');
        }   
    });
}
function enregistrerChambre()
    {
      var numChambre = $("#numChambre").val();
      var numCategorie = $("#numCategorie").val();
      if(numChambre == "" || numCategorie == "")
      {
      alert('erreur');
      }
    else if(!numChambre.match(/[0-9]+$/))
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/chambre/modifyChambre.php",
        type: "POST",
        data: {idChambre: numChambre, codeCategorie: numCategorie},
        success: function(data)
        {
           $('#numChambre').attr('value','');
           var modifIdChambre = document.getElementById('numChambre');
          modifIdChambre.disabled = false;
           $('#listeChambre').slideToggle();
           $('#btnModify').fadeOut();
           $('#btnAjouter').fadeIn();
           informer(data);
        }});     
      }
    }
    function annulerChambre()
    {
           $('#numChambre').attr('value','');
           var modifIdChambre = document.getElementById('numChambre');
          modifIdChambre.disabled = false;
           $('#btnModify').fadeOut();
           $('#btnAjouter').fadeIn();
           $('#listeChambre').slideDown();
    }
    function deleteChambre(lien){
   
      if (confirm('Voulez-vous vraiment supprimer cette chambre? Cette action affèctera les lits'))
        {
          $.get(lien,function(data){
            alert(data);
                });
        }   

}
function informer(message)
  {
    $("#successDiv").slideDown('2000').delay(2000).fadeOut(2000);
    $("#successDiv").html('<p>' +message+ '</p>');
  }