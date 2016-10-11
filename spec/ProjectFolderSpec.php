<?php namespace spec\TodoMove\Intercessor;

use TodoMove\Intercessor\ProjectFolder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProjectFolderSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(ProjectFolder::class);
    }
}
