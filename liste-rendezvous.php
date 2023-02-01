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

    <title>Liste RDV</title>

</head>

<body>

    <h1>Liste des RDVs</h1>

    <?php
    require_once('enregistrement-patient.php');
    $queryAppointments = $conn->query('SELECT * FROM appointments');
    $appointments = $queryAppointments->fetchAll();
    foreach ($appointments as $appointment) {
        echo "<p> ID RDV : {$appointment['id']}; Heure du RDV : {$appointment['dateHour']}; Identifiant Patient : {$appointment['idPatients']}";
    }
    ?>

    <a href="ajout-rendezvous.php">Vers la prise de RDV</a>
    <br>
    <a href="rendezvous.php">Infos RDV</a>
    <br>
    <a href="index.php">Retour à l'accueil</a>

</body>

</html>