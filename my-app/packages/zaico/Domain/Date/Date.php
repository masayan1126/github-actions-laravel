<?php

namespace Zaico\Domain\Date;

use DateTimeImmutable;
use InvalidArgumentException;

class Date
{
    private $date = null;

    public function __construct(string $date)
    {
        try {
            $this->date = new DateTimeImmutable($date);
        } catch (Exception $e) {
            throw new InvalidArgumentException('無効な日付です');
        }
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}
