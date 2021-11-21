<?php
$_title = 'Login';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_title ?? 'COMPANY' ?></title>
    <script src="validator.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="styledapp.css">
    <style>
    body {
        background: url(bg.jpg) center center no-repeat;
        background-size: cover;
        width: 100vw;
        height: 100vh;
        position: relative;
    }
    </style>
</head>

<body>
    <main>

        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <div class="form_container">
                        <form onsubmit="return false">
                            <input name="email" type="text" placeholder="Email"><br>
                            <input name="password" type="password" placeholder="Password"><br>

                            <button class="button" onclick="login()">Login</button>
                            <a id="info" href="forgot-password">Forgot your password?</a>

                        </form>
                    </div>
                    <div class="container info">
                        <em>Don't have an account?</em><a href="signup"> Sign up here!</a>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script>
    async function login() {
        const form = event.target.form
        console.log(form)
        let conn = await fetch("apis/api-login", {
            method: "POST",
            body: new FormData(form)
        })

        if (conn.ok) {
            location.href = "user"


        }
    }
    </script>

    <?php
    require_once('components/footer.php');
    ?>