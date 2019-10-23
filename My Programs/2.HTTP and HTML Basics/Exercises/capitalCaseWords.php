<?php
$text = "";
if (isset($_GET['text'])) {
    $text = $_GET['text'];
    preg_match_all('/\b[A-Z]+\b/m', $text, $words);
    $words = $words[0];
    echo implode(", ", $words);
}
?>

<form>
    <label>
        <textarea rows="10" name="text"></textarea>
    </label>
    <br>
    <input type="submit" value="Extract">
</form>
