$(function(){
   remplirListeProtocoleC();
    setInterval(function()
            {
              remplirListeProtocoleC();
            },500);
    //
    var libelle=["Indication","Type","Anesthésie","Incision","Excision de l'ancienne","A l'ouverture","Segment inferieur amplie","Hystérotomie","Extraction","Liquide amniotique","Délivrance","Hystérroraphie","Péritonisation","Contrôle de l'hémostase","Décompte de textile/Compressé","Décompte de textile/Champs abdominaux","Lavage péritoniale","Fermeture pariétale/Péritoine","Fermeture pariétale/Rapprochement musculaire","Fermeture pariétale/Rapprochement musculaire/Aponévrose","Fermeture pariétale/Rapprochement musculaire/Sous cutané","Fermeture de la peau","Autres gestes ou remarques","Opérateur","Aide","Anesthésiste","Infirmier","Sage Femme","Autres"]
    $('#element1').autocomplete({minLength:2 ,source : libelle, select:function(event,ui){
      setTimeout("var lib=$('#element1').val();var val=misafidyValeur(lib);autoValeur(val)",500);
    }})
})
function misafidyValeur(libelle){
  switch (libelle) {
    case 'Indication':
        var valeur=["Pure","Non pure"];
    break;
    case 'Type':
        var valeur=["Urgente","Programmée","Provenance"];
    break;
    case 'Anesthésie':
        var valeur=["ALR","AG"];
    break;
    case 'Incision':
        var valeur=["STARK","PLANNENSTIEL","LMSO"];
    break;
    case 'A l\'ouverture':
        var valeur=["Epanchement","Non epanchement"];
    break;
    case 'Segment inferieur amplie':
        var valeur=["OUI","NON"];
    break;
    case 'Hystérotomie':
        var valeur=["Segmentaire transversale","Suprasegmentaire","Corporeale verticale","Segmentocorporeale"];
    break;
    case 'Extraction':
        var valeur=["Enucleation cephalique","Traction podalique","Inguinale","VMI"];
    break;
    case 'Liquide amniotique':
        var valeur=["Clair","Méconial","Hémorragique","FETIDE","Sans odeur"];
    break;
    case 'Délivrance':
        var valeur=["Assisté","Manuelle"];
    break;
    case 'Hystérroraphie':
        var valeur=["Surjet","Points séparés simples","points séparés en X"];
    break;
    case 'Péritonisation':
        var valeur=["OUI","NON"];
    break;
    case 'Contrôle de l\'hémostase':
        var valeur=["Facile","Difficile"];
    break;
    case 'Décompte de textile/Compressé':
        var valeur=["Complet","Incomplet"];
    break;
    case 'Décompte de textile/Champs abdominaux':
        var valeur=["Complet","Incomplet"];
    break;
    case 'Lavage péritoniale':
        var valeur=["OUI","NON"];
    break;
    case 'Fermeture pariétale/Péritoine':
        var valeur=["OUI","NON"];
    break;
    case 'Fermeture pariétale/Rapprochement musculaire':
        var valeur=["OUI","NON"];
    break;
    case 'Fermeture pariétale/Rapprochement musculaire/Aponévrose':
        var valeur=["Surjet","Séparé en X"];
    break;
    case 'Fermeture pariétale/Rapprochement musculaire/Sous cutané':
        var valeur=["Surjet","Séparé","Non séparé"];
    break;
    case 'Fermeture de la peau':
        var valeur=["Surjet intradermique","BLAIR DONATI"];
    break;
  }
   return valeur;
}
function autoValeur(valeur){
  $('#valeur1').autocomplete({source: valeur})
}
function remplirListeProtocoleC()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/listeProtocoleC.php",function(data){
      $("#tabAutresProtoC").html(data);
    });
    }
function ajoutAutresProtocoleC()
    {
      var numOperation = $("#idOperationC").val();
      var numBebe = $("#idBebe1").val();
      var element = $("#element1").val();
      var valeur = $("#valeur1").val();
      if(numOperation == "" || element == "" || valeur == "")
      {
      alert('erreur');
      }
    else if(!numOperation.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/protocole/ajoutProtocoleC.php",
        type: "POST",
        data: {idOperation: numOperation ,idBebe: numBebe, element: element, valeur: valeur },
        success: function(data)
        {
          $('#element1').val('');
        $('#valeur1').val('');
        }});     
      }
    }
    
  function ajoutProtocolePrincipaleC(){
    var numOperation = $("#idOperationC").val();
    var numBebe = $("#idBebe1").val();
    var elmDateExtraction=$("#dateExtraction1").attr('name');
    var dateExtraction=$("#date_extraction1").val();
    var elmHeureExtraction=$("#heureExtraction1").attr('name');
    var heureExtraction=$("#heure_extraction1").val();
    var elmNomBebe=$("#nomBebe1").attr('name');
    var nomBebe=$('#nom_bebe1').val();
    var elmPrenomBebe=$('#prenomBebe1').attr('name');
    var prenomBebe=$('#prenom_bebe1').val();
    var elmSexe=$('#sexe1').attr('name');
    var sexe=$('#_sexe1').val();
    var elmEtat=$('#etat1').attr('name');
    var etat=$('#_etat1').val();
    var dateSql=mamadikaCalendrier(dateExtraction);
     if(heureExtraction == "" || nomBebe == "" || prenomBebe == "" || dateExtraction == "" || heureExtraction == "")
      {
      alert('erreur');
      }
    else
      {
      $.ajax({
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/protocole/terminerProtocoleC.php",
        type: "POST",
        data: {idOperation: numOperation ,idBebe: numBebe, elmDateExtraction: elmDateExtraction, dateExtraction: dateSql, elmHeureExtraction: elmHeureExtraction, heureExtraction: heureExtraction, elmNomBebe: elmNomBebe, nomBebe: nomBebe,  elmPrenomBebe: elmPrenomBebe, prenomBebe: prenomBebe, elmSexe: elmSexe, sexe: sexe, elmEtat: elmEtat, etat: etat },
        success: function(data)
        {
        }});     
      }
  }
  function terminerProtocoleC(){
      var numOperation = $("#idOperationC").val();
      var numBebe = $("#idBebe1").val();
      var element = $("#element1").val();
      var valeur = $("#valeur1").val();
    if(numOperation != "" && element != "" && valeur != "" && numBebe!=""){
        $.ajax({
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/protocole/ajoutProtocoleC.php",
        type: "POST",
        data: {idOperation: numOperation ,idBebe: numBebe, element: element, valeur: valeur },
        success: function(data)
        {
        }});
          $('#liste').slideToggle();
          $('.carousel').carousel(1);
          $('.carousel').carousel('pause');
          $('#nomPatienteC').empty();
          $('#dateActeC').empty();
          $('#recherchePatiente').focus();
    }
    else{
          $('#liste').slideToggle();
          $('.carousel').carousel(1);
          $('.carousel').carousel('pause');
          $('#nomPatienteC').empty();
          $('#dateActeC').empty();
          $('#recherchePatiente').focus();
    }
           
  }
  function mamadikaCalendrier(date){
  var tabDate=date.split('/');
  var jour=tabDate[0];
  var mois=tabDate[1];
  var annee=tabDate[2];
  var dateSql=annee+'-'+mois+'-'+jour;
  return dateSql;
}