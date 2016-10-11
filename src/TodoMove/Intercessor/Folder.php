<?php

namespace TodoMove\Intercessor;

class Folder
{
    protected $name;

    /** @var Folder */
    protected $parent = null;

    /** @var Folder[] */
    protected $children = [];

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

    public function parent(Folder $parent = null)
    {
        if (is_null($parent)) {
            return $this->parent;
        }

        $this->parent = $parent;

        return $this;
    }

    public function children(array $children = null)
    {
        if (is_null($children)) {
            return $this->children;
        }

        $this->children = $children;

        return $this;
    }

    public function child(Folder $child)
    {
        $this->children[] = $child;

        return $this;
    }
}
