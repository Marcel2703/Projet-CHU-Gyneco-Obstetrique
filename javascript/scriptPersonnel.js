$(function(){
	//evenement personnel
        $('#recherchePerso').keyup(function()
        {
          var recherchePerso=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/tableRecherchePerso.php",
                  type: "POST",
                  data: {recherchePerso: recherchePerso},
                  success: function(server_response)
                    {
                      if(recherchePerso!=''){
                        $("#tableau1").css('display','none');
                        $("#tableRecherchePerso").css('display','block');
                        $("#tableRecherchePerso").html(server_response);
                      }
                      else
                      {
                        $("#tableRecherchePerso").css('display','none');
                        $("#tableau1").css('display','block');
                      }         
                    }
                });   
        });
      //fin evenement personnel

      remplirTablePerso();
      setInterval(function()
            {
              remplirTablePerso();
            },500);
})
//fonction personnel
    function ajoutPerso()
    {
      var numPerso = $("#numPerso").val();
      var nomPerso = $("#nomPerso").val();
      var poste = $("#poste").val();
      if(nomPerso == "" || poste == "")
      {
      alert('erreur');
      }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/personnel/ajoutPerso.php",
        type: "POST",
        data: {idPerso: numPerso, nomPerso: nomPerso, poste: poste },
        success: function(data)
        {
          if(data=='no'){
            alert('Ce personnel existe déjà')
          }
          else{
            informer('Nouveau personnel bien ajouté');
          }
          
        }});     
      }
    }
    function remplirTablePerso()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/tablePerso.php",function(data){
      $("#tableau1").html(data);
    });
    }
    function choixPerso(lien){
   $.get(lien,function(data){
    var tabHaza = data.split(',');
      if (confirm('Voulez-vous passer à la modification de ce personnel?'))
        {
           var idPerso=tabHaza[0];
           var nomPerso=tabHaza[1];
           var poste=tabHaza[2];
           $('#listePerso').slideToggle();
           $('#numPerso').attr('value',idPerso);
           $('#nomPerso').attr('value',nomPerso);
           $('#poste').attr('value',poste);
           var modifIdPerso = document.getElementById('numPerso');
          modifIdPerso.disabled = true;
           $('#btnAjouter').css('display','none');
           $('#btnModify').css('display','inline-block');
           $('#btnAnnuler').css('display','inline-block');
        }   
    });
}
function enregistrerPerso()
    {
      var idPerso = $("#numPerso").val();
      var nomPerso = $("#nomPerso").val();
      var poste = $("#poste").val();
      if(idPerso == "" || nomPerso == "" || poste == "")
      {
      alert('erreur');
      }
    else if(!idPerso.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/personnel/modifyPerso.php",
        type: "POST",
        data: {idPerso: idPerso, nomPerso: nomPerso, poste: poste},
        success: function(data)
        {
           $('#numPerso').attr('value','');
           $('#nomPerso').attr('value','');
           $('#poste').attr('value','');
           var modifIdPerso = document.getElementById('numPerso');
           modifIdPerso.disabled = false;
           $('#listePerso').slideToggle();
           $('#btnModify').fadeOut();
           $('#btnAjouter').fadeIn();
          informer(data);
        }});     
      }
    }
    function annulerPerso()
    {
           $('#numPerso').attr('value','');
           $('#nomPerso').attr('value','');
           $('#poste').attr('value','');
           var modifIdPerso = document.getElementById('numPerso');
           modifIdPerso.disabled = false;
           $('#btnModify').fadeOut();
           $('#btnAjouter').fadeIn();
           $('#listePerso').slideDown();
    }
    function deletePersonnel(lien){
   
      if (confirm('Voulez-vous vraiment supprimer ce personnel?'))
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