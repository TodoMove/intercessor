<?php namespace spec\TodoMove\Intercessor;

use TodoMove\Intercessor\Project;
use PhpSpec\ObjectBehavior;

class ProjectSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Project::class);
    }
}
