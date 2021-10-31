<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use Zaico\Domain\String\Str;

class StrTest extends TestCase
{
    /**
     * @test
     */
    public function ある文字列に特定の文字列が含まれているかチェックできる_含まれている場合()
    {
        $str = new Str('豊臣秀吉');
        $result = $str->isContainTheString('秀');
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function ある文字列に特定の文字列が含まれているかチェックできる_含まれていない場合()
    {
        $str = new Str('豊臣秀吉');
        $result = $str->isContainTheString('徳川');
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function ある文字列に特定の文字列が含まれているかチェックできる_含まれている場合_アルファベット()
    {
        $str = new Str('BIOHAZARD');
        $result = $str->isContainTheString('AZ');
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function ある文字列に特定の文字列が含まれているかチェックできる_含まれている場合_アルファベット_大文字小文字区別する()
    {
        $str = new Str('BIOHAZARD');
        $result = $str->isContainTheString('b');
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function ある文字列に特定の文字列が含まれているかチェックできる_含まれている場合_アルファベット_大文字小文字区別しない()
    {
        $str = new Str('BIOHAZARD');
        $result = $str->isContainTheStringNoUpperLower('bi');
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function ある文字列に特定の文字列が含まれているかチェックできる_マルチバイト_全角可()
    {
        $str = new Str('ローストビーフ');
        $result = $str->isContainTheString('ビーフ');
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function 文字列もしくは配列を検索値で検索し、置換して返します_文字列()
    {
        $mixed = 'c*o*m*p*o*s*e*r';
        $str = new Str($mixed);
        $search = '*';
        $expect = 'composer';
        $replace = '';
        $result = $str->replaceString($search, $replace, $mixed);
        $this->assertEquals($expect, $result);
    }

    /**
     * @test
     */
    public function 文字列もしくは配列を検索値で検索し、置換して返します_配列()
    {
        $mixed = 'n★p#m&';
        $str = new Str($mixed);
        $search = ['★', '#', '&'];
        $expect = 'nphm';
        $replace = ['', 'h', ''];
        $result = $str->replaceString($search, $replace, $mixed);
        $this->assertEquals($expect, $result);
    }

    /**
     * @test
     */
    public function 文字列もしくは配列を正規表現で置換して返します_文字列()
    {
        $mixed = 'fjeife00000leefe777#m&';
        $str = new Str($mixed);
        $regex = '/[^0]+[7]{3}/';
        $replace = '';
        $expect = 'fjeife00000#m&';
        $result = $str->replaceStringWithRegix($regex, $replace);
        $this->assertEquals($expect, $result);
    }

    /**
     * @test
     */
    public function 正規表現に一致する文字列を取得できること()
    {
        $mixed = 'Laravel(PHP)';
        $str = new Str($mixed);
        $regex = '/(?<=\().+?(?=\))/';
        $expect = 'PHP';
        $result = $str->serachStringByRegix($regex);
        $this->assertEquals($expect, $result);
    }

    /**
     * @test
     */
    public function アルファベットをすべて小文字に変換できること_マルチバイト対応()
    {
        $string = 'AIUEO';
        $str = new Str($string);
        $expect = 'aiueo';
        $result = $str->toLowerMb();
        $this->assertEquals($expect, $result);
    }

    /**
     * @test
     */
    public function アルファベットをすべて大文字に変換できること_マルチバイト対応()
    {
        $string = 'aiueo';
        $str = new Str($string);
        $expect = 'AIUEO';
        $result = $str->toUpperMb();
        $this->assertEquals($expect, $result);
    }

    /**
     * @test
     */
    public function 全角カタカナ・英数字を半角カタカナ・英数字に変換できること()
    {
        $string = 'ＡＢＣＤＥａｂｃｄｅｆｇｈｉｊ０１２３４ァアィイ';
        $str = new Str($string);
        $option = 'kna';
        $expect = 'ABCDEabcdefghij01234ｧｱｨｲ';
        $result = $str->changeKanaWidth($option);
        $this->assertEquals($expect, $result);
    }

    /**
     * @test
     */
    public function カンマ区切りで文字列を配列に変換できること()
    {
        $string = 'PHP,Ruby,Java,Python';
        $str = new Str($string);
        $option = ',';
        $expect = ['PHP', 'Ruby', 'Java', 'Python'];
        $result = $str->stringToArray($option);
        $this->assertEquals($expect, $result);
    }
}
