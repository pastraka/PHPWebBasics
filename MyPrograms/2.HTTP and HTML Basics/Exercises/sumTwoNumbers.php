<form>
    <div>First Number:</div>
    <label>
        <input type="number" name="num1"/>
    </label>
    <div>Second Number:</div>
    <label>
        <input type="number" name="num2"/>
    </label>
    <div><input type="submit"/></div>
</form>

<?php
if (isset($_GET['num1']) && isset($_GET['num2'])) {
    $n1 = $_GET['num1'];
    $n2 = $_GET['num2'];
    $result = $n1 + $n2;
    echo "$n1 + $n2 = $result";
}