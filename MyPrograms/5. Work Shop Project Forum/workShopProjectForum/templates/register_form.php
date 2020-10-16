<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register form</title>
    <link rel="stylesheet" href="templates/style/styles.css"/>
</head>
<body>
<h1>Register form</h1>

Or go to <a href="login.php">Login</a>, if you have an account!
<br/>
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