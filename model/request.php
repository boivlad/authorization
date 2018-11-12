<?
require_once '../config/db.php';//Connecting the db config
/*
* @Name: Request DB
* @About: Convenient request processing
* @Version: 1.0
* @Build: 1
* @Author: boivlad
*/
function request ( $query, $mode ) {
    $result;
    switch( $mode ) {
        case 0://Check for matches
            $result = mysql_query($query) or die("Query failed : " . mysql_error());
            if( $result ) {
                $result = true;
            }
            else {
                $result = false;
            }
        break;
        case 1://return query result
            $result = mysql_query($query) or die("Query failed : " . mysql_error());
            $result = mysql_fetch_assoc($result);
        break;
        default:
            $result = false;
    }
    return $result;
}
?>