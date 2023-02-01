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

    <title>Rendez-Vous</title>

</head>

<body>

    <?php
    require_once('enregistrement-patient.php');

    try {
        $conn = new PDO($dns, $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST["id"], $_POST["dateHour"], $_POST["idPatients"])) {
            $id = $_POST["id"];
            $dateHour = $_POST["dateHour"];
            $idPatients = $_POST["idPatients"];

            $stmt = $conn->prepare("INSERT INTO appointments (id, dateHour, idPatients) 
                            VALUES (:id, :dateHour, :idPatients)");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":dateHour", $dateHour);
            $stmt->bindParam(":idPatients", $idPatients);
            $stmt->execute();

            echo "Nouveau Rendez-vous pris avec succès !";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
    ?>

    <h1>Prendre un RDV</h1>

    <div class="container"></div>
    <form action="" method="post" id="form">
        <div class="form-group">
            <label for="id">ID RDV</label>
            <input type="text" id="id" name="id" placeholder="01234-..." required minlength="1" maxlength="100" />
        </div>
        <br>
        <div class="form-group">
            <label for="dateHour">Heure du RDV</label>
            <input type="time" id="dateHour" name="dateHour" min="09:00" max="18:00" required>

            <small>les Heures d'ouverture sont : 9h00 - 18h00.</small>
        </div>
        <div class="form-group">
            <br>
            <label for="idPatients">Identifiant</label>
            <input type="text" id="idPatients" name="idPatients" placeholder="01234-..." required minlength="3" maxlength="100" />
        </div>
        <br>
        <button type="submit">Prendre RDV</button>
    </form>
    <!-- Error/Success Message -->
    <div class="message-container">
        <h3 id="message"></h3>
    </div>

    </form>
    </div>

    <a href="liste-rendezvous.php">Liste des RDV</a>
    <br>
    <a href="index.php">Retour à l'accueil</a>

</body>

</html>