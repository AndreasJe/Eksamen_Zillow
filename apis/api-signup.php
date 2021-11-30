<?php

require_once(__DIR__ . "../globals.php");


// Validate email
if (!isset($_POST['user_email'])) {
  send_400('We need your email to create a user for you! Please enter your email in the form');
  exit();
}
if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
  send_400('Please enter a valid email');
  exit();
}

// Validate password
if (!isset($_POST['user_password'])) {
  send_400('We need your password to create a user for you!');
  exit();
}
if (strlen($_POST['user_password']) < 8) {
  send_400('Password has to be a minimum of 8 characters');
  exit();
}
if (strlen($_POST['user_password']) > 22) {
  send_400('Password cant exceed ' . _PASSWORD_MAX_LEN . ' characters');
  exit();
}


//Initial validation of database
try {
  $db = _db();
} catch (Exception $ex) {
  _res(500, ['info' => 'Database failed - System under maintainance', 'error' => __LINE__]);
  echo json_encode($ex);
}

//Executing Content
try {
  $password = $_POST['user_password'];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $verification_key = bin2hex(random_bytes(16));
  $forgot_pass_key = bin2hex(random_bytes(16));
  $authentication_code = bin2hex(random_bytes(5));
  $email = $_POST['user_email'];

  // Insert data in the Database
  $q = $db->prepare('INSERT INTO users VALUES(:user_id, :user_name, :user_email, :user_password, :verification_key, :forgot_pass_key, :verified, :user_phone ,:first_name, :last_name, :authentication_code)');
  $q->bindValue(":user_id",  null);
  $q->bindValue(":user_name",  null);
  $q->bindValue(":first_name",  null);
  $q->bindValue(":last_name",  null);
  $q->bindValue(":user_email", $email);
  $q->bindValue(":user_phone",  null);
  $q->bindValue(":user_password", $hashed_password);
  $q->bindValue(":verification_key", $verification_key);
  $q->bindValue(":forgot_pass_key", $forgot_pass_key);
  $q->bindValue(":verified", false);
  $q->bindValue(":authentication_code", $authentication_code);
  $q->execute();

  $user_id = $db->lastInsertId();

  // Email settings for "Welcome mail"
  $_to_email =  $_POST['user_email'];
  $_message = file_get_contents('../emails/Welcome.html');
  $_subject = "Welcome home";
  require_once("../private/send-email.php");

  header('Content-Type: application/json');
  $response = ["Info" => "user created", "user_id" => intval($user_id), "Verification" => "Verification Email has been sent"];
  echo json_encode($response);
} catch (Exception $ex) {
  http_response_code(500);
  echo json_encode($ex);
  exit();
}

//Response 500 means server error
function send_500($error_message)
{
  header('Content-Type: application/json');
  http_response_code(500);
  $response = ["Error" => $error_message];
  echo json_encode($response);
  exit();
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