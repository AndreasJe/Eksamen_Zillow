<?php

session_start();

$_to_email =  $_SESSION['user_email'];
$_message = file_get_contents('../emails/VerifyEmail_Template.html');
$verification_key = $_SESSION['verification_key'];

$_subject = "Verify your email";
$_message = str_replace('%verification_key%', $verification_key, $_message);

require_once(__DIR__ . "/../private/send-email.php");
exit();