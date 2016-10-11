<?php namespace spec\TodoMove\Intercessor;

use TodoMove\Intercessor\Tag;
use TodoMove\Intercessor\Tags;
use TodoMove\Intercessor\Task;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TaskSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Task::class);
    }

    public function it_can_set_the_title()
    {
        $this->title('Buy lipstick')->shouldReturn($this);
    }

    public function it_can_get_the_title()
    {
        $this->title('Buy lipstick')->shouldReturn($this);
        $this->title()->shouldReturn('Buy lipstick');
    }

    public function it_can_set_the_notes()
    {
        $this->notes('Maybelline, shade "Tangerine Hairnet"')->shouldReturn($this);
    }

    public function it_can_get_the_notes()
    {
        $this->notes('Maybelline, shade "Tangerine Hairnet"')->shouldReturn($this);
        $this->notes()->shouldReturn('Maybelline, shade "Tangerine Hairnet"');
    }

    public function it_can_set_and_get_the_various_dates()
    {
        $created = new \DateTime('-1 week');
        $updated = new \DateTime('yesterday');
        $completed = new \DateTime('now');
        $defer = new \DateTime('+3 weeks');
        $due = new \DateTime('+4 weeks');

        $this->created($created)->shouldReturn($this);
        $this->updated($updated)->shouldReturn($this);
        $this->completed($completed)->shouldReturn($this);
        $this->defer($defer)->shouldReturn($this);
        $this->due($due)->shouldReturn($this);

        $this->created()->shouldReturn($created);
        $this->updated()->shouldReturn($updated);
        $this->completed()->shouldReturn($completed);
        $this->defer()->shouldReturn($defer);
        $this->due()->shouldReturn($due);
    }

    public function it_gives_null_for_completed_at_when_not_complete()
    {
        $this->completed()->shouldReturn(null);
    }

    // Tag collection
    public function it_can_have_countable_tags()
    {
        $tag3 = new Tag();
        $tagCollection = new Tags();
        $tagCollection->add(new Tag());
        $tagCollection->add(new Tag());
        $tagCollection->add($tag3);

        $this->tags($tagCollection)->shouldReturn($this);
        $this->tags()->shouldReturn($tagCollection);
        $this->tags()->shouldImplement(\Countable::class);
        $this->tags()->shouldHaveCount(3);

        // we can remove tags
        $tagCollection->remove($tag3);
        $this->tags()->shouldHaveCount(2);
    }

    public function it_gives_a_status()
    {
        $this->status()->shouldReturn(Task::STATUS_ACTIVE);
        $this->completed(new \DateTime())->status()->shouldReturn(Task::STATUS_COMPLETED);
    }

    public function it_can_set_and_get_repeat()
    {
        $this->repeat('need to create a class for this')->shouldReturn($this);
        $this->repeat()->shouldReturn('need to create a class for this');
    }

    public function it_can_be_flagged()
    {
        $this->flagged()->shouldReturn(false);
        $this->flagged(true)->shouldReturn($this);
        $this->flagged()->shouldReturn(true);
        $this->flagged(false)->shouldReturn($this);
        $this->flagged()->shouldReturn(false);
    }

    public function it_sets_created_at_on_instantiation()
    {
        $this->created()->shouldBeAnInstanceOf(\DateTime::class);
    }

    //TODO: Figure out how to test this with PHPSpec
    public function it_returns_valid_json_when_cast_to_string()
    {
        $this->__toString()->shouldBeString();
        $json = \json_decode((string) $this->getWrappedObject(), true);
//        $this->shouldBeBool(is_null($json));
//        $this->shouldEqual(JSON_ERROR_NONE, \json_last_error());
    }
}
