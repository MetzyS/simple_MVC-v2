<h1>compte/informations</h1>

<?php
$_SESSION['client'] = $data;
var_dump($data['message']);
unset($data['message']);
echo '<br><pre>';
var_dump($data);