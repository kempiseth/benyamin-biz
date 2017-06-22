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
                <div class="branding">
                    <h4><?= COMPANY_NAME ?></h4>
                    <span><?= COMPANY_SHORT_DESC ?></span>
                </div>
                <span class="menu-icon"> &#9776; Menu </span>
            </header>
            <nav id="nav-main">
                <!-- Shown on all pages -->
                <a page="start" href="/">Home</a>
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
                    </article>
                </div>
                <div id="main-right">
                    <aside>
                    </aside>
                </div>
            </main>
            <footer>
                <div id="copyright" title="Piseth Kem :: +855 017-228-500">
                    &copy; <?php echo date('Y').' '.SITE_NAME ?> - All rights reserved.<br>
                    #E16, Street 489K, Phum Krang Angkrang, Sangkat Krang Tnong, Khan Sen Sok, Phnom Penh
                </div>
            </footer>
        </div>

        <script src="/static/js/app.js"></script>
        <script src="/static/js/main.js"></script>
        <?= @$js ?>
    </body>
</html>
