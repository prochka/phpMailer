<?php
require 'путь/PHPMailerAutoload.php';

$mail = new PHPMailer();//создаем объект

$body = file_get_contents('index.html'); //отправляется или тело письма с файлом или свойство Body 

$mail->isSMTP(); //установка отправки писем через SMTP-сервер
//далее настройки, описываемые в требования SMTP mail.ru
$mail->CharSet = 'UTF-8';
$mail->Host = 'smtp.mail.ru'; //устанавливаем хост
$mail->SMTPAuth = true;//сервер требует аутентификации
$mail->Username = 'dvorezky';//логин на почте
$mail->Password = '5734em-5';//пароль от почты
$mail->SMTPSecure = 'ssl'; //протокол шифрования
$mail->Port = '465';

$mail->From = 'dvorezky@mail.ru'; //от кого отправлено письмо
$mail->FromName = 'Олег';
$mail->addAddress('support@transkribator.ru', 'Петя');
$mail->addAddress('mr.dvorezky@yandex.ru', 'Петя');
$mail->MsgHTML($body);

//Параметры письма
$mail->Subject = 'Тема письма';
// $mail->Body = 'Привет, мир!';

if($mail->send()){
	echo 'Письмо отправлено';
}else{
	echo 'Письмо не отправлено';
	echo 'Ошибка: '.$mail->Errorinfo;
}



 ?>