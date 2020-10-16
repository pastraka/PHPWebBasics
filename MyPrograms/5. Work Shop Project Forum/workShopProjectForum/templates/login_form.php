<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login form</title>
</head>
<body>
If you don't have an account, <a href="register.php">Register</a> first.
<br/>
<h1>Login form</h1>
<form method="post">
    Username:<input type="text" value="<?= /** @var $username */
    $username;?>" name="username"/><br/>
    Pass: <input type="<?= !empty($password) ? 'text' : 'password';?>" value="<?= /** @var $password */
    $password; ?>" name="password"/><br/>
    <input type="submit"/>
</form>
<div id="response">
    <?= /** @var $response */
    $response; ?>
</div>
</body>
</html>