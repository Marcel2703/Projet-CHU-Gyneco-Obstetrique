$(function(){
  recupDateToday();
  recupHeureToday();
	remplirTableOpProtocole();
        //boucle                
          setInterval(function()
            {
              remplirTableOpProtocole();
            },500);
           //event
          $('#rechercheOpProtocole').keyup(function()
        {
          var rechercheOperation=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/tableRechercheOpProtocole.php",
                  type: "POST",
                  data: {rechercheOperation: rechercheOperation},
                  success: function(data)
                    {
                      if(rechercheOperation!=''){
                        $("#tabOpProtocole").css('display','none');
                        $("#tableRechercheOpProtocole").css('display','block');
                        $("#tableRechercheOpProtocole").html(data);
                      }
                      else
                      {
                        $("#tableRechercheOpProtocole").css('display','none');
                        $("#tabOpProtocole").css('display','block');
                      }         
                    }
                });    
        });
      
})
function recupDateToday()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/todayDate.php",function(data){
     $('#date_delivranceA,#date_extraction1').attr('value',data);
    });
    }
    function recupHeureToday()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/heureToday.php",function(data){
     $('#heure_delivranceA,#heure_extraction1').attr('value',data);
    });
    }
function deleteAutresProto(lien){
   
      if (confirm('Voulez-vous vraiment supprimer cet élément de protocole?'))
        {
          $.get(lien,function(data){
            alert(data);
            });
        }  
    
}
function deletePrincipalProto(lien){
   
      if (confirm('Voulez-vous vraiment supprimer ce bébé? Cela entraînera la suppréssion de tous les procotoles concernant ce bébé'))
        {
          $.get(lien,function(data){
            alert(data);
          });
        }   
    
}
function remplirTableOpProtocole()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/tableOpProtocole.php",function(data){
        $("#tabOpProtocole").html(data);
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
function verifierClavierProtocoleC()
    {
      var idBebeC=$('#idBebe1').val();
      var idOperationC=$('#idOperationC').val();
      $.ajax({
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/protocole/clavierVerifier.php?",
        type: "POST",
        data: {idBebe: idBebeC,idOperation: idOperationC},
        success: function(data)
        {
          if(data=='oui'){
          var btnAjouterC = document.getElementById('btnAjoutC');
          btnAjouterC.disabled = true;
          var btnSuivantC = document.getElementById('suivantC');
          btnSuivantC.disabled = false;
        }
        else{
          var btnAjouterC = document.getElementById('btnAjoutC');
          btnAjouterC.disabled = false;
          var btnSuivantC = document.getElementById('suivantC');
          btnSuivantC.disabled = true;
        }
        }});     
    }
function choixProtocole(lien){
   $.get(lien,function(data){
      var tabHaza = data.split(',');
      var longue=tabHaza.length;
      var designation=tabHaza[0];
      var nom=tabHaza[1];
      var dateHeure=tabHaza[2];
      var idOperation=tabHaza[3];
      var idBebe=tabHaza[4];
    if (confirm('Voulez-vous passer à l\'écriture du protocole de la (ou de l\') '+designation+' de Mme '+nom+' ?')){
      if(designation=='Accouchement')
        {
           verifierClavierProtocoleA();
           setInterval(function()
            {
              verifierClavierProtocoleA();
            },1000);
           $('#liste').slideToggle();
           $('.carousel').carousel(2);
           $('.carousel').carousel('pause');
           $('#nomPatienteA').empty();
           $('#dateActeA').empty();
           $('#nomPatienteA').append(nom);
           $('#dateActeA').append(dateHeure);
           $('#idOperationA').attr('value',idOperation);
           var idJumeau=parseInt(idBebe)+1;
           $('#idBebeA').html("<option value="+parseInt(idBebe)+">Actuelle</option>\
                <option value="+idJumeau+">Jumeau ou jumelle</option>")
        }
        else{
          verifierClavierProtocoleC();
          setInterval(function()
            {
              verifierClavierProtocoleC();
            },1000);
           $('#liste').slideToggle();
           $('.carousel').carousel(3);
           $('.carousel').carousel('pause');
           $('#nomPatienteA').empty();
           $('#dateActeA').empty();
           $('#nomPatienteC').append(nom);
           $('#dateActeC').append(dateHeure);
           $('#idOperationC').attr('value',idOperation);
           var idJumeau=parseInt(idBebe)+1;
           $('#idBebe1').html("<option value="+parseInt(idBebe)+">Actuelle</option>\
                <option value="+idJumeau+">Jumeau ou jumelle</option>")
        }
    }
        
    });
}