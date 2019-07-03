$(function(){
	//evenement personnel
        $('#recherchePatiente').keyup(function()
        {
          var recherchePatiente=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/tableRecherchePatiente.php",
                  type: "POST",
                  data: {recherchePatiente: recherchePatiente},
                  success: function(data)
                    {
                      if(recherchePatiente!=''){
                        $("#tablePatiente").css('display','none');
                        $("#tableRecherchePatiente").css('display','block');
                        $("#tableRecherchePatiente").html(data);
                      }
                      else
                      {
                        $("#tableRecherchePatiente").css('display','none');
                        $("#tablePatiente").css('display','block');
                      }         
                    }
                });    
        });
      //fin evenement personnel

      remplirTablePatiente();
      setInterval(function()
            {
              remplirTablePatiente();
            },500);
      remplirRegistre();
      setInterval(function()
            {
              remplirRegistre();
            },3000);
})
//fonction personnel
function remplirRegistre()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/remplirRegistre.php",function(data){
      $("#idRegistre").attr('value',data);
    });
    }
    function ajoutPatiente()
    {
      var idRegistre = $("#idRegistre").val();
      var nomPatiente = $("#nomPatiente").val();
      var gestite = $("#gestite").val();
      var parite = $("#parite").val();
      if(idRegistre == "" || nomPatiente == "" || gestite == "" || parite == "")
      {
      alert('erreur');
      }
    else if(!idRegistre.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un code valable');
      }
    else if(!gestite.match(/^G[0-9]+$/))
    {
      alert('La gestité doit commencer par G suivi d\'un chiffre');
    }
    else if(!parite.match(/^P[0-9]+$/))
    {
      alert('La parité doit commencer par P suivie d\'un chiffre');
    }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/patiente/ajoutPatiente.php",
        type: "POST",
        data: {idRegistre: idRegistre, nomPatiente: nomPatiente, gestite: gestite, parite: parite },
        success: function(data)
        {
          if(data=='no'){
            alert('Cette patiente existe déjà')
          }
          else{
            informer('Nouvelle patiente bien ajouté');
          }
        }});     
      }
    }
    function remplirTablePatiente()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/tablePatiente.php",function(data){
      $("#tablePatiente").html(data);
    });
    }
    function choixPatiente(lien){
   $.get(lien,function(data){
    var tabHaza = data.split(',');
      if (confirm('Voulez-vous passer à la modification de cette patiente?'))
        {
           var idRegistre=tabHaza[0];
           var nomPatiente=tabHaza[1];
           var gestite=tabHaza[2];
           var parite=tabHaza[3];
           $('#listePatiente').slideToggle();
           $('#idRegistre').attr('value',idRegistre);
           $('#nomPatiente').attr('value',nomPatiente);
          var modifIdRegistre = document.getElementById('idRegistre');
          modifIdRegistre.disabled = true;
           var modifPatiente = document.getElementById('nomPatiente');
          modifPatiente.disabled = true;
           $('#gestite').attr('value',gestite);
           $('#parite').attr('value',parite);
           $('#btnAjouter').css('display','none');
           $('#btnModify').css('display','inline-block');
           $('#btnAnnuler').css('display','inline-block');
        }   
    });
}
function enregistrerPatiente()
    {
      var idRegistre = $("#idRegistre").val();
      var nomPatiente = $("#nomPatiente").val();
      var gestite = $("#gestite").val();
      var parite = $("#parite").val();
      if(idRegistre == "" || nomPatiente == "" || gestite == "" || parite == "")
      {
      alert('erreur');
      }
    else if(!idRegistre.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/patiente/modifyPatiente.php",
        type: "POST",
        data: {idRegistre: idRegistre, nomPatiente: nomPatiente, gestite: gestite, parite: parite },
        success: function(data)
        {
           $('#idRegistre').attr('value','');
           $('#nomPatiente').attr('value','');
           $('#gestite').attr('value','');
           $('#parite').attr('value','');
           $('#listePatiente').slideToggle();
           $('#btnModify').fadeOut();
           $('#btnAjouter').fadeIn();
           var modifIdRegistre = document.getElementById('idRegistre');
          modifIdRegistre.disabled = false;
          var modifPatiente = document.getElementById('nomPatiente');
          modifPatiente.disabled = false;
          informer(data);
        }});     
      }
    }
    function annulerPatiente()
    {
           $('#idRegistre').attr('value','');
           $('#nomPatiente').attr('value','');
           $('#gestite').attr('value','');
           $('#parite').attr('value','');
           $('#listePatiente').slideDown();
           $('#btnModify').fadeOut();
           $('#btnAjouter').fadeIn();
           var modifIdRegistre = document.getElementById('idRegistre');
          modifIdRegistre.disabled = false;
          var modifPatiente = document.getElementById('nomPatiente');
          modifPatiente.disabled = false;
    }
    function deletePatiente(lien){
   
      if (confirm('Voulez-vous vraiment supprimer cette patiente? Cette action affèctera toutes les données y reliant'))
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