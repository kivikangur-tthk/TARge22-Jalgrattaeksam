<h1>Tulemused</h1>
<?php
$kask=$yhendus->prepare(
    "SELECT id, eesnimi, perekonnanimi, teooriatulemus,
    slaalom, ringtee, t2nav, luba FROM jalgrattaeksam;");   
    $kask->bind_result($id, $eesnimi, $perekonnanimi, $teooriatulemus,   
    $slaalom, $ringtee, $t2nav, $luba);   
    $kask->execute();
?>
<table>
    <tr>
        <th>Eesnimi</th>
        <th>Perekonnanimi</th>
        <th>Teooriaeksam</th>
        <th>Slaalom</th>
        <th>Ringtee</th>
        <th>Tänavasõit</th>
        <th>Lubade väljastus</th>
    </tr>
    <?php
    while($kask->fetch()){
        $asendatud_slaalom=asenda($slaalom);
        $asendatud_ringtee=asenda($ringtee);
        $asendatud_t2nav=asenda($t2nav);
        $loalahter=".";
        if($luba){$loalahter="Väljastatud $luba";}
        if(!$luba and $t2nav==1){
        $loalahter="<a href='?vormistamine_id=$id'>Vormista load</a>";
    }
    echo "
    <tr>
        <td>$eesnimi</td>
        <td>$perekonnanimi</td>
        <td>$teooriatulemus</td>
        <td>$asendatud_slaalom</td>
        <td>$asendatud_ringtee</td>
        <td>$asendatud_t2nav</td>
        <td>$loalahter</td>
    </tr>
";
}
?>
</table>