<?php
  include ('dbconnect.php');
      $articul = $_POST['articul'];
      $number = $_POST['number'];
      $amount = $_POST['amount'];
      $price = $_POST['price'];

      $articul_in_table = mysql_query("SELECT articul FROM product_in_shop WHERE articul = $articul");
      $rowA = mysql_fetch_array($articul_in_table);
      $articul_in_table= $rowA['articul'];
      $number_in_table = mysql_query("SELECT number_of_shop FROM product_in_shop WHERE number_of_shop = $number");
      $rowN = mysql_fetch_array($number_in_table);
      $number_in_table= $rowN['Number'];
      if ($articul_in_table == $articul && $number_in_table == $number){
        mysql_query("UPDATE product_in_shop SET amount='$amount', price='$price'
        WHERE articul = $articul AND number_of_shop= $number");
      header('Location:http://lab3.loc/products_in_shop.php');
      }
      else{
        $sql = "INSERT INTO product_in_shop
          (articul, number_of_shop, amount , price)
         VALUES ($articul, $number, $amount, $price )";
        if (mysql_query($sql)) //пишем данные в БД и авторизовываем пользователя
        {
          header('Location:http://lab3.loc/products_in_shop.php');
        }
        else{
          die($sql . mysql_error());
        }
      }
?>
