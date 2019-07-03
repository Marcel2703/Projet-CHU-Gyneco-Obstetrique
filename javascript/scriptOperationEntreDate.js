$(function(){
  $.getScript("http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui/jquery-ui.js", function() {
    $( "#dateInitialOp,#dateFinalOp").datepicker({
      dateFormat:'dd/mm/yy',
      changeMonth:true,
      changeYear:true,
    });
});
})
   
function remplirListeOperation()
    {
      var calendrierInitiale=$('#dateInitialOp').val();
      var calendrierFinale=$('#dateFinalOp').val();
      var dateInitial=mamadikaCalendrier(calendrierInitiale);
      var dateFinal=mamadikaCalendrier(calendrierFinale);
      var type=$('#requeteOperation').val();
       $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/listeOperation.php",
                  type: "POST",
                  data: {dateInitiale: dateInitial,dateFinale: dateFinal,type: type},
                  success: function(data)
                    {
                        $("#tabListeOperationEntreDate").html(data);
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
function recupTotalOperation()
    {
      var calendrierInitiale=$('#dateInitialOp').val();
      var calendrierFinale=$('#dateFinalOp').val();
      var dateInitial=mamadikaCalendrier(calendrierInitiale);
      var dateFinal=mamadikaCalendrier(calendrierFinale);
      var type=$('#requeteOperation').val();
       $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/totalOperation.php",
                  type: "POST",
                  data: {dateInitiale: dateInitial,dateFinale: dateFinal,type: type},
                  success: function(data)
                    {
                        if(data<1){
                          $('label#totalOperation').html('Aucune Opération');
                                    }
                        else if(data==1){
                          $('label#totalOperation').html('Une opération');
                                    }
                      else{
                          $('label#totalOperation').html(data+' Opérations');
                    }
                    
                    }
                });    
    }