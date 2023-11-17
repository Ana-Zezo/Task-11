<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();
$rootDirName = basename(dirname(__DIR__));
$urlArr = explode("/", $_SERVER["REQUEST_URI"]);
$newUrl = "";
foreach ($urlArr as $item) {
    $newUrl .= $item . "/";
    if ($item == $rootDirName)
        break;
}
define("URL", $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $newUrl);
define("PATH", $_SERVER["DOCUMENT_ROOT"] . $newUrl);

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "oop_app");