<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="style.min.css">
    <title></title>
  </head>
  <body>
    <?php include('header.php') ?>
    <main>
      <section>

        <h2>Товары в магазинах</h2>
        <div class="block">
        <?php
        include("php/dbconnect.php");
        $query = 'SELECT * FROM product_in_shop';
        $array = array();
        $result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
        while($r = mysql_fetch_array($result, MYSQL_ASSOC)){
            $array[]= $r;

              // Генерация таблицы
        }
         ?>
         <form method="POST" action="php/delete.php" id="delForm">
           <input type="checkbox" name="table" value="product_in_shop" class="visually-hidden"checked>
         <table>
           <tr>
             <th>Артикул</th>
             <th>Наименование</th>
             <th>Номер магазина</th>
             <th>Количество товара</th>
             <th>Цена</th>
             <th></th>
           </tr>
         <?php
         foreach ($array as $str) {

          $tovar_name = mysql_query("SELECT name from product WHERE articul = {$str["articul"]}");
          echo mysql_error();
          $tovar_name = mysql_fetch_assoc($tovar_name);
          echo '<tr class="t-row">';
          echo '<td>'.$str["articul"].'</td>';
          echo '<td>'.$tovar_name['name'].'</td>';
          echo '<td>'.$str["number_of_shop"].'</td>';
          echo '<td>'.$str["amount"].'</td>';
          echo '<td>'.$str["price"].'</td>';
          echo '<td><a href="changeProductInShop.php?red_id='.$str["id"].'&table_type='.$table_type.'">Изменить</a></td>';
          echo '<td><input class="visually-hidden" type="checkbox" id="check&" name="id_group[]" value='.$str['id'].'></input></td>';
          echo '</tr>';
         }


          ?>
        </table>
</form>

        <form class="add-tovar-in-shop add-form visually-hidden" action="php/AddTovarInShop.php" method="post">
          <button type="button" name="button" class="close-btn">
            x
          </button>
          <h2>Добавить товар в магазин</h2>
          <!-- генерация списка артикулов -->
          <?php
          include("php/dbconnect.php");
          $query = 'SELECT articul FROM product';
          $articul_array = array();
          $result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
          while($r = mysql_fetch_array($result, MYSQL_ASSOC)){
              $articul_array[]= $r;
          }
           ?>

           <label>Артикул<select name="articul">
               <?php foreach($articul_array as $cat){
                 $tovar_name = mysql_query("SELECT name from product WHERE articul = {$cat["articul"]}");
                 echo mysql_error();
                 $tovar_name = mysql_fetch_assoc($tovar_name);?>
                   <option value="<?php echo $cat['articul']?>"><?php echo $cat['articul']."({$tovar_name['name']})"?></option>
               <?php }?>
           </select></label>

           <!-- генерация списка номеров магазинов -->
           <?php
           include("php/dbconnect.php");
           $query = 'SELECT Number, City, Street FROM shop';
           $number_array = array();
           $result1 = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
           while($r = mysql_fetch_array($result1, MYSQL_ASSOC)){
               $number_array[]= $r;
           }
            ?>
            <label>Номер магазина<select name="number">
                <?php foreach($number_array as $cat){?>
                    <option value="<?php echo $cat['Number']?>"><?php echo $cat['Number']."({$cat['City']}, {$cat['Street']})"?></option>
                <?php }?>
            </select></label>
              <label>Количество<input type="text" name="amount" placeholder="Количество"></label>
              <label>Цена за штуку<input type="text" name="price" placeholder="Цена за штуку"></label>
            <button type="submit">Ок</button>
        </form>
      </div>
        <button type="button" name="addShop" class="addBtn">Добавить</button>
      <button type="submit" form="delForm">Удалить</button>
      </section>
    </main>
    <?php include('footer.php')?>
  </body>
</html>
