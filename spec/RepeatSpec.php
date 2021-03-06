<?php

namespace spec\TodoMove\Intercessor;

use PhpSpec\ObjectBehavior;
use TodoMove\Intercessor\Repeat;

class RepeatSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Repeat::class);
    }

    public function its_default_interval_is_one_day()
    {
        $this->nextDate(new \DateTime('2016-10-15 12:13:14'))
            ->format('Y-m-d H:i:s')
            ->shouldReturn('2016-10-16 12:13:14');
    }

    public function it_can_set_and_get_type()
    {
        $this->type(Repeat::HOUR)->type()
            ->shouldReturn(Repeat::HOUR);

        $this->type(Repeat::DAY)->type()
            ->shouldReturn(Repeat::DAY);

        $this->type(Repeat::WEEK)->type()
            ->shouldReturn(Repeat::WEEK);

        $this->type(Repeat::MONTH)->type()
            ->shouldReturn(Repeat::MONTH);

        $this->type(Repeat::YEAR)->type()
            ->shouldReturn(Repeat::YEAR);
    }

    public function it_can_set_and_get_count()
    {
        $this->interval(0)->interval()
            ->shouldReturn(0);

        $this->interval(128000)->interval()
            ->shouldReturn(128000);
    }

    public function its_interval_is_correct_when_setting_recurrence_to_1_day()
    {
        $this
            ->interval(1)
            ->type(Repeat::DAY)
            ->nextDate(new \DateTime('2016-12-12 10:10:10'))
            ->format('Y-m-d H:i:s')
            ->shouldReturn('2016-12-13 10:10:10');
    }

    public function its_interval_is_correct_when_setting_recurrence_to_300_days()
    {
        $this
            ->interval(300)
            ->type(Repeat::DAY)
            ->nextDate(new \DateTime('2017-01-01 14:15:17'))
            ->format('Y-m-d H:i:s')
            ->shouldReturn('2017-10-28 14:15:17');
    }

    public function its_interval_is_correct_when_setting_recurrence_to_300_days_on_a_leap_year()
    {
        $this
            ->interval(300)
            ->type(Repeat::DAY)
            ->nextDate(new \DateTime('2016-01-01 14:15:17'))
            ->format('Y-m-d H:i:s')
            ->shouldReturn('2016-10-27 14:15:17');
    }

    public function its_interval_is_correct_when_setting_recurrence_to_1_year()
    {
        $this
            ->interval(1)
            ->type(Repeat::YEAR)
            ->nextDate(new \DateTime('2016-12-12 10:10:10'))
            ->format('Y-m-d H:i:s')
            ->shouldReturn('2017-12-12 10:10:10');
    }

    public function its_interval_is_correct_when_setting_recurrence_to_1_month()
    {
        $this
            ->interval(1)
            ->type(Repeat::MONTH)
            ->nextDate(new \DateTime('2016-12-12 10:10:10'))
            ->format('Y-m-d H:i:s')
            ->shouldReturn('2017-01-12 10:10:10');
    }

    public function its_interval_is_correct_when_setting_recurrence_to_1_week()
    {
        $this
            ->interval(1)
            ->type(Repeat::WEEK)
            ->nextDate(new \DateTime('2016-12-12 10:10:10'))
            ->format('Y-m-d H:i:s')
            ->shouldReturn('2016-12-19 10:10:10');
    }

    public function its_interval_is_correct_when_setting_recurrence_to_1_hour()
    {
        $this
            ->interval(1)
            ->type(Repeat::HOUR)
            ->nextDate(new \DateTime('2016-12-12 10:10:10'))
            ->format('Y-m-d H:i:s')
            ->shouldReturn('2016-12-12 11:10:10');
    }

    public function it_sets_the_right_count_and_type_when_using_convenience_methods()
    {
        $this->daily()->interval()->shouldReturn(1);
        $this->daily()->type()->shouldReturn(Repeat::DAY);

        $this->everyMorning()->interval()->shouldReturn(1);
        $this->everyMorning()->type()->shouldReturn(Repeat::DAY);

        $this->everyMorning()
            ->nextDate(new \DateTime('2016-12-12 10:10:10'))
            ->format('Y-m-d H:i:s')
            ->shouldReturn('2016-12-13 06:00:00'); // It should overwrite the time to 6am, since it's morning time

        $this->everyNight()->interval()->shouldReturn(1);
        $this->everyNight()->type()->shouldReturn(Repeat::DAY);

        $this->everyNight()
            ->nextDate(new \DateTime('2016-12-12 10:10:10'))
            ->format('Y-m-d H:i:s')
            ->shouldReturn('2016-12-13 20:00:00'); // It should overwrite the time to 8pm, since it's evening time

        $this->weekly()->interval()->shouldReturn(1);
        $this->weekly()->type()->shouldReturn(Repeat::WEEK);

        $this->fortnightly()->interval()->shouldReturn(2);
        $this->fortnightly()->type()->shouldReturn(Repeat::WEEK);

        $this->biweekly()->interval()->shouldReturn(2);
        $this->biweekly()->type()->shouldReturn(Repeat::WEEK);

        $this->monthly()->interval()->shouldReturn(1);
        $this->monthly()->type()->shouldReturn(Repeat::MONTH);

        $this->bimonthly()->interval()->shouldReturn(2);
        $this->bimonthly()->type()->shouldReturn(Repeat::MONTH);

        $this->yearly()->interval()->shouldReturn(1);
        $this->yearly()->type()->shouldReturn(Repeat::YEAR);
    }

    public function it_accepts_a_valid_string_for_next_date_argument()
    {
        $this->daily()->nextDate('2016-03-01')->format('Y-m-d')->shouldReturn('2016-03-02');
    }

    // This isn't ideal - but we can't _not_ repeat and miss a month?
    // This means we won't be able to say 'last day of the month', though people shouldn't ask to repeat on the 31st
    // But this limits us to 1 - 28th monthly repeats without modifying the day
    public function it_is_a_day_out_when_adding_a_month_where_the_day_doesnt_exist_in_that_month()
    {
        $this->monthly()
            ->nextDate('2016-10-31')->format('Y-m-d')
            ->shouldReturn('2016-12-01');
    }

    public function it_has_an_id()
    {
        $this->id()->shouldBeString();
        $this->id()->shouldMatch('/[a-z0-9]{8}\-[a-z0-9]{4}\-[a-z0-9]{4}\-[a-z0-9]{4}\-[a-z0-9]{8}/');
    }
}
