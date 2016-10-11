<?php

namespace spec\TodoMove\Intercessor;

use PhpSpec\ObjectBehavior;
use TodoMove\Intercessor\TagFolder;

class TagFolderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(TagFolder::class);
    }
}
