<?php
include("path.php");
include(ROOT_PATH . '/app/controllers/posts.php');
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
    <title>Информация для поступающих</title>
</head>

<body>
    <!-- Header -->
    <?php
    include(ROOT_PATH . "/app/includes/header.php");
    include(ROOT_PATH . "/app/includes/messages.php");
    // dd($_SESSION);
    ?>

    <div class="page-wrapper">

        <!-- Content -->
        <div class="content clearfix">

            <!-- Main Content Wrapper -->
            <div class="main-content single">
                <div class="main-content-wrapper">
                    <h1 class="post-title">Информация для поступающих</h1>
                    В МО ДОСААФ России Боградского района РХ производится набор на курсы подготовки водителей транспортных средств категории «В». Начало занятий следующей группы - первая декада мая 2021 г.
                    <br><br>
                    Время занятий: пн., ср., пт. с 17.00.
                    <br><br>
                    Для того чтобы записаться на курсы, необходимо:
                    <br><br>
                    скачать бланк заявления, бланк согласия на обработку персональных данных и бланк договора по ссылке внизу страницы.
                    внести свои данные в заявление и договор на компьютере, либо распечатать и заполнить ручкой.
                    приложить копию паспорта(первая страница и прописка), ИНН, СНИЛС
                    отправить заполненные документы (либо их сканы/фото) на электронную почту организации: bograd.dosaaf@yandex.ru
                    <br><br>
                    Медицинскую справку (об отсутствии ограничений к водительской деятельности) необходимо предоставить в автошколу до начала обучения. В стоимость обучения включены расходы на ГСМ и сдача экзаменов в ГИБДД. Автошколой предоставляется рассрочка платежа на период обучения. Окончательный расчет осуществляется за 15 дней до окончания занятий. Способ оплаты: наличный расчет (через кассу организации) или безналичный (путем перечисления денежных средств на расчетный счет организации). Дополнительные платежи: медицинская водительская комиссия (цена зависит от медучреждения) - учебная литература: экзаменационные билеты и ПДД; - госпошлина за водительское удостоверение. МО ДОСААФ России Боградского района РХ является образовательным учреждением, а, значит, подпадает под действие статьи 219 Налогового Кодекса РФ.
                    <br><br>
                    То есть, любой курсант, оплативший образование в автошколе (равно как и родитель курсанта), оплативший его образование, при условии, что ребёнок младше 18 лет), имеет право получить социальный налоговый вычет. Размер выплаты, возвращаемый курсанту (или его родителю), -13 % от оплаченной за обучение суммы.
                    <br><br>
                    После окончания обучения Вы получите свидетельство о получении профессии.<br><br><br>
                    <h3>Схема проезда</h3>
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A11b51334daf0edeb4db5d3da18338ecadaf0476189c9d44e75596a068a3fb585&amp;width=1001&amp;height=720&amp;lang=ru_RU&amp;scroll=true"></script>
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
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
    <!-- /footer -->
</html>