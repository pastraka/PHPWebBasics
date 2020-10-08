<?php
require_once 'common.php';

require_once 'db/user_queries.php';

/** @var $db */
/** @var $authId */
logout($db, $authId);

header("Location: login.php");
exit;
