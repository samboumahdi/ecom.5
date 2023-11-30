<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre d'adresses</title>

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
        <h2>Combien d'adresses souhaitez-vous saisir ?</h2>
        <!-- Formulaire pour saisir le nombre d'adresses -->
        <form id="addressForm">
            <!-- Champ pour saisir le nombre d'adresses -->
            <input type="number" id="numAddresses" required>
            <!-- Bouton pour continuer et afficher les champs d'adresse -->
            <button type="button" onclick="showAddressFields()">Continuer</button>
        </form>
    </div>

    <script>
        function showAddressFields() {
            // Récupérer le nombre d'adresses saisi par l'utilisateur
            var numAddresses = document.getElementById('numAddresses').value;

            // Créer les champs d'adresse dynamiquement
            var form = document.getElementById('addressForm');
            for (var i = 1; i <= numAddresses; i++) {
                // Créer un nouvel élément div pour chaque adresse
                var addressDiv = document.createElement('div');
                // Ajouter du contenu HTML aux champs de l'adresse
                addressDiv.innerHTML = `
                    <h3>Adresse ${i}</h3>
                    <!-- Champ pour la rue -->
                    <label for="street_${i}">Rue :</label>
                    <input type="text" name="street_${i}" maxlength="50" required>

                    <!-- Champ pour le numéro de rue -->
                    <label for="street_nb_${i}">Numéro :</label>
                    <input type="number" name="street_nb_${i}" required>

                    <!-- Champ pour le type d'adresse -->
                    <label for="type_${i}">Type :</label>
                    <select name="type_${i}">
                        <option value="livraison">Livraison</option>
                        <option value="facturation">Facturation</option>
                        <option value="autre">Autre</option>
                    </select>

                    <!-- Champ pour la ville -->
                    <label for="city_${i}">Ville :</label>
                    <select name="city_${i}">
                        <option value="Montreal">Montreal</option>
                        <option value="Laval">Laval</option>
                        <!-- Ajoutez d'autres options ici -->
                    </select>

                    <!-- Champ pour le code postal -->
                    <label for="zipcode_${i}">Code postal :</label>
                    <input type="text" name="zipcode_${i}" maxlength="6" required>
                `;
                // Ajouter le nouvel élément div au formulaire
                form.appendChild(addressDiv);
            }
        }
    </script>
</body>
</html>
