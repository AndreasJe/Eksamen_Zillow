<?php

// Procedual

// set post fields
$post = [
    'email' => 'gud.er.gud@gmail.com',
    'password' => '22486050',
    'phone'   => '22486050',
    'to_phone'   => $to_phone,
    'message'   => $sms_content,
    'api_key'   => '6622fdaa-95c4-4573-837e-95f07972c63e',
];

$ch = curl_init('https://fatsms.com/send-sms');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$response = curl_exec($ch);

// close the connection, release resources used
curl_close($ch);

// do anything you want with your response
var_dump($response);