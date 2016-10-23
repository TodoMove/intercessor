<?php

namespace TodoMove\Intercessor;

use TodoMove\Intercessor\Traits\Metable;

class Tag
{
    use \TodoMove\Intercessor\Traits\Identifiable, Metable;

    protected $title = '';

    public function __construct($title = null)
    {
        $this->title($title);
        $this->defaultId();
    }

    /**
     * @param null|string $title - Pass null to get the title, pass a string to set it
     *
     * @return $this
     */
    public function title($title = null)
    {
        if (is_null($title)) {
            return $this->title;
        }

        $this->title = $title;

        return $this;
    }
}
