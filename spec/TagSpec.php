<?php

namespace spec\TodoMove\Intercessor;

use PhpSpec\ObjectBehavior;
use TodoMove\Intercessor\Tag;

class TagSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Tag::class);
    }

    // we use 'title' as we could have colours or something in future
    public function it_can_set_tag_title()
    {
        $this->beConstructedWith('shopping');
        $this->title()->shouldReturn('shopping');
    }
}
