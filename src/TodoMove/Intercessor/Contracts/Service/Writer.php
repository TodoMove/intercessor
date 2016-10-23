<?php

namespace TodoMove\Intercessor\Contracts\Service;

interface Writer
{
    /**
     * @param null|string $name
     *
     * @return string|$this
     */
    public function name($name = null);

    /**
     * @param Reader $reader
     *
     * @return mixed
     */
    public function syncFrom(Reader $reader);
}
