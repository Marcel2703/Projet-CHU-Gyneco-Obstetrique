$(function(){
  $('#rechercheBebe').keyup(function()
        {
          var rechercheBebe=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/tableRechercheBebe.php",
                  type: "POST",
                  data: {rechercheBebe: rechercheBebe},
                  success: function(data)
                    {
                      if(rechercheBebe!=''){
                        $("#tableBebe").css('display','none');
                        $("#tableRechercheBebe").css('display','block');
                        $("#tableRechercheBebe").html(data);
                      }
                      else
                      {
                        $("#tableRechercheBebe").css('display','none');
                        $("#tableBebe").css('display','block');
                      }         
                    }
                });    
        });
	//evenement personnel
      //fin evenement personnel

      remplirTableBebe();
      setInterval(function()
            {
              remplirTableBebe();
            },500);
})
//fonction personnel
    function remplirTableBebe()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/tableBebe.php",function(data){
      $("#tableBebe").html(data);
    });
    }
    function ajoutBebe()
    {
      var idBebe = $("#idBebe").val();
      var idOperation = $("#idOperation").val();
      var nomBebe = $("#nomBebe").val();
      var nomPatiente = $("#nomPatiente").val();
      if(idOperation == "" || nomBebe == "" || nomPatiente == "")
      {
      alert('erreur');
      }
    else if(!idOperation.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/bebe/ajoutBebe.php",
        type: "POST",
        data: {idOperation: idOperation, nomBebe: nomBebe, nomPatiente: nomPatiente },
        success: function(data)
        {
          alert(data);
        }});     
      }
    }