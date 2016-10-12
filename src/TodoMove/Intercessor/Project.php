<?php

namespace TodoMove\Intercessor;

class Project
{
    const ACTIVE    = 'active';
    const INACTIVE  = 'inactive';
    const DROPPED   = 'dropped';
    const COMPLETED = 'complete';

    protected $name;
    protected $status;

    /** @var Task[] */
    protected $tasks = [];

    /** @var Tags */
    protected $tags;

    public function __construct($name = null)
    {
        $this->name($name);
    }

    public function name($name = null)
    {
        if (is_null($name)) {
            return $this->name;
        }

        $this->name = $name;

        return $this;
    }

    public function tasks(array $tasks = null)
    {
        if (is_null($tasks)) {
            return $this->tasks;
        }

        $this->tasks = $tasks;

        return $this;
    }

    public function task(Task $task)
    {
        $this->tasks[] = $task;

        return $this;
    }

    /**
     * This needs a tag collection.
     *
     * @param Tags|null $tags - pass to set, don't pass to get
     *
     * @return $this|Tags
     */
    public function tags(Tags $tags = null)
    {
        if (is_null($tags)) {
            return $this->tags;
        }

        $this->tags = $tags;

        return $this;
    }

    public function status($status = null)
    {
        if (is_null($status)) {
            return $this->status;
        }

        $this->status = $status;

        return $this;
    }

}
