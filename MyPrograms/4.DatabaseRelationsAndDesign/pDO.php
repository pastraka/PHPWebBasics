<?php
$db = new PDO('mysql:host=localhost;dbname=php_web_test', 'root', '');
?>

    <form method="post">
        Username:<label>
            <input type="text" name="username"/>
        </label><br/>
        Password:<label>
            <input type="text" name="password"/>
        </label><br/>
        <input type="submit" value="Submit Query"/>
    </form>

<?php
if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    echo $query;
    password_hash($password, PASSWORD_ARGON2I);
    $statement = $db->prepare($query);
    $result = $statement->execute([$username, password_hash($password, PASSWORD_ARGON2I)]);
//    if ($result) {
//        header("Location: login.php");
//        exit;
//    } else {
//        echo "Error!";
//    }
}
?>