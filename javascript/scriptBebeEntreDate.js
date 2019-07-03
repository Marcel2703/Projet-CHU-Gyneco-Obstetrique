$(function(){
   $.getScript("http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui/jquery-ui.js", function() {
     $( "#dateInitialBebe,#dateFinalBebe").datepicker({
      dateFormat:'dd/mm/yy',
      changeMonth:true,
      changeYear:true,
     });
});
})
function remplirListeBebe()
    {
      var calendrierInitiale=$('#dateInitialBebe').val();
      var calendrierFinale=$('#dateFinalBebe').val();
      var dateInitial=mamadikaCalendrier(calendrierInitiale);
      var dateFinal=mamadikaCalendrier(calendrierFinale);
       $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/listeBebe.php",
                  type: "POST",
                  data: {dateInitiale: dateInitial,dateFinale: dateFinal},
                  success: function(data)
                    {
                        $("#tabListeBebe").html(data);
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
function recupTotalBebe()
    {
      var calendrierInitiale=$('#dateInitialBebe').val();
      var calendrierFinale=$('#dateFinalBebe').val();
      var dateInitial=mamadikaCalendrier(calendrierInitiale);
      var dateFinal=mamadikaCalendrier(calendrierFinale);
       $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/totalBebe.php",
                  type: "POST",
                  data: {dateInitiale: dateInitial,dateFinale: dateFinal},
                  success: function(data)
                   {
                        if(data<1){
                          $('label#totalBebe').html('Aucun Bébé');
                                    }
                        else if(data==1){
                          $('label#totalBebe').html('Un Patiente');
                                    }
                      else{
                          $('label#totalBebe').html(data+' Bébés');
                    }
                    
                    }
                });    
    }