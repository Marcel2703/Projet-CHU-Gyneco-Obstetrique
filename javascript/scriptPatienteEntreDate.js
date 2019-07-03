$(function(){
  $.getScript("http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui/jquery-ui.js", function() {
    $( "#dateInitialPat,#dateFinalPat").datepicker({
      dateFormat:'dd/mm/yy',
      changeMonth:true,
      changeYear:true,
    });
});
   
})
function remplirListePatiente()
    {
      var calendrierInitiale=$('#dateInitialPat').val();
      var calendrierFinale=$('#dateFinalPat').val();
      var dateInitial=mamadikaCalendrier(calendrierInitiale);
      var dateFinal=mamadikaCalendrier(calendrierFinale);
       $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/listePatiente.php",
                  type: "POST",
                  data: {dateInitiale: dateInitial,dateFinale: dateFinal},
                  success: function(data)
                    {
                        $("#tabListePatiente").html(data);
                    }
                    
                    }
                );    
    }
function mamadikaCalendrier(date){
  var tabDate=date.split('/');
  var jour=tabDate[0];
  var mois=tabDate[1];
  var annee=tabDate[2];
  var dateSql=annee+'-'+mois+'-'+jour;
  return dateSql;
}
function recupTotalPatiente()
    {
      var calendrierInitiale=$('#dateInitialPat').val();
      var calendrierFinale=$('#dateFinalPat').val();
      var dateInitial=mamadikaCalendrier(calendrierInitiale);
      var dateFinal=mamadikaCalendrier(calendrierFinale);
       $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/totalPatiente.php",
                  type: "POST",
                  data: {dateInitiale: dateInitial,dateFinale: dateFinal},
                  success: function(data)
                    {
                        if(data<1){
                          $('label#totalPatiente').html('Aucune Patiente');
                                    }
                        else if(data==1){
                          $('label#totalPatiente').html('Une Patiente');
                                    }
                      else{
                          $('label#totalPatiente').html(data+' Patientes');
                    }
                    
                    }
                });    
    }
