<?php
  include ('dbconnect.php');
      $number = $_POST['number'];
      $city = $_POST['city'];
      $street = $_POST['street'];
      $house = $_POST['house'];
      $area = $_POST['area'];
      $number_in_table = mysql_query("SELECT number FROM shop WHERE Number = $number");
      $row = mysql_fetch_array($number_in_table);
      $number_in_table= $row['number'];
      if ($number_in_table == $number){
        mysql_query("UPDATE shop SET City ='$city', Street = '$street', House = '$house', Area = '$area'   WHERE Number = '$number'");
        header('Location: http://lab3.loc/index.php');
      }
      else{
        if (mysql_query("INSERT INTO shop (Number, City, Street , House, Area) VALUES ('$number', '$city', '$street', '$house', '$area')")) //пишем данные в БД и авторизовываем пользователя
        {
          header('Location: http://lab3.loc/index.php');
        }
        else{
          die('$number_in_table' . mysql_error());
        }
      }
?>
