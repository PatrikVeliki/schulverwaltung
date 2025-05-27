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
    <h1>Räume</h1>
    <nav>
        <li><a href="../index.html">Start</a></li>
        <li><a href="./klassen.php">Klassen</a></li>
        <li><a href="./schueler.php">Schüler</a></li>

    </nav>

    <?php
        $sql = "
            SELECT
                tbl_raeume.raumnummer AS nummer,
                tbl_klassen.bezeichnung AS bez
            FROM
                tbl_klassen
            INNER JOIN
                tbl_raeume ON tbl_klassen.fid_raum = tbl_raeume.id_raum
        ";

        $raeume = $conn -> query($sql);
        while($raum = $raeume -> fetch_object()) {
            echo '
                <ul>
                    <li> Raum: '. $raum -> nummer . ' Klasse: '. $raum -> bez.'</li>
                </ul>
            ';
        }
    ?>
</body>

</html>