<?php
if (isset($_GET['input'])) {
    $text = $_GET['input'];
    for ($i = 0; $i < strlen($text); $i++) {
        if ($text[$i] != " ") {
            if (ord($text[$i]) % 2 == 0) {
                $output = 'red';
            } else {
                $output = 'blue';
            }
            ?>
            <span style="color: <?php echo $output ?>">
    <?php echo $text[$i]; ?>
</span>
            <?php
        }
    }
} else {
    ?>
    <form>
        <label>
            <textarea name="input"></textarea>
        </label>
        <input type="submit" name="Submit" value="Color Text">
    </form>
    <?php
}
?>