$(function(){
	remplirTableActe();

        //boucle                
          setInterval(function()
            {
              remplirTableActe();
            },500);
})

 function ajoutActe()
    {
      var numActe = $("#numActe").val();
      var designation = $("#designation").val();
      var mention = $("#mention").val();
      if(numActe == "" || designation == "" || mention == "")
      {
      alert('erreur');
      }
    else if(!numActe.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un numéro acte valable');
      }
    else
      {
      $.ajax({
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/acte/ajoutActe.php",
        type: "POST",
        data: {numActe: numActe, designation: designation, mention: mention },
        success: function(data)
        {
          if(data=='no'){
            alert('Cette acte existe déjà')
          }
          else{
            informer('Nouvelle acte bien ajouté');
          }
        }});     
      }
    }
    function remplirTableActe()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/tableActe.php",function(data){
      $("#tabActe").html(data);
    });
    }
    function choixActe(lien){
   $.get(lien,function(data){
    var tabHaza = data.split(',');
      if (confirm('Voulez-vous passer à la modification de cet acte?'))
        {
           var idActe=tabHaza[0];
           var designation=tabHaza[1];
           var mention=tabHaza[2];
           $('#listeActe').slideToggle();
           $('#numActe').attr('value',idActe);
           $('#designation').attr('value',designation);
           $('#mention').attr('value',mention);
           var modifIdActe = document.getElementById('numActe');
          modifIdActe.disabled = true;
           var modifdesignation = document.getElementById('designation');
          modifdesignation.disabled = true;
           $('#btnAjouter').css('display','none');
           $('#btnModify').css('display','inline-block');
           $('#btnAnnuler').css('display','inline-block');
        }   
    });
}
function enregistrerActe()
    {
      var numActe = $("#numActe").val();
      var designation = $("#designation").val();
      var mention = $("#mention").val();
      if(numActe == "" || designation == "" || mention == "")
      {
      alert('erreur');
      }
    else if(!numActe.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/acte/modifyActe.php",
        type: "POST",
        data: {numActe: numActe, designation: designation, mention: mention },
        success: function(data)
        {
           $('#numActe').attr('value','');
           $('#designation').attr('value','');
           $('#mention').attr('value','');
           $('#listeActe').slideToggle();
           $('#btnModify').fadeOut();
           $('#btnAjouter').fadeIn();
           var modifIdActe = document.getElementById('numActe');
          modifIdActe.disabled = false;
           var modifdesignation = document.getElementById('designation');
          modifdesignation.disabled = false;
          informer(data);
        }});     
      }
    }
    function annulerActe()
    {
           $('#numActe').attr('value','');
           $('#designation').attr('value','');
           $('#mention').attr('value','');
           var modifIdActe = document.getElementById('numActe');
          modifIdActe.disabled = false;
           var modifdesignation = document.getElementById('designation');
          modifdesignation.disabled = false;
           $('#btnModify').fadeOut();
           $('#btnAjouter').fadeIn();
           $('#listeActe').slideDown();
    }
  function informer(message)
  {
    $("#successDiv").slideDown('2000').delay(2000).fadeOut(2000);
    $("#successDiv").html('<p>' +message+ '</p>');
  }