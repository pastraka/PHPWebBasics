<?php
require_once "common.php";

require_once 'db/category_query.php';
var_dump(getAllCategories($db));

require_once 'templates/categories_list.php';