<h1>Jeu/show.php</h1>

<p></p>

<ul>
    <?php
    $cat_id = 1;
    foreach ($data['categorie'] as $key => $value) {
        echo '<li><a href="/www/simple_MVC-v2/public/categorie/show/' . $cat_id . '">' . $value['nom_categorie'] . '</a></li>';
        $cat_id += 1;
        // cette boucle = nom des categories
    };
    $cat_id = 1;
    ?>
    <br>
</ul>
<?php
foreach ($data['jeu'] as $key => $value) {
    echo $value['nom_jeu'];
    // cette boucle = nom des jeux
}



// echo '<pre>';
// print_r($data);
?>