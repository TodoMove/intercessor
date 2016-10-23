<?php

namespace TodoMove\Intercessor\Service;

abstract class AbstractWriter implements \TodoMove\Intercessor\Contracts\Service\Reader
{
    protected $name = '';

    public function name($name = null)
    {
        if (is_null($name)) {
            return $this->name;
        }

        $this->name = $name;

        return $this;
    }
}
