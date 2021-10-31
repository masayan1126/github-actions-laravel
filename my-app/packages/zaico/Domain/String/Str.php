<?php

// 文字列ドメイン
namespace Zaico\Domain\String;

class Str
{
    // 対象の文字列
    private string $theString = '';

    public function __construct(string $theString)
    {
        $this->theString = $theString;
    }

    /**
     * Get the value of string
     */
    public function getTheString()
    {
        return $this->theString;
    }

    // 文字列を大文字から小文字に変換します
    public function toLowerMb()
    {
        return mb_strtolower($this->theString);
    }

    // 文字列を大文字から小文字に変換します
    public function toUpperMb()
    {
        return mb_strtoupper($this->theString);
    }

    // stringにotherという文字列が含まれているかの真偽値を返します
    public function isContainTheString(string $other): bool
    {
        // 該当の文字が先頭の場合は0を返すので、厳密な比較が必要
        return mb_strpos($this->theString, $other) !== false ? true : false;
    }

    // stringにotherという文字列が含まれているかの真偽値を返します(大文字小文字区別しません)
    public function isContainTheStringNoUpperLower(string $other): bool
    {
        // 該当の文字が先頭の場合は0を返すので、厳密な比較が必要
        return mb_stripos($this->theString, $other) !== false ? true : false;
    }

    // 文字列もしくは配列($this->theString)を検索値($search)で検索し、置換して返します
    public function replaceString(
        string|array $search,
        string|array $replace
    ): string|array {
        return str_replace($search, $replace, $this->theString);
    }

    // 文字列もしくは配列($this->theString)を検索値($search)で検索し、置換して返します
    public function replaceStringWithRegix(
        string|array $regex,
        string|array $replace
    ): string|array|null {
        return preg_replace($regex, $replace, $this->theString);
    }

    // 正規表現に一致する文字列を返します
    public function serachStringByRegix(string $regex): string
    {
        preg_match($regex, $this->theString, $mathes);
        return $mathes[0];
    }

    // カナを("全角かな"、"半角かな"等に)変換します
    public function changeKanaWidth(string $option)
    {
        return mb_convert_kana($this->theString, $option);
    }

    // 文字列を区切り文字列で配列に変換します
    public function stringToArray(string $delimiter): array
    {
        return explode($delimiter, $this->theString);
    }
}
