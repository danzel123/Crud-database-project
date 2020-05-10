
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
          $sql = mysql_query("SELECT * FROM manufacture WHERE id = $my_get");
          $val = mysql_fetch_array($sql);}

    ?>
          <form class="chenge-form chenge-form" action="php/addManufacture.php" method="post">
              <h2>Изменить производителя</h2>
              <label>ИНН<input type="text" name="inn" placeholder="ИНН" value="<?= isset($_GET['red_id']) ? $val['INN']  : "";?>"></label>
                 <label>Город<input type="text" name="city" placeholder="City" value="<?= isset($_GET['red_id']) ? $val['City']  : "";?>"></label>
                 <label>Улица<input type="text" name="street" placeholder="Street" value="<?= isset($_GET['red_id']) ? $val['Street']  : "";?>"></label>
                 <label>Дом<input type="text" name="house" placeholder="House" value="<?= isset($_GET['red_id']) ? $val['House']  : "";?>"></label>
                 <label>Фамилия<input type="text" name="familiya" placeholder="familiya" value="<?= isset($_GET['red_id']) ? $val['Surname']  : "";?>"></label>
                 <label>Имя<input type="text" name="name" placeholder="Name" value="<?= isset($_GET['red_id']) ? $val['Name']  : "";?>"></label>
                 <label>Отчество<input type="text" name="fathername" placeholder="Fathername" value="<?= isset($_GET['red_id']) ? $val['Fathername']  : "";?>"></label>
                <button type="submit" name="button">Готово</button>
          </form>
    </section>
  </main>
  <?php include('footer.php'); ?>
  </body>
  </html> value="$"
