 <?php
function table_Create($REQUETE,$CHAMPS){

  include("config.php");
               
  $query= $bdd->query($REQUETE);
  $total=0;             
  $return="";       
  $return.="<table class='table'><thead><tr>";
  $i=0;             
  $DYNA_CHAMPS="";
  while($i<count($CHAMPS)){
    switch ($CHAMPS[$i]){
      case 'name':
      $return.="<th> Nom </th>";
       break;  
      case 'fname':
        $return.="<th> Prenom </th>";
        break;                 
      case 'nom_entreprise':
          $return.="<th> Entreprise </th>";
          break;                        
      case 'pays':
          $return.="<th> Pays </th>";
          break;
      case 'validation':
          $return.="<th> Etat </th>";
          break;
       }
                  
    $i++;
    }
               
    $return.="</tr></thead><tbody>";
    $debut=0;
    while($result=$query->fetch()){
      print_r($result);
    $i=0;     
    while($i<count($CHAMPS)){
      $extractedValue=isset($result->$CHAMPS[$i])?$result->$CHAMPS[$i]:"";                                       
      if($CHAMPS[$i] == 'validation'){
         switch ($extractedValue) {
          case 0:
            $extractedValue = '<input checked data-toggle="toggle" data-on="Valider" data-off="Refuser" data-onstyle="success" data-offstyle="danger" type="checkbox">';
            $return.="<td>".$extractedValue."</td>";
          break;
          default:
          $extractedValue = '<input data-toggle="toggle" data-on="Valider" data-off=" Refuser" data-onstyle="success" data-offstyle="danger" type="checkbox">';
            $return.="<td>".$extractedValue."</td>";
          break;
        }
      }else{
        $return.="<td>".$extractedValue."</td>";
      }
      $i++;
     }                             
      $return.="</tr>";
      $total++;
    }             
    $return.="</tbody></table><script>".$DYNA_CHAMPS."</script>";
    if($total==0){$return=0;}
    return $return;
}

?>