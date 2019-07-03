$(function(){
	remplirTableOperation();

        //boucle                
          setInterval(function()
            {
              remplirTableOperation();
            },500);
  remplirSelectIdRegistre();
  remplirSelectActe();
  remplirOperation();
  remplirSelectOperateur();
  recupDateHeureToday()
  setInterval(function()
            {
              remplirOperation();
            },3000);
          //event
          $('#rechercheOperation').keyup(function()
        {
          var rechercheOperation=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/tableRechercheOperation.php",
                  type: "POST",
                  data: {rechercheOperation: rechercheOperation},
                  success: function(data)
                    {
                      if(rechercheOperation!=''){
                        $("#tabOperation").css('display','none');
                        $("#tableRechercheOperation").css('display','block');
                        $("#tableRechercheOperation").html(data);
                      }
                      else
                      {
                        $("#tableRechercheOperation").css('display','none');
                        $("#tabOperation").css('display','block');
                      }         
                    }
                });    
        });
})
function recupDateHeureToday()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/dateHeureToday.php",function(data){
      $('#dateOperation').attr('value',data);
    });
    }
function mamadikaCalendrier(date){
  var tabDate=date.split('/');
  var jour=tabDate[0];
  var mois=tabDate[1];
  var annee=tabDate[2];
  var dateSql=annee+'-'+mois+'-'+jour;
  return dateSql;
}
 function ajoutOperation()
    {
      var numOperation = $("#numOperation").val();
      var typeActe = $("#typeActe").val();
      var idRegistre= $('#idRegistre').val();
      var operateur = $("#operateur").val();
      var dateOperation = $("#dateOperation").val();
      var extractionDatetime=dateOperation.split(' ');
      var dateRery=extractionDatetime['0'];
      var leraRery=extractionDatetime['1'];
      var dateSqlRery=mamadikaCalendrier(dateRery);
      var dateOperationFinal=dateSqlRery+' '+leraRery;
      if(numOperation == "" || typeActe == "" || idRegistre == "" || operateur == "" || dateOperation == "")
      {
      alert('Veuillez compléter tous les champs');
      }
      else if(idRegistre== null){
       alert('Vérifier s\'il y a une patiente à opérer');  
      }
    else if(!numOperation.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/operation/ajoutOperation.php",
        type: "POST",
        data: {numOperation: numOperation, typeActe: typeActe, idRegistre: idRegistre,operateur:operateur, dateOperation: dateOperationFinal },
        success: function(data)
        {
          if(data=='no'){
            alert('Cett opération existe déjà')
          }
          else{
            informer('Nouvelle opération bien enregistrée');
          }
        }});     
      }
    }
    function remplirTableOperation()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/tableOperation.php",function(data){
      $("#tabOperation").html(data);
    });
    }
    function remplirOperation()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/remplirOperation.php",function(data){
      $("#numOperation").attr('value',data);
    });
    }
    function choixOperation(lien){
   $.get(lien,function(data){
    var tabHaza = data.split(',');
      if (confirm('Voulez-vous passer à la modification de cette opération?'))
        {
           var idOperation=tabHaza[0];
           var idActe=tabHaza[1];
           var idRegistre=tabHaza[2];
           var operateur=tabHaza[3];
           var dateOperation=tabHaza[4];
           $('#listeOperation').slideToggle();
           $('#numOperation').css('display','none');
           $('#typeActe').css('display','none');
           $('#idRegistre').css('display','none');
           $('#modifActe').css('display','inline-block');
           $('#modifRegistre').css('display','inline-block');
           $('#btnModify').css('display','inline-block');
           $('#modifIdOperation').css('display','inline-block');
           $('#modifIdOperation').attr('value',idOperation);
           $('#modifActe').attr('value',idActe);
           $('#modifRegistre').attr('value',idRegistre);
           $('#operateur').attr('value',operateur);
           $('#dateOperation').attr('value',dateOperation);
           $('#btnAjouter').css('display','none');
           $('#btnModify').css('display','inline-block');
        }   
    });
}
function enregistrerOperation()
    {
      var numOperation = $("#modifIdOperation").val();
      var typeActe = $("#modifActe").val();
      var idRegistre= $('#idRegistre').val();
      var operateur = $("#operateur").val();
      var dateOperation = $("#dateOperation").val();
      if(numOperation == "" || typeActe == "" || idRegistre == "" || operateur == "")
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
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/operation/modifyOperation.php",
        type: "POST",
        data: {numOperation: numOperation, typeActe: typeActe, idRegistre: idRegistre,operateur:operateur, dateOperation: dateOperation },
        success: function(data)
        {
           $('#numOperation').attr('value','');
           $('#typeActe').attr('value','');
           $('#idRegistre').attr('value','');
           $('#operateur').attr('value','');
           $('#dateOperation').attr('value','');
           $('#listeOperation').slideToggle();
           $('#typeActe').css('display','inline-block');
           $('#idRegistre').css('display','inline-block');
           $('#modifActe').css('display','none');
           $('#modifRegistre').css('display','none');
           $('#modifIdOperation').css('display','none');
           $('#btnModify').fadeOut();
           $('#btnAjouter').fadeIn();
           informer(data);
        }});     
      }
    }
    function annulerOperation()
    {
           $('#numOperation').attr('value','');
           $('#typeActe').css('display','inline-block');
           $('#idRegistre').css('display','inline-block');
           $('#modifActe').css('display','none');
           $('#modifRegistre').css('display','none');
           $('#modifIdOperation').css('display','none');
           $('#listeOperation').slideDown();
           $('#btnModify').fadeOut();
           $('#btnAjouter').fadeIn();
           $('#typeActe').fadeIn();
           $('#idRegistre').fadeIn();
           $('#modifActe').fadeOut();
           $('#modifRegistre').fadeOut();
    }
    function remplirSelectIdRegistre()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/operation/selectIdRegistre.php",function(data){
      $("select#idRegistre").html(data);
    });
    }
    function remplirSelectActe()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/operation/selectActe.php",function(data){
      $("select#typeActe").html(data);
    });
    }
    function remplirSelectOperateur()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/operation/selectOperateur.php",function(data){
      $("select#operateur").html(data);
    });
    }
    function informer(message)
  {
    $("#successDiv").slideDown('2000').delay(2000).fadeOut(2000);
    $("#successDiv").html('<p>' +message+ '</p>');
  }