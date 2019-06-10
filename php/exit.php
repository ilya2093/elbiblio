<?php
session_start();
mysql_connect ("localhost","root","");
mysql_select_db ("BIBLIO");
session_unset();
session_destroy();
setcookie(session_name(), '', time() - 60*60*24*32, '/');
echo"<meta http-equiv='Refresh' content='0; URL=http://kursovoy/index.php'>";
?>
