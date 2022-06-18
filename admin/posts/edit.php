<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
adminOnly(); ?>
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
    <!-- Editor's Style -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <title>Админка - Редактирование новостей</title>
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
                <a href="index.php" class="btn btn-big">Управление постами</a>
            </div>

            <div class="content">
                <h2 class="page-title">Редактирование поста</h2>
                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                <form class="admin-form" action="edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div>
                        <label>Название поста</label>
                        <input type="text" name="title" value="<?php echo $title; ?>" class="text-input">
                    </div>
                    <div>
                        <div>
                            <label>Содержимое</label>
                            <div id="editor_"><?php echo html_entity_decode($body); ?></div>
                        </div>
                        <div>
                            <input hidden id="justHtml" type="text" name="body" value="">
                        </div>
                    </div>
                    <div class="post-image-file">
                        <label>Фотография</label>
                        <img class="post-image-file-post" id="post_image" src="<?php echo BASE_URL . '/assets/img/' . $image; ?>">
                        <input type="file" id="in_image" name="image" class="text-input">
                    </div>
                    <div>
                        <label>Темы</label>
                        <select name="topic_id" class="text-input">
                            <option value="<?php echo $topic_id; ?>"></option>
                            <?php foreach ($topics as $key => $topic) : ?>
                                <?php if (!empty($topic_id) && $topic_id == $topic['id']) : ?>
                                    <option selected value="<?php echo $topic['id']; ?>"> <?php echo $topic['name']; ?> </option>
                                <?php else : ?>
                                    <option value="<?php echo html_entity_decode($topic['id']); ?>"> <?php echo $topic['name']; ?> </option>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <?php if (empty($published) && $published == 0) : ?>
                            <label>
                                <input type="checkbox" name="published">
                                Опубликовать
                            </label>
                        <?php else : ?>
                            <label>
                                <input type="checkbox" name="published" checked>
                                Опубликовать
                            </label>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" name="update-post" class="btn btn-big">Обновить пост</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Admin Content -->


    </div>
    <!-- /Admin Page Wrapper -->
    <!-- Custom Script -->
    <script src="../../assets/js/scripts.js"></script>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- CKEDITOR -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script> -->
    <!-- <script src="../../assets/js/ckeditor5/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

        let image = document.getElementById("post_image");
        let file = document.getElementById("in_image");

        file.addEventListener('change', function() {
            image.src = URL.createObjectURL(file.files[0]);
            image.style.display = "block";
        });
    </script> -->

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        var options = {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    ['image', 'code-block']
                ]
            },
            placeholder: 'Waiting for your precious content',
            theme: 'snow'
        };

        var editor = new Quill('#editor_', options);

        editor.on('text-change', function() {
            var justHtml = editor.root.innerHTML;
            document.getElementById('justHtml').value = justHtml;
        });
    </script>
</body>

</html>