<?php
$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi
FROM jalgrattaeksam WHERE teooriatulemus>=9 AND ringtee=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
?>
<h1>Ringtee</h1>
<table>
<?php
while($kask->fetch()){
    echo "
    <tr>
        <td>$eesnimi</td>
        <td>$perekonnanimi</td>
        <td>
            <a href='?page=roundabout&korras_id=$id'>Korras</a>
            <a href='?page=roundabout&vigane_id=$id'>Ebaõnnestunud</a>
        </td>
    </tr>
    ";
}
?>
</table>