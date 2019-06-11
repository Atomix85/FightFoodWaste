<?php

class FieldValidator {

  public static function validate($data, array $fields): bool {
    foreach ($fields as $field) {
      if(!isset($data[$field])) {
        return false;
      }
    }
    return true;
  }


}

?>
