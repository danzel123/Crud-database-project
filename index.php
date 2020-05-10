<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Магазины</title>
  </head>
  <body class="test" name="test">
    <?php include('header.php');
    $table_type = "shop";
     ?>
<main>
<section class="shop-block">
        <h2>Магазин</h2>
        <div class="block">
        <?php
        include("php/dbconnect.php");
        $query = 'SELECT * FROM shop';
        $array = array();
        $result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
        while($r = mysql_fetch_array($result, MYSQL_ASSOC)){
            $array[]= $r;

            // Генерация таблицы
        }
         ?>
         <form method="POST" action="php/delete.php" id="delForm">
           <input type="checkbox" name="table" value="shop" class="visually-hidden"checked>
         <table>
           <tr>
             <th>Номер магазина</th>
             <th>Город</th>
             <th>Улица</th>
             <th>Дом</th>
             <th>Площадь</th>
             <th></th>
           </tr>
         <?php
         foreach ($array as $str) {
           echo '<tr class="t-row">';
             echo '<td>'.$str["Number"].'</td>';
             echo '<td>'.$str["City"].'</td>';
             echo '<td>'.$str["Street"].'</td>';
             echo '<td>'.$str["House"].'</td>';
             echo '<td>'.$str["Area"].'</td>';
             echo '<td><a href="changeShop.php?red_id='.$str["id"].'&table_type='.$table_type.'">Изменить</a></td>';
          echo '<td><input type="checkbox" id="check&" name="id_group[]" class="visually-hidden" value='.$str['id'].'></input></td>';
          echo '</tr>';
         }


          ?>
        </table>
      </form>
<?php
if (isset($_GET['red_id'])) {
      $my_get = $_GET['red_id'];
      $sql = mysql_query("SELECT Number, City, Street, House, Area FROM shop WHERE id = $my_get");
      $val = mysql_fetch_array($sql);
    } ?>
    <form class="add-shop add-form visually-hidden" action="php/addShop.php" method="post">
        <button type="button" name="button" class="close-btn">
          x
        </button>
        <h2>Добавить магазин</h2>
        <label>Номер<input type="number" value='<?= isset($_GET['red_id']) ? $val['Number'] : "2"; ?>' name="number" placeholder=""></label>
        <label>Город<input type="text" name="city" placeholder=""></label>
        <label>Улица<input type="text" name="street" placeholder=""></label>
        <label>Дом<input type="text" name="house" placeholder=""></label>
        <label>Площадь<input type="number" name="area" placeholder=""></label>
        <button type="submit" name="button">Добавить</button>
    </form>

    <form class="chenge-form chenge-form visually-hidden" action="php/addShop.php" method="post">
        <button type="button" name="button" class="close-btn">
          x
        </button>
        <h2>Изменить магазин</h2>
        <label>Номер<input type="number" value='<?= isset($_GET['red_id']) ? $val['Number'] : ""; ?>' name="number"  placeholder="" readonly></label>
        <label>Город<input type="text" name="city"  value='<?= isset($_GET['red_id']) ? $val['City'] : ""; ?>' placeholder=""></label>
        <label>Улица<input type="text" name="street"  value='<?= isset($_GET['red_id']) ? $val['Street'] : ""; ?>' placeholder=""></label>
        <label>Дом<input type="text" name="house"  value='<?= isset($_GET['red_id']) ? $val['House'] : ""; ?>' placeholder="" ></label>
        <label>Площадь<input type="number" name="area"  value='<?= isset($_GET['red_id']) ? $val['Area'] : ""; ?>' placeholder=""></label>
        <button type="submit" name="button">Изменить</button>
    </form>

    </div>
    <button type="submit" form="delForm">Удалить</button>
    <button type="button" name="addShopBtn" class="addShopBtn addBtn" >Добавить</button>
  </section>


</main>
  </body>
  <?php include('footer.php')?>
</html>
