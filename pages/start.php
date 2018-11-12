<!DOCTYPE html>
<?
    require_once '../model/request.php';//Connecting the db request file
    //authorization check
    if(!isset($_SESSION['position'])){
        $signin = 'checked';
        $reg = '';
    }
    else {
        $reg = $_SESSION['position']['reg'];
        $signin = $_SESSION['position']['signin'];
        $mess = $_SESSION['position']['mess'];
        echo "<script>";
        echo 'var a = "' . $mess . '";';
        echo 'alert(a);';
        echo '</script>';
        unset($_SESSION['position']);
    }
?>
<html lang="ru">
    <head>
        <title>Авторизация</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header>
        </header>
        <main>
            <div class="container">
                <div class="col-lg-12 col-lg-offset-3">
                <input type="radio" name="activeForm" id="SignIn" class="serviceinput" <?=$signin?> >
                    <form class="signIn form-horizontal" action="/model/auth.php">
                        <h2 class="col-lg-offset-2">Вход</h2>
                        <div class="form-group">
                            <label for="inputLogin1" class="col-sm-2 control-label">Логин</label>
                            <div class="col-lg-3">
                            <input type="text" class="form-control" id = "inputLogin1" placeholder="Логин" name="Login" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword1" class="col-sm-2 control-label">Пароль</label>
                            <div class="col-lg-3">
                            <input type="password" class="form-control" id="inputPassword1" placeholder="Пароль" name="Password" required>
                            </div>
                        </div>
                        <input type="hidden" name="Mode" value="auth">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Вход</button>
                            <label for="Registr" class="btn btn-primary">Зарегистрироваться</label>
                            </div>
                        </div>
                    </form>
                    <input type="radio" name="activeForm" id="Registr" class="serviceinput" <?=$reg?> >
                    <form class="registr form-horizontal" action="/model/auth.php">
                        <h2 class="col-lg-offset-2">Регистрация</h2>
                        <div class="form-group">
                            <label for="inputFName1" class="col-sm-2 control-label">Имя</label>
                            <div class="col-lg-3">
                            <input type="text" class="form-control" id = "inputFName1" placeholder="Имя" name="FirstName" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSName1" class="col-sm-2 control-label">Фамилия</label>
                            <div class="col-lg-3">
                            <input type="text" class="form-control" id = "inputSName1" placeholder="Фамилия" name="SecondName" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputLogin2" class="col-sm-2 control-label">Логин</label>
                            <div class="col-lg-3">
                            <input type="text" class="form-control" id = "inputLogin2" placeholder="Логин" name="Login" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-sm-2 control-label">Email</label>
                            <div class="col-lg-3">
                            <input type="text" class="form-control" id = "inputEmail1" placeholder="Email" name="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword2" class="col-sm-2 control-label">Пароль</label>
                            <div class="col-lg-3">
                            <input type="password" class="form-control" id="inputPassword2" placeholder="Пароль" name="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Повторите пароль</label>
                            <div class="col-lg-3">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Повторите пароль" name="TryPassword" required>
                            </div>
                        </div>
                        <input type="hidden" name="Mode" value="registr">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" id="RegistrBtn" data-checked="false" class="btn btn-success">Регистрация</button>
                            <label for="SignIn" class="btn btn-warning">Уже есть аккаунт</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/bootstrap.css">
    </body>
</html>