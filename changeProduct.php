
<!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Старница изменений</title>
  </head>
  <body>
    <?php include ('header.php');
    include("php/dbconnect.php"); ?>
    <main>
    <section class="change-block">

    <?php
    if ($_GET['red_id']) {
          $my_get = $_GET['red_id'];
          $sql = mysql_query("SELECT * FROM product WHERE id = $my_get");
          $val = mysql_fetch_array($sql);}

    ?>
          <form class="chenge-form chenge-form" action="php/addProduct.php" method="post">
            <h2>Изменить товар</h2>
            <label>Артикул<input type="text" name="articul" placeholder="Артикул" value="<?=isset($_GET['red_id']) ? $val['articul'] : ""  ?>" readonly></label>

            <!-- генерация списка -->
              <?php
              $query = 'SELECT INN FROM manufacture';
              $INN_array = array();
              $result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
              while($r = mysql_fetch_array($result, MYSQL_ASSOC)){
                  $INN_array[]= $r;
              }
               ?>
               <label>ИНН<select name="INN"></label>
                   <?php foreach($INN_array as $cat){?>
                       <option value="<?php echo $cat['INN']?>"><?php echo $cat['INN']?></option>
                   <?php }?>


               </select>
             </label>
            <label>Название<input type="text" name="name" placeholder="Название товара" value="<?=isset($_GET['red_id']) ? $val['name'] : ""  ?>"></label>
            <label>Сорт<input type="text" name="sort" placeholder="Сорт" value="<?=isset($_GET['red_id']) ? $val['sort'] : ""  ?>"></label>
            <label>Мера<input type="text" name="measure" placeholder="Единица измерения" value="<?=isset($_GET['red_id']) ? $val['measure'] : ""  ?>"></label>
            <button type="submit">Ок</button>
          </form>
    </section>
  </main>
  <?php include('footer.php'); ?>
  </body>
  </html> value="$"
