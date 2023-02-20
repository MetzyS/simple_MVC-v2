<h1>Categorie/show.php</h1>

<ul>
    <?php
    // var_dump($data);
    foreach ($data['categorie'] as $key => $value) {
        echo '<li>' . $value['nom_jeu'] . '</li>';
    }
    ?>
</ul>