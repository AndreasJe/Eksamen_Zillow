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
<?php


session_start();
$_title = 'Reset Password';

include __DIR__ . "/components/header.php";
?>

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
                            <input type="password" name="new_password" data-min="2" data-max="22">
                            <div>
                                <em class="password_req p-3"> At least 8 characters<br>

                                    Mix of letters and numbers<br>

                                    At least 1 special character<br>

                                    At least 1 lowercase letter and 1 uppercase letter</em>
                            </div>
                        </div>

                        <div class="d-flex flex-column m-5 mt-0 mb-3">
                            <label for="confirm_email">Confirm password</label>
                            <input type="password" name="new_password" data-min="2" data-max="22">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="location.href='index'">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="resetPass()">Create Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>




<?php
include __DIR__ . "/components/footer.php";
?>