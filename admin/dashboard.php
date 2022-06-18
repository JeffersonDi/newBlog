<?php include("../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
include(ROOT_PATH . "/app/controllers/feedback.php");
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Admin Style -->
    <link rel="stylesheet" href="../assets/css/admin.css">

    <title>Админка - Dashboard</title>
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

            <div class="content">
                <h2 class="page-title">Страница Dashboard</h2>

                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <table>
                    <thead>
                        <th>SN</th>
                        <th>Имя пользователя</th>
                        <th>Почта</th>
                        <th>Тема</th>
                        <th>Содержание</th>
                        <th>Статус</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($feedbacks as $key => $feedback) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $feedback['username']; ?></td>
                                <td><?php echo $feedback['email']; ?></td>
                                <td><?php echo $feedback['topic']; ?></td>
                                <td><?php echo $feedback['body']; ?></td>
                                <td><?php echo $feedback['status']; ?></td>
                                <td><a href="edit.php?id=<?php echo $feedback['id']; ?>" class="edit">Редактировать</a></td>
                                <td><a href="edit.php?delete_id=<?php echo $feedback['id']; ?>" class="delete">Удалить</a></td>
                                <?php if ($feedback['status']) : ?>
                                    <td><a href="edit.php?status=0&p_id=<?php echo $feedback['id']; ?>" class="">Рассмотрено</a></td>
                                <?php else : ?>
                                    <td><a href="edit.php?status=1&p_id=<?php echo $feedback['id']; ?>" class="">Не рассмотрено</a></td>
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

    <!-- CKEDITOR -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script> -->
    <script src="../assets/js/ckeditor5/ckeditor.js"></script>
    <!-- Custom Script -->
    <script src="../assets/js/scripts.js"></script>

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