<?php
/******************************************************
*******************************************************
****************** PHPHUNT SCRIPTS ********************
*************  https://www.phphunt.com   **************
**** This software is distributed free of charge. *****
******** for coding projects: utasar@icloud.com *******
*******************************************************
******************************************************/
session_start();
require_once "src/Store.php";
$dbdir = __DIR__ . "/db";
$cfg = ["auto_cache" => false,"timeout" => false];
$themesStore = new \SleekDB\Store("themes", $dbdir,$cfg);
$settingsStore = new \SleekDB\Store("settings", $dbdir,$cfg);
$productsStore = new \SleekDB\Store("products", $dbdir,$cfg);
$categoriesStore = new \SleekDB\Store("categories", $dbdir,$cfg);
$settings = $settingsStore->findById(1);
require("phpqrcode.php");
require("functions.php");
?>