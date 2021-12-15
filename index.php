<!-- Title, language, session_start and header defined -->
<?php
require_once __DIR__ . ('/components/dictionary.php');
$lan = $_GET['lan'] ?? 'en'; // en es dk
$_title = $text['title'][$lan];
session_start();
include __DIR__ . "/components/header.php";
?>

<!-- Page Content -->
<main>
    <p class="quote">
        <?= $text['copy'][$lan] ?>
    </p>
    <section class="cards">
        <article>
            <div class="left">
                <img src=" ../zillow/img/permanent/Buy_a_home.webp" alt="" />
            </div>
            <div class="right">
                <h2>
                    <?= $text['buy_header'][$lan] ?>
                </h2>
                <p>
                    <?= $text['buy_content'][$lan] ?>
                </p>
                <button onclick="window.location.href='products'">
                    <?= $text['buy_button'][$lan] ?>
                </button>
            </div>
        </article>
        <article>
            <div class="left">
                <img src=" ../zillow/img/permanent/Sell_a_home.webp" alt="" />
            </div>
            <div class="right">
                <h2>
                    <?= $text['sell_header'][$lan] ?>
                </h2>
                <p>
                    <?= $text['sell_content'][$lan] ?>
                </p>
                <button onclick="window.location.href='upload-product.php'">
                    <?= $text['sell_button'][$lan] ?>
                </button>
            </div>
        </article>
        <article>
            <div class="left">
                <img src=" ../zillow/img/permanent/Rent_a_home.webp" alt="" />
            </div>
            <div class="right">
                <h2>
                    <?= $text['rent_header'][$lan] ?>
                </h2>
                <p>
                    <?= $text['rent_content'][$lan] ?>
                </p>
                <button onclick="window.location.href='products'">

                    <?= $text['rent_button'][$lan] ?>
                </button>
            </div>
        </article>
    </section>
</main>


<!-- Footer Content -->
<?php
include __DIR__ . "/components/footer.php"; ?>