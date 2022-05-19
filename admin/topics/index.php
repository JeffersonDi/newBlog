<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesom -->
    <script src="https://kit.fontawesome.com/cb0649ed49.js" crossorigin="anonymous"></script>
    
    <!-- Custom Styling -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Admin Style -->
    <link rel="stylesheet" href="../../css/admin.css">
    <title>Админка - Редакторование Тем новостей</title>
</head>

<body>
    <!-- Header -->
    <?php
        require "../../blocks/header_admin.php";
    ?>
    <!-- /Header -->

    <!-- Admin Page Wrapper -->
    <div class="admin-page-wrapper">

        <!-- Left sidebar  -->
        <div class="left-sidebar">
            <ul>
                <li><a href="../posts/index.php">Manage Post</a></li>
                <li><a href="../users/index.php">Manage Users</a></li>
                <li><a href="index.php">Manage Topics</a></li>
            </ul>
        </div>
        <!-- /Left sidebar  -->

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Добавить тему</a>
                <a href="index.php" class="btn btn-big">Manage тему</a>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Topics</h2>

                <table>
                    <thead>
                        <th>SN</th>
                        <th>Name</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Военно-патриотическое воспитание</td>
                            <td><a href="#" class="edit">Редактировать</a></td>
                            <td><a href="#" class="delete">Удалить</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Занятия</td>
                            <td><a href="#" class="edit">Редактировать</a></td>
                            <td><a href="#" class="delete">Удалить</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /Admin Content -->


    </div>
    <!-- /Admin Page Wrapper -->

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
        integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom Script -->
    <script src="../../js/scripts.js"></script>
</body>

</html>