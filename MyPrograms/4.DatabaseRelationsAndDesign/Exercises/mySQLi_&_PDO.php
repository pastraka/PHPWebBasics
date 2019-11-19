<?php
//$db = new mysqli('localhost', 'root', '', 'soft_uni');
//$db->set_charset('utf8');
//
//if ($db->connect_errno) die('Cannot connect to MySQL');
//$result = $db->query('SELECT EMPLOYEE_ID, FIRST_NAME, SALARY FROM employees');
//
//while ($row = $result->fetch_assoc()){
//    echo "\n----------------------------------\n";
//    print_r($row);
//}

$pdo = new PDO('mysql:dbname=softuni;host=localhost:3306', 'root', '');
?>
    <form method="post">
        Username:<label>
            <input type="text" name="username"/>
        </label><br/>
        Pass:<label>
            <input type="text" name="username"/>
        </label><br/>
        <input type="submit"/>
    </form>

<?php
if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "INSERT INTO users(username, password) values (?, ?)";

    echo $query;
    password_hash($password, PASSWORD_ARGON2I);
    $statement = $pdo->prepare($query);
    $result = $statement->execute([
        $username, $password
    ]);
};
?>