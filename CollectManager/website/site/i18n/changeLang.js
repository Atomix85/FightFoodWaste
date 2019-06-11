function changeLang(){
  var lang = document.getElementById("lang").value;

  var request = new XMLHttpRequest();
      request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
          var answer = request.responseText;
          if(answer != "NOK"){
            window.location.reload();            
          }
        }
      }
      request.open('GET', "i18n/alter_lang.php?lang="+lang);
      request.send();
}