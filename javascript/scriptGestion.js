$(function(){
    $('#idRegistre').keyup(function()
        {
          var recherchePatiente=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/gestion/mamenoIdRegistre.php",
                  type: "POST",
                  data: {recherchePatiente: recherchePatiente},
                  success: function(data)
                    {
                        $('#nom_patiente').attr('value',data);       
                    }
                });    
        });
     remplirSelect();
})
	function requeteCategorie()
		{
 			var requeteCateg=$("#requeteCateg").val();
      var requeteEtatChambre=$("#requeteEtatChambre").val();
 				$.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/tableGestionChambre.php",
                  type: "POST",
                  data: {requeteCateg: requeteCateg,requeteEtatChambre:requeteEtatChambre},
                  success: function(data)
                    {
                      $("#tabGestion").html(data);      
                    }
                });    
		}
    function reserver(idChambre,lien){
      $.get(lien,function(data)
        {
        $("#idLit").html(data);
        $('#idChambre').attr('value',idChambre);
        $('#rechercheMobile').slideToggle('1000');
        $('#reservAfenina').slideToggle('1000');
        $('.btnReserv').css('display','none');
        });
     
    }
    function hialaReservation(){
      $('#idChambre').attr('value','');
      $('#reservAfenina').slideToggle('1000');
      $('#rechercheMobile').slideToggle('1000');
      $('.btnReserv').css('display','block');
    }
    function ajoutSejour()
    {
      var numChambre = $("#idChambre").val();
      var numLit = $("#idLit").val();
      var numRegistre = $("#idRegistre").val();
      var nomPatiente = $("#nom_patiente").val();
      if(numChambre == "" || numLit == "" || numRegistre == "" || nomPatiente == "")
      {
      alert(data);
      }
    else if(!numRegistre.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/gestion/reservChambre.php",
        type: "POST",
        data: {idChambre: numChambre, idLit: numLit,idRegistre: numRegistre, nomPatiente:nomPatiente },
        success: function(data)
        {
          alert(data);
        }});     
      }
    }
     function remplirSelect()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/gestion/listeCateg.php",function(data){
      $("#requeteCateg").html(data);
    });
    }   