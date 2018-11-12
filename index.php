<?
    //session check and redirection
    session_start();
    if(isset($_SESSION['userid']))    {
        header("Location: /pages/profile.php");
    }
    else {
        header("Location: /pages/start.php");
    }
?>