<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $_title ?? 'COMPANY' ?></title>
    <link rel="stylesheet" href="/style.css" />
    <link href=" ../img/permanent/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>

    <header class="dark">
        <a href="index"><img class="logo2" src=" ../img/permanent/z-white.svg" alt="" /></a>

        <?php if (!isset($_SESSION['user_name'])) : ?>
        <a class="mobile-signin envokeModal" href="#login" data-bs-toggle="modal">Sign In</a>
        <?php else :  ?>
        <li class="user-nav2">
            <div class="dropdown2">
                <button onclick="userNav2()" class="dropbtn2">



                    <?php
                        $filename =  'img/user/img_' . $_SESSION['user_id'];
                        if (file_exists($filename)) : ?>
                    <img class="user_img rounded-circle dropbtn"
                        src="../img/user/img_<?php echo $_SESSION['user_id'] ?>" alt="Custom user profile">
                    <?php else :  ?>
                    <img class="user_img rounded-circle dropbtn" src="/img/permanent/user.png">

                    <?php endif; ?>
                </button>
                <div id="myDropdown2" class="dropdown-content2">
                    <a href="account-settings"><span
                            class="Text-c11n-8-53-1__sc-aiai24-0 pfs__sc-16r5mxa-0 cDxHF"><span>Account
                                Settings</span></span> </a>
                    <a href="products"><span class="Text-c11n-8-53-1__sc-aiai24-0 pfs__sc-16r5mxa-0 cDxHF"><span>Saved
                                Homes</span></span></a>
                    <a style="border-top:1px solid black" href="../bridges/logout">Sign out</a>
                </div>
            </div>
        </li>
        <?php endif; ?>



        <nav role="navigation">
            <a href="javascript:void(0);" class="ic menu" tabindex="1">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </a>
            <a href="javascript:void(0);" class="ic close"></a>
            <ul class="main-nav">
                <li class="top-level-link">
                    <a href="index"><span>Home</span></a>
                </li>

                <li class="top-level-link">
                    <a class="mega-menu"><span>Products</span></a>
                    <div class="sub-menu-block">
                        <div class="row">
                            <div class="col-md-5 col-lg-5 col-sm-5">
                                <h2 class="sub-menu-head">Homes for Sale</h2>
                                <ul class="sub-menu-lists">
                                    <li><a href="products">Homes for sale</a></li>
                                    <li><a href="products">View all homes</a></li>
                                </ul>
                                <div class="col-md-5 col-lg-5 col-sm-5">
                                    <h2 class="sub-menu-head">Homes for Sale</h2>
                                    <ul class="sub-menu-lists">
                                        <li><a href="uploadproduct">Sell your home</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="logo_container" class="top-level-link">
                    <a href="index"> <img class="logo" src=" ../img/permanent/zillow.svg" alt="logo"> </a>
                </li>
                <li class="top-level-link">
                    <a class="mega-menu"><span>About</span></a>
                    <div class="sub-menu-block">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-4">
                                <h2 class="sub-menu-head">Users</h2>
                                <ul class="sub-menu-lists">
                                    <li><a>About</a></li>
                                    <li><a>Mission</a></li>
                                    <li><a>Community</a></li>
                                    <li><a>Team</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <?php if (!isset($_SESSION['user_name'])) { ?>
                <li class="top-level-link">
                    <a href=" #login" class="envokeModal" data-bs-toggle="modal"><span>Sign in</span></a>
                </li>
                <?php } else {  ?>

                <?php } ?>

                <?php if (isset($_SESSION['user_name'])) : ?>
                <li class="user-nav top-level-link">
                    <div class="dropdown">
                        <button onclick="userNav1()" class="dropbtn">

                            <?php
                                if (file_exists($filename)) : ?>
                            <img class="user_img rounded-circle dropbtn2"
                                src="../img/user/img_<?php echo $_SESSION['user_id'] ?>" alt="Custom user profile">

                            <?php else :  ?>
                            <img class="user_img rounded-circle dropbtn2" src="/img/permanent/user.png"
                                alt="Default user icon">

                            <?php endif; ?>

                        </button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="account-settings"><span
                                    class="Text-c11n-8-53-1__sc-aiai24-0 pfs__sc-16r5mxa-0 cDxHF"><span>Account
                                        Settings</span></span> </a>
                            <a href="products"><span
                                    class="Text-c11n-8-53-1__sc-aiai24-0 pfs__sc-16r5mxa-0 cDxHF"><span>Saved
                                        Homes</span></span></a>
                            <a style="border-top:1px solid black" href="../bridges/logout">Sign out</a>
                        </div>
                    </div>
                </li>
                <?php else :  ?>

                <?php endif; ?>

            </ul>
        </nav>

        <div class="head_container">
            <div class="head_contentBox">
                <h1>Change starts here</h1>
                <form class="search_form" submit="return false">
                    <input type="text" placeholder="Address, neighborhood, city, ZIP" name="search" />
                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></i></button>
                </form>
            </div>
            <img class="headunit" src=" ../img/permanent/head.webp" alt="" />
        </div>
    </header>