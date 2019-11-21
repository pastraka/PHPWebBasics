<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register form</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<h1>Register form</h1>
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
