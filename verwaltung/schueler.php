<?php
require("../includes/common.inc.php");
require("../includes/config.inc.php");
require("../includes/db.inc.php");

$conn = dbConnect();
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klassen</title>
</head>

<body>
    <h1>Schüler</h1>
    <div>
        <nav>
            <li><a href="../index.html">Start</a></li>
            <li><a href="./klassen.php">Klassen</a></li>
            <li><a href="./raeume.php">Räume</a></li>

        </nav>
    </div>


    <form method="post">
        <label>Suchen
            <input type="text" name="vn" id="">
            <input type="text" name="nn" id="">
            <input type="submit" name="suche" value="suchen">
        </label>
    </form>
    <?php
    ta($_POST);
    if (count($_POST) > 0) {
        $vn = '%' . $_POST["vn"] . '%';
        $nn = '%' . $_POST["nn"] . '%';

        $sql = "
            SELECT
                vorname as vn,
                nachname as nn
            FROM
                tbl_schueler
            WHERE
                vorname LIKE '$vn' AND nachname LIKE '$nn'
            ORDER BY
                vn ASC, nn ASC 
        ";

        $schueler = $conn->query($sql);
        while ($schuelerliste = $schueler->fetch_object()) {
            echo '
                <ul>
                    <li>' . $schuelerliste->vn . ' ' . $schuelerliste->nn . '</li>
                </ul>
            ';
        }
    } else {
        $sql = "
            SELECT
                vorname as vn,
                nachname as nn
            FROM
                tbl_schueler
            ORDER BY
                vn ASC, nn ASC
            ";

        $schueler = $conn->query($sql);
        while ($schuelerliste = $schueler->fetch_object()) {
            echo '
                <ul>
                    <li>' . $schuelerliste->vn . ' ' . $schuelerliste->nn . '</li>
                </ul>
            ';
        }
    }
    ?>
</body>

</html>