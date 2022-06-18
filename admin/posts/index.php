<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); 
adminOnly();
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
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- Admin Style -->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Админка - Редакторование новостей</title>
</head>

<body>
    <!-- Header -->
    <?php
    include(ROOT_PATH . "/app/includes/header_admin.php");
    ?>
    <!-- /Header -->

    <!-- Admin Page Wrapper -->
    <div class="admin-page-wrapper">

        <!-- Left sidebar  -->
        <?php
        include(ROOT_PATH . "/app/includes/side_bar_admin.php");
        ?>
        <!-- /Left sidebar  -->

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Добавить пост</a>
                <a href="index.php" class="btn btn-big">Управление новостями</a>
            </div>

            <div class="content">
                <h2 class="page-title">Управление новостями</h2>
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $key => $post) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $post['title']; ?></td>
                                <td><?php echo $post['user_id']; ?></td>
                                <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">Редактировать</a></td>
                                <td><a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">Удалить</a></td>
                                <?php if ($post['published']) : ?>
                                    <td><a href="edit.php?published=0&p_id=<?php echo $post['id']; ?>" class="unpublish">Непубликовать</a></td>
                                <?php else : ?>
                                    <td><a href="edit.php?published=1&p_id=<?php echo $post['id']; ?>" class="publish">Опубликовать</a></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                        <!-- <tr>
                            <td>1</td>
                            <td>Это первый пост</td>
                            <td>МО ДОСААФ</td>
                            <td><a href="#" class="edit">Редактировать</a></td>
                            <td><a href="#" class="delete">Удалить</a></td>
                            <td><a href="#" class="publish">Опубликовать</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Это второй пост</td>
                            <td>МО ДОСААФ</td>
                            <td><a href="#" class="edit">Редактировать</a></td>
                            <td><a href="#" class="delete">Удалить</a></td>
                            <td><a href="#" class="publish">Опубликовать</a></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /Admin Content -->


    </div>
    <!-- /Admin Page Wrapper -->

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom Script -->
    <script src="../../js/scripts.js"></script>
</body>

</html>