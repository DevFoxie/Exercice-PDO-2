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

    <title>Profil patients</title>

</head>

<body>

    <?php
    require_once('enregistrement-patient.php');
    $queryPatients = $conn->query('SELECT * FROM patients');
    $patients = $queryPatients->fetchAll();

    $queryAppointments = $conn->query('SELECT * FROM appointments');
    $appointments = $queryAppointments->fetchAll();
    
    ?>

    <h2>Sélectionnez le profil patient :</h2>

    <form action="" method="post">
        <select name="patient">
            <?php foreach ($patients as $patient) : ?>
                <option value="<?= $patient['id'] ?>"><?= $patient['lastname'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="show" value="Afficher les informations">
        <input type="submit" name="update" value="Modifier les informations">
    </form>

    <?php
    if (isset($_POST['show']) || isset($_POST['update'])) {
        try {
            $patient_id = $_POST['patient'];
            $stmt = $conn->prepare("SELECT * FROM patients WHERE id = :id");
            $stmt->bindParam(':id', $patient_id);
            $stmt->execute();
            $patient = $stmt->fetch();
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    if (isset($_POST['show'])) {
    ?>
        <table>
            <tr>
                <th>Identifiant</th>
                <td><?= $patient['id'] ?></td>
            </tr>
            <tr>
                <th>Nom de famille</th>
                <td><?= $patient['lastname'] ?></td>
            </tr>
            <tr>
                <th>Prénom</th>
                <td><?= $patient['firstname'] ?></td>
            </tr>
            <tr>
                <th>Téléphone</th>
                <td><?= $patient['phone'] ?></td>
            </tr>
            <tr>
                <th>Date de naissance</th>
                <td><?= $patient['birthdate'] ?></td>
            </tr>
            <tr>
                <th>Adresse e-mail</th>
                <td><?= $patient['mail'] ?></td>
            </tr>
        </table>
    <?php
    }

    if (isset($_POST['update'])) {
    ?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $patient['id'] ?>">
            <label for="lastname">Nom de famille:</label>
            <input type="text" id="lastname" name="lastname" value="<?= $patient['lastname'] ?>">
            <br>
            <label for="firstname">Prénom:</label>
            <input type="text" id="firstname" name="firstname" value="<?= $patient['firstname'] ?>">
            <br>
            <label for="phone">Téléphone:</label>
            <input type="text" id="phone" name="phone" value="<?= $patient['phone'] ?>">
            <br>
            <label for="birthdate">Date de naissance:</label>
            <input type="text" id="birthdate" name="birthdate" value="<?php $patient['birthdate'] ?>">
            <br>
            <label for="mail">Adresse e-mail :</label>
            <input type="text" id="mail" name="mail" value="<?php $patient['mail'] ?>">
         
        <?php
    }
        ?>

        <a href="index.php">Retour à l'accueil</a>

</body>

</html>