<?php
// Démarrer la session PHP
session_start();

// Vérifier si le formulaire a été soumis (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Connexion à la base de données MySQL
        $bdd = new PDO("mysql:host=localhost;dbname=membre;charset=utf8", "root", "");
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Enregistrez chaque adresse dans la base de données
        for ($i = 1; $i <= $_SESSION['nombre_adresses']; $i++) {
            // Récupérer les données du formulaire pour chaque adresse
            $street = $_POST["street_$i"];
            $street_nb = $_POST["street_nb_$i"];
            $type = $_POST["type_$i"];
            $city = $_POST["city_$i"];
            $zipcode = $_POST["zipcode_$i"];

            // Préparer et exécuter la requête SQL pour insérer l'adresse dans la table 'adresses'
            $query = $bdd->prepare("INSERT INTO utlisateurs (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)");
            $query->execute([$street, $street_nb, $type, $city, $zipcode]);
        }

        // Rediriger vers une page de confirmation après l'enregistrement des adresses
        header("Location: confirmer.php");
        exit();
    } catch (PDOException $e) {
        // Gérer les erreurs liées à la base de données
        die("Erreur : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Saisie des adresses</title>

    <!-- Ajout de styles CSS personnalisés -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        #addressForm {
            margin-top: 20px;
        }

        input, select, button {
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Saisie des adresses</h2>
        <!-- Formulaire pour la saisie des adresses -->
        <form id="addressForm" action="saisie_adresses.php" method="post">
            <!-- Conteneur pour les champs d'adresse dynamiques -->
            <div id="addressFieldsContainer"></div>

            <!-- Bouton pour ajouter une nouvelle adresse -->
            <button type="button" onclick="addAddressField()">Ajouter une adresse</button>
            <!-- Bouton de soumission du formulaire -->
            <button type="submit">Continuer</button>
        </form>

        <!-- Script JavaScript pour ajouter dynamiquement des champs d'adresse -->
        <script>
            function addAddressField() {
                // Récupérer le conteneur des champs d'adresse
                var container = document.getElementById('addressFieldsContainer');
                // Calculer l'index de la nouvelle adresse
                var index = container.children.length + 1;

                // Créer un nouvel élément div pour les champs de l'adresse
                var addressDiv = document.createElement('div');
                addressDiv.innerHTML = `
                    <h3>Adresse ${index}</h3>
                    <!-- Champ pour la rue -->
                    <label for="street_${index}">Rue :</label>
                    <input type="text" name="street_${index}" maxlength="50" required>

                    <!-- Champ pour le numéro de rue -->
                    <label for="street_nb_${index}">Numéro :</label>
                    <input type="number" name="street_nb_${index}" required>

                    <!-- Champ pour le type d'adresse -->
                    <select name="type_${index}">
                        <option value="livraison">Livraison</option>
                        <option value="facturation">Facturation</option>
                        <option value="autre">Autre</option>
                    </select>

                    <!-- Champ pour la ville -->
                    <select name="city_${index}">
                        <option value="Montreal">Montreal</option>
                        <option value="Laval">Laval</option>
                        <!-- Ajoutez d'autres options ici -->
                    </select>

                    <!-- Champ pour le code postal -->
                    <label for="zipcode_${index}">Code postal :</label>
                    <input type="text" name="zipcode_${index}" maxlength="6" required>
                `;
            }
            </script>
                // Ajouter le nouvel
