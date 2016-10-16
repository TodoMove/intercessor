<?php

namespace spec\TodoMove\Intercessor;

use PhpSpec\ObjectBehavior;
use TodoMove\Intercessor\TagFolder;

class TagFolderSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(TagFolder::class);
    }

    public function it_has_an_id()
    {
        $this->id()->shouldBeString();
        $this->id()->shouldMatch('/[a-z0-9]{8}\-[a-z0-9]{4}\-[a-z0-9]{4}\-[a-z0-9]{4}\-[a-z0-9]{8}/');
    }
}
