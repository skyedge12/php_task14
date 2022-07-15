<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SPA saloon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if (!empty($_POST)) {
    include 'functions.php';

    $login = $_POST['login'] ?? null; // записываем логин
    $password = $_POST['password'] ?? null; // записываем пароль
    $time_input = $_POST['time_input'] ?? null; //записываем время входа на сайт
    $birthday_input = $_POST['date'] ?? null; //записываем дату рождения

    //проверяем логин и пароль и стартуем сессию
    if (checkPassword($login, $password, $users3)) {
        session_start();      
        $_SESSION['message'] = 'Добро пожаловать, ' . $login . '!';
    }
        else {
            header('Location: login.php');
        }
}
?>

<header>
    <div class="header">
    <h1>Салон красоты Анжелика</h1>
        <div class = "msg">
        <?php
            if (!empty($_POST)) {
                echo $_SESSION['message'] . '<br/>';
                echo "Вам предоставлена персональная скидка! <br/>";
                echo timeMessage($time_input) . '<br/>';
                echo birthdayMessage($birthday_input, $users3, $login) . '<br/>';
                echo '<button onClick="window.location.href=window.location.href">Выход</button>';
            }
            else {
                echo '<form action="login.php" method="get"><button type="submit" width = "100px">Вход на сайт</button></form>';
            }    
        ?> 
        </div>
    </div>   
</header>


    <section class="services">
        <article class="news-news">
            <a href="#">
                <h2 class="new">Дреды</h2>
            </a>
            <div class="article-meta">
                Мастер <a href="#">Беспалова Марина</a>
                Стоимость - 55$
            </div>
            <img src="https://unsplash.com/photos/32KrBrk70so/download?force=true">
            <p>Крутая современная стрижка с дредами от ТОП-мастера с Ямайки</p>
            <button type="button" class="btn btn-secondary btn-sm">Заказать услугу</button>
        </article>

        <article class="news-news">
            <a href="#">
                <h2 class="new">Окрашивание волос</h2>
            </a>
            <div class="article-meta">
            Мастер <a href="#">Александр Большов</a>
            Стоимость - free
            </div>
            <img src="https://unsplash.com/photos/VpsR5piBA-E/download?force=true">
            <p>Классическое окрашивание, блондирование, ламинирование, биозавивка</p>
            <button type="button" class="btn btn-secondary btn-sm">Заказать услугу</button>
        </article>

        <article class="news-news">
            <a href="#">
                <h2>Макияж</h2>
            </a>
            <div class="article-meta">
            Мастер <a href="#">Ирина Маслова</a>
            Стоимость - 35$
            </div>
            <img src="https://unsplash.com/photos/VLJV46hPLSM/download?force=true">
            <p>Дневной макияж, вечерний макияж, свадебный макияж</p>
            <button type="button" class="btn btn-secondary btn-sm">Заказать услугу</button>
        </article>

        <article class="news-news">
            <a href="#">
                <h2>Наращивание ресниц</h2>
            </a>
            <div class="article-meta">
            Мастер <a href="#">Николай Бычковских</a>
            Стоимость - 30$
            </div>
            <img src="https://unsplash.com/photos/sRSRuxkOuzI/download?force=true">
            <p>1D, 2D и 3D наращивание ресниц</p>
            <button type="button" class="btn btn-secondary btn-sm">Заказать услугу</button>
        </article>

    </section>


    <footer>
    <div class="links">
        <a href="#">О нас</a>
        <a href="#">Наши достижения</a>
        <a href="#">Наши мастера</a>
        <a href="#">Контакты</a>
    </div>

    <div class="copyright">Copyright © Saloon Beauty 2022</div>
</body>
</html>