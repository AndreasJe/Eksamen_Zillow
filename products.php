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
$_title = 'View Products';
include __DIR__ . "/components/header.php";
?>


<main>
    <div id="section-wrapper">
        <section id="filter">

        </section>


        <section id="productGrid">

            <!-- Getting products from Sheet. -->
            <?php
            $data = json_decode(file_get_contents("apis/shop.txt"));


            foreach ($data as $item) {
                echo "
                <div class='product'>
                    <div class='pic-container'>
                
                        <img src='/img/products/partners/{$item->item_img}' alt='house'>
                        <div class='fav-btn'>
                            <label for='1' class='custom-checkbox'>
                                <input type='checkbox' id='1' />
                                <i class='glyphicon glyphicon-heart-empty'></i>
                                <i class='glyphicon glyphicon-heart'></i>
                            </label>
                        </div>
                    </div>
                    <div class='btm-container'>
                        <div class='price-container'>
                            <h1>{$item->item_price}</h1>
                        </div>
                        <div class='description-container mt-1 mb-2'>
                            <p>{$item->item_features}</p>
                        </div>
                        <div class='address-container'>
                            <address>{$item->item_location}</address>
                        </div>
                        <div class='badge bg-info seller-container'>
                            <em>Listing from partner: {$item->item_author}</em>
                        </div>
                    </div>
                </div>";
            }


            // Showing products from database. 
            include __DIR__ . "/apis/api-collect-items.php";

            foreach ($items as $item) {
                echo "
                <div class='product'>
                    <div class='pic-container'>
                
                        <img src='/img/products/user-listed/img_product_{$item->item_id}' alt='house'>
                        <div class='fav-btn'>
                            <label for='1' class='custom-checkbox'>
                                <input type='checkbox' id='1' />
                                <i class='glyphicon glyphicon-heart-empty'></i>
                                <i class='glyphicon glyphicon-heart'></i>
                            </label>
                        </div>
                    </div>
                    <div class='btm-container'>
                        <div class='price-container'>
                            <h1>{$item->item_price}</h1>
                        </div>
                        <div class='description-container mt-1 mb-2'>
                            <p>{$item->item_features}</p>
                        </div>
                        <div class='address-container'>
                            <address>{$item->item_location}</address>
                        </div>
                        <div class='badge bg-primary seller-container'>
                            <em>Listing by {$item->item_author}</em>
                        </div>
                    </div>
                </div>";
            }

            ?>


        </section>
    </div>


</main>



<?php
include __DIR__ . "/components/footer.php"; ?>