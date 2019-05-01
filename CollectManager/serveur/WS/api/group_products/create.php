<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
header('Content-Type: application/json');

require_once __DIR__ . '/../../services/ProductService.php';
require_once __DIR__ . '/../../services/UserService.php';
require_once __DIR__ . '/../../services/GroupProductService.php';
require_once __DIR__ . '/../../utils/FieldValidator.php';

$content = file_get_contents('php://input');
$json = json_decode($content, true);

if(FieldValidator::validate($json,['user','psw','products'])) {
    
    $user = new User("","",$json["user"], "",$json["psw"]);
    $user = UserService::getInstance()->connect($user);

    if($user->getId() !== NULL){

      $grp = new GroupProduct( 0,$user->getId());
      $grp = GroupProductService::getInstance()->insert($grp);

      foreach ($json["products"] as $value) {
        $p = new Product(
            $value["idProduct"],
            $value["name"],
            $grp->getId(),
            $value["quantity"],
            $value["unity"]);
        $new = ProductService::getInstance()->insert($p);
      }

      $msg = "Félicitation " . $user->getPrenom() . " !\r\n\r\n". 
      "Vos articles ont bien été transmis à notre service de collecte de FightFoodWaste.\r\n".
      "Vous recevrez d'ici peu la validation (ou non) de votre liste d'article et la confirmation de leur ramassage avec\r\n".
      "avec des propositions de dates de ramassage\r\n\r\n".
      "Restez connecter ! ;)\r\n\r\n".
      "Cordialement, l'équipe de FightFoodWaste\r\n";

      $headers = 'From: bretellealan@hotmail.fr'. "\n" .
    'Reply-To: bretellealan@hotmail.fr' . "\n" .
    'X-Mailer: PHP/' . phpversion();

      mail($user->getMail(),"Confirmation de l'envoi de vos articles !", $msg,$headers);
      $errorMessage = error_get_last()['message'];
      echo $user->getMail() . "<br>";
      echo "OK";
    }else{
      echo "NOK";
    }
    
    
    http_response_code(201);
} else {
  http_response_code(400);
}

?>
