<!DOCTYPE html>
<?
    require_once '../model/request.php';//Connecting the db request file
    //getting user data
    $userid = $_SESSION['userid'];
    $id = request( "SELECT `Profile` FROM `Session` WHERE `SessionKey` = '$userid'", 1 );
    $id = $id['Profile'];
    $content = request( "SELECT * FROM `Profile` WHERE `Id` = '$id'", 1 );
?>
<html>
    <head>
        <title>Профиль</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header>
        </header>
        <main>
            <div class="container">
                <div class="profileContainer row col-lg-4 col-lg-offset-4">
                    <table class="table table-hover">
                        <tr>
                        <td class="success">Имя:</td>
                        <td class="active"><?=$content['FirstName']?></td>
                        </tr>
                        <tr>
                        <td class="success">Фамилия:</td>
                        <td class="active"><?=$content['SecondName']?></td>
                        </tr>
                        <tr>
                        <td class="success">Login:</td>
                        <td class="active"><?=$content['Login']?></td>
                        </tr>
                        <tr>
                        <td class="success">Почта:</td>
                        <td class="active"><?=$content['Email']?></td>
                        </tr>
                    </table>
                </div>
                <form class="outForm col-lg-6 col-lg-offset-7" action="/model/auth.php">
                    <input type="hidden" name="Mode" value="out">
                    <button type="submit" class="signOut btn btn-danger">Выход</button>
                <form>
            </div>
        </main>
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/bootstrap.css">
    </body>
</html>