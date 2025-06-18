<?php

//$symbols = [
//    ...range(0, 9),
//    ...range('A', 'Z'),
//    ...range('a', 'z'),
//];
//
//
//
//$input_length = count($symbols);
//$random_string = '';
//for($i = 0; $i < 4; $i++) {
//    $random_character = $symbols[mt_rand(0, $input_length - 1)];
//    $random_string .= $random_character;
//}
//
//echo $random_string;


function generateShortLink(int $length = 4): string
{
    $characters = array_merge(
        range(0, 9),    // цифры
        range('A', 'Z'), // заглавные буквы
        range('a', 'z')  // строчные буквы
    );

    $shortLink = '';
    $maxIndex = count($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $shortLink .= $characters[mt_rand(0, $maxIndex)];
    }

    return $shortLink;
}

// Пример использования:
$shortLink = generateShortLink();

echo $shortLink;
