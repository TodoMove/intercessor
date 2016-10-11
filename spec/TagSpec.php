<?php namespace spec\TodoMove\Intercessor;

use TodoMove\Intercessor\Tag;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Tag::class);
    }
}
