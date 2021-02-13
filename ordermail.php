<?php

header('Content-Type: text/html; charset=utf-8');

$to = "leonfury95@gmail.com"; // почта администратора сайта, на который будут приходить письма

if(!empty($_POST["name"]) && !empty($_POST["phone"]) && !empty($_POST["email"]) && !empty($_POST["select"])){ // проверка полей на пустоту, если не пустые данные пришли, то идём дальше
    
    // trim - обрезает пробелы в начале и конце
    // htmlspecialchars - преобразует специальные символы в HTML-сущности
    // strip_tags - удаляет HTML и PHP-теги из строки
    $name = trim(htmlspecialchars(strip_tags($_POST["name"])));
    $phone = trim(htmlspecialchars(strip_tags($_POST["phone"])));
    $email = trim(htmlspecialchars(strip_tags($_POST["email"])));
    $select = trim(htmlspecialchars(strip_tags($_POST["select"])));

    // проверяем email на валидность
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) { // если не верный e-mail
        echo "<div class='i_false'>E-mail указан не верно!</div>"; // выводим сообщение пользователю
        exit; // выходим из дальнейшей обработки
    }
    
    // указываем заголовки
    $headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'To: RL-Art Admin <info@site.ru>' . "\r\n";
    $headers .= 'From: RL-Art <info@site.ru>' . "\r\n";
    $headers .= 'Bcc: rl-art.ru' . "\r\n";
    
    // формируем тело письма
    $message = '
    <html>
        <head>
            <title>Новая заявка</title>
        </head>
        <body style="font-family:Arial,sans-serif; background: #E7F5FA;">
            <div style="background: #E7F5FA; color: #227E9B; border: 1px #AFD5E2 solid; padding: 10px;">
                <p><b>Имя:</b> "'.$name.'"</p>
                <p><b>Телефон:</b> "'.$phone.'"</p>
                <p><b>E-mail:</b> "'.$email.'"</p>
                <p><b>Услуга</b> "'.$select.'"</p>
            </div>
        </body>
    </html>
    ';
    
    if(mail($to, "Новая заявка", $message, $headers)){ // если отправка прошла успешно, то...
        echo "<div class='i_true'>Сообщение отправлено!<br>Мы свяжемся с Вами в ближайшее время.</div>"; // выводим пользователю сообщение
    } else{ // если не отправилось по какой-то причине, то...
        echo "<div class='i_false'>Не полуилось отправить сообщение</div>"; // выводим пользователю сообщение
    }
            
} else{ // если пустые данные пришли
    echo "<div class='i_false'>Необходимо заполнить все поля!</div>"; // выводим пользователю сообщение
}

?>