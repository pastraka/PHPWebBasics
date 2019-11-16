<?php
$db = new mysqli('localhost', 'root', '', 'soft_uni');
$db->set_charset('utf8');

if ($db->connect_error) {
    echo $db->connect_error;
    exit;
}

$result = $db->query('SELECT' . 'EMPLOYEE_ID, FIRST_NAME, SALARY FROM employees');

while ($row = $result->fetch_assoc()){
    echo "\n----------------------------------\n";
    print_r($row);
}