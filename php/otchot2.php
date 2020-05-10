<?php
include('dbconnect.php');
include('../header.php');
// , AVG(shop.Area) as avg_area
$sql='SELECT shop.Number, shop.City, shop.Street, shop.House, shop.Area FROM shop ORDER BY shop.City, shop.Street, shop.Street';
$array = array();
$result = mysql_query($sql) or die(mysql_error());
while($r = mysql_fetch_array($result, MYSQL_ASSOC)){
    $array[]= $r;

    // Генерация таблицы
}
echo "<main><section>";
echo "<h2>Информация о магазинах</h2>";
echo "<h3>упорядоченная по их адресам, с подсчетом средней площади всех магазинов.</h3>";
echo "<table>";
echo "<tr>
  <th>Номер магазина</th>
  <th>Город</th>
  <th>Улица</th>
  <th>Дом</th>
  <th>Площадь</th>
</tr>";
foreach ($array as $str) {
  echo '<tr class="t-row">';
 foreach ($str as $v) {
   echo '<td>'.$v.'</td>';
 }
 echo '</tr>';
}
echo "</table>";
$sql='SELECT CEILING(AVG(shop.Area)) as avg_area FROM shop';
$avg_area = mysql_query($sql) or die(mysql_error());
$avg_area = mysql_fetch_assoc($avg_area);
echo "<p>Средняя площадь всех магазинов {$avg_area['avg_area']} кв.м</p>";
echo "</main></section>";
include('../footer.php');
 ?>
