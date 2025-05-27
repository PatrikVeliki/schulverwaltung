<?php
require("../includes/common.inc.php");
require("../includes/config.inc.php");
require("../includes/db.inc.php");

//$conn = dbConnect();
$GLOBALS["conn"] = dbConnect();
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klassen</title>
</head>

<body>
    <h1>Klassen</h1>
    <nav>
        <li><a href="../index.html">Start</a></li>
        <li><a href="./schueler.php">Schüler</a></li>
        <li><a href="./raeume.php">Räume</a></li>

    </nav>
    
    <?php
    $sql = '
        SELECT
            tbl_klassen.id_klasse,
            tbl_klassen.bezeichnung,
            tbl_raeume.raumnummer,
            tbl_lehrer.vorname AS LVN,
            tbl_lehrer.nachname AS LNN
        FROM
            tbl_klassen
        JOIN
            tbl_lehrer ON tbl_klassen.fid_vorstand = tbl_lehrer.id_lehrer
        JOIN
            tbl_raeume ON tbl_klassen.fid_raum = tbl_raeume.id_raum
    ';

    $klassen = $conn->query($sql);
    while ($klasse = $klassen->fetch_object()) {
        echo '
            <li>Raum: ' . $klasse->raumnummer . ' | Klasse: ' . $klasse->bezeichnung . ' | Vorstand: ' . $klasse->LVN . ' ' . $klasse->LNN . '</li>
        ';

        $sql = '
            SELECT 
                tbl_schueler.vorname AS SVN,
                tbl_schueler.nachname AS SNN,
                tbl_schueler.gebDat AS GEB
            FROM
                tbl_schueler
            WHERE
                fid_klasse = ' . $klasse->id_klasse . '
        ';
        $schueler = $conn->query($sql);
        while ($schuelerInKlasse = $schueler->fetch_object()) {
            echo '
                <ul>
                    <li>
                        ' . $schuelerInKlasse->SVN . ' ' . $schuelerInKlasse->SNN . ' | ' . $schuelerInKlasse->GEB . '
                    </li>
                </ul>
            ';
        }
    } ?>
</body>

</html>