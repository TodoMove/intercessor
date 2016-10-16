<?php

namespace TodoMove\Intercessor\Traits;

use Ramsey\Uuid\Uuid;

trait Identifiable
{
    protected $id;

    /**
     * Sets the id to a uuid4.
     *
     * @return $this
     */
    public function defaultId()
    {
        $this->id(Uuid::uuid4()->toString());

        return $this;
    }

    /**
     * @param null|string $id - Pass null to get the id, pass a string to set it.
     *
     * @return $this
     */
    public function id($id = null)
    {
        if (is_null($id)) {
            return $this->id;
        }

        $this->id = $id;

        return $this;
    }
}
