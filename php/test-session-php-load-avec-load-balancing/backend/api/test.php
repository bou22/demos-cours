<?php
include_once "../config.php";
include_once "./cors.php";

session_start();
$sessionData = $_SESSION["sessionData"];
echo "{\"session\": \"$sessionData\",\"instance\": \"$INSTANCE\"}";
