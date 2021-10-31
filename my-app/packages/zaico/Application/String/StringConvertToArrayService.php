<?php

namespace Zaico\Application\String;

use Zaico\Domain\String\Str;

class StringConvertToArrayService
{
    private ?Str $str = null;

    public function __construct(Str $str)
    {
        $this->str = $str;
    }

    public function exec(string $delimiter): array
    {
        return explode($delimiter, $this->str->getTheString());
    }
}
