$(function(){
	//evenement categorie
         $('#rechercheCateg').keyup(function()
        {
          var rechercheCateg=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/tableRechercheCateg.php",
                  type: "POST",
                  data: {rechercheCateg: rechercheCateg},
                  success: function(data)
                    {
                      if(rechercheCateg!=''){
                        $("#tabCateg").css('display','none');
                        $("#tabRechercheCateg").css('display','block');
                        $("#tabRechercheCateg").html(data);
                      }
                      else
                      {
                        $("#tabRechercheCateg").css('display','none');
                        $("#tabCateg").css('display','block');
                      }         
                    }
                });    
        });
      //fin evenement categorie

      remplirTableCateg();
      setInterval(function()
            {
              remplirTableCateg();
            },500);
})
function ajoutCateg()
    {
      var codeCategorie = $("#codeCategorie").val();
      var nbOccupation = $("#nbOccupation").val();
      var prix = $("#prix").val();
      if(codeCategorie == "" || nbOccupation == "" || prix == "")
      {
      alert('erreur');
      }
      else if(!codeCategorie.match(/^C[0-9]+$/))
    {
      alert('Le code categorie doit commencer par C');
    }
    else if(!nbOccupation.match(/[0-9]+$/ || !prix.match(/[0-9]+$/)))
      {
      alert('Entrez une occupation ou un prix valable');
      }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/categorie/ajoutCategorie.php",
        type: "POST",
        data: {codeCateg: codeCategorie, occup: nbOccupation, prix: prix },
        success: function(data)
        {
          if(data=='no'){
            alert('Ce catégorie existe déjà')
          }
          else{
            informer('Nouveau catégorie bien ajouté');
          }
        }});     
      }
    }
    function remplirTableCateg()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/tableCategorie.php",function(data){
      $("#tabCateg").html(data);
    });
    }
    function choixCategorie(lien){
   $.get(lien,function(data){
    var tabHaza = data.split(',');
      if (confirm('Voulez-vous passer à la modification de ce categorie?'))
        {
           var codeCategorie=tabHaza[0];
           var nbOccup=tabHaza[1];
           var prix=tabHaza[2];
           $('#listeCategorie').slideToggle();
           $('#codeCategorie').attr('value',codeCategorie);
           $('#nbOccupation').attr('value',nbOccup);
           $('#prix').attr('value',prix);
           var modifIdCategorie = document.getElementById('codeCategorie');
          modifIdCategorie.disabled = true;
           var modifOccupation = document.getElementById('nbOccupation');
          modifOccupation.disabled = true;
           $('#btnAjouter').css('display','none');
           $('#btnModify').css('display','inline-block');
           $('#btnAnnuler').css('display','inline-block');
        }   
    });
}
function enregistrerCategorie()
    {
      var codeCategorie = $("#codeCategorie").val();
      var nbOccup = $("#nbOccupation").val();
      var prix = $("#prix").val();
      if(codeCategorie == "" || nbOccup == "" || prix == "")
      {
      alert('erreur');
      }
    else if(!prix.match(/[0-9]+$/)) //si le code client n'est pas valide
      {
      alert('Entrez un code valable');
      }
    else
      {
      $.ajax({
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/categorie/modifyCategorie.php",
        type: "POST",
        data: {codeCategorie: codeCategorie, nbOccup: nbOccup, prix: prix},
        success: function(data)
        {
           $('#codeCategorie').attr('value','');
           $('#nbOccupation').attr('value','');
           $('#prix').attr('value','');
           var modifIdCategorie = document.getElementById('codeCategorie');
          modifIdCategorie.disabled = false;
           var modifOccupation = document.getElementById('nbOccupation');
          modifOccupation.disabled = false;
           $('#listeCategorie').slideToggle();
           $('#btnModify').fadeOut();
           $('#btnAjouter').fadeIn();
           informer(data);
        }});     
      }
    }
    function annulerCategorie()
    {
           $('#codeCategorie').attr('value','');
           $('#nbOccupation').attr('value','');
           $('#prix').attr('value','');
            var modifIdCategorie = document.getElementById('codeCategorie');
          modifIdCategorie.disabled = false;
           var modifOccupation = document.getElementById('nbOccupation');
          modifOccupation.disabled = false;
           $('#btnModify').fadeOut();
           $('#btnAjouter').fadeIn();
           $('#listePerso').slideDown();
    }
    function deleteCategorie(lien){
   
      if (confirm('Voulez-vous supprimer ce categorie? Cette action supprime aussi les chambres appartenant à ce catégorie'))
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