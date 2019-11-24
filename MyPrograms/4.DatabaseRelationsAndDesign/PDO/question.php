<?php
require_once 'common.php';
if (isset($_GET['id'])){
    header("Location: " . url("categories.php"));
    exit;
}

$id = $_GET['id'];

require_once 'db/question_queries.php';