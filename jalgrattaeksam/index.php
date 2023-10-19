<?php
require($_SERVER['DOCUMENT_ROOT']."/../config.php");

global $yhendus;

require("functions.php");

include("header.php");

if(isset($_REQUEST["page"])){
    include($_REQUEST["page"].".php");
} else {
    include("default.php");
}

include("footer.php");