<?php

namespace TodoMove\Intercessor;

class Repeat
{
    protected $userInput;
    protected $dateInterval;
    protected $withDate;

    public function parse($userInput)
    {
        $userInput = str_replace('every ', '', $userInput);
        $this->userInput = $userInput;
        $this->dateInterval = \DateInterval::createFromDateString($userInput);

        return $this;
    }

    public function withDate(\DateTime $withDate)
    {
        $this->withDate = $withDate;

        return $this;
    }

    public function nextDate()
    {
        $datePeriod = new \DatePeriod($this->withDate, $this->dateInterval, 1);

        foreach ($datePeriod as $date) {
        }

        return $date;
    }
}
