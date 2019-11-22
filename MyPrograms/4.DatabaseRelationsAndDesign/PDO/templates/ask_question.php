<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Questions</title>
</head>
<body>
<form method="post">
    Title <input type="text" name="title"><br/>
    Question:<br/>
    <textarea rows="5" cols="30" name="body"></textarea><br/>
    Category:
    <select name="category">
        <?php foreach ($categories as $category): ?>
            <option <?=$category['id'] == $categoryId ? 'selected' : '';?>value="<?= $category['id']; ?>"><?=
            $category['name'];
            ?> (<?=$category['questions_count'];?>)</option>
        <?php endforeach; ?>
    </select>
    <br/><br/>
    Tags:<br/>
    <select multiple="multiple" name="existing_tags">
        <option value="1">Test tags</option>
    </select>
    <br/><br/>
    Add tags:<br/><input type="text" name="new_tags" placeholder="Enter your tags separated by comma... "/>
    <br/><br/>
    <input type="submit" value="Ask!"/>
</form>
</body>
</html>