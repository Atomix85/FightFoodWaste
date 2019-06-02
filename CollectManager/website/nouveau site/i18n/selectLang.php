<li class="scroll" style="padding-top: 15px;">
  <select class="form-control" onchange="changeLang()" id="lang">
  
  <?php 
  $langs = ["fr"=>"🇫🇷 Français","se"=>"🇸🇪 Suedois ","fa"=>"🇮🇷 Farsi"];
  foreach ($langs as $key => $lang){
    if($key == $_SESSION["lang"]){
      echo "<option value='".$key."' selected>".$lang."</option>";
    }else{
      echo "<option value='".$key."'>".$lang."</option>";
    }
  } ?>
  
</select><script src="i18n/changeLang.js"></script></li>  