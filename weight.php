<?php
include_once 'head.php';

?>
<form method="POST" action="process.php?conversion=weight">
    <label for="value">
        <span>Enter the quantity to convert</span>
        <input type="number" id="value" name="value" required>
    </label>

    <div class="form-group">
        <label for="unit-from">Unit to convert from</label>
        <select name="unit-from" id="unit-from">
            <option value="microgram">Microgram (ug)</option>
            <option value="miligram">Miligram (mg)</option>
            <option value="gram">Gram (g)</option>
            <option value="kilogram" selected>Kilogram (Kg)</option>
            <option value="ton">Ton (t)</option>
        </select>
    </div>

    <div class="form-group">
        <label for="unit-to"> Unit to convert to </label>
        <select name="unit-to" id="unit-to">
            <option value="microgram">Microgram (ug)</option>
            <option value="miligram">Miligram (mg)</option>
            <option value="gram" selected>Gram (g)</option>
            <option value="kilogram">Kilogram (Kg)</option>
            <option value="ton">Ton (t)</option>
        </select>
    </div>

    <button type="submit" name="submit">Convert</button>
</form>
</main>
</body>

</html>