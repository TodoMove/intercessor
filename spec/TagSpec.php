<?php

namespace spec\TodoMove\Intercessor;

use PhpSpec\ObjectBehavior;
use TodoMove\Intercessor\Tag;

class TagSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('shopping');
    }
    public function it_is_initializable()
    {
        $this->shouldHaveType(Tag::class);
    }

    // we use 'title' as we could have colours or something in future
    public function it_can_set_tag_title()
    {
        $this->title()->shouldReturn('shopping');
    }

    public function it_has_an_id()
    {
        $this->id()->shouldBeString();
        $this->id()->shouldMatch('/[a-z0-9]{8}\-[a-z0-9]{4}\-[a-z0-9]{4}\-[a-z0-9]{4}\-[a-z0-9]{8}/');
    }
}
