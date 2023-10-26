<?php
function clean($userInput) {
    return htmlspecialchars($userInput);
}

function asenda($nr){   
    if($nr==-1){return ".";} //tegemata   
    if($nr== 1){return "korras";}   
    if($nr== 2){return "ebaõnnestunud";}
    return "Tundmatu number";  
}

function updateDriving($part, $id, $result) {
    global $yhendus;
    $updateSql = [
        "slalom" =>     "UPDATE jalgrattaeksam SET slaalom=? WHERE id=?",
        "roundabout" => "UPDATE jalgrattaeksam SET ringtee=? WHERE id=?",
        "street" =>     "UPDATE jalgrattaeksam SET t2nav=? WHERE id=?"
    ];

    if(in_array($part,array_keys($updateSql))){
        $kask=$yhendus->prepare( $updateSql[$part] );   
        $kask->bind_param("ii", $result, $id);    
        $kask->execute();
    }
}

if(isSet($_REQUEST["register"],$_REQUEST["firstName"],$_REQUEST["lastName"])){
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
    updateDriving($_REQUEST["page"],$_REQUEST["korras_id"],1);
}
if(!empty($_REQUEST["vigane_id"]) && isset($_REQUEST["page"])) {
    updateDriving($_REQUEST["page"],$_REQUEST["korras_id"],2);
}
if(!empty($_REQUEST["vormistamine_id"])){
    $kask=$yhendus->prepare("UPDATE jalgrattaeksam SET luba = now()  WHERE id=?");
    $kask->bind_param("i", $_REQUEST["vormistamine_id"]);
    $kask->execute();
    $yhendus->close();
    header("Location: $_SERVER[PHP_SELF]?page=license");
    exit();   
}