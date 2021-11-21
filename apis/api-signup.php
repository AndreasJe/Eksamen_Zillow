<?php

require_once('globals.php');
// Validate username
if (!isset($_POST['name'])) {
  send_400('name is required');
  $error = "We need your name to create a user for you! Please enter your name in the form";
}
if (strlen($_POST['name']) < 2) {
  send_400('name min 2 characters');
  $error = "Your name has to be more than " . _PASSWORD_MIN_LEN . " characters";
}
if (strlen($_POST['name']) > 22) {
  send_400('name max 22 characters');
  $error = "Your name must be shorter than " . _PASSWORD_MAX_LEN . " characters";
}


// Validate email
if (!isset($_POST['email'])) {
  send_400('email is required');
  $error = "We need your email to create a user for you! Please enter your email in the form";
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  send_400('email is invalid');
  $error = "We need a valid email to verify your user. Please enter your email correctly in the form";
}

try {
  $db = _db();
} catch (Exception $ex) {
  _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$verification_key = bin2hex(random_bytes(16));
$forgot_pass_key = bin2hex(random_bytes(16));
$test = "0";

try {
  // Insert data in the D
  $q = $db->prepare('INSERT INTO users VALUES(:user_id, :user_name, :user_email, :user_password, :verification_key, :forgot_pass_key, :verified )');
  $q->bindValue(":user_id", null); // The db will give this automati.
  $q->bindValue(":user_name", $_POST['name']);
  $q->bindValue(":user_email", $_POST['email']);
  $q->bindValue(":user_password", $hashed_password);
  $q->bindValue(":verification_key", $verification_key);
  $q->bindValue(":forgot_pass_key", $forgot_pass_key);
  $q->bindValue(":verified", $test);
  $q->execute();

  $user_id = $db->lastInsertId();
  // SUCCESS
  header('Content-Type: application/json');
  // echo '{"info":"user created", "user_id":"'.$user_id.'"}';
  $response = ["info" => "user created", "user_id" => intval($user_id), "Verification" => "Verification Email has been sent"];
  echo json_encode($response);



  $name =  $_POST['name'];
  $_to_email =  $_POST['email'];
  $_message = file_get_contents('../email-templates/email-validate-user.html');

  $_subject = "Verify your user";
  $_message = str_replace('%username%', $name, $_message);
  $_message = str_replace('%verification_key%', $verification_key, $_message);

  require_once("../private/send-email.php");

  exit();
} catch (Exception $ex) {
  http_response_code(500);
  $response2 = 'Email is already used by another user';
  echo json_encode($response2);
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