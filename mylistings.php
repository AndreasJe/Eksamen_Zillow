<!-- Page specific CSS -->

<head>
    <script src="components/validator.js"></script>
    <style>
    header.dark .ic.menu .line {
        background-color: blue;
    }

    header .head_container {
        display: none;
    }

    main {
        padding: 54px 0;
    }


    .seperator {
        width: 80%;
        margin: auto;
        margin-bottom: 30px;
        padding-bottom: 30px;
        border-color: #A7A6AB;
        border-style: solid;
        border-width: 0 0 1px;
        margin-bottom: 10px;
        padding-bottom: 10px;
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
$_title = $text['title5'][$lan];
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index');
    exit();
}
include __DIR__ . "/components/header.php";
?>

<!-- Main content -->
<main>
    <div id="section-wrapper">
        <section id="filter">
            <h1 class="listing-header mb-5 w-50 mx-auto">Your listings:</h1>
            <svg height="150" width="100%" fill="none" class="yourhomeicon" viewBox="0 0 352 150"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g clip-path="url(#clip0)">
                    <path d="m170.94 2.7674c-0.165 0-0.083 0.00331 0 0.01652 0.083-0.00991 0.166-0.01652 0-0.01652z"
                        fill="#0C4499"></path>
                    <path
                        d="m192.01 61.057c14.573-51.315-20.429-61.057-30.549-61.057s-47.715 9.742-33.142 61.057c2.719 9.5802-4.695 16.859-9.985 23.536-17.497 22.087-1.488 54.608 26.721 54.608h30.219c28.209 0 44.218-32.521 26.721-54.608-5.29-6.6774-12.704-13.956-9.985-23.536z"
                        fill="#0C4499"></path>
                    <path
                        d="m349.43 101.31c-4.632-6.9287-14.199-5.0431-18.825 1.697-2.954 4.303-5.263 10.119-5.772 16.099 0.254-17.043-0.933-56.781-18.749-55.767-13.064 0.7431-13.362 37.971-12.723 55.853-5.31-18.582-11.95-26.987-21.243-26.885-22.834 0.251 4.248 57.257 4.248 57.257h28.127 31.356c1.859 0 7.09-12.255 8.112-14.299 2.455-4.908 5.148-10.053 6.769-15.627 1.188-4.089 1.707-8.695 0.837-12.936-0.45-2.186-1.191-3.972-2.137-5.392z"
                        fill="#136FFB"></path>
                    <path
                        d="m86.615 113.34c14.233 1.232 28.319 1.975 40.534-4.158 16.677-8.375 23.664-30.484 17.603-48.109-13.614-39.615-62.907-41.339-96-29.338-12.72 4.6134-25.044 11.089-34.383 20.868-9.336 9.775-15.413 23.202-14.219 36.66 0.9131 10.297 7.2088 21.885 16.158 27.367 10.464 6.413 21.868 0.314 32.296-2.622 12.4-3.491 25.338-1.764 38.012-0.667z"
                        fill="#136FFB"></path>
                    <path d="m49.79 60.721c0 35.213 27.859 36.838 27.859 70.426" stroke="#0C4499" stroke-miterlimit="10"
                        stroke-width="10.2328"></path>
                    <path d="m77.649 149.56v-88.843" stroke="#0C4499" stroke-miterlimit="10" stroke-width="10.2328">
                    </path>
                    <path d="m77.649 109.75c0-12.946 31.84-15.805 31.84-28.807" stroke="#0C4499" stroke-miterlimit="10"
                        stroke-width="10.2328"></path>
                    <path d="m231.54 16.433-54.594 53.168h109.19l-54.593-53.168z" fill="#136FFB"></path>
                    <path d="m231.54 16.433h-54.594v40.93h54.594v-40.93z" fill="#136FFB"></path>
                    <path d="m233.03 69.601h-98.18v80.399h98.18v-80.399z" fill="#C1EDFE"></path>
                    <path d="m280.99 73.17h-101.36v76.826h101.36v-76.826z" fill="#0C4499"></path>
                    <path d="m231.77 69.601h-52.135v80.399h52.135v-80.399z" fill="#136FFB"></path>
                    <path d="m167 117.81h-20.577v32.188h20.577v-32.188z" fill="#FAC635"></path>
                    <path d="m200.55 117.81h-15.423v24.176h15.423v-24.176z" fill="#fff"></path>
                    <path d="m226.28 117.81h-15.423v24.176h15.423v-24.176z" fill="#fff"></path>
                    <path d="m254.59 117.81h-12.532v24.176h12.532v-24.176z" fill="#136FFB"></path>
                    <path d="m275.5 117.81h-12.532v24.176h12.532v-24.176z" fill="#136FFB"></path>
                    <path d="m254.59 81.945h-12.532v24.176h12.532v-24.176z" fill="#136FFB"></path>
                    <path d="m275.5 81.945h-12.532v24.176h12.532v-24.176z" fill="#136FFB"></path>
                    <path d="m226.28 81.945h-41.152v24.176h41.152v-24.176z" fill="#fff"></path>
                    <path d="m153.26 81.945h-13.673v24.176h13.673v-24.176z" fill="#fff"></path>
                    <path d="m173.84 81.945h-13.673v24.176h13.673v-24.176z" fill="#fff"></path>
                    <path d="m176.95 16.433-54.594 53.168h109.19l-54.594-53.168z" fill="#fff"></path>
                    <path d="m176.95 28.598-42.101 41.002h84.203l-42.102-41.002z" fill="#C1EDFE"></path>
                    <path d="m288.64 69.601h-56.814v7.1431h56.814v-7.1431z" fill="#136FFB"></path>
                    <path d="m235.16 69.601h-60.145v7.1431h60.145v-7.1431z" fill="#fff"></path>
                    <path d="m238.66 14.613h-6.114v32.086h6.114v-32.086z" fill="#C1EDFE"></path>
                    <path d="m260.87 14.613h-22.212v32.086h22.212v-32.086z" fill="#0C4499"></path>
                    <g clip-path="url(#clip1)">
                        <rect transform="rotate(258.09 -365.17 498.57)" x="-365.17" y="498.57" width="604.99"
                            height="1234.1" fill="url(#a)"></rect>
                    </g>
                </g>
                <defs>
                    <pattern id="a" width="1" height="1" patternContentUnits="objectBoundingBox">
                        <use xlink:href="#image0"></use>
                    </pattern>
                </defs>
            </svg>
            <div class="seperator"></div>
        </section>

        <!-- Showing products from database. -->
        <section id="productGrid">
            <?php
            include __DIR__ . "/apis/api-collect-uploaded-items.php";
            foreach ($items as $item) {
                echo "
                <div class='product'>
                <div class='time-container'>
                <p id='timeago_alt'>";

                $time = new DateTime($item->item_log);
                $now = new DateTime();
                $interval = $time->diff($now, true);

                if ($interval->y) echo $interval->y . ' years ago';
                elseif ($interval->m) echo ' Last Changed: ' . $interval->m . ' months ago';
                elseif ($interval->d) echo ' Last Changed: ' . $interval->d . ' days ago';
                elseif ($interval->h) echo ' Last Changed: ' . $interval->h . ' hours ago';
                elseif ($interval->i) echo ' Last Changed: ' . $interval->i . ' minutes ago';
                else echo " Submitted: less than 1 minute ago";
                echo "</p>
                    </div>
                    <div class='pic-container'>
                        <img src='/zillow/img/products/user-listed/img_product_{$item->item_id}' alt='house'>
                        <div class='fav-btn'>
                            <label for='1' class='custom-checkbox'>
                                <input type='checkbox' id='1' />
                                <i class='glyphicon glyphicon-heart-empty'></i>
                                <i class='glyphicon glyphicon-heart'></i>
                            </label>
                        </div></div>
                    <div class='btm-container'>
                        <div class='price-container'>
                            <h1>Listing: {$item->item_name}</h1>
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
                    <div id='button-edit-product'>           
                    <a class='m-0 modal-link' href='#ID{$item->item_id}' class='envokeModal' data-bs-toggle='modal'>Edit</a>
                    </div>
                    <div id='button-delete-product'>           
                    <a class='m-0 modal-link' href='apis/api-delete-item.php?item_id={$item->item_id}'>Delete</a>
                    </div>
                </div>";
            }
            ?>
        </section>
    </div>

    <!-- Making modal for each product. -->
    <?php
    foreach ($items as $item) {
        echo " <div id='ID{$item->item_id}' class='modal fade'>
        <div class='modal-fullscreen-sm-down modal-dialog modal-dialog-centered modal-dialog-scrollable'>
            <div class='modal-content'>
                <div class='modal-header justify-content-center'>
                    <h5 class='modal-title'>Edit name</h5>
                </div>
                <form method='post' enctype='multipart/form-data' action='apis/api-edit-product.php?item_id={$item->item_id}' onsubmit='location.reload();' target='dummyframe'>
                    <div class='modal-body d-flex flex-column justify-content-evenly'>
                        <div class='d-flex flex-column '>
                            <label class='pb-1' for='item_name'>Change name of listing</label>
                            <input type='text' id='item_name_{$item->item_id}' placeholder='{$item->item_name}' name='item_name' data-min='2' data-validate='str' data-max='22' required>
                        </div>
                        <div class='d-flex flex-column '>
                            <label class='pb-1' for='item_price'>Change listing price</label>
                            <input type='text' id='item_price_{$item->item_id}' placeholder='{$item->item_price}' name='item_price' data-min='2' data-validate='str' data-max='22'
                                required>
                        </div>
                        <div class='d-flex flex-column '>
                            <label for='message-text' class='col-form-label'>Change Features:</label>
                            <textarea class='form-control' placeholder='{$item->item_features}' name='item_features' data-validate='str' data-min='10'
                                data-max='100' id='item_features_{$item->item_id}' required></textarea>
                        </div>
                        <div class='d-flex flex-column '>
                            <label class='pb-1' for='item_location'>Change Location</label>
                            <input type='text' id='item_location_{$item->item_id}' placeholder='{$item->item_location}'  name='item_location' data-min='5' data-validate='str' data-max='52'
                                required>
                        </div>
                        <div class='d-flex flex-column '>
                            <label class='pb-1' for='item_author'>Change Author</label>
                            <input type='text' id='item_author_{$item->item_id}' placeholder='{$item->item_author}'  name='item_author' data-min='2' data-validate='str' data-max='22'
                                required>
                        </div>
                        <div>
                        <label class='pb-1' for='item_image'>Change Photo</label>
                            <input class='Inp w-100 mb-3' name='item_image' accept='image/*' type='file'   />

                            <em class='mb-1 d-block mx-auto'>Previous photo:</em>
                            <div class=' rounded d-flex justify-content-center preview-container w-50'>
                                <img id='preview' src='/zillow/img/products/user-listed/img_product_{$item->item_id}' alt='your image' />
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                        <button type='submit' class='btn btn-primary' >Apply</a>
                    </div>
                </form>
                   <div>
                    <p class='p-3 d-block mx-auto text-center' id='feedback_change'> </p>
                </div>
                <script>
                values();
            </script>
            </div>
        </div>
    </div>
</div>";
    }
    ?>
    <!-- Trick to avoid redirection on form submit (Using the Target attribute and the ID "dummyframe") -->
    <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>

    <!-- Footer Content -->
    <?php
    include __DIR__ . "/components/footer.php";
    ?>