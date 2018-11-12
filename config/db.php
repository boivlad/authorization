<?
session_start();
$host = 'localhost'; // адрес сервера 
$database = 'xpkyutsy_auth'; // имя базы данных
$user = 'xpkyutsy_root'; // имя пользователя
$password = "1q2w3e4r5t6y7u8i9o0pTest"; // пароль
$link = mysql_connect($host, $user, $password) 
    or die("Ошибка " . mysqli_error($link));
    if($link) {
    mysql_select_db($database) or die("Could not select database");
    }
    
?>