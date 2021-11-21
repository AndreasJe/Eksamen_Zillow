<?php
session_start();
include __DIR__ . "/components/header.php"; ?>

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

    <!-- Modal Template-->

    <div id="signin" class="modal_custom">
        <div class="modal__content">
            <div class="modal_wrapper">

                <div class="sc-kgoBCf bneXgu"><span id="sr-message" aria-live="off"
                        class="VisuallyHidden-c11n-8-53-1__sc-t8tewe-0 hObLRM"></span>
                    <h2 font-family="serif"
                        class="Text-c11n-8-53-1__sc-aiai24-0 StyledHeading-c11n-8-53-1__sc-ktujwe-0 fDFlcw">Welcome
                        to
                        Zillow</h2>
                    <p class="Text-c11n-8-53-1__sc-aiai24-0 StyledParagraph-c11n-8-53-1__sc-18ze78a-0 jCBryf"></p>
                </div>

                <div class="tab-bar">
                    <button class="tablink active-tab" onclick="openTab(event,'Signin')">Sign in</button>
                    <button class="tablink" onclick="openTab(event,'Signup')">New Account</button>
                </div>
                <div id="forms">

                    <div id="Signin" class="tab">

                        <form onsubmit="return false">
                            <label for="email">Email</label>
                            <input name="email" type="text" placeholder="Enter email">

                            <label for="password">Password</label>
                            <input name="password" type="password" placeholder="Enter Password">

                            <button onclick="login()"> Sign in </button>
                            <a class="modal-link" href="forgot-password">Forgot password?</a>
                        </form>
                    </div>

                    <div id="Signup" class="tab" style="display:none">

                        <label for="user_email">Email</label>
                        <input name="user_email" type="text" placeholder="Enter email">

                        <label for="user_password">Password</label>
                        <input name="user_password" type="password" placeholder="Create password">
                        <em class="password_req"> At least 8 characters<br>

                            Mix of letters and numbers<br>

                            At least 1 special character<br>

                            At least 1 lowercase letter and 1 uppercase letter</em>

                        <button> Submit </button>
                        <div class="modal_info">
                            <em>By submitting, I accept Zillow's &nbsp</em><a class="emA" href="#">terms of use.</a>
                        </div>
                    </div>
                </div><a href="#" class="modal__close">×</a>
            </div>
        </div>
    </div>


</main>

<script>
async function login() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-login", {
        method: "POST",
        body: new FormData(form)
    })

    if (conn.ok) {
        location.href = "account-settings"
    }
}
</script>


<?php
include __DIR__ . "/components/footer.php"; ?>