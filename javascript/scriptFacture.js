$(function(){
	remplirTableSejour();
        //boucle                
          setInterval(function()
            {
              remplirTableSejour();
            },500);
          //event
          $('#rechercheFacture').keyup(function()
        {
          var rechercheFacture=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/tableRechercheFacture.php",
                  type: "POST",
                  data: {rechercheFacture: rechercheFacture},
                  success: function(data)
                    {
                      if(rechercheFacture!=''){
                        $("#tabSejour").css('display','none');
                        $("#tableRechercheFacture").css('display','block');
                        $("#tableRechercheFacture").html(data);
                      }
                      else
                      {
                        $("#tableRechercheFacture").css('display','none');
                        $("#tabSejour").css('display','block');
                      }         
                    }
                });    
        });     
})
function remplirTableSejour()
    {

      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/tableSejour.php",function(data){
        $("#tabSejour").html(data);
    });
    }
function editerFacture(lienE){
   $.get(lienE,function(data){
        if (data=='0') {
          alert("Aucune opération de correspond à cette patiente, veuillez vérifier dans la liste des opérations");
        }
        else
        {
          var tabVerify=data.split(',');
          if (confirm("Voulez-vous régler et éditer la facture de Mme "+tabVerify['1']+" ?")){
            $.getJSON("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/editerFacture.php?idRegistre="+tabVerify['0'],function(data){
                $.each(data,function(key,facture){
                    $('label#nom').empty();
                    $('label#prenom').empty();
                    $('label#service').empty();
                    $('label#acte').empty();
                    $('label#dateActe').empty();
                    $('label#operateur').empty();
                    $('label#mentionH').empty();
                    $('label#categorie').empty();
                    $('label#mentionT').empty();

                    $('label#nom').append(facture.nom);
                    $('label#prenom').append(facture.prenom);
                    $('label#service').append('Maternité');
                    $('label#acte').append(facture.acte);
                    $('label#dateActe').append(facture.dateOperation);
                    $('label#operateur').append(facture.operateur);
                    $('label#mentionH').append(facture.mention+'Ar');
                    $('label#categorie').append(facture.categorie);
                    $('label#mentionT').append(facture.loyer+'Ar');
    })        
    });
          }
        }
    });
}
function date(id)
{
date = new Date;
annee = date.getFullYear();
moi = date.getMonth();
mois = new Array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
j = date.getDate();
jour = date.getDay();
jours = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
h = date.getHours();
resultat = jours[jour]+' '+j+' '+mois[moi]+' '+annee;
document.getElementById(id).innerHTML = resultat;
setTimeout('date_heure("'+id+'")','1000');
return true;
}
function afficherFacture(lienA){
   $.getJSON(lienA,function(data){
    $.each(data,function(key,facture){
      $('#liste').slideToggle();
      $('label#nom').empty();
      $('label#prenom').empty();
      $('label#service').empty();
      $('label#acte').empty();
      $('label#dateActe').empty();
      $('label#operateur').empty();
      $('label#mentionH').empty();
      $('label#categorie').empty();
      $('label#mentionT').empty();

      $('label#nom').append(facture.nom);
      $('label#prenom').append(facture.prenom);
      $('label#service').append('Maternité');
      $('label#acte').append(facture.acte);
      $('label#dateActe').append(facture.dateOperation);
      $('label#operateur').append(facture.operateur);
      $('label#mentionH').append(facture.mention+'Ar');
      $('label#categorie').append(facture.categorie);
      $('label#mentionT').append(facture.loyer+'Ar');
      $('a#lienPDF').attr('href','http://localhost/Projet CHU-Gyneco-Obstetrique/action/visualisation/facture/facturePDF.php?idRegistre='+facture.registre);
      $('.btnService').fadeIn();
      
    })
        
    });
}
function retourFacture(){
  $('#liste').slideToggle();
  $('label#nom').empty();
  $('label#prenom').empty();
  $('label#service').empty();
  $('label#acte').empty();
  $('label#dateActe').empty();
  $('label#operateur').empty();
  $('label#mentionH').empty();
  $('label#categorie').empty();
  $('label#mentionT').empty();
  $('.btnService').fadeOut();
}