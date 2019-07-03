$(function(){
  $('#recherchePatienteRenseign').keyup(function()
        {
          var recherchePatienteRenseign=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/tableRechercheRenseignement.php",
                  type: "POST",
                  data: {recherchePatienteRenseign: recherchePatienteRenseign},
                  success: function(data)
                    {
                      if(recherchePatienteRenseign!=''){
                        $("#tableRegistre").css('display','none');
                        $("#tableRechercheRenseignement").css('display','block');
                        $("#tableRechercheRenseignement").html(data);
                      }
                      else
                      {
                        $("#tableRechercheRenseignement").css('display','none');
                        $("#tableRegistre").css('display','block');
                      }         
                    }
                });    
        });
	remplirTableRegistre();
        //boucle                
          setInterval(function()
            {
              remplirTableRegistre();
            },500);      
})
function remplirTableRegistre()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/tableRegistreRenseignement.php",function(data){
        $("#tableRegistre").html(data);
    });
    }
function choixRegistre(lien){
   $.get(lien,function(data){
    var tabHaza = data.split(',');
    var longue=tabHaza.length;
    var result=tabHaza[0];
    var idRegistre=tabHaza[1];
    var nomPatiente=tabHaza[2];
    if (result=='ajout') 
    {
        if (confirm('Voulez-vous passer à l\'écriture des renseignements de Mme '+nomPatiente+' ?'))
        {
           $('#listePatiente').slideToggle();
           $('#nomPatiente').empty();
           $('#nomPatiente').append(nomPatiente);
           $('#idRegistre').attr('value',idRegistre);
           $('#nom').attr('value','');
           $('#prenom').attr('value','');
           $('#naissance').attr('value','');
           $('#lieu').attr('value','');
           $('#pere').attr('value','');
           $('#mere').attr('value','');
           $('#domicile').attr('value','');
           $('#croyance').attr('value','');
           $('#profession').attr('value','');
           $('#situation').attr('value','');
           $('#contact').attr('value','');
           $('#btnModify').css('display','none');
           $('#btnAjout').css('display','inline-block');
           $('#btnAnnuler').css('display','inline-block');
           
        }

    }
    else
    {
      if (confirm('Voulez-vous passer à la modification des renseignements de Mme '+nomPatiente+' ?'))
        {
           var nom=tabHaza[3];
           var prenom=tabHaza[4];
           var naissance=tabHaza[5];
           var lieu=tabHaza[6];
           var pere=tabHaza[7];
           var mere=tabHaza[8];
           var domicile=tabHaza[9];
           var croyance=tabHaza[10];
           var profession=tabHaza[11];
           var situation=tabHaza[12];
           var contact=tabHaza[13];
           $('#listePatiente').slideToggle();
           $('#nomPatiente').empty();
           $('#nomPatiente').append(nomPatiente);
           $('#idRegistre').attr('value',idRegistre);

           $('#nom').attr('value',nom);
           $('#prenom').attr('value',prenom);
           $('#naissance').attr('value',naissance);
           $('#lieu').attr('value',lieu);
           $('#pere').attr('value',pere);
           $('#mere').attr('value',mere);
           $('#domicile').attr('value',domicile);
           $('#croyance').attr('value',croyance);
           $('#profession').attr('value',profession);
           $('#situation').attr('value',situation);
           $('#contact').attr('value',contact);

           $('#btnAjout').css('display','none');
           $('#btnModify').css('display','inline-block');
           $('#btnAnnuler').css('display','inline-block');
        }
    }        
    });
}
 function ajoutRenseignement()
    {
      var idRegistre = $("#idRegistre").val();
      var nom = $("#nom").val();
      var prenom = $("#prenom").val();
      var naissance = $("#naissance").val();
      var lieu = $("#lieu").val();
      var pere = $("#pere").val();
      var mere = $("#mere").val();
      var domicile = $("#domicile").val();
      var croyance = $("#croyance").val();
      var profession = $("#profession").val();
      var situation = $("#situation").val();
      var contact = $("#contact").val();
      if(idRegistre == "" || nom == "" || prenom == "" || naissance == "" || lieu == "" || pere == "" || mere == "" || domicile == "" || croyance == "" || profession == "" || situation == "" || contact == "")
      {
      alert('erreur');
      }
    else if(!idRegistre.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/renseignement/ajoutRenseignement.php",
        type: "POST",
        data: {idRegistre: idRegistre, nom: nom, prenom: prenom, naissance: naissance , lieu: lieu, pere: pere, mere: mere, domicile: domicile, croyance: croyance, profession: profession,  situation: situation, contact: contact},
        success: function(data)
        {
           $('#idRegistre').attr('value','');
           $('#btnAnnuler').css('display','none');
           $('#btnAjout').css('display','none');
           $('#listePatiente').slideToggle();
           $('#nomPatiente').empty();
           informer('Ajout renseignement réussie');
        }});     
      }
    }
     function modifyRenseignement()
    {
      var idRegistre = $("#idRegistre").val();
      var nom = $("#nom").val();
      var prenom = $("#prenom").val();
      var naissance = $("#naissance").val();
      var lieu = $("#lieu").val();
      var pere = $("#pere").val();
      var mere = $("#mere").val();
      var domicile = $("#domicile").val();
      var croyance = $("#croyance").val();
      var profession = $("#profession").val();
      var situation = $("#situation").val();
      var contact = $("#contact").val();
      if(idRegistre == "" || nom == "" || prenom == "" || naissance == "" || lieu == "" || pere == "" || mere == "" || domicile == "" || croyance == "" || profession == "" || situation == "" || contact == "")
      {
      alert('erreur');
      }
    else if(!idRegistre.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/renseignement/modifyRenseignement.php",
        type: "POST",
        data: {idRegistre: idRegistre, nom: nom, prenom: prenom, naissance: naissance , lieu: lieu, pere: pere, mere: mere, domicile: domicile, croyance: croyance, profession: profession,  situation: situation, contact: contact},
        success: function(data)
        {
           $('#idRegistre').attr('value','');
           $('#nom').attr('value','');
           $('#prenom').attr('value','');
           $('#naissance').attr('value','');
           $('#lieu').attr('value','');
           $('#pere').attr('value','');
           $('#mere').attr('value','');
           $('#domicile').attr('value','');
           $('#croyance').attr('value','');
           $('#profession').attr('value','');
           $('#situation').attr('value','');
           $('#contact').attr('value','');
           $('#btnModify').css('display','none');
           $('#btnAnnuler').css('display','none');
           $('#listePatiente').slideToggle();
           $('#nomPatiente').empty();
           informer('Modification renseignement réussie');
        }});     
      }
    }
    function annuler(){
           $('#idRegistre').attr('value','');
           $('#nom').attr('value','');
           $('#prenom').attr('value','');
           $('#naissance').attr('value','');
           $('#lieu').attr('value','');
           $('#pere').attr('value','');
           $('#mere').attr('value','');
           $('#domicile').attr('value','');
           $('#croyance').attr('value','');
           $('#profession').attr('value','');
           $('#situation').attr('value','');
           $('#contact').attr('value','');
           $('#btnModify').css('display','none');
           $('#btnAjout').css('display','none');
           $('#listePatiente').slideToggle();
           $('#nomPatiente').empty();
           $('#btnAnnuler').css('display','none');
    }
    function informer(message)
  {
    $("#successDiv").slideDown('2000').delay(2000).fadeOut(2000);
    $("#successDiv").html('<p>' +message+ '</p>');
  }