<?php

define("TESTBETRIEB", true);

define("DB", [
    "host" => "localhost",
    "user" => "root",
    "passwort" => "",
    "dbname" => "db_schulverwaltung"
]);

if(TESTBETRIEB) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
} else {
    error_reporting(E_ALL);
    ini_set("display_errors", 0);
}
?>