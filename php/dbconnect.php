<?
@mysql_connect("lab3.loc", "denis", "235421")
  or die('Ошибка соединения: ' . mysql_error());
@mysql_select_db("shops");
?>
