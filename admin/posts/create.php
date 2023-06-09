<?php
include("../../path.php");
include(ROOT_PATH . "/app/controllers/posts.php");
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

    <!-- Editor's Style -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <title>Админка - Добавление новостей</title>
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
                <h2 class="page-title">Добовление поста</h2>
                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                <form id="posts" name="posts" action="create.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Название поста</label>
                        <input type="text" name="title" value="<?php echo $title; ?>" class="text-input">
                    </div>
                    <!-- <div id="editor"></div> -->
                    <div>
                        <label>Содержимое</label>
                        <div id="editor_"><?php echo $body; ?></div>
                        <!-- <div id="justHtml"></div> -->
                        <!-- <div hidden id="myPrecious"></div>
                        <div id="justText"></div> -->
                        
                    </div>
                    <div>
                        <input hidden id="justHtml" type="text" name="body" value="">
                    </div>
                    <div class="post-image-file">
                        <label>Фотография</label>
                        <img hidden class="post-image-file-post" id="post_image" src="">
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
                                    <option value="<?php echo $topic['id']; ?>"> <?php echo $topic['name']; ?> </option>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <?php if (empty($published)) : ?>
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
                        <button type="submit" name="add-post" class="btn btn-big">Добавить пост</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Admin Content -->

    </div>
    <!-- /Admin Page Wrapper -->

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Custom Script -->
    <script src="../../assets/js/scripts.js"></script>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        // var quill = new Quill('#editor_', {
        //     modules: {
        //         toolbar: [
        //             [{
        //                 header: [1, 2, false]
        //             }],
        //             ['bold', 'italic', 'underline'],
        //             ['image', 'code-block']
        //         ]
        //     },
        //     placeholder: 'Compose an epic...',
        //     theme: 'snow' // or 'bubble'
        // });
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

        // var preciousContent = document.getElementById('myPrecious');
        // var justTextContent = document.getElementById('justText');
        // var justHtmlContent = document.getElementById('justHtml');

        editor.on('text-change', function() {
            // var delta = editor.getContents();
            // var text = editor.getText();
            var justHtml = editor.root.innerHTML;
            // preciousContent.innerHTML = JSON.stringify(delta);
            // justTextContent.innerHTML = text;
            // justHtmlContent.innerHTML = justHtml;
            document.getElementById('justHtml').value = justHtml;
        });
    </script>
</body>

</html>