<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <!-- Ajout de styles CSS personnalisés -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin img {
            width: 100%;
            max-width: 200px;
            margin: 0 auto 20px;
        }

        .form-signin h1 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        /* Styles pour le champ de texte et le champ de mot de passe */
        .form-floating {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-floating input {
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            border-radius: .25rem;
            border: 1px solid #ced4da;
        }

        .form-floating label {
            position: absolute;
            top: 0;
            left: 0;
            padding: .375rem .75rem;
            font-size: 1rem;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            pointer-events: none;
            transform-origin: 0 0;
            transition: all .1s ease-in-out;
        }

        /* Styles pour le champ de texte et le champ de mot de passe lorsqu'ils sont en focus */
        .form-floating input:focus {
            border-color: #007bff;
            outline: 0;
            box-shadow: 0 0 0 .25rem rgba(0, 123, 255, .25);
        }

        /* Styles pour le label lorsque le champ de texte ou le champ de mot de passe est rempli */
        .form-floating input:valid:not(:empty) {
            padding-top: 1.625rem;
            padding-bottom: .375rem;
        }

        .form-floating input:valid:not(:empty) ~ label {
            color: #007bff;
            transform: translate(0, -1.5rem) scale(.8);
        }

        /* Styles pour le message d'erreur */
        .alert {
            margin-top: 1rem;
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            border-radius: .25rem;
            padding: .75rem 1.25rem;
        }

        /* Styles pour le bouton de soumission du formulaire */
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: .25rem;
            padding: .375rem .75rem;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Styles pour le texte de droits d'auteur */
        .text-muted {
            font-size: 0.875rem;
            margin-top: 1.5rem;
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
