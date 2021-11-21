$errors = array();
if (strlen($pass) < 8 || strlen($pass)> 16) {
    $errors[] = "Password should be min 8 characters and max 16 characters";
    }
    if (!preg_match("/\d/", $pass)) {
    $errors[] = "Password should contain at least one digit";
    }
    if (!preg_match("/[A-Z]/", $pass)) {
    $errors[] = "Password should contain at least one Capital Letter";
    }
    if (!preg_match("/[a-z]/", $pass)) {
    $errors[] = "Password should contain at least one small Letter";
    }
    if (!preg_match("/\W/", $pass)) {
    $errors[] = "Password should contain at least one special character";
    }
    if (preg_match("/\s/", $pass)) {
    $errors[] = "Password should not contain any white space";
    }

    if ($errors) {
    foreach ($errors as $error) {
    echo $error . "\n";
    }
    die();
    } else {
    echo "$pass => MATCH\n";
    }