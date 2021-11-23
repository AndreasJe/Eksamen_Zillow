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
if (!isset($_SESSION['user_name'])) {
    header('Location: index');
    exit();
}
$_title = 'Account Settings';

include __DIR__ . "/components/header.php";
?>



<main>
    <div class="btn-wrapper">

        <p> <span class="chevron"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                </svg></span> <a class="backbtn" href="index "> Go back</a>
        </p>
    </div>

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
                    <p>N/A</p>
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
                    <p>N/A</p>
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
                    <a href="#verEmail" class="envokeModal" data-bs-toggle="modal">Verify</a>
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
                        again until your account is reactivated.

                    </em>
                </div>
                <div class="right">
                    <a class="styledknap" href="modal">Deactivate account</a>
                </div>

            </div>

        </section>

    </div>




</main>




<!-- Modal for Edit Name -->
<div id="editName" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title">Edit name</h5>
            </div>
            <form action="">
                <div class="modal-body d-flex flex-row justify-content-evenly">
                    <div class="d-flex flex-column justify-content-start ">
                        <label class="pb-1" for="first-name">First name</label>
                        <input type="text" name="first-name">
                    </div>
                    <div class="d-flex flex-column justify-content-end ">
                        <label class="pb-1" for="last-name">Last name</label>
                        <input type="text" name="last-name">
                    </div>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Apply</button>
        </div>
    </div>
</div>
</div>

<!-- Modal for Edit Screen Name -->
<div id="screenName" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title">Edit screen name</h5>
            </div>
            <div class="modal-body">
                <form action="">
                    <input type="text" placeholder="Screen name" name="user-name">
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Email change -->
<div id="newEmail" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title">Edit Email</h5>
            </div>
            <div class="modal-body">
                <div class="mb-5">
                    <p>Your current email is gud.er.gud@gmail.com.</p>
                </div>

                <form action="">
                    <div class="pb-2">
                        <label class="pb-1" for="new-email"> New email:</label>
                        <input class="pb-1" type="email" name="new-email">
                    </div>
                    <div>
                        <label class="pb-1" for="confirm-email"> Confirm email:</label>
                        <input class="pb-1" type="email" name="confirm-email">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Email Verification -->
<div id="verEmail" class="modal fade">
    <div class="modal-dialog">
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
                <p>To verify your email, select “Send verification email” and then check your inbox.

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
                    Didn’t receive an email? </p>
                <p><a href="">Resend</a></p>

            </div>
            <div class="modal-footer" id="before_foot">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="sendVerification()">Send verification
                    email</button>
            </div>
            <div class="modal-footer" id="after_foot">
                <button type="button" class="btn btn-secondary text-end" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Change password -->
<div id="chgPass" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center ">
                <h5 class="modal-title text-center">Create a password for your Zillow account.
                </h5>
            </div>
            <div class="modal-body">
                <form action="">
                    <div>

                        <label class="pb-1" for="new-email"> Password</label>
                        <input type="email" name="new-email">
                        <div>
                            <em class="password_req p-3"> At least 8 characters<br>

                                Mix of letters and numbers<br>

                                At least 1 special character<br>

                                At least 1 lowercase letter and 1 uppercase letter</em>
                        </div>
                    </div>
                    <div>
                        <label for="confirm-email">Confirm password</label>
                        <input type="email" name="confirm-email">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Create Password</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Change password -->
<div id="twofa" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center ">
                <h5 class="modal-title text-center">Setup 2-step verification

                </h5>
            </div>
            <div class="modal-body">
                <form action="">
                    <div>
                        <p>Enter the phone number you want to use and we’ll send you text message with your
                            verification code. SMS rates may apply.</p>
                    </div>
                    <div>
                        <label for="phone-number">Phone Number</label>
                        <input type="email" name="phone-number">
                        <em class="password_req p-3"> Your phone needs to have a danish number</em>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Create Password</button>
            </div>
        </div>
    </div>
</div>


<?php
include __DIR__ . "/components/footer.php"; ?>