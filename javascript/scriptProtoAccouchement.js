$(function(){
   remplirListeProtocoleA();
    setInterval(function()
            {
              remplirListeProtocoleA();
            },500);
    //
    var libelleA=["Age gestationnel","Risques","Degagement","Instrument","Indice d'Apgar/M1","Indice d'Apgar/M5","Indice d'Apgar/M10","Paramètres/Poids","Paramètres/Taille","Paramètres/PC","Paramètres/PT","Paramètres/PB","Couleur du LA","Cordon","Aspiration des VAS","Aspiration des VAS/OUI","Réanimation","Oxygénation","Oxygénation/OUI","Malformation externe visible","Malformation externe visible/NON","Anus","Choanes","Délivrance","Placenta","Révision utérine","Révision utérine/OUI","Périnée","Hémorragie","Globe utérin","TA après la délivrance","Médicaments reçus par le nouveau-né","DR","SF","Elève"]
    $('#element').autocomplete({minLength:2 ,source : libelleA, select:function(event,ui){
      setTimeout("var lib=$('#element').val();var val=misafidyValeurA(lib);autoValeurA(val)",500);
    }})
})
function misafidyValeurA(libelle){
  switch (libelle) {
    case 'Risques':
        var valeur=["Surdistension","Cicatriciel","HTA"];
    break;
    case 'Degagement':
        var valeur=["OS","OP","Neuro pubien"];
    break;
    case 'Instrument':
        var valeur=["Rien","FORCEPSDETARIES","VACUUM","SPATULES"];
    break;
    case 'Couleur du LA':
        var valeur=["Clair","Méconial","Purée de poids","Hémorragie"];
    break;
    case 'Cordon':
        var valeur=["Echarpe","Circulaire","2 artères","Autres"];
    break;
    case 'Aspiration des VAS':
        var valeur=["OUI","NON"];
    break;
    case 'Aspiration des VAS/OUI':
        var valeur=["Sécretions muqueuses","La méconial"];
    break;
    case 'Réanimation':
        var valeur=["OUI","NON"];
    break;
    case 'Oxygénation':
        var valeur=["OUI","NON"];
    break;
    case 'Oxygénation/OUI':
        var valeur=["Au masque","Lunette","Ventillation","Intubation"];
    break;
    case 'Malformation externe visible':
        var valeur=["OUI","NON"];
    break;
    case 'Malformation externe visible/NON':
        var valeur=["Lèvre","Abdomen","Pieds"];
    break;
    case 'Anus':
        var valeur=["Perméable","Non perméable"];
    break;
    case 'Choanes':
        var valeur=["Perméable","Non perméable"];
    break;
    case 'Délivrance':
        var valeur=["Normale spontanée","Normale naturelle","Dirigée","Manuelle"];
    break;
    case 'Placenta':
        var valeur=["Complet","Incomplet","Autres"];
    break;
    case 'Révision utérine':
        var valeur=["OUI","NON"];
    break;
    case 'Révision utérine/OUI':
        var valeur=["Placenta incomplet","Ecouvillonnage à la Bétadine","Cicatriciel"];
    break;
    case 'Périnée':
        var valeur=["Intact","Episiottomie","Déchirure périnée 1er","Déchirure périnée 2e","Déchirure périnée 3e"];
    break;
    case 'Hémorragie':
        var valeur=["Absente","Normale","Abondante"];
    break;
    case 'Fermeture pariétale/Rapprochement musculaire/Sous cutané':
        var valeur=["Surjet","Séparé","Non séparé"];
    break;
    case 'Globe utérin':
        var valeur=["Bien formé","Hypotonique"];
    break;
  }
   return valeur;
}
function autoValeurA(valeur){
  $('#valeur').autocomplete({source: valeur})
}
function remplirListeProtocoleA()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/listeProtocoleA.php",function(data){
      $("#tabAutresProtoA").html(data);
    });
    }
function verifierClavierProtocoleA()
    {
      var idBebeA=$('#idBebeA').val();
      var idOperationA=$('#idOperationA').val();
      $.ajax({
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/protocole/clavierVerifier.php?",
        type: "POST",
        data: {idBebe: idBebeA,idOperation: idOperationA},
        success: function(data)
        {
          if(data=='oui'){
          var btnAjouterA = document.getElementById('btnAjoutA');
          btnAjouterA.disabled = true;
          var btnSuivantA = document.getElementById('suivantA');
          btnSuivantA.disabled = false;
        }
        else{
          var btnAjouterA = document.getElementById('btnAjoutA');
          btnAjouterA.disabled = false;
          var btnSuivantA = document.getElementById('suivantA');
          btnSuivantA.disabled = true;
        }
        }});     
    }
function ajoutAutresProtocoleA()
    {
      var numOperation = $("#idOperationA").val();
      var numBebe = $("#idBebeA").val();
      var element = $("#element").val();
      var valeur = $("#valeur").val();
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
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/protocole/ajoutProtocoleA.php",
        type: "POST",
        data: {idOperation: numOperation,idBebe: numBebe, element: element, valeur: valeur },
        success: function(data)
        {
          $('#element').val('');
        $('#valeur').val(''); 
        }});
            
      }
    }
    
  function ajoutProtocolePrincipaleA(){
    var numOperation = $("#idOperationA").val();
    var numBebe = $("#idBebeA").val();
    var elmDateDelivrance=$("#dateDelivrance").attr('name');
    var dateDelivrance=$("#date_delivranceA").val();
    var elmHeureDelivrance=$("#heureDelivrance").attr('name');
    var heureDelivrance=$("#heure_delivranceA").val();
    var elmNomBebe=$("#nomBebeA").attr('name');
    var nomBebe=$('#nom_bebeA').val();
    var elmPrenomBebe=$('#prenomBebeA').attr('name');
    var prenomBebe=$('#prenom_bebeA').val();
    var elmSexe=$('#sexeA').attr('name');
    var sexe=$('#_sexeA').val();
    var elmEtat=$('#etatA').attr('name');
    var etat=$('#_etatA').val();
    var dateSql=mamadikaCalendrier(dateDelivrance);
     if(heureDelivrance == "" || nomBebe == "" || prenomBebe == "" || dateDelivrance == "" || heureDelivrance == "")
      {
      alert('Erreur');
      }
    else
      {
      $.ajax({
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/protocole/terminerProtocoleA.php",
        type: "POST",
        data: {idOperation: numOperation,idBebe: numBebe, elmHeureDelivrance: elmHeureDelivrance, elmDateDelivrance: elmDateDelivrance, dateDelivrance: dateSql, heureDelivrance: heureDelivrance, elmNomBebe: elmNomBebe, nomBebe: nomBebe,  elmPrenomBebe: elmPrenomBebe, prenomBebe: prenomBebe, elmSexe: elmSexe, sexe: sexe, elmEtat: elmEtat, etat: etat },
        success: function(data)
        {
          if (data=='non') {
            alert("Erreur: Vous avez dûes faire une erreur dans le classement des bébés, supprimer d'abord l'opération effectuée après cette opération");
          }
          else{
            
          }
          
        }});     
      }
  }
  function terminerProtocoleA(){           
      var numOperation = $("#idOperationA").val();
      var numBebe = $("#idBebeA").val();
      var element = $("#element").val();
      var valeur = $("#valeur").val();
    if(numOperation != "" && element != "" && valeur != "" && numBebe!=""){
        $.ajax({
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/protocole/ajoutProtocoleC.php",
        type: "POST",
        data: {idOperation: numOperation ,idBebe: numBebe, element: element, valeur: valeur },
        success: function(data)
        {
        }});
           $('.carousel').carousel(0);
           $('.carousel').carousel('pause');
           $('#nomPatienteA').empty();
           $('#dateActeA').empty();
           $('#liste').slideToggle();
           $('#recherchePatiente').focus();
    }
    else{
          $('.carousel').carousel(0);
           $('.carousel').carousel('pause');
           $('#nomPatienteA').empty();
           $('#dateActeA').empty();
           $('#liste').slideToggle();
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