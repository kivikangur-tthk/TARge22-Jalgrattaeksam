<h1>Teooria</h1>
<?php
$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi
                         FROM jalgrattaeksam WHERE teooriatulemus=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
?>
<table>
<?php
while($kask->fetch()){
    echo "
    <tr>
        <td>$eesnimi</td>
        <td>$perekonnanimi</td>
        <td>
            <form action='?page=theory' method='post'>
                <input type='hidden' name='id' value='$id' />
                <input type='number' max='10' min='0' name='teooriatulemus' />
                <input type='submit' value='Sisesta tulemus' />
            </form>
        </td>
    </tr>
    ";
}
?>
</table>