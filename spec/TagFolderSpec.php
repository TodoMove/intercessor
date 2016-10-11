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
}
