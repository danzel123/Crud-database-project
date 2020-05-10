<!-- $sql='SELECT product.articul, product.name, product.sort, product.measure,
manufacture.INN, manufacture.City, manufacture.Street, manufacture.House, manufacture.Surname, manufacture.Name, manufacture.Fathername,
sum(product_in_shop.amount*product_in_shop.price) as cost, product_in_shop.number_of_shop, sum(product_in_shop.amount*product_in_shop.price) as shop_cost
from product, manufacture, product_in_shop
where product_in_shop.articul in(SELECT product_in_shop.articul FROM product_in_shop WHERE number_of_shop BETWEEN '.$from.' and '.$to.') and product.INN = manufacture.INN and product_in_shop.articul = product.articul
group by product_in_shop.number_of_shop
order by product.articul'; -->
<?php
  include('dbconnect.php');
  $from = $_POST['from'];
  $to = $_POST['to'];
  $sql='SELECT Number FROM shop WHERE Number BETWEEN '.$from.' and '.$to.'';
  $arrayNumber = array();
  $result = mysql_query($sql) or die(mysql_error());
  while($r = mysql_fetch_array($result, MYSQL_ASSOC)){
      $arrayNumber[]= $r;
      // Генерация таблицы
  }
  include('../header.php');
  echo "<main><section>";
  echo "<h2>Информация о товарах по интервалу магазинов</h2>";
  foreach ($arrayNumber as $numberShop) {
    $a = $numberShop["Number"];
    $sql='SELECT DISTINCT product.articul, product.name, product.sort, product.measure,
    manufacture.INN, manufacture.City, manufacture.Street, manufacture.House, manufacture.Surname, manufacture.Name, manufacture.Fathername
    from product, manufacture, product_in_shop
    where product_in_shop.articul in(SELECT product_in_shop.articul FROM product_in_shop WHERE number_of_shop = '.$a.') and product_in_shop.articul = product.articul';
    $arrayResult = array();
    $result = mysql_query($sql) or die(mysql_error());
        if (mysql_num_rows($result) == 0){
          echo "<h3 class='noValue'>В магазине {$numberShop['Number']} нет товаров<h3>";
          continue;
        }
        echo "<table>";
        echo "<tr>
        <th>Артикул</th>
        <th>Название товара</th>
        <th>Сорт</th>
        <th>Мера</th>
        <th>ИНН</th>
        <th>Город</th>
        <th>Улица</th>
        <th>Дом</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Стоимость продукта</th>
        </tr>";
        echo "<h3>Магазин номер {$numberShop['Number']}</h3>";
    while($r = mysql_fetch_array($result, MYSQL_ASSOC)){
        $arrayResult[]= $r;
        // Генерация таблицы
    }
    $shopCost = 0;
    foreach ($arrayResult as $str) {
      echo '<tr class="t-row">';
     foreach ($str as $v) {
       echo '<td>'.$v.'</td>';
     }
     $a = $str["articul"];
     $sql='SELECT sum(product_in_shop.amount*product_in_shop.price) as cost
     from product, product_in_shop
     where product_in_shop.articul  = '.$a.' and product_in_shop.articul = product.articul';
     $cost = array();
     $result = mysql_query($sql) or die(mysql_error());
     $cost = mysql_fetch_assoc($result);
     $shopCost += $cost['cost'];
     echo "<td>{$cost['cost']}</td>";
     echo '</tr>';
  }
  echo "<h4>Стоимость всего товара в магазине $shopCost</h4>";
  echo "</table>";
}


  echo "</main></section>";
  include('../footer.php');
  ?>


<!--
Номер магазина - стоимость всего товара
  информация о товарах, + стоимость каждого товара
 -->
