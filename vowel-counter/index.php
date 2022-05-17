<?php
declare(strict_types=1);

$request = $_POST;

$allVowels = ['a', 'e', 'i', 'o', 'u'];
$inputText = $request['vowel-input'];
$arrayOfInput = str_split($inputText);

$vowelCounter = 0;

foreach($arrayOfInput as $char) {
    foreach($allVowels as $vowel) {
        if($char === $vowel) {
            $vowelCounter++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Vowel Counter</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<div class="container">
    <form class="form" method="POST">
        <h2 class="h2">Vowel Counter</h2>
        <input type="text" class="vowel-input" name="vowel-input">
        <button class="calculate" type="submit">Calculate</button>
        <span class="output">Number of vowels in given word (<?= $inputText; ?>) is: <? echo $vowelCounter; ?></span>
    </form>
</div>

</body>

</html>