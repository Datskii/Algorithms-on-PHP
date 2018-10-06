<?php
$_GET["start"] = 'E:\GeekUniversity';

//если не точки, то определяем её, что бы видеть, где мы находимся
if (!isset($_GET["dir"])) {
    $_GET["dir"] = $_GET["start"];
}

//открываем каталог
$od = opendir($_GET["dir"]);
//читаем каталог
while ($file = readdir($od)) {
    //проверяем если каталог и пропускаем точку и две точки
    if (is_dir($_GET["dir"] . "/" . $file) && $file != "." && $file != "..") {
        //создаем массив
        $dirs[] = $file;
    }
    //проверяем если ли файл
    if (is_file($_GET["dir"] . "/" . $file)) {
        //создаем массив
        $files[] = $file;
    }
}

//закрываем каталог
closedir($od);

//вывод результата
print '<h2>' . $_GET["dir"] . '</h2>';

//стабильный переход на каталог вверх - начало
if ($_GET["dir"] != $_GET["start"]) {
    $poslslash = strrpos($_GET["dir"], "/");
    $newdir = substr($_GET["dir"], 0, $poslslash);
    print "<a href='?dir=" . $newdir . "'>&lt;&lt;НАВЕРХ</a>";
}
//стабильный переход на каталог вверх - конец

$total = '<div id=' . 'data-wrapper' . '>';

//проверка, если есть массив каталогов, то сортировка и вывод
if (isset($dirs)) {
    //сорировка
    sort($dirs);
    //вывод массива каталогов
    foreach ($dirs as $k => $v) {
        $total .= "<a href='?dir=" . $_GET["dir"] . "/" . $dirs[$k] . "'>" . $dirs[$k] . '</a>' . '<br>';
    }
}
//проверка, если есть массив файлов, то сортировка и вывод
if (isset($files)) {
    //сортировка
    sort($files);
    //вывод массива файлов
    foreach ($files as $k => $v) {
        $total .= $files[$k] . '<br>';
    }
}
$total .= '</div>';

//вывод общего результата
echo $total;

