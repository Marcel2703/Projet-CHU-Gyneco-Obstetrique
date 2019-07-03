$(function(){
    $('#sary').mouseover(function(){
      $(this).animate({width:"300"},500,function(){
        $(this).attr('width',300)
      })
    });
    $('#sary').mouseout(function(){
      $(this).animate({width:"100"})
    });  
    //upload image
    $('#my_form').ajaxForm({
    beforeSend:function(){
      $('#progress').progressbar();
      $('#info').text("En attente du chargement...");
    },
    uploadProgress:function(event,position,total,percentComplete){
      $('#progress').width(percentComplete+'%');
        $('#statustxt').html(percentComplete + '%');
        $('#info').text("Progression du chargement!"+$("#progress").progressbar("value")+"%");
        if(percentComplete>0)
        {
            $('#statustxt').css('color','#fff');
        }
    },
    success:function(){
    },
    complete:function(response){
      if(response.responseText=="Non"){
        $('#progress').width('1%');
        $('#statustxt').css('color','#000000');
        $('#statustxt').html('0%');
        $('#info').html("<p style='color:red'>Téléchargement impossible!<br/>Fichier incompatible ou trop volumineu</p>");
        $('.image').html("<img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/erreur.png'/>");
      }
      else{
        $('.image').slideDown().html("<img src='"+response.responseText+"' width='350' height='200'/>").delay(3000).slideUp('slow');
        $('#info').text("Téléchargement terminé!");
        $('#lienImage').attr('value',response.responseText);
      }
    }
  });
   $('#rechercheRegistreExam').keyup(function()
        {
          var rechercheRegistreExam=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/tableRechercheRegistreExam.php",
                  type: "POST",
                  data: {rechercheRegistreExam: rechercheRegistreExam},
                  success: function(data)
                    {
                      if(rechercheRegistreExam!=''){
                        $("#tabRegistre").css('display','none');
                        $("#tabRechercheRegistre").css('display','block');
                        $("#tabRechercheRegistre").html(data);
                      }
                      else
                      {
                        $("#tabRechercheRegistre").css('display','none');
                        $("#tabRegistre").css('display','block');
                      }         
                    }
                });    
        });
	remplirTableRegistre();
        //boucle                
          setInterval(function()
            {
              remplirTableRegistre();
            },500);
      
 remplirListeExamen();
    setInterval(function()
            {
              remplirListeExamen();
            },500);
})
function deleteExam(){
   if (confirm('Voulez-vous vraiment supprimer cet examen clinique avant admission?'))
        {
          $.get(lien,function(data){
            alert(data);
            });
        }
}
function remplirTableRegistre()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/tableRegistre.php",function(data){
        $("#tabRegistre").html(data);
    });
    }
function ajoutExamen()
    {
      var idRegistre = $("#idRegistre").val();
      var element = $("#element").val();
      var valeur = $("#valeur").val();
      var lienImage = $("#lienImage").val();
      if(idRegistre == "" || element == "" || valeur == "")
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
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/examen/ajoutExamen.php",
        type: "POST",
        data: {idRegistre: idRegistre, element: element, valeur: valeur, lienImage: lienImage },
        success: function(data)
        {
         $('#progress').width('1%');
         $('#statustxt').html('0%');
         $('#info').text("En attente de téléchargement...");
        }});     
      }
    }
function choixRegistre(lien){
   $.get(lien,function(data){
      var tabHaza = data.split(',');
      var longue=tabHaza.length;
      var idRegistre=tabHaza[0];
      var nom=tabHaza[1];
    if (confirm('Voulez-vous passer à l\'écritures de l\'examen clinique avant admission de Mme '+nom+' ?')){
           $('#nomPatiente').empty();
           $('#nomPatiente').append(nom);
           $('#idRegistre').attr('value',idRegistre);
           $('#tableAfenina,#suivant,#terminer,#progressBox,#btnDownload,#statustxt,#info').fadeIn('slow');
           $('#liste').slideToggle('slow'); 
    }
        
    });
}

function remplirListeExamen()
    {
      $.get("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/listeExamen.php",function(data){
      $("#tabListeExam").html(data);
    });
    }
function terminerExamen(){
      var idRegistre = $("#idRegistre").val();
      var element = $("#element").val();
      var valeur = $("#valeur").val();
      var lienImage = $("#lienImage").val();
      if(idRegistre == "" || element == "" || valeur == ""){
           $('#nomPatiente').empty();
           $('#tableAfenina,#suivant,#terminer,#progressBox,#btnDownload,#statustxt,#info').fadeOut('slow');
           $('#idRegistre').attr('value','');
           $('#liste').slideToggle('slow');
           $('#progress').width('1%');
         $('#statustxt').html('0%');
         $('#info').text("En attente du téléchargement..."); 
      }
      else{
         $.ajax({
        
        url: "http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/examen/ajoutExamen.php",
        type: "POST",
        data: {idRegistre: idRegistre, element: element, valeur: valeur, lienImage: lienImage },
        success: function(data)
        {
          $('#nomPatiente').empty();
           $('#tableAfenina,#suivant,#terminer,#progressBox,#btnDownload,#statustxt,#info').fadeOut();
           $('#idRegistre').attr('value','');
           $('#liste').slideToggle('slow');
           $('#progress').width('1%');
         $('#statustxt').html('0%');
         $('#info').text("En attente du téléchargement...");
        }}); 
               
      }
          
  }