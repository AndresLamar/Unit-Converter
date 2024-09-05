<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <title>Unit Converter</title>
    <script src="./public/assets/js/script.js" defer></script>
</head>

<body>
    <main>
        <h1>Unit Converter</h1>

        <?php
        $convertion = isset($_GET['conversion']) ? $_GET['conversion'] : 'length';

        function isActive($currentPage, $page)
        {
            return $currentPage === $page ? 'active' : '';
        }
        ?>

        <nav>
            <a href="length.php?conversion=length" class="<?php echo isActive('length', $convertion); ?>">Length</a>
            <a href="weight.php?conversion=weight" class="<?php echo isActive('weight', $convertion); ?>">Weight</a>
            <a href="temperature.php?conversion=temperature" class="<?php echo isActive('temperature', $convertion); ?>">Temperature</a>
        </nav>