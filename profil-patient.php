<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="./css/custom.css">
    <!--FONTAWESOME ICONS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--BOOSTRAP INTEGRATION-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
    <link rel="manifest" href="./site.webmanifest">

    <title>Profil patients</title>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <h1 class="text-white"><i class="fa-regular fa-hospital fa-beat"></i> Hôpital de Roanne (admin)</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-white" aria-current="page" href="index.php">Accueil</a>
                    <a class="nav-link text-white" href="ajout-patient.php">Formulaire d'entrée</a>
                    <a class="nav-link text-white " href="liste-patients.php">Liste des patients</a>
                    <a class="nav-link text-white " href="ajout-rendezvous.php">Prendre un RDV</a>
                </div>
            </div>
        </div>
    </nav>

    <?php
    require_once('enregistrement-patient.php');
    $queryPatients = $conn->query('SELECT * FROM patients');
    $patients = $queryPatients->fetchAll();

    $queryAppointments = $conn->query('SELECT * FROM appointments');
    $appointments = $queryAppointments->fetchAll();

    ?>

    <div class="container">
        <h2 class="mt-5">Sélectionnez le profil patient :</h2>

        <form action="" method="post" class="mt-3">
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
    </div>

    <!--FONTAWESOME SCRIPT-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--BOOSTRAP SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>