<?php define("TITLE","Avaleht"); ?>
<h1>Jalgrattaeksam</h1>

<?php 
if (isset($_REQUEST["addedValue"])){
    ?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        Lisati: <?=$_REQUEST["addedValue"]?>
    </div>
<?php
}
