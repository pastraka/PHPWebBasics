<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Question</title>
</head>
<body>
<div class="question">
    <span>
        Title:
        <?= htmlspecialchars($question['title']); ?>
    </span>
    <br/>
    <span>
        <?= htmlspecialchars($question['body']); ?>
    </span>
    <br/>
    <br/>
    Asked by:
    <span><?= htmlspecialchars($question['author_name']); ?></span>
    <span><?= $question['created_on']; ?></span>
    <span><?= $question['category_name']; ?></span>
</div>
<hr/>
<?php foreach ($answers as $answer): ?>
    <hr/>
    <div><?= htmlspecialchars($answer['author_name']); ?></div>
    <div><?= htmlspecialchars($answer['body']); ?></div>
<?php endforeach; ?>
Your answer here:
<form method="post"><textarea name="body"></textarea></form>
<input type="submit" value="Answer" name="Answer"/>
</body>
</html>