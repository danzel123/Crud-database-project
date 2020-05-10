<?php
  include ('dbconnect.php');
      $articul = $_POST['articul'];
      $INN = $_POST['INN'];
      $name = $_POST['name'];
      $sort = $_POST['sort'];
      $measure = $_POST['measure'];

      $articul_in_table = mysql_query("SELECT articul FROM product WHERE articul = $articul");
      $row = mysql_fetch_array($articul_in_table);
      $articul_in_table= $row['articul'];
      if ($articul_in_table == $articul){
        mysql_query("UPDATE product SET INN='$INN', name='$name', sort='$sort',
           measure='$measure'  WHERE articul = $articul");
        header('Location:http://lab3.loc/product.php');
      }
      else{
        if (mysql_query("INSERT INTO product
          (articul, INN,  name, sort , measure)
         VALUES ('$articul', '$INN', '$name', '$sort', '$measure' )")) //пишем данные в БД и авторизовываем пользователя
        {
          header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        else{
          die('$INN_in_table' . mysql_error());
        }
      }
?>
