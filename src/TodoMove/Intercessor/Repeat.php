<?php

namespace TodoMove\Intercessor;

class Repeat
{
    use \TodoMove\Intercessor\Traits\Identifiable;

    const HOUR = 'H';
    const DAY = 'D';
    const WEEK = 'W';
    const MONTH = 'M';
    const YEAR = 'Y';

    protected $type = self::DAY;
    protected $interval = 1;
    protected $time = [];

    public function __construct()
    {
        $this->defaultId();
    }

    /**
     * @param null $type
     *
     * @return $this|string
     */
    public function type($type = null)
    {
        if (is_null($type)) {
            return $this->type;
        }

        $this->type = $type;

        return $this;
    }

    /**
     * @param null $interval
     *
     * @return $this|int
     */
    public function interval($interval = null)
    {
        if (is_null($interval)) {
            return $this->interval;
        }

        $this->interval = $interval;

        return $this;
    }

    /**
     * @return \DateInterval
     */
    public function dateInterval()
    {
        $periodDefiner = ($this->type() == self::HOUR) ? 'PT' : 'P';
        $intervalSpec = "{$periodDefiner}{$this->interval()}{$this->type()}";

        return new \DateInterval($intervalSpec);
    }

    /**
     * @param array|null $time - must pass 'hour', 'minute' and 'second' keys to be used with \DateTime->setTime()
     *
     * @return $this
     */
    public function time(array $time = null)
    {
        if (is_null($time)) {
            return $this->time;
        }

        $validKeys = (count(array_diff(['hour', 'minute', 'second'], array_keys($time))) === 0);

        if (false === $validKeys) {
            throw new \InvalidArgumentException('Invalid arguments provided: '.implode($time));
        }

        $this->time = $time;

        return $this;
    }

    /**
     * null = now, string will be converted to a DateTime object so will need to be a valid argument to \DateTime::construct.
     *
     * @param \DateTime|string|null $withDate - Which date should we use to calculate the next occurence?
     *
     * @return mixed
     */
    public function nextDate($withDate = null)
    {
        if (is_string($withDate)) {
            $withDate = new \DateTime($withDate);
        } elseif (is_null($withDate)) {
            $withDate = new \DateTime();
        }

        if ($this->time()) {
            $withDate->setTime($this->time()['hour'], $this->time()['minute'], $this->time()['second']);
        }

        $datePeriod = new \DatePeriod($withDate, $this->dateInterval(), 1);

        foreach ($datePeriod as $date) {
        }

        return $date;
    }

    /**
     * Sets time to 6am, repeat daily.
     *
     * @return $this
     */
    public function everyMorning()
    {
        $this->time([
            'hour'   => 6,
            'minute' => 0,
            'second' => 0,
        ]);

        return $this->daily();
    }

    /**
     * Sets time to 8pm, repeat to daily.
     *
     * @return $this
     */
    public function everyNight()
    {
        $this->time([
            'hour'   => 20,
            'minute' => 0,
            'second' => 0,
        ]);

        return $this->daily();
    }

    /**
     * @return $this
     */
    public function daily()
    {
        $this->interval(1);
        $this->type(self::DAY);

        return $this;
    }

    /**
     * @return $this
     */
    public function weekly()
    {
        $this->interval(1);
        $this->type(self::WEEK);

        return $this;
    }

    /**
     * @return $this
     */
    public function fortnightly()
    {
        $this->interval(2);
        $this->type(self::WEEK);

        return $this;
    }

    /**
     * @return $this
     */
    public function biweekly()
    {
        $this->interval(2);
        $this->type(self::WEEK);

        return $this;
    }

    /**
     * @return $this
     */
    public function monthly()
    {
        $this->interval(1);
        $this->type(self::MONTH);

        return $this;
    }

    /**
     * @return $this
     */
    public function bimonthly()
    {
        $this->interval(2);
        $this->type(self::MONTH);

        return $this;
    }

    /**
     * @return $this
     */
    public function yearly()
    {
        $this->interval(1);
        $this->type(self::YEAR);

        return $this;
    }
}
