<header>
    <div class="logo">
        <a href="<?php echo BASE_URL . '/index.php' ?>">
            <img class="logo-img" src="https://upload.wikimedia.org/wikipedia/ru/thumb/8/84/DOSAAF_RF_2.svg/150px-DOSAAF_RF_2.svg.png" alt="">
            <h1 class="logo-text"><span>МО ДОСААФ РОССИИ</span> по Боградскому району РХ</h1>
        </a>
    </div>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
        <?php if (isset($_SESSION['id'])) : ?>
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    <?php echo $_SESSION['username']; ?>
                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                </a>
                <ul>
                    <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Выйти</a></li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</header>