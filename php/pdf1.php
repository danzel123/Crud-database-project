<!-- <?php
/**
 * @description
 * Упращенный метод формирования PDF из html
 */

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8', // кодировка (по умолчанию UTF-8)
    'format' => 'A4', // - формат документа
    'orientation' => 'L' // - альбомная ориентация
]);

// Заголовок PDF
$mpdf->SetTitle('mPDF');
// Автор
$mpdf->SetAuthor('Kylaksizov');

/**
 * @name HTML
 * @description формируем html код
 */
$html = '<h1><span>mPDF</span> - библиотека для формирования PDF</h1>

    <img src="ruwiki.png" alt="Wiki" class="logo">

    <p><b>Пара́граф</b> <i>(от греческого παράγραφος — написанное рядом)</i> — мелкое подразделение текста внутри главы, раздела, обозначаемое обычно специальным знаком — § или пп.</p>

    <p>Параграфы используются например в правилах, наставлениях, уставах, программах и т. п.</p>

    <p class="description">Источник <a href="https://ru.wikipedia.org/wiki/%D0%9F%D0%B0%D1%80%D0%B0%D0%B3%D1%80%D0%B0%D1%84">Википедия</a></p>

    <br>
    <h2>Формируем таблицу</h2>

    <table>
        <tr>
            <th>Колонка 1</th>
            <th>Колонка 2</th>
            <th>Колонка 3</th>
        </tr>
        <tr>
            <td>Колонка 1</td>
            <td>Колонка 2</td>
            <td>Колонка 3</td>
        </tr>
        <tr>
            <td>Колонка 1</td>
            <td>Колонка 2</td>
            <td>Колонка 3</td>
        </tr>
        <tr>
            <td>Колонка 1</td>
            <td>Колонка 2</td>
            <td>Колонка 3</td>
        </tr>
    </table>

    <br>
    <br>
    <a href="https://mpdf.github.io/" target="_blank" class="download_mPDF">Скачать библиотеку</a>
';

// устанавливаем номер страницы если нужно
$mpdf->setFooter('{PAGENO}');

// подключаем стили
// подключаем файл стилей
$stylesheet = file_get_contents('style.css');
$mpdf->WriteHTML($stylesheet,1);

// генерируем сам PDF
$mpdf->WriteHTML($html,2);

// выводим PDF  в браузер
$mpdf->Output();

// или сохраняем PDF в файл
//$mpdf->Output('filename.pdf','F'); -->
