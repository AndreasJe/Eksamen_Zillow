<?php
// Some php CONSTANTS that makes it easy to change validation values
// Not used as they are a bit dedious to work with compared to the few digits they replace :)  
define('_ITEM_MIN_LEN', 2);
define('_ITEM_MAX_LEN', 22);

define('_PASSWORD_MIN_LEN', 2);
define('_PASSWORD_MAX_LEN', 22);

define('_GENERICTEXT_MIN_LEN', 5);
define('_GENERICTEXT_MAX_LEN', 50);

define('_TEXT_MIN_LEN', 2);
define('_TEXT_MAX_LEN', 22);


// Error Handling by Database 
function _res($status = 200, $message = [])
{
  http_response_code($status);
  header('Content-Type: application/json');
  echo json_encode($message);
  exit();
}


// PDO connection as a function
function _db()
{
  $database_user_name = 'root';
  $database_password = '';
  $database_connection = 'mysql:host=localhost; dbname=zillow; charset=utf8mb4';

  $database_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ];
  return new PDO($database_connection, $database_user_name, $database_password, $database_options);
}