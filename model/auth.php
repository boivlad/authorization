<?
require_once '../model/sessionreg.php'; //Connecting the session file
$Mode = $_REQUEST['Mode'];
$status = 0;//Start value for status
/*
* @Name: Check requests
* @About: Prevents SQL injection
* @Version: 1.0
* @Build: 1
* @Author: boivlad
*/
function quote($var)    {
    return mysql_real_escape_string($var);
}
/*
* @Name: Authorization
* @About: User authentication processing
* @Version: 1.2
* @Build: 1
* @Author: boivlad
*/
function auth( $id ) {
    $key = KeyGen();
    request( "INSERT INTO `Session` (`Profile`, `SessionKey` ) VALUES ( '$id', '$key' )", 0 );
    $_SESSION['userid'] = $key;
}
switch($Mode) {
    case 'registr'://Registration
    $Login = quote($_REQUEST['Login']);
    $cheched = false;
    $try = request( "SELECT `Id` FROM `Profile` WHERE `Login` = '$Login' ", 1 );
    if ($try['Id'] < 1 ) {
        $FName = quote($_REQUEST['FirstName']);
        $SName = quote($_REQUEST['SecondName']);
        $Email = quote($_REQUEST['Email']);
        $Password = MD5(MD5(quote($_REQUEST['Password'])));
        $TryPassword = MD5(MD5(quote($_REQUEST['TryPassword'])));
        if ($Password == $TryPassword ) {
            $Reg = request( "INSERT INTO `Profile` ( `FirstName`, `SecondName`, `Login`, `Email`, `Password`)
            VALUES ('$FName','$SName','$Login','$Email','$Password') ", 0 );
            $auth = request( "SELECT * FROM `Profile` WHERE `Login` = '$Login' AND `Password` = '$Password'", 1 );
            auth( $auth['Id'] );
            header("Location: /pages/profile.php");
        }
        else {
            $status = 4;//Message "Пароли не совпадают"
            $_SESSION['position']['reg'] = 'checked';
            $_SESSION['position']['signin'] = '';
            $_SESSION['position']['mess'] = 'Пароли не совпадают';
            header("Location: /pages/start.php");
        }
    }
    else {
        $status = 1;//Message "Данный логин занят"
        $_SESSION['position']['reg'] = 'checked';
        $_SESSION['position']['signin'] = '';
        $_SESSION['position']['mess'] = 'Данный логин занят!';
        header("Location: /pages/start..php");
    }
    break;
    case 'auth':
    $Login = quote($_REQUEST['Login']);
    $Password = MD5(MD5(quote($_REQUEST['Password'])));
    $auth = request( "SELECT * FROM `Profile` WHERE `Login` = '$Login' AND `Password` = '$Password'", 1 );
    if ( $auth['Id'] > 0 ) {
        $status = 3;//Authorization
        auth( $auth['Id'] );
        header("Location: /pages/profile.php");
    }
    else {
        $status = 2;//Error Authorization
        $_SESSION['position']['reg'] = '';
        $_SESSION['position']['signin'] = 'checked';
        $_SESSION['position']['mess'] = 'Неверный логин или пароль';
        header("Location: /pages/start.php");
    }
    break;
    case 'out'://SignOut
        unset($_SESSION['userid']);
        session_destroy();
        header("Location: /pages/start.php");
    break;
}
?>