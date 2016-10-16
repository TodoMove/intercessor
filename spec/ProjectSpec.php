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

    public function it_can_set_the_project_name_on_construct()
    {
        $this->beConstructedWith('Acme Inc.');
        $this->name()->shouldReturn('Acme Inc.');
    }


    public function it_has_an_id()
    {
        $this->id()->shouldBeString();
        $this->id()->shouldMatch('/[a-z0-9]{8}\-[a-z0-9]{4}\-[a-z0-9]{4}\-[a-z0-9]{4}\-[a-z0-9]{8}/');
    }
}
