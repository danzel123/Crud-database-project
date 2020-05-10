
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
          $sql = mysql_query("SELECT Number, City, Street, House, Area FROM shop WHERE id = $my_get");
          $val = mysql_fetch_array($sql);}

    ?>
          <form class="chenge-form chenge-form" action="php/addShop.php" method="post">
              <h2>Изменить магазин</h2>
              <label>Номер<input type="number" value='<?= isset($_GET['red_id']) ? $val['Number'] : ""; ?>' name="number"  placeholder="" readonly></label>
              <label>Город<input type="text" name="city"  value='<?= isset($_GET['red_id']) ? $val['City'] : ""; ?>' placeholder=""></label>
              <label>Улица<input type="text" name="street"  value='<?= isset($_GET['red_id']) ? $val['Street'] : ""; ?>' placeholder=""></label>
              <label>Дом<input type="text" name="house"  value='<?= isset($_GET['red_id']) ? $val['House'] : ""; ?>' placeholder="" ></label>
              <label>Площадь<input type="number" name="area"  value='<?= isset($_GET['red_id']) ? $val['Area'] : ""; ?>' placeholder=""></label>
              <button type="submit" name="button">Изменить</button>
          </form>
    </section>
  </main>
  <?php include('footer.php'); ?>
  </body>
  </html>
