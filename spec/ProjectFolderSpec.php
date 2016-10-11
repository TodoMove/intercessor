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

    public function it_can_set_the_folder_name_on_construct()
    {
        $this->beConstructedWith('Acme Inc.');
        $this->name()->shouldReturn('Acme Inc.');
    }
}
