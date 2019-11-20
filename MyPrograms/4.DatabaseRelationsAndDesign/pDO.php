<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=softuni', 'root', '');
    $result = $db->query('SELECT * FROM softuni.users', PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        print_r($row);
    }
    $result = null;
    $db = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
}
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