<?
require_once '../model/request.php';//Connecting the db request file
/*
* @Name: GeneratorKeys
* @About: Generates a random key of 16 characters
* @Version: 1.0
* @Build: 1
* @Author: boivlad
*/
function KeyGen(){
    //Create a 16 character key
    $key = md5(mktime());
    $new_key = '';
    for($i=1; $i <= 16; $i ++ ){
              $new_key .= $key[$i];
    }
 return strtoupper($new_key);
}
//Check if the given key exists in the session and DB
if (!isset($_SESSION['Key']))
    $_SESSION['Key']=KeyGen();
else {
$key = $_SESSION['Key'];
$try = request( "SELECT `Profile` FROM `Session` WHERE `SessionKey` = '$key' ", 1 );
echo $try[0];
}

?>