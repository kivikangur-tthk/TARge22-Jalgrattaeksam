<!doctype html>
<html lang="et">
    <head>
        <title>Jalgrattaeksam</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <nav>
            <ul>
                <li><a class="<?=isset($_REQUEST["page"])?"":"active"?>" href="?">Avaleht</a></li>
                <li><a class="<?=($_REQUEST["page"]??"")=="register"?"active":""?>" href="?page=register">Registreerimine</a></li>
                <li><a class="<?=($_REQUEST["page"]??"")=="theory"?"active":""?>" href="?page=theory">Teooria</a></li>
                <li><a class="<?=($_REQUEST["page"]??"")=="slaalom"?"active":""?>" href="?page=slaalom">Slaalom</a></li>
                <li><a class="<?=($_REQUEST["page"]??"")=="roundabout"?"active":""?>" href="?page=roundabout">Ringtee</a></li>
                <li><a class="<?=($_REQUEST["page"]??"")=="street"?"active":""?>" href="?page=street">Tänav</a></li>
                <li><a class="<?=($_REQUEST["page"]??"")=="license"?"active":""?>" href="?page=license">Vormistamine</a></li>
            </ul>
        </nav>