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
        <h2>Производители товаров</h2>
        <div class="block">
        <?php
        include("php/dbconnect.php");
        $query = 'SELECT * FROM manufacture';
        $array = array();
        $result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
        while($r = mysql_fetch_array($result, MYSQL_ASSOC)){
            $array[]= $r;

            // Генерация таблицы
        }
         ?>
         <form method="POST" action="php/delete.php" id="delForm">
           <input type="checkbox" name="table" value="manufacture" class="visually-hidden"checked>
         <table>
           <tr>
             <th>ИНН</th>
             <th>Город</th>
             <th>Улица</th>
             <th>Дом</th>
             <th>Фамилия</th>
             <th>Имя</th>
             <th>Отчество</th>
             <th></th>
           </tr>
         <?php
         foreach ($array as $str) {
          echo '<tr class="t-row">';
          echo '<td>'.$str["INN"].'</td>';
          echo '<td>'.$str["City"].'</td>';
          echo '<td>'.$str["Street"].'</td>';
          echo '<td>'.$str["House"].'</td>';
          echo '<td>'.$str["Surname"].'</td>';
          echo '<td>'.$str["Name"].'</td>';
          echo '<td>'.$str["Fathername"].'</td>';
          echo '<td><a href="changeManufacture.php?red_id='.$str["id"].'&table_type='.$table_type.'">Изменить</a></td>';
          echo '<td><input type="checkbox" class="visually-hidden" id="check&" name="id_group[]" value='.$str['id'].'></input></td>';
          echo '</tr>';
         }


          ?>
        </table>
      </form>

        <form class="add-manufacture add-form visually-hidden" action="php/addManufacture.php" method="post">
          <button type="button" name="button" class="close-btn">
            x
          </button>
          <h2>Добавить производителя</h2>
          <label>ИНН<input type="text" name="inn" placeholder="ИНН"></label>
             <label>Город<input type="text" name="city" placeholder="City"></label>
             <label>Улица<input type="text" name="street" placeholder="Street"></label>
             <label>Дом<input type="text" name="house" placeholder="House"></label>
             <label>Фамилия<input type="text" name="familiya" placeholder="familiya"></label>
             <label>Имя<input type="text" name="name" placeholder="Name"></label>
             <label>Отчество<input type="text" name="fathername" placeholder="Fathername"></label>
            <button type="submit" name="button">Готово</button>
          </form>
            </div>
            <button type="submit" form="delForm">Удалить</button>
            <button type="button" name="addManufacurer" class="addBtn">Добавить</button>
      </section>
    </main>
      <?php include('footer.php')?>
  </body>
</html>
