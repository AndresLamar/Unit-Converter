<?php

class UnitConverter
{
    public function __construct(
        public int $value,
        public string $unitFrom,
        public string $unitTo
    ) {
        $this->value = (int) $value;
        $this->unitFrom = $unitFrom;
        $this->unitTo = $unitTo;
    }

    public function convertLength()
    {
        $lengthUnits = [
            'milimeter' => 1000,
            'centimeter' => 100,
            'decimeter' => 10,
            'meter' => 1,
            'kilometer' => 0.001,
        ];

        $representationFrom = match ($this->unitFrom) {
            'milimeter' => 'mm',
            'centimeter' => 'cm',
            'decimeter' => 'dm',
            'meter' => 'm',
            'kilometer' => 'km',
            default => ''
        };

        $representationTo = match ($this->unitTo) {
            'milimeter' => 'mm',
            'centimeter' => 'cm',
            'decimeter' => 'dm',
            'meter' => 'm',
            'kilometer' => 'km',
            default => ''
        };


        $valueInMeters = $this->value / $lengthUnits[$this->unitFrom];
        $convertedValue = $valueInMeters * $lengthUnits[$this->unitTo];

        return "{$this->value}{$representationFrom} = {$convertedValue}{$representationTo}";
    }

    public function convertWeight()
    {
        $weightUnits = [
            'microgram' => 1000000,
            'miligram' => 1000,
            'gram' => 1,
            'kilogram' => 0.001,
            'ton' => 0.000001,
        ];

        $representationFrom = match ($this->unitFrom) {
            'microgram' => 'ug',
            'miligram' => 'mg',
            'gram' => 'g',
            'kilogram' => 'kg',
            'ton' => 't',
            default => ''
        };

        $representationTo = match ($this->unitTo) {
            'microgram' => 'ug',
            'miligram' => 'mg',
            'gram' => 'g',
            'kilogram' => 'kg',
            'ton' => 't',
            default => ''
        };

        $valueInGrams = $this->value / $weightUnits[$this->unitFrom];
        $convertedValue = $valueInGrams * $weightUnits[$this->unitTo];

        return "{$this->value}{$representationFrom} = {$convertedValue}{$representationTo}";
    }

    public function convertTemperature()
    {
        if ($this->unitFrom === $this->unitTo) return "{$this->value}{$this->unitFrom} = {$this->value}{$this->unitTo}";

        $representationFrom = match ($this->unitFrom) {
            'celsius' => '°C',
            'fahrenheit' => '°F',
            'kelvin' => 'K',
            default => ''
        };

        $representationTo = match ($this->unitTo) {
            'celsius' => '°C',
            'fahrenheit' => '°F',
            'kelvin' => 'K',
            default => ''
        };

        $celsiusValue = '';
        if ($this->unitFrom === 'celsius') {
            $celsiusValue = $this->value;
        } else if ($this->unitFrom === 'fahrenheit') {
            $celsiusValue = ($this->value - 32) * 5 / 9;
        } else if ($this->unitFrom === 'kelvin') {
            $celsiusValue = $this->value - 273.15;
        }

        $convertedValue = '';
        if ($this->unitTo === 'celsius') {
            $convertedValue = $celsiusValue;
        } else if ($this->unitTo === 'fahrenheit') {
            $convertedValue = $celsiusValue * 9 / 5 + 32;
        } else if ($this->unitTo === 'kelvin') {
            $convertedValue = $celsiusValue + 273.15;
        }

        return "{$this->value}{$representationFrom} = {$convertedValue}{$representationTo}";
    }
}

?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <?php
    $converter = new UnitConverter($_POST['value'], $_POST['unit-from'], $_POST['unit-to']);

    $conversionType = isset($_GET['conversion']) ? $_GET['conversion'] : 'length';

    $result = '';

    switch ($conversionType) {
        case 'length':
            $result = $converter->convertLength();
            break;
        case 'weight':
            $result = $converter->convertWeight();
            break;
        case 'temperature':
            $result = $converter->convertTemperature();
            break;
    }

    include_once 'head.php';
    ?>
    <div class="result_container">
        <p class="result">Result of your calculation</p>

        <p class="result"><?php echo $result; ?></p>

        <a href="index.php" class="back_button">Back</a>
    </div>

<?php endif; ?>