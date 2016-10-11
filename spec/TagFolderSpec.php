<?php

namespace spec\TodoMove\Intercessor;

use TodoMove\Intercessor\TagFolder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagFolderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(TagFolder::class);
    }
}
