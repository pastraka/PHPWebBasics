<?php
require_once 'common.php';
if (!isset($_GET['id'])) {
    header("Location: categories.php");
    exit;
}

$id = $_GET['id'];

require_once 'db/category_queries.php';

if (isset($_GET['action'], $_GET['question_id'])) {
    $action = $_GET['action'];
    if ($action === 'like') {
        /** @var $db */
        /** @var $userId */
        like($db, $userId, $_GET['question_id']);
    } else {
        /** @var $db */
        /** @var $userId */
        removeLike($db, $userId, $_GET['question_id']);
    }
}

/** @var $db */
$questions = getQuestionsByCategoryId($db, $id);

require_once 'templates/questions_by_category.php';