<?php
require_once 'db/db_connection.php';
require_once 'db/user_queries.php';

if (!isset($_GET['authId'])) {
    header("Location: login.php");
    exit;
}

$authId = $_GET['authId'];
$userId = getUserById($db, $authId);
if ($userId == -1) {
    header("Location: login.php");
    exit;
}

function url(string $url): string
{
    $symbol = strstr($url, "?") ? '&' : '?';
    return $url . "{$symbol}authId=" . $_GET['authId'];
}