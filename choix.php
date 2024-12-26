<?php
// Vérification de la soumission du formulaire
if (isset($_POST['ok'])) {
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

    // Récupérer les choix de l'utilisateur
    //Si la condition est fausse (c'est-à-dire que $_POST['entree'] n'est pas défini), alors $entreeschoisie sera initialisé avec un tableau vide
    $entreeschoisie = isset($_POST['entree']) ? $_POST['entree'] : []; // tableau des entrées sélectionnées 
    $platschoisie = isset($_POST['plat']) ? $_POST['plat'] : []; // tableau des plats sélectionnés
    $dessertschoisie = isset($_POST['dessert']) ? $_POST['dessert'] : []; // tableau des desserts sélectionnés

    // Initialiser les prix totaux pour chaque catégorie
    $prix_total_entrees = 0;
    $prix_total_plats = 0;
    $prix_total_desserts = 0;

    // Calculer le prix total pour les entrées
    foreach ($entreeschoisie as $entree) {
        $prix_total_entrees += $entrees[$entree]; 
    }

    // Calculer le prix total pour les plats
    foreach ($platschoisie as $plat) {
        $prix_total_plats += $plats[$plat]; 
    }

    // Calculer le prix total pour les desserts
    foreach ($dessertschoisie as $dessert) {
        $prix_total_desserts += $desserts[$dessert]; 
    }

    // Calculer le prix total de la facture
    $prix_total = $prix_total_entrees + $prix_total_plats + $prix_total_desserts;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Choix</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<div class="container">
    <h2 class="text-center text-primary">Votre choix:</h2>
    <table class="table table-bordered table-striped bg-light">
            <tr>
                <th>Votre Choix</th>
                <th>Total</th>
            </tr>
        
            <tr>
                <!-- Affichage des entrées choisies ou message si aucune entrée n'est sélectionnée -->
                <td>Entrée: <?= !empty($entreeschoisie) ? implode(", ", $entreeschoisie) : "Aucune entrée choisie" ?></td>
                <!-- Affichage du prix total des entrées formaté à deux décimales -->
                <td><?= number_format($prix_total_entrees, 2) ?> DH</td>
            </tr>
            <tr>
                <!-- Affichage des plats choisis ou message si aucun plat n'est sélectionné //  
                !empty: Cette fonction vérifie si la variable $platschoisie n'est pas vide s'il est vrai en affiche les play sion en affiche un message .  -->
                <td>Plat: <?= !empty($platschoisie) ? implode(", ", $platschoisie) : "Aucun plat choisi" ?></td>
                <!-- Affichage du prix total des plats formaté à deux décimales -->
                <td><?= number_format($prix_total_plats, 2) ?> DH</td>
            </tr>
            <tr>
                <!-- Affichage des desserts choisis ou message si aucun dessert n'est sélectionné -->
                <td>Dessert: <?= !empty($dessertschoisie) ? implode(", ", $dessertschoisie) : "Aucun dessert choisi" ?></td>
                <!-- Affichage du prix total des desserts formaté à deux décimales -->
                <td><?= number_format($prix_total_desserts, 2) ?> DH</td>
            </tr>
       
            <tr>
                <td><strong>Total</strong></td>
                <!-- Affichage du prix total de la facture formaté à deux décimales -->
                <td colspan="3"><strong><?= number_format($prix_total, 2) ?> DH</strong></td>
            </tr>
        
    </table>
    <div class="text-center">
        <a href="ex 4.php" class="btn btn-primary">Retour</a>
        <a href="remerciement.php" class="btn btn-success">Valider</a>
    </div>
</div>
</body>
</html>
