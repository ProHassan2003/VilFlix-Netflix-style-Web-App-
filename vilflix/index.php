
<?php
require_once __DIR__ . '/includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VilFLix – Watch TV Shows Online, Watch Movies Online</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="main">
        <nav>
            <span><img width="53" src="assets/images/vilflix.png" alt=""></span>
            <div>
                <button class="btn" type="button">English</button>

               <?php if (isset($_SESSION['user'])): ?>
  <a href="/vilflix/browse.php" class="btn">Browse</a>
  <a href="/vilflix/watchlist.php" class="btn">My List</a>
  <a href="/vilflix/auth/logout.php" class="btn btn-red">Logout</a>
<?php else: ?>
  <button id="btnOpenLogin" class="btn btn-red" type="button">Sign In</button>
  <button id="btnOpenRegister" class="btn btn-red" type="button">Sign Up</button>
<?php endif; ?>


            </div>
        </nav>

        <div class="box"></div>

        <div class="hero">
            <span>Enjoy big movies, hit series and more from €9.99</span>
            <span>Join today. Cancel anytime.</span>
            <span>Ready to watch? Enter your email to create or restart your membership.</span>
            <div class="hero-buttons">
                <input type="text" placeholder="Email Address">
                <button class="btn btn-red" type="button">Get Started &gt;</button>
            </div>
        </div>

        <div class="separation"></div>
    </div>

    <section class="first">
        <div>
            <span>Enjoy on your TV</span>
            <span>Watch on smart TVs, PlayStation, Xbox, Chromecast, Apple TV, Blu-ray players and more.</span>
        </div>

        <div class="secImg">
            <img src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/tv.png" alt="">
            <video src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/video-tv-in-0819.m4v"
                autoplay loop muted></video>
        </div>
    </section>
    <div class="separation"></div>

    <section class="first second">
        <div class="secImg">
            <img src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/mobile-0819.jpg" alt="">
        </div>
        <div>
            <span>Download your shows to watch offline</span>
            <span>Save your favourites easily and always have something to watch.</span>
        </div>
    </section>

    <div class="separation"></div>
    <section class="first third">
        <div>
            <span>Watch everywhere</span>
            <span>Stream unlimited movies and TV shows on your phone, tablet, laptop, and TV.</span>
        </div>

        <div class="secImg">
            <img src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/tv.png" alt="">
            <video src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/video-devices-in.m4v"
                autoplay loop muted></video>
        </div>
    </section>
    <div class="separation"></div>

    <section class="first second">
        <div class="secImg">
            <img src="https://occ-0-2849-3646.1.nflxso.net/dnm/api/v6/19OhWN2dO19C9txTON9tvTFtefw/AAAABVr8nYuAg0xDpXDv0VI9HUoH7r2aGp4TKRCsKNQrMwxzTtr-NlwOHeS8bCI2oeZddmu3nMYr3j9MjYhHyjBASb1FaOGYZNYvPBCL.png?r=54d"
                alt="">
        </div>
        <div>
            <span>Create profiles for kids</span>
            <span>Send children on adventures with their favourite characters in a space made just for them—free with
                your membership.</span>
        </div>
    </section>

    <div class="separation"></div>

    <section class="faq">
        <h2>Frequently Asked Questions</h2>

        <div class="faqbox">
            <span>What is VilFlix</span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4V20" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4 12H20" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div class="answer">
                VilFlix is a streaming service that offers movies, TV shows, and more for a fixed monthly fee.
            </div>
        </div>

        <div class="faqbox">
            <span>How much does VilFlix cost?</span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4V20" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4 12H20" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div class="answer">
                VilFlix starts at €9.99 per month. You can cancel anytime.
            </div>
        </div>

        <div class="faqbox">
            <span>What can I watch on VilFlix?</span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4V20" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4 12H20" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div class="answer">
                You can watch movies, TV shows, documentaries, and exclusive content only on VilFlix.
            </div>
        </div>

        <div class="faqbox">
            <span>Where can I watch?</span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4V20" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4 12H20" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div class="answer">
                You can watch VilFlix on TVs, smartphones, tablets, laptops, and supported devices.
            </div>
        </div>
    </section>

    <div class="separation"></div>

    <!-- LOGIN MODAL (only one) -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="modal-close" data-close="loginModal">&times;</span>
            <h2>Sign In</h2>
            <form method="post" action="/vilflix/auth/login.php">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Sign In</button>
            </form>
            <p>New to Vilflix? <a href="#" id="openRegister">Create account</a></p>
        </div>
    </div>

    <!-- REGISTER MODAL (only one) -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="modal-close" data-close="registerModal">&times;</span>
            <h2>Sign Up</h2>
            <form method="post" action="/vilflix/auth/register.php">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password (min 6 chars)" required>
                <button type="submit">Create Account</button>
            </form>
            <p>Already have an account? <a href="#" id="openLogin">Sign in</a></p>
        </div>
    </div>

    <footer>
        <div class="questions">
            Questions? Call 000-800-919-1694
        </div>
        <div class="footer">
            <div class="footer-item">
                <a href="faq">Investor Relations</a>
                <a href="faq">Jobs</a>
                <a href="faq">Ways to Watch</a>
                <a href="faq">Terms of Use</a>
            </div>

            <div class="footer-item">
                <a href="faq">Help Centre</a>
                <a href="faq">Account</a>
                <a href="faq">Speed Test</a>
                <a href="faq">Legal Notices</a>
            </div>
            <div class="footer-item">
                <a href="faq">Media Centre</a>
                <a href="faq">Privacy</a>
                <a href="faq">Cookie Preferences</a>
                <a href="faq">Corporate</a>
            </div>

            <div class="footer-item">
                <a href="faq">Contact Us</a>
                <a href="faq">Speed Test</a>
                <a href="faq">Legal Notices</a>
                <a href="faq">Only on Vilflix</a>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>
