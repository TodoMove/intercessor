<?php namespace spec\TodoMove\Intercessor;

use TodoMove\Intercessor\Project;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProjectSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Project::class);
    }
}
