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

    public function it_can_parse_various_user_inputted_dates_and_times_correctly()
    {
        $dates = [
            [
                'userInput' => 'every 2 day',
                'fromDate' => '2016-10-11 10:00:00',
                'nextDate' => '2016-10-13 10:00:00',
            ],
            [
                'userInput' => 'every 2 days',
                'fromDate' => '2016-10-13 00:00:00',
                'nextDate' => '2016-10-15 00:00:00',
            ],
            [
                'userInput' => 'every week',
                'fromDate' => '2016-10-20 00:00:00',
                'nextDate' => '2016-10-27 00:00:00',
            ],
        ];

        foreach ($dates as $test) {
            $this
                ->parse($test['userInput'])
                ->withDate(new \DateTime($test['fromDate']))
                ->nextDate()->format('Y-m-d H:i:s')
                ->shouldReturn($test['nextDate']);
        }
    }
}
