<?php
// Définition des options de menu avec prix
$entrees = [
    "Salade normal" => 25.00,
    "Soupe" => 45.0,
    "Salade Royale" => 96.00,
    "Briouate" => 30.00,
    "Zaalouk" => 35.00,
    "Chakchouka" => 40.00,
    "Bissara" => 28.00,
];

$plats = [
    "Pâtes" => 210.00,
    "Bastilla" => 915.00,
    "Poisson" => 812.00,
    "Tajine de poulet" => 500.00,
    "Couscous" => 500.00,
    "Tajine d'agneau" => 600.00,
    "Mechoui" => 700.00,
    "Tajine de kefta" => 550.00,
    "Rfissa" => 480.00,       
];

$desserts = [
    "Tarte aux pommes" => 250.50,
    "Mousse au chocolat" => 200.00,
    "Glace" => 125.0,
    "Baklawa" => 150.00,
    "Mhalbi" => 100.00,
    "Riz au lait" => 95.00,
    "Salade d'orange" => 60.00,
];

// Fonction pour générer les options de menu
function genererChoix($choix) {
    $html = ''; //pour accumuler les éléments <option> qui seront générés.
    foreach ($choix as $nom => $prix) {
        $html .= "<option value=\"{$nom}\">{$nom} - " . number_format($prix, 2) . " DH</option>"; 
       // est utilisée pour insérer la valeur de la variable $nom dans une chaîne de caractères. 
    }
    return $html;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu du Restaurant</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1> Menu du Restaurant <h3>choisissez votre menu:</h3></h1>
    <div class="border p-3">
        <form action="choix.php" method="post">
            <div class="form-group">
                <label for="entree">Entrée:</label>
                <select name="entree[]" id="entree" class="form-control" multiple>
                    <?= genererChoix($entrees) ?>
                </select>
            </div>

            <div class="form-group">
                <label for="plat">Plat:</label>
                <select name="plat[]" id="plat" class="form-control" multiple>
                    <?= genererChoix($plats) ?>
                </select>
            </div>

            <div class="form-group">
                <label for="dessert">Dessert:</label>
                <select name="dessert[]" id="dessert" class="form-control" multiple>
                    <?= genererChoix($desserts) ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="ok">Valider</button>
        </form>
    </div>
</div>
</body>
</html>
