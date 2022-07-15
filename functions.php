<?php

include 'users.php';

//возвращает массив пользователей в формате ключ это имя, значение это пароль
function getUsersList($users3){
    $users = array();
    foreach ($users3 as $key => $value) {
      $users[$key] = $value['pass'];
    }
    return $users;
}

//проверяет, существует ли пользователь с указанным логином, возвращает true, если такой пользователь есть
function existsUser($login) {
    return array_key_exists($login, $users3);
}

// возвращает либо имя вошедшего на сайт пользователя, либо null
function getCurrentUser(){
    return $_POST['login'] ?? null;
}

// возвращает true тогда, когда существует пользователь с указанным логином и введенный им пароль прошел проверку
function checkPassword($login, $password, $users3){
    return (getCurrentUser($login) && password_verify($password, getUsersList($users3)[$login]));
 }

// функция для определения времени до окончания акции
 function timeMessage ($time_input) {
    $current_time = time(); //записываем текущее время
    $time_deadline = ($time_input + 86400) - $current_time;//вычисляем время дедлайна по акции
    $minutes = floor($time_deadline / 60); // считаем минуты
    $hours = floor($minutes / 60); // считаем количество полных часов
    $minutes = $minutes - ($hours * 60);  // считаем количество оставшихся минут
    $message = nl2br('До окончания скидки: ' . $hours. ' ч. ' . $minutes . ' мин.');
    return $message;
}

//функция для вывода сообщения о дне рождении
function birthdayMessage($birthday_input, $users3, $login) {
    
    if(!$users3[$login]['b_day'] && !$birthday_input) {
        $message = nl2br('Укажите свою дату рождения и получите доп. скидку!');//если день рождения не введен и не записан в массиве пользователей
    }
    else {

        $todayNumber = date('j'); //число текущего дня
        $todayMonth = date('n'); //число текущего месяца

        if(!$users3[$login]['b_day']) {
            $birthday = $birthday_input;  //если введена дата и ее нет в массиве пользователей
        }
            else {
                $birthday = $users3[$login]['b_day']; //дату рождения берем из массива
            }

        $birthdayNumber = date('j', strtotime($birthday)); //число рождения
        $birthdayMonth = date('n', strtotime($birthday)); //месяц рождения

        if($todayNumber == $birthdayNumber && $todayMonth == $birthdayMonth) {

            $message = 'Сегодня, в Ваш день рождения, получите дополнительную скидку 5% на все услуги салона!'; //если день рождения сегодня
        }
            else {
                $bd = explode('-', $birthday); //получаем массив из даты рождения
                $bd = mktime(0, 0, 0, $bd[1], $bd[2], date('Y') + ($bd[1].$bd[2] <= date('md'))); //вычисляем дату в секундах, как если бы она была в этом году
                $days_until = ceil(($bd - time()) / 86400); //дельта между ДР и текущим днем с округлением

                $message = 'До Вашего дня рождения осталось дней: ' . $days_until . '.'; //сколько осталось до дня рождения
            }
        }
    return $message;
}

 ?>