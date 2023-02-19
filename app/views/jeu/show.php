<h1>Jeu/show.php</h1>
<ul>
    <?php
    echo '<pre>';
    print_r($data);
    echo '<br><br>';
    foreach ($data as $key => $value) {
        foreach ($value as $key2 => $jeu) {
            print_r($jeu['nom_jeux']);
        }
    }
    ?>
</ul>