<?php

include('classes/Animal.php');
include('classes/Baby.php');


$animal1 = new animal('Piggy', 100, 50, 50, 100, 0);

$animal1->be_kind();


if ($animal1->make_baby) {
    $baby = new baby('Piggyti', 50, 0, 0);
}



echo "Nombre d'actions restant : " . $animal1->get_actions_num();

if ($animal1->is_night()) {
    echo "<br>C'est la nuit ? : Oui";
} else {
    echo "<br>C'est la nuit ? : Non";
}

if ($animal1->get_die()) {
    $die = "Il est mort";
} else {
    $die = "Il est vivant";
}

?>

<p>Name <?= $animal1->name ?></p>
<p>Mood <?= $animal1->mood ?></p>
<p>Health <?= $animal1->health ?></p>
<p>Hunger <?= $animal1->hunger ?></p>
<p>Water need <?= $animal1->water_need ?></p>
<p>Years old <?= $animal1->yo ?></p>
<p>Die <?= $die ?> </p>