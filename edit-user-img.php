<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    header('Location: login');
    exit();
}

include __DIR__ . "/components/header.php";
?>




<main>


    <div id="photo_container d-flex flex-column">

        <h1>Edit Photo</h1>
        <p>Add an updated photo of yourself to help fill out your profile.</p>
        <form runat="server">

            <input accept="image/*" type='file' id="imgInp" />
            <button onclick="upload()">Upload</button>
            <img id="preview" src="#" alt="your image" />


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
</script>


<?php
include __DIR__ . "/components/footer.php";
?>