<?php


session_start();

include_once('Cup.php');



if(isset($_SESSION['Cup'])){

    $bucket = unserialize($_SESSION['Cup']);

} else {

    // on initialise le bucket
    $bucket = new Cup(5);
    
}

//var_dump($_POST['dice']);

// affichage des valeurs de chaques dés
// $bucket->displayDicesValues();
// $bucket->rollCup();
echo '<br>';

if(isset($_POST['dice'])){

    foreach ($_POST['dice'] as $index) {
    
    $bucket->rerollDice($index);
    
    
    }
    $bucket->incrementCompt();
    
}

$bucket->displayDicesValues();
echo '<br>';
echo '<br>';
echo '<br>';
echo 'Nombre de lancés : ' . $bucket->getCompt();
echo '<br>';
echo '<br>';
echo '<br>';
$_SESSION['Cup'] = serialize($bucket);



foreach (array_count_values($bucket->getDicesValues()) as $value) {

    if($value >= 4) {

        echo 'Partie gagnée en ' . $bucket->getCompt() . ' lancés';
        session_destroy();
    }
    
}

// var_dump($_SESSION);



// lancement des dés dans le bucket

// echo $bucket->getDiceValue(2);

echo '<br>';
echo '<br>';
echo '<br>';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lancé de dés</title>
</head>
<body>
    <form action="" method="POST" class="form-example">
        <input type="checkbox" id="1" name="dice[]" value="0">
        <label for="horns">dice 1</label>
        <input type="checkbox" id="2" name="dice[]" value="1">
        <label for="horns">dice 2</label>
        <input type="checkbox" id="3" name="dice[]" value="2">
        <label for="horns">dice 3</label>
        <input type="checkbox" id="4" name="dice[]" value="3">
        <label for="horns">dice 4</label>
        <input type="checkbox" id="5" name="dice[]" value="4">
        <label for="horns">dice 5</label>
        
        <input type="submit" value="lancer le dé" name="action">
        <input type="submit" value="rafraichir" name="action" href="refresh.php">

    </form>

    
    
</body>
</html>



<?php

// fin du jeu


