<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/topics.php");
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
    <title>Админка - Добавление Темы</title>
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
                <a href="create.php" class="btn btn-big">Добавить тему</a>
                <a href="index.php" class="btn btn-big">Управление темами</a>
            </div>

            <div class="content">
                <h2 class="page-title">Добавить Тему</h2>
                <?php include(ROOT_PATH . "/app/helpers/formErrors.php");?>
                <form action="create.php" method="post">
                    <div>
                        <label>Наименование</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" class="text-input">
                    </div>
                    <div>
                        <label>Описание</label>
                        <textarea name="description" value="<?php echo $description; ?>" id="body"></textarea>
                    </div>
                    <div>
                        <button type="submit" name="add-topic" class="btn btn-big">Добавить тему</button>
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
    <script src="../../assets/js/ckeditor5/ckeditor.js"></script>
    <!-- Custom Script -->
    <script src="../../assets/js/scripts.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#body'), {
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