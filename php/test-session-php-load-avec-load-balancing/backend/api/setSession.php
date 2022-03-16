<?php
include_once "./cors.php";

session_start();
$_SESSION["sessionData"] = $_GET["sessionData"];
