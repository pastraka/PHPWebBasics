<?php
require_once 'common.php';

if (!hasRole($db, $userId, 'ADMIN')) {
    header("Location: " . url("login.php"));
    exit;
}

require_once 'templates/create_category.php';