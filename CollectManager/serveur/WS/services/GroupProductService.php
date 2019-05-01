<?php

require_once __DIR__ . '/../models/GroupProduct.php';
require_once __DIR__ . '/../utils/DatabaseManager.php';

class GroupProductService {

  private static $instance;

  private function __construct() {}

  public static function getInstance() {
    if(!isset(self::$instance)) {
      self::$instance = new GroupProductService();
    }
    return self::$instance;
  }

  public function insert(GroupProduct $grp): GroupProduct {
    $db = DBManager::getManager();
    $affectedRows = $db->exec('
    INSERT INTO
    GROUP_PRODUCTS
    (date_submit, is_valid, fk_users)
    VALUES
    (NOW(),?,?)
    ', [
      $grp->getIsValid(),
      $grp->getFkUser()
    ]);
    if($affectedRows > 0) {
      $grp->setId($db->lastInsertId());
      return $grp;
    }
    return NULL;
  }

}



?>
