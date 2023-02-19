<?php
include_once '../app/core/Controller.php';
// $array = ['&id=1', '&id=2', '&id=3', '&id=4', '&id=5'];
// $link = str_replace($array, '', $query_string = $_SERVER["QUERY_STRING"]);
?>

<ul>
    <li><a href="<?php echo '?' . $link ?>&id=1">ID 1</a></li>
    <li><a href="<?php echo '?' . $link ?>&id=2">ID 2</a></li>
    <li><a href="<?php echo '?' . $link ?>&id=3">ID 3</a></li>
</ul>

<?php
$jeu = new Controller;
$id = filter_input(INPUT_GET, 'id');
$data = $jeu->find($id);
// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>';
// var_dump($data);
?>

<h1>Jeu/show.php</h1>
<ul>
    <?php
    foreach ($data as $j) {
        echo '<li>' . $j['nom_jeux'] . '</li>';
    }
    ?>
</ul>