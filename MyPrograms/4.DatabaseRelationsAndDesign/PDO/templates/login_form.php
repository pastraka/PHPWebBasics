<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login form</title>
</head>
<body>
<h1>Login form</h1>
<form method="post">
    Username:<input type="text" value="<?=$username;?>" name="username"/><br/>
    Password:<input type="<?= !empty($password) ? 'text' : 'password'; ?>" value="<?=$password; ?>"
                    name="password"/><br/>
    <input type="submit" value="Submit Query"/>
</form>
<div id="response">
    <?= $response; ?>
</div>
</body>
</html>