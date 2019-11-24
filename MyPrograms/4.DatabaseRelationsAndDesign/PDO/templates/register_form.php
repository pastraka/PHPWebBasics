<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register form</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<h1>Register form</h1>
Or go to <a href="login.php">login</a>, if you have an account.
<form method="post">
    Username:<input type="text" value="<?=$username;?>" name="username"/><br/>
    Password:<input type="<?= !empty($password) ? 'text' : 'password'; ?>" value="<?=$password; ?>" name="password"/><br/>
    <input type="submit"/>
</form>
<div id="response">
    <?= $response; ?>
</div>
</body>
</html>
