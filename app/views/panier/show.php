<?php

use App\Models\M_HTML;

?>

<h1>Panier</h1>

<section class="panier-show">
    <?php
    if(is_string($data['panier'])||is_null($data['panier'])) {
        echo $data['panier'];
    } else {
    foreach($data['panier'] as $key => $value) {
    M_HTML::panierCarteJeu($value);    
}}
?>
</section>