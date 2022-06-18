<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
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
    <title>Админка - Управление пользователями</title>
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
                <a href="create.php" class="btn btn-big">Добавить пользователя</a>
                <a href="index.php" class="btn btn-big">Управление пользователями</a>
            </div>

            <div class="content">
                <h2 class="page-title">Управление пользователями</h2>
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Логин</th>
                        <th>E-mail</th>
                        <th>Role</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($admin_users as $key => $user) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <?php if ($user['admin']) : ?>
                                    <td>Админ</td>
                                <?php else : ?>
                                    <td>Пользователь</td>
                                <?php endif; ?>
                                <td><a href="edit.php?id=<?php echo $user['id']; ?>" class="edit">Редактировать</a></td>
                                <td><a href="index.php?delete_id=<?php echo $user['id']; ?>" class="delete">Удалить</a></td>
                            </tr>
                        <?php endforeach; ?>
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