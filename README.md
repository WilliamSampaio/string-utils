# String Utils

![Codecov (with branch)](https://img.shields.io/codecov/c/github/WilliamSampaio/string-utils/master?style=flat-square&logo=codecov)
![GitHub License](https://img.shields.io/github/license/WilliamSampaio/string-utils?style=flat-square)

This library provides a number of features for manipulating strings, such as removing whitespace, accented characters, and more.

## Install

```bash
composer require williamsampaio/string-utils
```

## Usage

```php
<?php

use StringUtils\StringProcessor;

require_once __DIR__ . '/vendor/autoload.php';

$str = 'Wí¨lL/ìãm%  \bê$njá@..@mi,m  ! m&e(n)#ezes;?    sãm*pai|o ';

$str = StringProcessor::removeSpecialCharacters($str);
$str = StringProcessor::ptBrReplaceAccentedCharacters($str);
$str = StringProcessor::trimWhitespaces($str);
$str = StringProcessor::styleTitle($str);

echo $str;

```

**Output:**

```bash
William Benjamim Menezes Sampaio
```

```php
<?php

use StringUtils\StringProcessor;

require_once __DIR__ . '/vendor/autoload.php';

$str = 'Wí¨lL/ìãm%  \bê$njá@..@mi,m  ! m&e(n)#ezes;?    sãm*pai|o ';

$str = StringProcessor::input($str, [
    StringProcessor::REMOVE_SPECIAL_CHARACTERS,
    StringProcessor::PT_BR_REPLACE_ACCENTED_CHARACTERS,
    StringProcessor::TRIM_WHITESPACES,
    StringProcessor::STYLE_TITLE
]);

echo $str;

```

**Output:**

```bash
William Benjamim Menezes Sampaio
```

## License

The MIT License (MIT). Please see [License File](https://raw.githubusercontent.com/WilliamSampaio/string-utils/master/LICENSE) for more information.
