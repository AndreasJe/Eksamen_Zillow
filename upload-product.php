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
        max-width: 1280px;
        padding: 54px 0;
        margin: auto;
    }

    section {
        padding: 20px;
    }

    .subsectionUpload {
        padding: 15px 0;
    }

    section h2,
    section h1 {
        margin-bottom: 15px;
    }

    section p {
        margin-top: -10px;
    }


    .seperator {
        margin-bottom: 30px;
        padding-bottom: 30px;
        border-color: #A7A6AB;
        border-style: solid;
        border-width: 0 0 1px;
        margin-bottom: 10px;
        padding-bottom: 10px;
    }

    .terms {
        font-family: "Open Sans", Gotham, gotham, Tahoma, Geneva, sans-serif;
        font-size: 12px;
        line-height: 1.5;
        font-weight: 400;
        color: #54545A;
        padding: 10px;
    }

    #chkbox {
        content: "";
        border: 1px solid #A7A6AB;
        background-color: #fff;
        margin: 10px;
    }

    input[type="text"] {
        min-width: 300px;
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
$_title = $text['title2'][$lan];
session_start();
include __DIR__ . "/components/header.php";

?>

<!-- Individual Language link to simplify process. -->
<div class="language-link">
    <a class="language-link-item" href="upload-product.php?lan=en" <?php if ($lan == 'en') { ?> style="color: #ff9900;"
        <?php } ?>>English</a> | <a class="language-link-item" href="upload-product.php?lan=es"
        <?php if ($lan == 'es') { ?> style="color: #ff9900;" <?php } ?>>Espaniol</a>
</div>

<!-- Page Content -->
<main class="justify-content-center d-flex flex-column">


    <section>
        <h1>List your home</h1>
        <p>Post once and your home will be listed on both Zillow and Trulia, reaching buyers on the largest real estate
            network on the Web. Plus, home shoppers receive emails about new homes on the market – including yours.</p>
    </section>
    <div class="seperator"></div>
    <form class="" onsubmit="return false" runat="server">
        <section>
            <h2>Give your listing a name</h2>
            <p>Only you will see this</p>
            <input type="text" required name="item_name" data-validate="str" data-max="30" required data-min="3">
        </section>
        <div class="seperator"></div>
        <section>
            <h2>Set your price</h2>
            <input type="text" required placeholder="$" name="item_price" data-validate="str" required data-max="30"
                data-min="3">
        </section>
        <section>
            <h2>Select a photo</h2>
            <input class="w-100 mb-3" required name="item_image" accept="image/*" type='file' id="imgInp" />

            <em>Image preview:</em>
            <div class=" rounded d-flex justify-content-center preview-container w-50">
                <img id="preview" src="img/products/user-listed/img_product_default.png" alt="your image" />
            </div>
        </section>
        <div class="seperator"></div>
        <section class="d-flex justify-content-center flex-column">
            <h1>Home facts</h1>
            <div class="subsectionUpload">
                <h2>Set your address</h2>
                <input type="text" data-validate="str" required name="item_location">
            </div>
            <div class="subsectionUpload">
                <h2>Describe your home</h2>
                <p>Short description of features. You are limited to use 100 characters</p>
                <input type="text" data-validate="str" required name="item_features" data-max="100" data-min="40">
            </div>
        </section>
        <div class="seperator"></div>
        <section class="d-flex flex-row">
            <input id="chkbox" type="checkbox" name="upload_agreement" onclick="agreeTerms()">
            <label class="terms" for="chkbox"> I will be posting my property 'for sale by owner'
                on
                a fake zillow.com service and its all fake, so no worries. We have
                other affiliated websites and that I will solely be responsible for maintaining and updating the posting
                and responding to and negotiating potential offers to purchase the property; (iv) Zillow, Inc.
                ("Zillow") is a licensed real estate brokerage, that I am not entering into any agency or brokerage
                relationship with Zillow as part of this posting and that Zillow is not providing me with any real
                estate brokerage services as part of this posting; and (v) I will comply with the </label>
        </section>
        <button id="uploadButton" type="button" class="mx-3 btn btn-primary disabled" onclick="uploadItem()">Post for
            sale
            by
            owner</button>
    </form>
    <section>
        <div>
            <p class=" p-3 d-block mx-auto text-center " id="feedback_upload">

            </p>
        </div>
    </section>
</main>

<!-- Footer Content -->
<?php
include __DIR__ . "/components/footer.php";
?>

<!-- Scripts that needs to be standalone, since it uses the variable internally. 
Otherwise it will throw off all other scripts for some reason. -->

<!-- Script to display preview of selected photo -->
<script>
imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        preview.src = URL.createObjectURL(file)
    }
}

// Toggles the Bootstrap class "Disabled" on the form submit button 
function agreeTerms() {
    let button = document.getElementById("uploadButton");
    button.classList.toggle("disabled");
}
</script>