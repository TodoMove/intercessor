<?php

namespace spec\TodoMove\Intercessor;

use PhpSpec\ObjectBehavior;
use TodoMove\Intercessor\ProjectFolder;

class ProjectFolderSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(ProjectFolder::class);
    }
}
