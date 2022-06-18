<?php
include("path.php");
// include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/controllers/topics.php");

$posts = array();
$postTitle = 'Недавние посты';

if (isset($_GET['t_id'])) {
    $posts = getPostsByTopicId($_GET['t_id']);
    $postTitle = 'Посты по теме "' . $_GET['name'] . '"';
} else if (isset($_POST['search-term'])) {
    $postTitle = 'Результаты поиска "' . $_POST['search-term'] . '"';
    $posts = searchPosts($_POST['search-term']);
    //dd($posts);
} else {
    $posts = getPublisedPosts();
    //dd($posts);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesom -->
    <script src="https://kit.fontawesome.com/cb0649ed49.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet"> -->
    <!-- <link href="https: //fonts.googleapis.com/css2?family= Montserrat: wght @100 & display=swap" rel="stylesheet"> -->
    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>ДОСААФ</title>
</head>

<body>
    <!-- Header -->
    <?php
    include(ROOT_PATH . "/app/includes/header.php");
    include(ROOT_PATH . "/app/includes/messages.php");
    // dd($_SESSION);
    ?>

    <!-- /Header -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Post Slider -->
        <div class="post-slider">
            <h1 class="slider-title">Популярные публикации</h1>
            <i class="fas fa-chevron-left prev"></i>
            <i class="fas fa-chevron-right next"></i>

            <div class="post-wrapper autoplay">

                <?php foreach ($posts as $post) : ?>
                    <div class="post">
                        <img class="slider-image" src="<?php echo BASE_URL . '/assets/img/' . $post['image']; ?>" alt="">
                        <div class="post-info">
                            <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
                            <i class="far fa-user"><?php echo $post['username']; ?></i>
                            &nbsp;
                            <i class="far fa-calendar"><?php echo date('j F, Y', strtotime($post['created_at'])); ?></i>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- /Post Slider -->

        <!-- Content -->
        <div class="content clearfix">

            <!-- Main Content -->
            <div class="main-content">
                <h1 class="recent-post-title"><?php echo $postTitle; ?></h1>
                <?php foreach ($posts as $post) : ?>
                    <div class="post clearfix">
                        <img class="post-image" src="<?php echo BASE_URL . '/assets/img/' . $post['image']; ?>" alt="">
                        <div class="post-preview">
                            <h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h1>
                                <i class="far fa-user"><?php echo $post['username']; ?></i>
                                &nbsp;
                                <i class="far fa-calendar"><?php echo date('j F, Y', strtotime($post['created_at'])); ?></i>
                                <p class="preview-text">
                                    <?php
                                    $content = html_entity_decode($post['body']);
                                    $content = preg_replace("/<img[^>]+\>/i", "", $content); 
                                    echo (substr($content, 0, 151) . '...');
                                    // echo preg_replace("/<img[^>]+\>/i", " ", html_entity_decode(substr($post['body'], 0, 151) . '...'));
                                    ?>
                                </p>
                                <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Подробнее</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- /Main Content -->

            <div class="sidebar">

                <div class="section search">
                    <h2 class="section-title">Поиск</h2>
                    <form action="index.php" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Поиск...">
                    </form>
                </div>

                <div class="section topics">
                    <h2 class="sectiom-title">Темы</h2>
                    <ul>
                        <?php foreach ($topics as $key => $topic) : ?>
                            <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a></li>
                        <?php endforeach; ?>
                        <!-- <li><a href="#">Занятия</a></li>
                        <li><a href="#">Тир</a></li>
                        <li><a href="#">Курсы ЭВМ</a></li> -->
                    </ul>
                </div>

            </div>

        </div>
        <!-- /Content -->
    </div>
    <!-- /Page Wrapper -->

    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
    <!-- /footer -->


    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Slick Carousel -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- /Slick Carousel -->

    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>
</body>

</html>