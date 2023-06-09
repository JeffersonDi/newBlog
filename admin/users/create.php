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
    <title>Админка - Добавление пользователя</title>
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
                <a href="index.php" class="btn btn-big">Редактировать пользователя</a>
            </div>

            <div class="content">
                <h2 class="page-title">Добавить пользователя</h2>
                <?php include(ROOT_PATH . "/app/helpers/formErrors.php");?>
                <form action="create.php" method="post">
                    <div>
                        <label>Логин</label>
                        <input type="text" value="<?php echo $username; ?>" name="username" class="text-input">
                    </div>

                    <div>
                        <label>E-mail</label>
                        <input type="email" value="<?php echo $email; ?>" name="email" class="text-input">
                    </div>

                    <div>
                        <label>Пароль</label>
                        <input type="password" name="password" class="text-input">
                    </div>
                    <div>
                        <label>Повторите пароль</label>
                        <input type="password" name="passwordConf" class="text-input">
                    </div>
                    <div>
                        <input type="checkbox" name="admin">
                        <label>Права</label>

                        <!-- <select name="role" class="text-input">
                            <option value="Author">Автор</option>
                            <option value="Admin">Админ</option>
                            <option value="Admin">Пользователь</option>
                            <option value="Admin">Ученик</option>
                        </select> -->
                    </div>
                    <div>
                        <button type="submit" name="create-admin" class="btn btn-big">Добавить пользователя</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Admin Content -->


    </div>
    <!-- /Admin Page Wrapper -->

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- CKEDITOR -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script> -->
    <script src="../../js/ckeditor5/ckeditor.js"></script>
    <!-- Custom Script -->
    <script src="../../js/scripts.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        }
                    ]
                }
            })
            .catch(error => {
                console.log(error);
            });
    </script>
</body>

</html>