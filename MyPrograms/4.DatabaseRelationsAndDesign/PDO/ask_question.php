<?php
require_once 'common.php';
$category = 1;
if (isset($_GET['category_id'])) {
    $categoryId = (int)$_GET['category_id'];
}

require_once 'templates/ask_question.php';