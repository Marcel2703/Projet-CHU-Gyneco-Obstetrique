$(function(){
  activerBtn();
  setInterval(function()
            {
              activerBtn();
            },1000);
        $('#passe').keyup(function()
        {
          var passe=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/index/verifierPasse.php",
                  type: "POST",
                  data: {passe: passe},
                  success: function(data)
                    {
                      if(data=='0'){
                        $('#passeOk').css('display','none');
                        $('#passeError').fadeIn();
                      }
                      else
                      {
                        $('#passeError').css('display','none');
                        $('#passeOk').fadeIn();
                      }         
                    }
                });    
        });
        $('#login').keyup(function()
        {
          var login=$(this).val();
          $.ajax({
                  url: "http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/index/verifierLogin.php",
                  type: "POST",
                  data: {login: login},
                  success: function(data)
                    {
                      if(data=='0'){
                        $('#loginOk').css('display','none');
                        $('#loginError').fadeIn();
                      }
                      else
                      {
                        $('#loginError').css('display','none');
                        $('#loginOk').fadeIn();
                      }         
                    }
                });    
        });
})
    function activerBtn()
    {
      var login=$('#login').val();
      var passe=$('#passe').val();
      $.post("http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/index/verifierDeux.php",{login: login,passe: passe},function(data){
      if(data=='0'){
        var btnConnect = document.getElementById('btnLoginConnect');
          btnConnect.disabled = true;
      }
      else{
        var btnConnect = document.getElementById('btnLoginConnect');
          btnConnect.disabled = false;
      }
    });
    }