<?php
include_once 'head.php';
?>

<form method="POST" action="process.php?conversion=length">
    <label for="value">
        <span>Enter the quantity to convert</span>
        <input type="text" id="value" name="value">
    </label>

    <div class="form-group">
        <label for="unit-from">Unit to convert from</label>
        <select name="unit-from" id="unit-from">
            <option value="milimeter">Milimeter (mm)</option>
            <option value="centimeter">Centimeter (cm)</option>
            <option value="decimeter">Decimeter (dm)</option>
            <option value="meter" selected>Meter (m)</option>
            <option value="kilometer">Kilometer (km)</option>
        </select>
    </div>

    <div class="form-group">
        <label for="unit-to"> Unit to convert to </label>
        <select name="unit-to" id="unit-to">
            <option value="milimeter">Milimeter (mm)</option>
            <option value="centimeter" selected>Centimeter (cm)</option>
            <option value="decimeter">Decimeter (dm)</option>
            <option value="meter">Meter (m)</option>
            <option value="kilometer">Kilometer (km)</option>
        </select>
    </div>

    <button type="submit" name="submit">Convert</button>
</form>

</main>
</body>

</html>