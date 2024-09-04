<?php declare(strict_types=1);

namespace StringUtils;

use StringUtils\Exceptions\EmptyStringException;

final class StringProcessor
{
    const PT_BR_REPLACE_ACCENTED_CHARACTERS = 11;

    const STYLE_LOWERCASE = 21;

    const STYLE_UPPERCASE = 22;

    const STYLE_TITLE = 23;

    const REMOVE_SPECIAL_CHARACTERS = 31;

    const TRIM_WHITESPACES = 91;

    public static function input(string $str, array $operations)
    {
        if (empty($str)) {
            throw new EmptyStringException('String empty.');
        }

        return self::executeOperations($str, $operations);
    }

    public static function executeOperations(string $str, array $operations)
    {
        foreach ($operations as $operation) {
            switch ($operation) {
                case self::PT_BR_REPLACE_ACCENTED_CHARACTERS:
                    $str = self::ptBrReplaceAccentedCharacters($str);
                    break;
                case self::STYLE_LOWERCASE:
                    $str = self::styleLowercase($str);
                    break;
                case self::STYLE_UPPERCASE:
                    $str = self::styleUppercase($str);
                    break;
                case self::STYLE_TITLE:
                    $str = self::styleTitle($str);
                    break;
                case self::REMOVE_SPECIAL_CHARACTERS:
                    $str = self::removeSpecialCharacters($str);
                    break;
                case self::TRIM_WHITESPACES:
                    $str = self::trimWhitespaces($str);
                    break;
            }
        }
        return $str;
    }

    public static function ptBrReplaceAccentedCharacters(string $str)
    {
        foreach (Replacements::PT_BR as $k => $v) {
            $str = mb_ereg_replace($k, $v, $str);
        }
        return $str;
    }

    public static function styleLowercase(string $str)
    {
        return mb_strtolower($str);
    }

    public static function styleUppercase(string $str)
    {
        return mb_strtoupper($str);
    }

    public static function styleTitle(string $str)
    {
        return mb_convert_case($str, MB_CASE_TITLE);
    }

    public static function removeSpecialCharacters(string $str)
    {
        return implode(' ', array_map(fn($item) => preg_replace('/\P{L}+/u', '', $item), explode(' ', $str)));
    }

    public static function trimWhitespaces(string $str)
    {
        return implode(' ', array_filter(explode(' ', trim($str)), fn($i) => $i != ''));
    }
}
