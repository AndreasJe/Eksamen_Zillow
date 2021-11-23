<?php

require_once(__DIR__ . "../globals.php");


// Validate email
if (!isset($_POST['user_email'])) {
  send_400('email is required');
  $error = "We need your email to create a user for you! Please enter your email in the form";
}
if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
  send_400('email is invalid');
  $error = "We need a valid email to verify your user. Please enter your email correctly in the form";
}

// Validate username
if (!isset($_POST['user_password'])) {
  send_400('Password is required');
  $error = "We need your password to create a user for you!";
}
if (strlen($_POST['user_password']) < 2) {
  send_400('Password has to be a minimum of 2 characters');
  $error = "Password has to be a minimum of " . _PASSWORD_MIN_LEN . " characters";
}
if (strlen($_POST['user_password']) > 22) {
  send_400('Password cant exceed 22 characters');
  $error = "Password cant exceed " . _PASSWORD_MAX_LEN . " characters";
}


try {
  $db = _db();
} catch (Exception $ex) {
  _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

$password = $_POST['user_password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$verification_key = bin2hex(random_bytes(16));
$forgot_pass_key = bin2hex(random_bytes(16));
$verified = 0;

try {
  // Insert data in the D
  $q = $db->prepare('INSERT INTO users VALUES(:user_id, :user_name,:first_name,:last_name, :user_email, :user_password, :verification_key, :forgot_pass_key, :verified )');
  $q->bindValue(":user_id", null); // The db will give this automati.
  $q->bindValue(":user_name", null);
  $q->bindValue(":first_name", null);
  $q->bindValue(":last_name", null);
  $q->bindValue(":user_email", $_POST['user_email']);
  $q->bindValue(":user_password", $hashed_password);
  $q->bindValue(":verification_key", $verification_key);
  $q->bindValue(":forgot_pass_key", $forgot_pass_key);
  $q->bindValue(":verified", $verified);
  $q->execute();

  $user_id = $db->lastInsertId();
  // SUCCESS
  header('Content-Type: application/json');
  // echo '{"info":"user created", "user_id":"'.$user_id.'"}';
  $response = ["info" => "user created", "user_id" => intval($user_id), "Verification" => "Verification Email has been sent"];
  echo json_encode($response);


  $_to_email =  $_POST['user_email'];
  $_message = file_get_contents('../emails/Welcome.html');

  $_subject = "Welcome home";

  require_once("../private/send-email.php");

  exit();
} catch (Exception $ex) {
  http_response_code(500);
  $error = 'Email is already used by another user';
  echo json_encode($error);
  exit();
}

// function to manage responding in case of an error
function send_400($error_message)
{
  header('Content-Type: application/json');
  http_response_code(400);
  $response = ["info" => $error_message];
  echo $response;
  exit();
}