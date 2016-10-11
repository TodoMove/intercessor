<?php

namespace spec\TodoMove\Intercessor;

use PhpSpec\ObjectBehavior;
use TodoMove\Intercessor\Project;

class ProjectSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Project::class);
    }
}
