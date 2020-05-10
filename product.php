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
        <h2>Товары</h2>
        <div class="block">
        <?php
        include("php/dbconnect.php");
        $query = 'SELECT * FROM product';
        $array = array();
        $result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
        while($r = mysql_fetch_array($result, MYSQL_ASSOC)){
            $array[]= $r;

            // Генерация таблицы
        }
         ?>
         <form method="POST" action="php/delete.php" id="delForm">
           <input type="checkbox" name="table" value="product" class="visually-hidden"checked>
         <table>
           <tr>
             <th>Артикул товара</th>
             <th>ИНН</th>
             <th>Наименование</th>
             <th>Сорт</th>
             <th>Единицы измерения</th>
              <th></th>
           </tr>
         <?php
         foreach ($array as $str) {
          echo '<tr class="t-row">';
          echo '<td>'.$str["articul"].'</td>';
          echo '<td>'.$str["INN"].'</td>';
          echo '<td>'.$str["name"].'</td>';
          echo '<td>'.$str["sort"].'</td>';
          echo '<td>'.$str["measure"].'</td>';
          echo '<td><a href="changeProduct.php?red_id='.$str["id"].'&table_type='.$table_type.'">Изменить</a></td>';
          echo '<td><input type="checkbox" id="check&" name="id_group[]" value='.$str['id'].' class="visually-hidden"></input></td>';
          echo '</tr>';
         }


          ?>
        </table>
      </form>

        <form class="add-product add-form visually-hidden" action="php/addProduct.php" method="post">
          <button type="button" name="button" class="close-btn">
            x
          </button>
          <h2>Добавить товар</h2>
          <label>Артикул<input type="text" name="articul" placeholder="Артикул"></label>
          <!-- генерация списка -->
            <?php
            include("php/dbconnect.php");
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
          <label>Название<input type="text" name="name" placeholder="Название товара"></label>
          <label>Сорт<input type="text" name="sort" placeholder="Сорт"></label>
          <label>Мера<input type="text" name="measure" placeholder="Единица измерения"></label>
          <button type="submit">Ок</button>
        </form>
      </div>
      <button type="submit" form="delForm">Удалить</button>
        <button type="button" name="addProduct" class="addBtn">Добавить</button>
      </section>
    </main>
    <?php include('footer.php')?>
  </body>
</html>
