<?php
if (!isset($data['message'])) {
    header('Location: /www/simple_MVC-v2/public/panier/show/');
}
?>

<h1>Confirmation commande</h1>

<?php
echo '<p class="message">' . $data['message'] . '</p>';
