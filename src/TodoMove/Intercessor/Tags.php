<?php namespace TodoMove\Intercessor;

class Tags extends \SplObjectStorage
{
    public function add(Tag $tag, $data = null)
    {
        return $this->attach($tag, $data);
    }

    public function remove(Tag $tag)
    {
        return $this->detach($tag);
    }
}
