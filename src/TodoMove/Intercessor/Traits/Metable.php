<?php

namespace TodoMove\Intercessor\Traits;

trait Metable
{
    protected $meta = [];

    public function meta($key, $value = null)
    {
        if (empty($key)) {
            throw new \LogicException('Must pass key');
        }

        if (!is_string($key) && !is_int($key)) {
            throw new \LogicException('Key must be an int or string');
        }

        if (is_null($value)) { // This does mean you can't store any metadata with the value of null, but "it's a sacrifice I'm willing to make" (Lord Farquaad, Shrek)
            return (array_key_exists($key, $this->meta)) ? $this->meta[$key] : null;
        }

        $this->meta[$key] = $value;

        return $this;
    }
}
