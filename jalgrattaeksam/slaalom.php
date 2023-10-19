<?php
$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi
FROM jalgrattaeksam WHERE teooriatulemus>=9 AND slaalom=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
?>
<h1>Slaalom</h1>
<table>
<?php
while($kask->fetch()){
    echo "
    <tr>
        <td>$eesnimi</td>
        <td>$perekonnanimi</td>
        <td>
            <a href='?page=slaalom&korras_id=$id'>Korras</a>
            <a href='?page=slaalom&vigane_id=$id'>Ebaõnnestunud</a>
        </td>
    </tr>
    ";
}
?>
</table>