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

    #myDropdown2 {
        background-color: rgb(249, 249, 251);

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
require_once __DIR__ . ('/components/dictionary.php');
$lan = $_GET['lan'] ?? 'en'; // en es dk
$_title = $text['title4'][$lan];
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index');
    exit();
}
include __DIR__ . "/components/header.php";

?>

<!-- Individual Language link to simplify process. -->
<div class="language-link">
    <a class="language-link-item" href="account-settings.php?lan=en" <?php if ($lan == 'en') { ?>
        style="color: #ff9900;" <?php } ?>>English</a> | <a class="language-link-item"
        href="account-settings.php?lan=es" <?php if ($lan == 'es') { ?> style="color: #ff9900;" <?php } ?>>Espaniol</a>
</div>



<main>
    <!-- Wrapper for Go-Back link. -->
    <div class="btn-wrapper">

        <p> <span class="chevron"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                </svg></span> <a class="backbtn" href="index "> Go back</a>
        </p>
    </div>

    <!-- Settings panel -->
    <div class="profile-wrapper">
        <h1 class="header">Profile</h1>
        <section class="personalInfo-link">
            <h2 class="subheader">Personal info</h2>
            <div class="info-block">
                <div class="left">
                    <h4>Name</h4>
                    <em>Your first and last given names. Updates are reflected across all Zillow experiences.
                    </em>
                </div>
                <div class="right">
                    <p> <?= $_SESSION['first_name'] ?> <?= $_SESSION['last_name'] ?></p>
                    <a href="#editName" class="envokeModal" data-bs-toggle="modal">Edit</a>
                </div>
            </div>
            <div class="info-block">
                <div class="left">
                    <h4>Screen name
                    </h4>
                    <em>Prefer to remain anonymous when writing reviews? Choose a unique screen name instead.</em>
                </div>
                <div class="right">
                    <p> <?= $_SESSION['user_name'] ?></p>
                    <a href="#screenName" class="envokeModal" data-bs-toggle="modal">Edit</a>
                </div>
            </div>
            <div class="info-block">
                <div class="left">
                    <h4>Photo</h4>
                    <em>
                        Personalize your profile pic with a custom photo.
                    </em>
                </div>
                <div class="right">
                    <a href="edit-user-img">Edit</a>
                </div>
            </div>
            <h2 class="subheader">Sign in & Security</h2>
            <div class="info-block">
                <div class="left">
                    <h4>Email</h4>
                    <em>The email address associated with your account.
                    </em>
                </div>
                <div class="right">


                    <?php
                    if ($_SESSION['verified'] > 0) { ?>
                    <p class="text-success">Email is verified</p>
                    <?php } else { ?>
                    <a href="#verEmail" class="envokeModal" data-bs-toggle="modal">Verify</a>

                    <?php } ?>
                    <a href="#newEmail" class="envokeModal" data-bs-toggle="modal">Edit</a>
                </div>
            </div>
            <div class="info-block">
                <div class="left">
                    <h4>Password
                    </h4>
                    <em>
                        Set a unique password to protect your account.
                    </em>
                </div>
                <div class="right">
                    <a href="#chgPass" class="envokeModal styledknap" data-bs-toggle="modal">Change Password</a>
                </div>
            </div>
            <div class="info-block">
                <div class="left">
                    <h4>2-Step Verification
                    </h4>
                    <em>
                        Make your account extra secure. Along with your password, you'll need to enter a code that
                        we text to your phone each time you sign in.
                    </em>
                </div>
                <div class="right">
                    <a href="#twofa" class="envokeModal styledknap" data-bs-toggle="modal">Enable</a>
                </div>
            </div>
            <h2 class="subheader">Manage account
            </h2>
            <div class="info-block">
                <div class="left">
                    <h4>Deactivate my account
                    </h4>
                    <em>
                        This will shut down your account, but retain your information. You won't be able to sign in
                        again.
                    </em>
                </div>
                <div class="right">
                    <a href="#deleteUser" class="envokeModal styledknap" data-bs-toggle="modal">Deactivate account</a>
                </div>
            </div>
        </section>
    </div>
</main>

<!-- Modal for Edit Name -->
<div id="editName" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title">Edit name</h5>
            </div>
            <form onsubmit="return false">
                <div class="modal-body d-flex flex-row justify-content-evenly">
                    <div class="d-flex flex-column justify-content-start ">
                        <label class="pb-1" for="first_name">First name</label>
                        <input type="text" name="first_name" data-min="2" data-max="22" required>
                    </div>
                    <div class="d-flex flex-column justify-content-end ">
                        <label class="pb-1" for="last_name">Last name</label>
                        <input type="text" name="last_name" data-min="2" data-max="22" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="updateName()">Apply</button>
                </div>
            </form>
            <div>
                <em class="text-center" id="nameChange"> </em>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Edit Screen Name -->
<div id="screenName" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <form onsubmit="return false">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title">Edit screen name</h5>
                </div>
                <div class="modal-body">
                    <input type="text" placeholder="Screen name" name="user_name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="updateScreenName()">Apply</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal for Email change -->
<div id="newEmail" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title">Edit Email</h5>
            </div>
            <form onsubmit="return false">
                <div class="modal-body">
                    <div class="mb-5">
                        <p>Your current email is <?= $_SESSION['user_email'] ?></p>
                    </div>

                    <div class="pb-2">
                        <label class="pb-1" for="new_email"> New email:</label>
                        <input class="pb-1" type="email" data-min="5" data-max="50" name="new_email">
                    </div>
                    <div>
                        <label class="pb-1" for="confirm_email"> Confirm email:</label>
                        <input class="pb-1" type="email" data-min="5" data-max="50" name="confirm_email">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="changeEmail()">Apply</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Email Verification -->
<div id="verEmail" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title">Verify your email</h5>
            </div>
            <div class="modal-body" id="before">
                <div class="verification_icon  d-flex justify-content-center">
                    <svg viewBox="0 0 32 32" aria-hidden="true" focusable="false" role="img" class="w-25 p-3">
                        <g stroke="none">
                            <rect x="17" y="10" width="6" height="2" rx="1"></rect>
                            <path
                                d="M26,4V28H6V4H26m0-2H6A2,2,0,0,0,4,4V28a2,2,0,0,0,2,2H26a2,2,0,0,0,2-2V4a2,2,0,0,0-2-2Z">
                            </path>
                            <path
                                d="M14.73,7.78a.9.9,0,0,0-1.3,0l-2.21,2.36-.65-.69a.88.88,0,0,0-1.3,0,1,1,0,0,0,0,1.38l1.3,1.38a.87.87,0,0,0,1.3,0l2.86-3A1,1,0,0,0,14.73,7.78Z">
                            </path>
                            <path
                                d="M14.73,14.78a.9.9,0,0,0-1.3,0l-2.21,2.36-.65-.69a.88.88,0,0,0-1.3,0,1,1,0,0,0,0,1.38l1.3,1.38a.87.87,0,0,0,1.3,0l2.86-3A1,1,0,0,0,14.73,14.78Z">
                            </path>
                            <rect x="17" y="17" width="6" height="2" rx="1"></rect>
                            <rect x="17" y="23" width="6" height="2" rx="1"></rect>
                            <rect x="10" y="23" width="4" height="2" rx="1"></rect>
                        </g>
                    </svg>
                </div>
                <p>To verify your email, select ???Send verification email??? and then check your inbox.
                </p>
            </div>
            <div class="modal-body" id="after">
                <div class="verification_icon  d-flex justify-content-center">
                    <svg viewBox="0 0 32 32" aria-hidden="true" focusable="false" role="img" class="w-25 p-3">
                        <title>Mail</title>
                        <path stroke="none"
                            d="M28 6H4a2 2 0 00-2 2v16a2 2 0 002 2h24a2 2 0 002-2V8a2 2 0 00-2-2zM4 9.27l7.74 7.21L4 23.72zm12 8.43L5.54 8h20.92zm12-8.43v14.45l-7.74-7.24zm-14.79 8.56l2.06 1.89a1.1 1.1 0 001.46 0l2.06-1.89 6.6 6.17H6.61z">
                        </path>
                    </svg>
                </div>
                <p>Open the email and select the link provided to verify your account.
                    Didn???t receive an email? </p>
                <p><a href="#" onclick="sendVerify()">Resend</a></p>

            </div>
            <div class="modal-footer" id="before_foot">
                <form onsubmit="return false" method="POST">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="sendVerify()">Send verification
                        email</button>
                </form>
            </div>
            <div class="modal-footer" id="after_foot">
                <button type="button" class="btn btn-secondary text-end" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Change password -->
<div id="chgPass" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center ">
                <h5 class="modal-title text-center">Create a password for your Zillow account.
                </h5>
            </div>
            <form onsubmit="validate(changePass);return false">
                <div class="modal-body">
                    <div>

                        <label class="pb-1" for="new_password"> Password</label>
                        <input type="password" name="new_password" data-validate="str" data-min="2" data-max="22">
                        <div>
                            <em class="password_req p-3"> At least 8 characters<br>

                                Mix of letters and numbers<br>

                                At least 1 special character<br>

                                At least 1 lowercase letter and 1 uppercase letter</em>
                        </div>
                    </div>
                    <div>
                        <label for="confirm_password">Confirm password</label>
                        <input type="password" name="confirm_password" data-validate="str" data-min="2" data-max="22">
                    </div>
                    <div>
                        <p id="feedback_pass" class="p-3 mt-4 text-center d-block">
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="changePass()">Create Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for 2FA activation  -->
<div id="twofa" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center ">
                <h5 class="modal-title text-center">Setup 2-step verification
                </h5>
            </div>
            <form onsubmit="validate();return false">
                <div id="phone-validation-header" class="modal-body">
                    <div>
                        <p>Enter the phone number you want to use and we???ll send you text message with your
                            verification code. SMS rates may apply.</p>
                    </div>
                    <div class="pt-3 d-flex flex-column">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" data-validate="tel" required data-min="8" data-max="8">
                        <em class="password_req p-3"> You need to use a danish number</em>
                    </div>
                    <div>
                        <p id="#feedback_phone" class="text-center d-block">
                        </p>
                    </div>
                </div>
                <div id="phone-validation-footer" class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" name="submit" onclick="verifyPhone()">Apply</button>

                </div>
                <div id="phone-validation-header_after" class="modal-body">
                    <div>
                        <p>We have sent you a text with a 5 digit code. <br>Insert it below to verify your
                            number</p>
                    </div>
                    <div class="pt-3 d-flex flex-column">
                        <label for="2fa_key">Authentication Code</label>
                        <input type="text" name="2fa_key" data-min="5" data-max="5">
                        <em class="password_req p-3 text-center"> It might take a minute or two for the text to
                            arrive</em>
                    </div>
                    <div>
                        <p id="feedback_2fa" class="p-3 mt-3 text-center d-block">
                        </p>
                    </div>
                </div>
                <div id="phone-validation-footer_after" class="pt-2 modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" name="submit" onclick="enableTwofa()">Verify</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for account deletion -->
<div id="deleteUser" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title">Deactivate Account</h5>
            </div>
            <form onsubmit="return false">
                <div class="modal-body">
                    <div class="m-5">
                        <p>Are you sure, you want to deactivate your account? We wont be able to recover it for you
                            afterwards.</p>
                    </div>W
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="deleteUser()">Apply</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include __DIR__ . "/components/footer.php";
?>

<!-- Scripts for fetching apis & changing modals -->
<script>
async function sendVerify() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("email/verify-mail", {
        method: "POST",
        body: new FormData(form)
    })

    if (conn.ok) {
        verificationConfirm();
    }
}

async function updateName() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-edit-name", {
        method: "POST",
        body: new FormData(form)
    })
    if (conn.ok) {
        location.href = "account-settings"
    }
}

async function updateScreenName() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-edit-screenname", {
        method: "POST",
        body: new FormData(form)
    })
    if (conn.ok) {
        location.href = "account-settings"
    }
}

async function changeEmail() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-edit-email", {
        method: "POST",
        body: new FormData(form)
    })
    if (conn.ok) {
        location.href = "account-settings"
    }
}

async function changePass() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-edit-password", {
        method: "POST",
        body: new FormData(form)
    })
    let response = await conn.json();
    console.log(response);
    if (conn.ok) {
        _one("#feedback_pass").innerHTML = " ";
        _one("#feedback_pass").classList.remove("bg-danger");
        _one("#feedback_pass").classList.add("badge", "bg-success");
        _one("#feedback_pass").innerHTML = "Your password has been changed";
    } else {
        _one("#feedback_pass").innerHTML = " ";
        _one("#feedback_pass").classList.add("badge", "bg-danger");
        _one("#feedback_pass").innerHTML = JSON.stringify(response);
    }
}

async function verifyPhone() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-verify-phone", {
        method: "POST",
        body: new FormData(form)
    })
    if (conn.ok) {
        phoneConfirm()
    } else {
        _one("#feedback_phone").innerHTML = " ";
        _one("#feedback_phone").classList.add("badge", "bg-danger");
        _one("#feedback_phone").innerHTML = JSON.stringify(response);
    }
}

async function enableTwofa() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-authenticator", {
        method: "POST",
        body: new FormData(form)
    })
    let response = await conn.json();
    console.log(response);
    if (conn.ok) {
        _one("#feedback_2fa").innerHTML = " ";
        _one("#feedback_2fa").classList.remove("bg-danger");
        _one("#feedback_2fa").classList.add("badge", "bg-success");
        _one("#feedback_2fa").innerHTML = "Your phone has been verified and registered";
    } else {
        _one("#feedback_2fa").innerHTML = " ";
        _one("#feedback_2fa").classList.add("badge", "bg-danger");
        _one("#feedback_2fa").innerHTML = JSON.stringify(response);
    }
}

async function deleteUser() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-delete-user", {
        method: "POST",
        body: new FormData(form)
    })
    if (conn.ok) {
        location.href = "index"
    }
}
</script>