<header>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/style.min.css">
  <div class="wrap">

  <h1>Базы данных</h1>
  <div class="report-block">
    <button type="button" class="otchot1Btn basicButton">Отчёт 1</button>
    <form class="otchot2" action="/php/otchot2.php" method="post">
      <button type="submit" name="button">Отчёт 2</button>
    </form>
  </div>
</div>
  <form class="otchot1 visually-hidden" action="/php/otchot1.php" method="post">
    <button type="button" name="button" class="close-btn">
      x
    </button>
    <h2>Показать отчет по интервалу номеров</h2>
      <label>От<input type="number" name="from" value="1"></label>
      <label>До<input type="number" name="to" value="100"></label>
      <button type="submit" name="button">Показать</button>
  </form>
  <nav>
    <ul>
      <li><a href="../index.php">Магазины</a></li>
      <li><a href="../product.php">Товары</a></li>
      <li><a href="../manufacture.php">Производители</a></li>
      <li><a href="../products_in_shop.php">Товары в магазинах</a></li>
    </ul>
  </nav>
</header>
