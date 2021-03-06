<?php

namespace spec\TodoMove\Intercessor;

use PhpSpec\ObjectBehavior;
use TodoMove\Intercessor\Tag;
use TodoMove\Intercessor\Tags;

class TagsSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Tags::class);
    }

    public function it_can_be_counted()
    {
        $this->count()->shouldReturn(0);

        $this->add(new Tag());

        $this->count()->shouldReturn(1);
    }
}
