<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Questions</title>
</head>
<body>
<a href="<?=url("categories.php?") ;?>">Back to questions all categories</a>
|
<a href="<?= url("ask_question.php?category_id=$id"); ?>">Ask new question</a>
<hr/>
<?php foreach ($questions as $question): ?>
    <hr/>

    <div class="question">
    <span>
        <a href="<?= url("question.php?id={$question['id']}"); ?>">
        <?= htmlspecialchars($question['title']); ?>
        </a>
    </span>
        <span><?= ($question['answers_count']); ?></span>
        <br/>
        <span><?= htmlspecialchars($question['author_name']); ?></span>
        <span><?= $question['created_on']; ?></span>
        <span><?= $question['category_name']; ?></span>
    </div>
<?php endforeach; ?>
</body>
</html>