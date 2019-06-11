<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../utils/DatabaseManager.php';

class UserService {

  private static $instance;

  private function __construct() {}

  public static function getInstance() {
    if(!isset(self::$instance)) {
      self::$instance = new UserService();
    }
    return self::$instance;
  }

  public function connect(User $user){
      $db = DBManager::getManager();
      $affectedRows = $db->findOne('
        SELECT
        id 
        FROM USERS
        WHERE
        mail=? AND password=?
        ',[
          $user->getMail(),
          crypt($user->getPassword(),SALT_KEY)
        ]);
      if($affectedRows !== NULL && $affectedRows !== FALSE){
        $user->setId($affectedRows["id"]);
        return $user;
      }
      return $user;
  }

}



?>
