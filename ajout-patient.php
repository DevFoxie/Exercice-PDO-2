<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="./css/custom2.css">
    <!-- CUSTOM JS -->
    <link rel="stylesheet" href="/js/main.js">
    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
    <link rel="manifest" href="./site.webmanifest">

    <title>Entrées</title>
</head>

<body>

    <div class="container">
        <h1>Formulaire d'entrée</h1>
        <!-- Form -->
        <form action="enregistrement-patient.php" id="form" method="post">
            <!-- ID -->
            <div class="form-group">
                <label for="id">Identifiant</label>
                <input type="text" id="id" name="id" placeholder="01234-..." required minlength="3" maxlength="100" />
            </div>
            <!-- Lastname -->
            <div class="form-group">
                <label for="lastname">Nom de famille</label>
                <input type="text" id="lastname" name="lastname" placeholder="Baudelaire" required minlength="3" maxlength="100" />
            </div>
            <!-- Lastname -->
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" placeholder="Charles" required minlength="3" maxlength="100" />
            </div>
            <!-- Phone Number -->
            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="tel" id="phone" name="phone" placeholder="06-..." required pattern="{10}" title="Entrez un numéro de téléphone valide (10 digits)." />
            </div>
            <!-- BirthDate -->
            <div class="form-group">
                <label for="birthdate">Année de naissance</label>
                <input type="text" id="birthdate" name="birthdate" placeholder="1990" required minlength="4" maxlength="4" />
            </div>
            <!-- Email Address -->
            <div class="form-group">
                <label for="mail">Adresse mail</label>
                <input type="mail" id="mail" name="mail" placeholder="mail@address.com" required pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" />
            </div>
            <button type="submit" onclick="return showConfirmDialog();">Créer la nouvelle fiche patient</button>
        </form>
        <!-- Error/Success Message -->
        <div class="message-container">
            <h3 id="message"></h3>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="./js/patient-confirmation.js"></script>
</body>

</html>