<?php
include_once 'head.php';

?>

<form method="POST" action="process.php?conversion=temperature">
    <label for="value">
        <span>Enter the quantity to convert</span>
        <input type="text" id="value" name="value">
    </label>

    <div class="form-group">
        <label for="unit-from">Unit to convert from</label>
        <select name="unit-from" id="unit-from">
            <option value="celsius" selected>Celsius (°C)</option>
            <option value="fahrenheit">Fahrenheit (°F)</option>
            <option value="kelvin">Kelvin (K)</option>
        </select>
    </div>

    <div class="form-group">
        <label for="unit-to"> Unit to convert to </label>
        <select name="unit-to" id="unit-to">
            <option value="celsius">Celsius (°C)</option>
            <option value="fahrenheit" selected>Fahrenheit (°F)</option>
            <option value="kelvin">Kelvin (K)</option>
        </select>
    </div>

    <button type="submit" name="submit">Convert</button>
</form>
</main>
</body>

</html>