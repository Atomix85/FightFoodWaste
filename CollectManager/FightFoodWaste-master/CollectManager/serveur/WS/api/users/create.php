<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
header('Content-Type: application/json');

require_once __DIR__ . '/../../services/UserService.php';
require_once __DIR__ . '/../../utils/FieldValidator.php';

$content = file_get_contents('php://input');
$json = json_decode($content, true);

if(FieldValidator::validate($json,['user','psw'])) {
    
    $user = new User("","",$json["user"], "",$json["psw"]);
    $user = UserService::getInstance()->connect($user);

    if($user->getId() !== NULL){

      echo "OK";
    }else{
      echo "NOK";
    }
    
    
    http_response_code(201);
} else {
  http_response_code(400);
}

?>
