<?php

namespace TodoMove\Intercessor;

class Project
{
    protected $name;
    /** @var Project */
    protected $parent = null;

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

    public function parent($parent = null)
    {
        if (is_null($parent)) {
            return $this->parent;
        }

        $this->parent = $parent;

        return $this;
    }

}
