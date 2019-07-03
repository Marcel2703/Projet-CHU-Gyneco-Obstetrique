$(function(){
   $.getScript("http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui-1/jquery-ui.js", function() {
    var libelle=["Indication","Type","Anesthésie","Incision","Excision de l'ancienne","A l'ouverture","Segment inferieur amplie","Hystérotomie","Extraction","Liquide amniotique","Délivrance","Hystérroraphie","Péritonisation","Contrôle de l'hémostase","Décompte de textile/Compressé","Décompte de textile/Champs abdominaux","Lavage péritoniale","Fermeture pariétale/Péritoine","Fermeture pariétale/Rapprochement musculaire","Fermeture pariétale/Rapprochement musculaire/Aponévrose","Fermeture pariétale/Rapprochement musculaire/Sous cutané","Fermeture de la peau"]
    $('#element').autocomplete({minLength:2 ,source : libelle, select:function(event,ui){
      setTimeout("var lib=$('#idChambre').val();misafidyValeur(lib);",1000,function(){});
    }})
})
 })
function misafidyValeur(libelle){
  switch (libelle) {
    case 'Indication':
        var valeur=["Pure","Non pure"];
    break;
  }
   alert(valeur);
}
function remplirListeReservation()
    {
      var idChambre=$('#idChambre').val();
       $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/listeReservation.php",
                  type: "POST",
                  data: {idChambre: idChambre},
                  success: function(data)
                    {
                        $("#tabListeReservEntreDate").html(data);
                        
                    }
                    
                    }
                );       
    }
function recupTotal(){
var idChambre=$('#idChambre').val();
  $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/totalReserv.php",
                  type: "POST",
                  data: {idChambre: idChambre},
                  success: function(data)
                    {
                       var tab=data.split(',');
                        $("#idPorte").html(tab['0']);
                        if (tab['1']==1) {$("#totalReserv").html(tab['1']+' réservation');};
                        $("#totalReserv").html(tab['1']+' réservations');

                    }
                    
                    }
                );    
}