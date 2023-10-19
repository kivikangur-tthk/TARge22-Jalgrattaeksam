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
if(!empty($_REQUEST["teooriatulemus"])){
    $kask=$yhendus->prepare("UPDATE jalgrattaeksam SET teooriatulemus=? WHERE id=?");
    $kask->bind_param("ii", $_REQUEST["teooriatulemus"], $_REQUEST["id"]);
    $kask->execute();
}
if(!empty($_REQUEST["korras_id"]) && isset($_REQUEST["page"])) {
    // TODO fix this security issue
    $kask=$yhendus->prepare(   
    "UPDATE jalgrattaeksam SET ".clean($_REQUEST["page"])."=1 WHERE id=?");   
    $kask->bind_param("i", $_REQUEST["korras_id"]);    
    $kask->execute();   
}   
if(!empty($_REQUEST["vigane_id"])){   
    $kask=$yhendus->prepare(   
    "UPDATE jalgrattaeksam SET slaalom=2 WHERE id=?");   
    $kask->bind_param("i", $_REQUEST["vigane_id"]);   
    $kask->execute();   
}
