<?php
  //$usern = aa;
  function check_empty_fields($required_fields_array) {
    $form_errors = array();
    foreach ($required_fields_array as $name_of_field) {
      if (!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == null) {
        $form_errors[]= $name_of_field . " is a required field.";
      }
    }
    return $form_errors;
  }

  function check_min_length($fields_to_check_length) {
    $form_errors = array();
    foreach ($fields_to_check_length as $name_of_field=> $minimum_length_required) {
      if (strlen(trim($_POST[$name_of_field])) < $minimum_length_required) {
        $form_errors[]= $name_of_field . " minimum length: {$minimum_length_required}.";
      }
    }
    return $form_errors;
  }

  function check_email($data) {
    $form_errors= array();
    $key = 'email';
    if(array_key_exists($key, $data)) {
      if($_POST[$key] != null) {
        $key = filter_var($key, FILTER_SANITIZE_EMAIL);
      }
      if(filter_var($_POST[$key], FILTER_SANITIZE_EMAIL) === false) {
        $form_errors[]=$key . " is not a valid email address.";
      }
    }
    return $form_errors;
  }

  function validate_phone_number($phone) {
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 11 || strlen($phone_to_check) > 11) {
        return false;
     } else {
       return true;
     }
  }

  function show_errors($form_errors_array) {
    $errors = "<p><ul style='padding: 15px; color:black;'>";
    foreach ($form_errors_array as $the_error) {
      $errors .= "<li>{$the_error}</li>";
    }
    $errors .= "</ul></p>";
    return $errors;
  }
  function flashMessage($message, $passOrFail = "Fail") {
    if($passOrFail === "Pass") {
      $data = "<div class='alert alert-success'>{$message}</p>";
    }
    else {
      $data = "<div class='alert alert-secondary'>{$message}</p>";
    }
    return $data;
  }

  function redirectTo($page) {
    header("Location: {$page}.php");
  }

  function checkDuplicateEntries($table, $column_name, $value, $db) {
    try {
      $sqlQuery = "SELECT * FROM $table WHERE $column_name=:$column_name";
      $statement = $db->prepare($sqlQuery);
      $statement->execute(array(":$column_name" => $value));

      if($row = $statement->fetch()) {
        return true;
      }
      return false;
    } catch (PDOException $ex) {

    }

  }

  // function set($u) {
  //   $usern = $u;
  // }
  // function get() {
  //   return $usern;
  // }

?>
