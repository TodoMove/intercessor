<?php

namespace TodoMove\Intercessor;

use TodoMove\Intercessor\Traits\Metable;

class Folder
{
    use \TodoMove\Intercessor\Traits\Identifiable, Metable;

    protected $name;

    /** @var Folder */
    protected $parent = null;

    /** @var Folder[] */
    protected $children = [];

    /** @var Project[] */
    protected $projects = [];

    public function __construct($name = null)
    {
        $this->name($name);
        $this->defaultId();
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

    public function projects(array $projects = null)
    {
        if (is_null($projects)) {
            return $this->projects;
        }

        $this->projects = $projects;

        return $this;
    }

    public function project(Project $project)
    {
        $this->projects[] = $project;

        return $this;
    }
}
