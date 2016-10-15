<?php

namespace TodoMove\Intercessor;

class Repeat
{
    const HOUR = 'H';
    const DAY = 'D';
    const WEEK = 'W';
    const MONTH = 'M';
    const YEAR = 'Y';

    protected $type = self::DAY;
    protected $count = 1;

    public function type($type = null)
    {
        if (is_null($type)) {
            return $this->type;
        }

        $this->type = $type;

        return $this;
    }

    public function count($count = null)
    {
        if (is_null($count)) {
            return $this->count;
        }

        $this->count = $count;

        return $this;
    }

    public function interval() // TODO: Support multiple counts/types
    {
        $periodDefiner = ($this->type() == self::HOUR) ? 'PT' : 'P';
        $intervalSpec = "{$periodDefiner}{$this->count()}{$this->type()}";

        return new \DateInterval($intervalSpec);
    }

    public function nextDate($withDate = null)
    {
        if (is_string($withDate)) {
            $withDate = new \DateTime($withDate);
        } elseif(is_null($withDate)) {
            $withDate = new \DateTime();
        }

        $datePeriod = new \DatePeriod($withDate, $this->interval(), 1);

        foreach ($datePeriod as $date) {
        }

        return $date;
    }

    public function daily()
    {
        $this->count(1);
        $this->type(self::DAY);

        return $this;
    }

    public function weekly()
    {
        $this->count(1);
        $this->type(self::WEEK);

        return $this;
    }

    public function fortnightly()
    {
        $this->count(2);
        $this->type(self::WEEK);

        return $this;
    }

    public function biweekly()
    {
        $this->count(2);
        $this->type(self::WEEK);

        return $this;
    }

    public function monthly()
    {
        $this->count(1);
        $this->type(self::MONTH);

        return $this;
    }

    public function bimonthly()
    {
        $this->count(2);
        $this->type(self::MONTH);

        return $this;
    }

    public function yearly()
    {
        $this->count(1);
        $this->type(self::YEAR);

        return $this;
    }
}
