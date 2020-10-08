<form>
    <div></div>
    <label>
        <input type="text" placeholder="First name" name="personName"/>
    </label>
    <div></div>
    <label>
        <input type="text" placeholder="Last name" name="lastName"/>
    </label>
    <div></div>
    <label>
        <input type="number" placeholder="Age" name="age"/>
    </label>
    <div></div>
    <label>
        <select name="townId">
            <option disabled selected value="">Select Town!</option>
            <option value="10">Sofia</option>
            <option value="20">Varna</option>
            <option value="30">Plodvid</option>
        </select>
    </label>
    <div><button type="submit">Submit</div>
</form>

<?php
var_dump($_GET);
?>