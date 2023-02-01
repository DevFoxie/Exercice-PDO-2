<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="./css/custom.css">
    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
    <link rel="manifest" href="./site.webmanifest">

    <title>Liste Patients</title>

</head>

<body>

    <?php

    require_once('enregistrement-patient.php');

    $queryPatients = $conn->query('SELECT * FROM patients');
    $patients = $queryPatients->fetchAll();

    foreach ($patients as $patient) {
        echo "<p> Identifiant : {$patient['id']}; Nom de famille : {$patient['lastname']}; Prénom : {$patient['firstname']}; Année de naissance : {$patient['birthdate']}; Numéro de téléphone : {$patient['phone']}; Adresse email : {$patient['mail']}.";
    }

    ?>

    <a href="ajout-patient.php">Retour vers le formulaire d'entrée</a>
    <br>
    <a href="profil-patient.php">Vers les profils patients</a>

</body>

</html>