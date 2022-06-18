<?php
include(ROOT_PATH . "/app/controllers/feedback.php");
?>
<div class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h1 class="logo-text"><span>МО ДОСААФ РОССИИ</span> по Боградскому району РХ</h1>
            <p>
                В МО ДОСААФ России Боградского района РХ производится набор на курсы подготовки водителей транспортных средств категории «В».
            </p>
            <div class="contact">
                <span><i class="fas fa-phone"></i> &nbsp; 8-(390)-34-</span><br>
                <span><i class="fas fa-envelope"></i> &nbsp; bograd.dosaaf@yandex.ru</span>
            </div>
            <!-- <div class="socials">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div> -->
        </div>
        <div class="footer-section links">
            <h2>Ссылки</h2>
            <br>
            <ul>
                <a href="#">
                    <li>События</li>
                </a>
                <a href="#">
                    <li>Сотрудники</li>
                </a>
                <a href="#">
                    <li>Фотогалерея</li>
                </a>
                <a href="#">
                    <li>Условия использования</li>
                </a>
            </ul>
        </div>
        <div class="footer-section contact-form">
            <h2>Свяжитесь с нами</h2>
            <br>
            <form action="index.php" method="post">
                <input type="text" name="username" class="text-input contact-input" placeholder="Введите Ваше имя..." value="<?php echo $username; ?>">
                <input type="text" name="email" class="text-input contact-input" placeholder="Введите Ваш e-mail..." value="<?php echo $email; ?>">
                <input type="text" name="topic" class="text-input contact-input" placeholder="Введите тему сообщения..." value="<?php echo $topic; ?>">
                <textarea rows="4" name="body" class="text-input contact-input" placeholder="Введите Ваше сообщение..."><?php echo $body; ?></textarea>
                <div>
                    <button type="submit" class="btn btn-big contact-btn" name="feedback-btn">
                        <i class="fas fa-envelope"></i>
                        Отправить
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; Designed by Artem Mal'tsev
    </div>
</div>