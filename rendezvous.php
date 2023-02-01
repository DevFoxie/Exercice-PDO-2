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

    <title>RDV</title>

</head>

<body>

    <h1>Infos RDV</h1>

    <?php
    require_once('enregistrement-patient.php');
    $queryAppointments = $conn->query('SELECT * FROM appointments');
    $appointments = $queryAppointments->fetchAll();
    ?>

    <form action="" method="post">
        <select name="appointment">
            <?php foreach ($appointments as $appointment) : ?>
                <option value="<?= $appointment['id'] ?>"><?= $appointment['dateHour'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="show" value="Afficher les infos du RDV">
        <input type="submit" name="update" value="Modifier le RDV">
    </form>

    <?php
    if (isset($_POST['show']) || isset($_POST['update'])) {
        try {
            $appointment_id = $_POST['appointment'];
            $stmt = $conn->prepare("SELECT * FROM appointments WHERE id = :id");
            $stmt->bindParam(':id', $appointment_id);
            $stmt->execute();
            $appointment = $stmt->fetch();
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    if (isset($_POST['show'])) {
    ?>
        <table>
            <tr>
                <th>Id RDV</th>
                <td><?= $appointment['id'] ?></td>
            </tr>
            <tr>
                <th>Heure du RDV</th>
                <td><?= $appointment['dateHour'] ?></td>
            </tr>
            <tr>
                <th>Identifiant patient</th>
                <td><?= $appointment['idPatients'] ?></td>
            </tr>
        </table>
    <?php
    }
    ?>
    
    <a href="ajout-rendezvous.php">Retour à la prise de RDV</a>
    <br>
    <a href="index.php">Retour à l'accueil</a>

</body>

</html>