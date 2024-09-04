<?php declare(strict_types=1);

namespace StringUtils\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use StringUtils\Exceptions\EmptyStringException;
use StringUtils\StringProcessor;

#[CoversClass(StringProcessor::class)]
class StringProcessorTest extends TestCase
{
    public function test_input()
    {
        $str = 'Olá Mundo!';
        $result = StringProcessor::input($str, []);
        $this->assertEquals($str, $result);
    }

    public function test_input_empty_string()
    {
        $this->expectException(EmptyStringException::class);
        StringProcessor::input('', []);
    }

    public function test_input_operation_ptbr_replace_accented_characters()
    {
        $str = 'ÁÀÂÃ ÉÈÊẼ ÍÌÎĨ ÓÒÔÕ ÚÙÛŨ Ç áàâã éèêẽ íìîĩ óòôõ úùûũ ç';
        $str_assert = 'AAAA EEEE IIII OOOO UUUU C aaaa eeee iiii oooo uuuu c';
        $result = StringProcessor::input($str, [
            StringProcessor::PT_BR_REPLACE_ACCENTED_CHARACTERS
        ]);
        $this->assertEquals($str_assert, $result);
    }

    public function test_input_operation_style_lowercase()
    {
        $str = 'ÁÀÂÃ ÉÈÊẼ ÍÌÎĨ ÓÒÔÕ ÚÙÛŨ Ç';
        $str_assert = 'áàâã éèêẽ íìîĩ óòôõ úùûũ ç';
        $result = StringProcessor::input($str, [
            StringProcessor::STYLE_LOWERCASE
        ]);
        $this->assertEquals($str_assert, $result);
    }

    public function test_input_operation_style_uppercase()
    {
        $str = 'áàâã éèêẽ íìîĩ óòôõ úùûũ ç';
        $str_assert = 'ÁÀÂÃ ÉÈÊẼ ÍÌÎĨ ÓÒÔÕ ÚÙÛŨ Ç';
        $result = StringProcessor::input($str, [
            StringProcessor::STYLE_UPPERCASE
        ]);
        $this->assertEquals($str_assert, $result);
    }

    public function test_input_operation_style_title()
    {
        $str = 'áàâã éèêẽ íìîĩ óòôõ úùûũ ç';
        $str_assert = 'Áàâã Éèêẽ Íìîĩ Óòôõ Úùûũ Ç';
        $result = StringProcessor::input($str, [
            StringProcessor::STYLE_TITLE
        ]);
        $this->assertEquals($str_assert, $result);
    }

    public function test_input_operation_remove_special_characters()
    {
        $str = 'Wí¨lL/ìãm%  \bê$njá@..@mi,m  ! m&e(n)#ezes;?    sãm*pai|o ';
        $str_assert = 'WílLìãm  bênjámim   menezes    sãmpaio ';
        $result = StringProcessor::input($str, [
            StringProcessor::REMOVE_SPECIAL_CHARACTERS
        ]);
        $this->assertEquals($str_assert, $result);
    }

    public function test_input_operation_trim_whitespaces()
    {
        $str = 'WílLìãm  bênjámim   menezes    sãmpaio ';
        $str_assert = 'WílLìãm bênjámim menezes sãmpaio';
        $result = StringProcessor::input($str, [
            StringProcessor::TRIM_WHITESPACES
        ]);
        $this->assertEquals($str_assert, $result);
    }
}
