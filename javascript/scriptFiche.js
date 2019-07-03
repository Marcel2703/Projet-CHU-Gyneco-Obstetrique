$(function(){
	remplirTableRegFiche();
        //boucle                
          setInterval(function()
            {
              remplirTableRegFiche();
            },500);

        $('#rechercheFiche').keyup(function()
        {
          var rechercheFiche=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/tableRechercheFiche.php",
                  type: "POST",
                  data: {rechercheFiche: rechercheFiche},
                  success: function(data)
                    {
                      if(rechercheFiche!=''){
                        $("#tabRegistreFiche").css('display','none');
                        $("#tableRechercheFiche").css('display','block');
                        $("#tableRechercheFiche").html(data);
                      }
                      else
                      {
                        $("#tableRechercheFiche").css('display','none');
                        $("#tabRegistreFiche").css('display','block');
                      }         
                    }
                });    
        });     
})
function remplirTableRegFiche()
    {

      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/tableRegFiche.php",function(data){
        $("#tabRegistreFiche").html(data);
    });
    }
function choixFiche(lien){
  $.get(lien,function(data){
      var tabHaza = data.split(',');
      var longue=tabHaza.length;
      var idRegistre=tabHaza[0];
      var nom=tabHaza[1];
      if (confirm('Voulez-vous obtenir la fiche clinique de Mme '+nom+' ?')){
           $('#nomPatiente').empty();
           $('#nomPatiente').append(nom);
           $('#tableAfenina,.btnService').fadeIn('slow');
           $('#liste').slideToggle('slow');
           recupRenseignement();
           recupModif();
           recupEntree();
           recupExamAvant();
           recupImageExamAvant();
           recupExamApres();
           recupVisite() 
         }
        });        
}
function recupRenseignement(){
   $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/recupRenseignement.php",function(data){
    var tabHaza = data.split(',');
           var nom=tabHaza[0];
           var prenom=tabHaza[1];
           var age=tabHaza[2]+' ans';
           var lieu=tabHaza[3];
           var pere=tabHaza[4];
           var mere=tabHaza[5];
           var domicile=tabHaza[6];
           var croyance=tabHaza[7];
           var profession=tabHaza[8];
           var situation=tabHaza[9];
           var registre=tabHaza[10];
           $('#nom').append(nom);
           $('#prenom').append(prenom);
           $('#age').append(age);
           $('#lieu').append(lieu);
           $('#pere').append(pere);
           $('#mere').append(mere);
           $('#domicile').append(domicile);
           $('#croyance').append(croyance);
           $('#profession').append(profession);
           $('#situation').append(situation);
           $('a#lienPDF').attr('href','http://localhost/Projet CHU-Gyneco-Obstetrique/action/visualisation/fiche/fichePDF.php?idRegistre='+registre);  
    });
}
function recupModif(){
   $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/recupMotif.php",function(data){
      $('#motif').append(data);
    });
}
function recupEntree(){
   $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/recupEntree.php",function(data){
      $('#entree').append(data)
    });
}
function recupExamAvant(){
   $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/recupExamAvant.php",function(data){
      $('#examAvant').html(data)
    });
}
function recupImageExamAvant(){
   $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/recupImageExamAvant.php",function(data){
      $('#illustrationAvant').html(data)
    });
}
recupImageExamAvant.php
function recupExamApres(){
   $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/recupExamApres.php",function(data){
      $('#examApres').html(data)
    });
}
function recupVisite(){
   $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/recupVisite.php",function(data){
      $('#tabListeVisite').html(data)
    });
}
function retourFiche(){
           $('#nomPatiente').empty();
           $('#tableAfenina,.btnService').fadeOut('slow');
           $('#liste').slideToggle('slow');
           $('#nom').empty();
           $('#prenom').empty();
           $('#age').empty();
           $('#lieu').empty();
           $('#pere').empty();
           $('#mere').empty();;
           $('#domicile').empty();
           $('#croyance').empty();
           $('#profession').empty();
           $('#situation').empty();
           $('#motif').empty();
$('#entree').empty();
$('#examAvant').empty();
$('#examApres').empty();
$('#tabListeVisite').empty();
$('#illustrationAvant').empty();   
}
//<a href="javascript:window.print() id=""></a>