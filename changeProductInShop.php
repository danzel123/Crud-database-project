
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
          $sql = mysql_query("SELECT * FROM product_in_shop WHERE id = $my_get");
          $val = mysql_fetch_array($sql);}

    ?>
          <form class="chenge-form chenge-form" action="php/AddTovarInShop.php" method="post">
            <form class="add-tovar-in-shop add-form visually-hidden" action="php/AddTovarInShop.php" method="post">
              <h2>Изменить товар в магазине</h2>
              <!-- генерация списка артикулов -->
              <?php
              include("php/dbconnect.php");
              $query = 'SELECT articul FROM product';
              $articul_array = array();
              $result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
                  ?>
                  <label for="">ИНН<input type="text" name="articul" value='<?= isset($_GET['red_id']) ? $val['articul'] : ""; ?>' readonly></label>
                  <label for="">Артикул<input type="text" name="number" value='<?= isset($_GET['red_id']) ? $val['number_of_shop'] : ""; ?>' readonly></label>
                  <label>Количество<input type="number" name="amount" placeholder="Количество" value='<?= isset($_GET['red_id']) ? $val['amount'] : ""; ?>'></label>
                  <label>Цена за штуку<input type="number" name="price" placeholder="Цена за штуку" value='<?= isset($_GET['red_id']) ? $val['price'] : ""; ?>'></label>
                <button type="submit">Ок</button>
          </form>
    </section>
  </main>
  <?php include('footer.php'); ?>
  </body>
  </html> value="$"
