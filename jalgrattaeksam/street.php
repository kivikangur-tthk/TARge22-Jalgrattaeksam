<?php
$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi
FROM jalgrattaeksam WHERE ringtee = 1 AND slaalom = 1 AND t2nav = -1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
?>
<h1>Tänav</h1>
<table>
<?php
while($kask->fetch()){
    echo "
    <tr>
        <td>$eesnimi</td>
        <td>$perekonnanimi</td>
        <td>
            <a href='?page=street&korras_id=$id'>Korras</a>
            <a href='?page=street&vigane_id=$id'>Ebaõnnestunud</a>
        </td>
    </tr>
    ";
}
?>
</table>