<?php
session_start();
// init.php initialise les configurations requises
// on appelle ça "bootstrap"
require_once '../app/init.php';
$link = substr($_SERVER["QUERY_STRING"], 0, 9);
?>
<!DOCTYPE html>
<html lang="fr">

<?php
include '../app/views/template/template.php';
?>

</html>
<?php
// Crée une nouvelle instance de la classe App
$app = new App;
?>