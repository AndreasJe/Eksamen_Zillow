<!-- Page specific CSS -->

<head>
    <style>
    header.dark .ic.menu .line {
        background-color: blue;
    }

    header .head_container {
        display: none;
    }

    main {
        background-color: rgb(249, 249, 251);
        padding: 54px 0;
    }

    @media only screen and (max-width: 768px) {

        .logo2 {
            display: none;
        }

        .logo1 {
            display: block;
        }

        header.dark .ic.menu .line {
            background-color: #006aff !important;
        }

        .dropbtn2 {
            background-color: rgb(249, 249, 251);
        }

        .dropbtn2 img {
            background-color: rgb(249, 249, 251);
        }

        .dropbtn2:hover,
        .dropbtn2:focus {
            background-color: rgb(249, 249, 251);
        }
    }
    </style>
</head>

<!-- Title, language, session_start and header defined -->
<?php
session_start();
if (!isset($_GET['key'])) {
    header('Location: index');
    exit();
}
require_once __DIR__ . ('/components/dictionary.php');
$lan = $_GET['lan'] ?? 'en'; // en es dk
$_title = $text['title2'][$lan];
include __DIR__ . "/components/header.php";
?>

<!-- Page Content -->
<main>
    <div class="reset-container">

        <div class="modal-dialog">
            <div class="modal-content">

                <form onsubmit="return false">
                    <div class="modal-body">

                        <div class="modal-header justify-content-center">
                            <h5 class="modal-title mb-3">Reset your password</h5>
                        </div>
                        <div class="d-flex flex-column m-5 mt-0 mb-0">

                            <label class="mt-3 pb-1" for="new_password"> Password</label>
                            <input type="password" name="new_password" data-min="8" data-max="22" data-validate="str">
                            <div>
                                <em class="password_req p-3"> At least 8 characters<br>

                                    Mix of letters and numbers<br>

                                    At least 1 special character<br>

                                    At least 1 lowercase letter and 1 uppercase letter</em>
                            </div>
                        </div>

                        <div class="d-flex flex-column m-5 mt-0 mb-3">
                            <label for="confirm_password">Confirm password</label>
                            <input type="password" name="confirm_password" data-min="8" data-max="22"
                                data-validate="str">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="location.href='index'">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="resetPass()">Create Password</button>
                    </div>
                </form>
                <div>
                    <p id="feedback_forgot" class="text-center d-block">

                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Script needs to standalone, since it uses the variable internally. Otherwise it will throw off all other scripts. -->
<script>
async function resetPass() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-reset-password?key=<?php echo $_GET['key'] ?>", {
        method: "POST",
        body: new FormData(form)
    })
    let response = await conn.json();
    console.log(response);
    if (conn.ok) {
        _one("#feedback_forgot").innerHTML = " ";
        _one("#feedback_forgot").classList.add("badge", "bg-success");
        _one("#feedback_forgot").innerHTML = "Your phone number has been confirmed and registered in the database";
    } else {
        _one("#feedback_forgot").innerHTML = " ";
        _one("#feedback_forgot").classList.add("badge", "bg-danger");
        _one("#feedback_forgot").innerHTML = JSON.stringify(response);
    }
}
</script>

<!-- Footer Content -->
<?php
include __DIR__ . "/components/footer.php";
?>