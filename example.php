<?php

use StringUtils\StringProcessor;

require_once __DIR__ . '/vendor/autoload.php';

$str = 'Wí¨lL/ìãm%  \bê$njá@..@mi,m  ! m&e(n)#ezes;?    sãm*pai|o ';

$str = StringProcessor::removeSpecialCharacters($str);
$str = StringProcessor::ptBrReplaceAccentedCharacters($str);
$str = StringProcessor::trimWhitespaces($str);
$str = StringProcessor::styleTitle($str);

echo $str;

echo '<br>';
// OR

$str = 'Wí¨lL/ìãm%  \bê$njá@..@mi,m  ! m&e(n)#ezes;?    sãm*pai|o ';

$str = StringProcessor::removeSpecialCharacters($str);
$str = StringProcessor::ptBrReplaceAccentedCharacters($str);
$str = StringProcessor::trimWhitespaces($str);
$str = StringProcessor::styleTitle($str);

$str = StringProcessor::input($str, [
    StringProcessor::REMOVE_SPECIAL_CHARACTERS,
    StringProcessor::PT_BR_REPLACE_ACCENTED_CHARACTERS,
    StringProcessor::TRIM_WHITESPACES,
    StringProcessor::STYLE_TITLE
]);

echo $str;
