<?php
// Démarrer la session PHP
session_start();

// Vérifier si le nombre d'adresses est défini dans la session
if (!isset($_SESSION['nombre_adresses'])) {
    // Rediriger vers la page d'accueil si le nombre d'adresses n'est pas défini
    header("Location: index.php");
    exit();
}

// Récupérer les données des adresses depuis la session (ou depuis la base de données si déjà enregistrées)
$addresses = [];
for ($i = 1; $i <= $_SESSION['nombre_adresses']; $i++) {
    // Construire un tableau associatif pour chaque adresse à partir des données du formulaire
    $address = [
        'street' => $_POST["street_$i"],
        'street_nb' => $_POST["street_nb_$i"],
        'type' => $_POST["type_$i"],
        'city' => $_POST["city_$i"],
        'zipcode' => $_POST["zipcode_$i"],
    ];
    // Ajouter l'adresse au tableau d'adresses
    $addresses[] = $address;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Confirmation finale</title>

    <!-- Ajout de styles CSS personnalisés -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .address-card {
            background-color: #fff;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .address-card strong {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Confirmation finale</h2>
        <p>Merci, vos adresses ont été enregistrées avec succès !</p>

        <h3>Adresses enregistrées :</h3>
        <div class="grid-container">
            <?php foreach ($addresses as $index => $address) : ?>
                <div class="address-card">
                    <!-- Afficher le numéro d'adresse -->
                    <strong>Adresse <?php echo $index + 1; ?>:</strong>
                    <!-- Afficher la rue et le numéro de rue -->
                    <p><?php echo $address['street'] . ' ' . $address['street_nb']; ?></p>
                    <!-- Afficher le type d'adresse -->
                    <p>Type: <?php echo $address['type']; ?></p>
                    <!-- Afficher la ville -->
                    <p>Ville: <?php echo $address['city']; ?></p>
                    <!-- Afficher le code postal -->
                    <p>Code postal: <?php echo $address['zipcode']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>