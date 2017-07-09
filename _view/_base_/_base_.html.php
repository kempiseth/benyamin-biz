<!DOCTYPE html>
<html lang="<?=LANG?>">
    <head>
        <meta charset="UTF-8" />
        <meta name="author" content="Piseth Kem">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

        <title><?= $title.' - '.SITE_NAME ?></title>
        <link href="https://fonts.googleapis.com/css?family=Bubbler+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Exo:400,800" rel="stylesheet">
        <link href="/static/css/app.css" rel="stylesheet">
        <link href="/static/css/main.css" rel="stylesheet">
    </head>
    <body page="<?= @$page ?>">
        <div class="wrapper">
            <header>
                <div class="social-media group">
                    <a class="link-button float-right" href="tel:098481115" target="_blank" title="Call 098-481-115"> CALL NOW! </a>
                    <a href="https://www.facebook.com/BestKhmerConsulting" target="_blank" title="Go to facebook page">
                        <img id="fb-link" class="icon" src="/static/image/facebook_grey.png">
                    </a>
                    <a href="mailto:boryuk@gmail.com" target="_blank" title="Send us an email">
                        <img id="em-link" class="icon" src="/static/image/email_grey.png">
                    </a>
                </div>
                <div class="branding">
                    <h4><?= COMPANY_NAME ?></h4>
                    <span><?= COMPANY_SHORT_DESC ?></span>
                </div>
                <span class="menu-icon"> &#9776; Menu </span>
            </header>
            <nav id="nav-main">
                <!-- Shown on all pages -->
                <a page="start" href="/">Home</a>
                <a page="services" href="/services">Services</a>
                <a page="about" href="/about">About Us</a>

                <!-- Page specific navs -->
                <?= @$nav ?>

                <!-- Shown on system pages -->
                <?php if(@$_SESSION['isSuperUser']): ?>
                    <a href="/manage-system">Manage System</a>
                <?php endif; ?>

                <!-- Account related navs -->
                <?php if(isset($_SESSION['userid'])): ?>
                    <a id="account" href="/account">Account</a>
                    <a id="logout" href="/logout">Log out</a>
                <?php endif; ?>
            </nav>
            <main class="group">
                <div id="main-left">
                    <section id="section-main">
                        <div class="message"><?= @$_SESSION['message'] ?></div>
                        <?= @$section ?>
                    </section>
                    <article>
                        <?= @$article ?>
                    </article>
                </div>
                <div id="main-right">
                    <aside>
                        <?= @$aside ?>
                    </aside>
                </div>
            </main>
            <footer>
                <div id="copyright">
                    &copy; <?php echo date('Y').' '.SITE_NAME ?> - <a href="tel:098481115">Tel: 098-481-115</a><br>
                    #E16, Street 489K, Phum Krang Angkrang, Sangkat Krang Tnong, Khan Sen Sok, Phnom Penh
                </div>
            </footer>
        </div>

        <script src="/static/js/app.js"></script>
        <script src="/static/js/main.js"></script>
        <?= @$js ?>
    </body>
</html>
