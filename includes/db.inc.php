<?php
function dbConnect(): mysqli
{
    try {
        $conn = new mysqli(DB["host"], DB["user"], DB["passwort"], DB["dbname"]);
    } catch (Exception $e) {
        if (TESTBETRIEB) {
            ta($e);
            die("VErbindungsfehler");
        } else {
            header("../errors/dbconnect.html");
        }
    }
    return $conn;
}
