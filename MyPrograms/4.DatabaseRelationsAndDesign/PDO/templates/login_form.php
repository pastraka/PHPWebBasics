<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login form</title>
</head>
<body>
<form method="post">
    Username:<label>
        <input type="text" name="username"/>
    </label><br/>
    Password:<label>
        <input type="password" name="password"/>
    </label><br/>
    <input type="submit" value="Submit Query"/>
</form>
<div id="response">
    <?= $response; ?>
</div>
</body>
</html>
