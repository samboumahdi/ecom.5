<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <!-- Styles CSS -->
    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond de la page */
        }

        .form-signin {
            max-width: 400px; /* Largeur maximale du formulaire */
            margin: 0 auto; /* Centrer le formulaire */
            padding: 15px; /* Ajouter un espacement intérieur */
            margin-top: 50px; /* Ajouter une marge en haut */
        }

        .form-floating input,
        .form-floating select {
            width: 100%;
            margin-top: 10px;
        }

        #error-message {
            margin-top: 10px;
            display: none; /* Cacher le message d'erreur par défaut */
        }
    </style>
</head>
<body class="text-center">

    <!-- Section principale pour le formulaire de connexion -->
    <main class="form-signin">
        <!-- Formulaire de connexion -->
        <form action="connexion.php" method="post" onsubmit="return validateForm()">
            <!-- Logo et titre -->
            <img class="mb-4" src="logo.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Veuillez vous connecter</h1>

            <!-- Champ pour le nom d'utilisateur -->
            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Nom d'utilisateur" required>
                <label for="floatingInput">Nom d'utilisateur</label>
            </div>
            
            <!-- Champ pour le mot de passe -->
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" required>
                <label for="floatingPassword">Mot de passe</label>
            </div>

            <!-- Message d'erreur en cas de problème -->
            <div id="error-message" class="alert alert-danger visually-hidden" role="alert"></div>

            <!-- Bouton de soumission du formulaire -->
            <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
            <!-- Mention de droits d'auteur -->
            <p class="mt-3 mb-3 text-muted">&copy; 2023</p>
        </form>

        <!-- Script JavaScript pour valider le formulaire -->
        <script>
            function validateForm() {
                // Récupérer les valeurs des champs
                var username = document.forms["myForm"]["username"].value;
                var password = document.forms["myForm"]["password"].value;

                // Vérifier si les champs sont vides
                if (username === "" || password === "") {
                    // Afficher un message d'erreur
                    document.getElementById("error-message").innerText = "Veuillez remplir tous les champs.";
                    document.getElementById("error-message").style.display = "block"; /* Afficher le message d'erreur */
                    return false;
                }

                // Autres validations possibles ici...

                // Si tout est valide, retourner true
                return true;
            }
        </script>
    </main>

</body>
</html>

