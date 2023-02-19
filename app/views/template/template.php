<?php
include 'head.php';
include 'header.php';

$page = filter_input(INPUT_GET, 'page');

$test = str_replace('.php', '', $_SERVER['PHP_SELF']);
var_dump($test);

if (!isset($_GET['id'])) {
    // $id = filter_input(INPUT_GET, 'id');
    $id = '';
} else {
    $id = filter_input(INPUT_GET, 'id');
}

var_dump($_GET);

switch ($page) {
    case '':
        include '../app/views/home/index.php';
        break;
    case 'home':
        include '../app/views/home/index.php';
        break;
    case 'jeux':
        include '../app/views/jeu/show.php';
        break;
}
