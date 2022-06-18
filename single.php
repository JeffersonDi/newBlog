<?php 
include("path.php"); 
include(ROOT_PATH . '/app/controllers/posts.php'); 
?>
<?php
if (isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesom -->
    <script src="https://kit.fontawesome.com/cb0649ed49.js" crossorigin="anonymous"></script>

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?php echo $post['title']; ?></title>
</head>

<body>
    <!-- Header -->
    <?php
    include(ROOT_PATH . "/app/includes/header.php");
    ?>
    <!-- /Header -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Content -->
        <div class="content clearfix">

            <!-- Main Content Wrapper -->
            <div class="main-content single">
                <div class="main-content-wrapper">

                    <h1 class="post-title"><?php echo $post['title']; ?></h1>

                    <div class="post-content">
                        <?php echo html_entity_decode($post['body']); ?>
                    </div>
                </div>
            </div>
            <!-- /Main Content Wrapper-->

            <!-- Sidebar -->
            <div class="sidebar single">

                <div class="section popular">
                    <h2 class="section-title">Популярный</h2>
                    <?php foreach ($posts as $p) : ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . '/assets/img/' . $p['image']; ?>" alt="">
                            <a href="" class="title">
                                <h4><?php echo $p['title']; ?></h4>
                            </a>
                        </div>
                    <?php endforeach; ?>


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
            <!-- /Sidebar -->

        </div>
        <!-- /Content -->
    </div>
    <!-- /Page Wrapper -->

    <!-- footer -->
    <?php
    include(ROOT_PATH . "/app/includes/footer.php");
    ?>
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