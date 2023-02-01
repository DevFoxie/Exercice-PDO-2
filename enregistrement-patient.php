<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="./css/custom.css">

    <title>Données patients</title>

</head>

<body>

    <?php
    $dns = "mysql:host=127.0.0.1;dbname=hospitalE2N;charset=utf8";
    $user = "root";
    $password = "";

    try {
        $conn = new PDO($dns, $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST["id"], $_POST["lastname"], $_POST["firstname"], $_POST["phone"], $_POST["birthdate"], $_POST["mail"])) {
            $id = $_POST["id"];
            $lastname = $_POST["lastname"];
            $firstname = $_POST["firstname"];
            $phone = $_POST["phone"];
            $birthdate = $_POST["birthdate"];
            $mail = $_POST["mail"];

            $stmt = $conn->prepare("INSERT INTO patients (id, lastname, firstname, phone, birthdate, mail) 
                                VALUES (:id, :lastname, :firstname, :phone, :birthdate, :mail)");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":lastname", $lastname);
            $stmt->bindParam(":firstname", $firstname);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":birthdate", $birthdate);
            $stmt->bindParam(":mail", $mail);
            $stmt->execute();

            echo "Nouvelle fiche patient créée avec succès !";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
    ?>

    <?php
    /*echo "<p>Identifiant : " . $_POST["id"] . "<br>";
    echo "<p>Nom : " . $_POST["lastname"] . "<br>";
    echo "<p>Prénom : " . $_POST["firstname"] . "<br>";
    echo "<p>Numéro de téléphone : " . $_POST["phone"] . "<br>";
    echo "<p>Année de naissance : " . $_POST["birthdate"] . "<br>";
    echo "<p>Adresse mail : " . $_POST["mail"] . "<br>";
    */
    ?>

</body>

</html>