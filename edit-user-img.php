<!-- Page-specific CSS (Mainly nav settings) -->

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

<!-- Session start etc. -->

<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index');
    exit();
}

include __DIR__ . "/components/header.php";
?>




<main class="justify-content-center d-flex">


    <div id="photo_container d-flex flex-column">

        <h1 class="pb-1">Edit Photo</h1>
        <p class="pb-4">Add an updated photo osf yourself to help fill out your profile.</p>
        <form class="" onsubmit="return false" runat="server">

            <input class="w-100 mb-3" name="image" accept="image/*" type='file' id="imgInp" />

            <div class="p-5 rounded d-flex justify-content-center preview-container ">
                <img class="rounded-circle" id="preview" src="../img/user/img_<?php echo $_SESSION['user_id'] ?>"
                    alt="your image" />
            </div>
            <div class="flex-row">
                <button class="mt-3" onclick="updatePhoto()">Submit</button>
                <button onclick="javascript:location.href='account-settings'" type="button" class=" btn-secondary"
                    onclick="href">Cancel</button>
            </div>

            <div class="justify-content-center d-flex p-5"><em id="feedback"></em></div>

        </form>



    </div>

</main>

<!-- Display image preview -->
<script>
imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        preview.src = URL.createObjectURL(file)
    }
}



async function updatePhoto() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-upload-profilepic", {
        method: "POST",
        body: new FormData(form)
    })
    if (conn.ok) {

        const feed = document.getElementById("feedback");
        feed.innerHTML = "Your photo has been uploaded <br> Reload the page to see the change"
    }
}
</script>


<?php
include __DIR__ . "/components/footer.php";
?>