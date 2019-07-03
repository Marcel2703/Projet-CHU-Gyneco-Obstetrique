$(function(){
	//evenement lit
        $('#idChambre').keyup(function()
        {
          var idChambre=$(this).val();
          var longueur=idChambre.length;
          $('#idLit').empty();
          if (idChambre.length>0) {
            $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/lit/nbOccup.php",
                  type: "POST",
                  data: {idChambre: idChambre},
                  success: function(data)
                    {
                      var i=0;
                      while(i<data)  {
                        var suite=parseInt(i)+1;
                        var numLit=idChambre+suite;
                        $('#idLit').append("<option value="+numLit+">"+numLit+"</option>");
                        i++;
                      }
                    }
                });    
          };
          
        });
        $('#rechercheLit').keyup(function()
        {
          var rechercheLit=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/tableRechercheLit.php",
                  type: "POST",
                  data: {rechercheLit: rechercheLit},
                  success: function(data)
                    {
                      if(rechercheLit!=''){
                        $("#tabLit").css('display','none');
                        $("#tabRechercheLit").css('display','block');
                        $("#tabRechercheLit").html(data);
                      }
                      else
                      {
                        $("#tabRechercheLit").css('display','none');
                        $("#tabLit").css('display','block');
                      }         
                    }
                });    
        });
      //fin evenement lit
      remplirTableLit();
			setInterval(function()
            {
              remplirTableLit();
            },500);
      totalLit();
      setInterval(function()
            {
              totalLit();
            },1000);
      occupationAuto();
      setInterval(function()
            {
              occupationAuto();
            },500);
})

function ajoutLit()
    {
      var numLit = $("#idLit").val();
      var numChambre = $("#idChambre").val();
      if(numLit == "" || numChambre == "")
      {
      alert('erreur');
      }
    else if(!numLit.match(/[0-9]+$/))
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/lit/ajoutLit.php",
        type: "POST",
        data: {idLit: numLit, idChambre: numChambre},
        success: function(data)
        {
          if(data=='no'){
            alert('Ce lit existe déjà')
          }
          else{
            informer('Nouveau lit bien ajouté');
          }
          mamafaSelect();
        }});     
      }
    }
    function remplirTableLit()
    {
      $.get('http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/tableLit.php',function(data){

      $('#tabLit').html(data);
    });
    }
    function totalLit(){
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/totalLit.php",function(data){
        if(data<=1){
          $('label#totalLit').html(data+' Lit');
        }
        else{
          $('label#totalLit').html(data+' Lits');
        }
          
    });
    }
    function occupationAuto()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/lit/occupationAuto.php",function(data){
    });
    }
    function mamafaSelect(){
      $('#idLit').empty();
    }
    function deleteLit(lien){
   
      if (confirm('Voulez-vous vraiment supprimer ce lit? Cette action affèctera le sejour'))
        {
          $.get(lien,function(data){
           alert(data);
               });
        }   

}
function informer(message)
  {
    $("#successDiv").slideDown('2000').delay(2000).fadeOut(2000);
    $("#successDiv").html('<p>' +message+ '</p>');
  }