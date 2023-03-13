<?php

use App\Models\M_HTML;
?>

<h1>Panier</h1>

<section class="panier-show">
    <?php
    if (!isset($_SESSION['commande'])) {
        $_SESSION['commande'] = [];
    }
    if (is_string($data['panier']) || is_null($data['panier'])) {
        echo $data['panier'];
        unset($_SESSION['commande']);
    } else {
        $_SESSION['commande'] = $data['panier'];
        foreach ($data['panier'] as $key => $value) {
            M_HTML::panierCarteJeu($value);
        }
    }
    ?>
</section>
<?php

if ((is_array($data['panier']))) {
    echo '<div><a href="../commande" class="commander">Commander</a></div>';
}
?>