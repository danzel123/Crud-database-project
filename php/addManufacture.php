<?php
  include ('dbconnect.php');
      $inn = $_POST['inn'];
      $city = $_POST['city'];
      $street = $_POST['street'];
      $house = $_POST['house'];
      $familiya = $_POST['familiya'];
      $name = $_POST['name'];
      $fathername = $_POST['fathername'];

      $INN_in_table = mysql_query("SELECT INN FROM manufacture WHERE INN = $inn");
      $row = mysql_fetch_array($INN_in_table);
      $INN_in_table= $row['INN'];
      if ($INN_in_table == $inn){
        mysql_query("UPDATE manufacture SET  City='$city',
           Street='$street', House = $house, Surname = '$familiya', Name = '$name',
            Fathername = '$fathername'  WHERE INN = $inn");
        include_once("../manufacture.php");
      }
      else{
        if (mysql_query("INSERT INTO manufacture
          (INN, City, Street , House, Surname, Name, Fathername)
         VALUES ('$inn', '$city', '$street', '$house', '$familiya',
            '$name', '$fathername' )")) //пишем данные в БД и авторизовываем пользователя
        {
          header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        else{
          die('$INN_in_table' . mysql_error());
        }
      }
?>
