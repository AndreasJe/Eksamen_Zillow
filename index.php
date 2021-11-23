<?php
session_start();
$_title = 'Home';
include __DIR__ . "/components/header.php";
?>

<main>
    <p class="quote">
        Whether you’re buying, selling or renting,<br />
        we can help you move forward.
    </p>
    <section class="cards">
        <article>
            <div class="left">
                <img src=" ../img/permanent/Buy_a_home.webp" alt="" />
            </div>
            <div class="right">
                <h2>Buy a Home</h2>
                <p>
                    Find your place with an immersive photo experience and the most
                    listings, including things you won’t find anywhere else.
                </p>
                <button onclick="window.location.href='products'"></buttononclick>Search homes</button>
            </div>
        </article>
        <article>
            <div class="left">
                <img src=" ../img/permanent/Sell_a_home.webp" alt="" />
            </div>
            <div class="right">
                <h2>Sell a Home</h2>
                <p>
                    Whether you get a cash offer or choose to
                    sell traditionally, we can help you navigate a successful sale.
                </p>
                <button onclick="window.location.href='upload-product'">See your options</button>
            </div>
        </article>
        <article>
            <div class="left">
                <img src=" ../img/permanent/Rent_a_home.webp" alt="" />
            </div>
            <div class="right">
                <h2>Rent a Home</h2>
                <p>
                    We’re creating a seamless online experience – from shopping on the
                    largest rental network, to applying, to paying rent.
                </p>
                <button onclick="window.location.href='products'">Find rentals</button>
            </div>
        </article>
    </section>
</main>




<?php
include __DIR__ . "/components/footer.php"; ?>