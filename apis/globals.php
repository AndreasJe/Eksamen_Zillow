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


//Response 500 means server error
function send_500($error_message)
{
  header('Content-Type: application/json');
  http_response_code(500);
  $response = ["Error" => $error_message];
  echo json_encode($response);
}

//Response 400 means Client error
function send_400($error_message)
{
  header('Content-Type: application/json');
  http_response_code(400);
  $response = ["Error" => $error_message];
  echo json_encode($response);
  exit();
}

//Response 400 means OK error
function send_200($error_message)
{
  header('Content-Type: application/json');
  http_response_code(200);
  $response = ["Info" => $error_message];
  echo json_encode($response);
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