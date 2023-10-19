<?php

function clean($userInput) {
    return htmlspecialchars($userInput);
}

if(isSet($_REQUEST["register"])){
    $firstName =clean($_REQUEST["firstName"]);
    $kask=$yhendus->prepare("INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi) VALUES (?, ?)");
    $kask->bind_param("ss", $firstName , clean($_REQUEST["lastName"]));
    $kask->execute();
    $yhendus->close();
    header("Location: $_SERVER[PHP_SELF]?addedValue=$firstName");
    exit();
}