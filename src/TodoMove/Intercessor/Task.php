<?php

namespace TodoMove\Intercessor;

use TodoMove\Intercessor\Traits\Metable;

class Task
{
    use \TodoMove\Intercessor\Traits\Identifiable, Metable;

    const ACTIVE = 'active';
    const COMPLETED = 'complete';

    protected $title = '';
    protected $notes = '';
    protected $flagged = false;

    /** Dates */

    /** @var \DateTime|null */
    protected $created_at;

    /** @var \DateTime|null */
    protected $updated_at;

    /** @var \DateTime|null */
    protected $completed_at = null;

    /** @var \DateTime|null */
    protected $deleted_at = null;

    /** @var \DateTime|null */
    protected $due_at = null;

    /** @var \DateTime|null */
    protected $defer_til = null; // When the task should start/show up.  I tried 'start_at' but defer makes more sense to my brain

    /** @var Tags */
    protected $tags;

    /** @var Project */
    protected $project;

    /** @var Repeat */
    protected $repeat;

    public function __construct($title = null)
    {
        $this->title($title);
        $this->created(new \DateTime('now', new \DateTimeZone('UTC')));
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

    /**
     * @param null|string $notes - Pass null to get the notes, pass a string to set it
     *
     * @return $this
     */
    public function notes($notes = null)
    {
        if (is_null($notes)) {
            return $this->notes;
        }

        $this->notes = $notes;

        return $this;
    }

    public function created(\DateTime $created = null)
    {
        if (is_null($created)) {
            return $this->created_at;
        }

        $this->created_at = $created;

        if (is_null($this->updated())) {
            $this->updated($created);
        }

        return $this;
    }

    public function updated(\DateTime $updated = null)
    {
        if (is_null($updated)) {
            return $this->updated_at;
        }

        $this->updated_at = $updated;

        return $this;
    }

    public function completed(\DateTime $completed = null)
    {
        if (is_null($completed)) {
            return $this->completed_at;
        }

        $this->completed_at = $completed;

        return $this;
    }

    public function deleted(\DateTime $deleted = null)
    {
        if (is_null($deleted)) {
            return $this->deleted_at;
        }

        $this->deleted_at = $deleted;

        return $this;
    }

    public function defer(\DateTime $defer = null)
    {
        if (is_null($defer)) {
            return $this->defer_til;
        }

        $this->defer_til = $defer;

        return $this;
    }

    public function due(\DateTime $due = null)
    {
        if (is_null($due)) {
            return $this->due_at;
        }

        $this->due_at = $due;

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

    /**
     * @param Repeat|null $repeat
     *
     * @return $this|Repeat
     */
    public function repeat(Repeat $repeat = null)
    {
        if (is_null($repeat)) {
            return $this->repeat;
        }

        $this->repeat = $repeat;

        return $this;
    }

    /**
     * Return's a const STATUS_COMPLETED or STATUS_ACTIVE, ignoring whether it is deleted.
     *
     * @return string
     */
    public function status()
    {
        return (!is_null($this->completed())) ? self::COMPLETED : self::ACTIVE;
    }

    public function flagged($flagged = null)
    {
        if (is_null($flagged)) {
            return $this->flagged;
        }

        $this->flagged = $flagged;

        return $this;
    }

    public function project(Project $project = null)
    {
        if (is_null($project)) {
            return $this->project;
        }

        $this->project = $project;

        return $this;
    }

    public function __toString()
    {
        return json_encode([
            'title'         => $this->title(),
            'notes'         => $this->notes(),
            'flagged'       => $this->flagged(),
            'project'       => $this->project(),
            'tags'          => $this->tags(),
            'created_at'    => $this->created(),
            'updated_at'    => $this->updated(),
            'deleted_at'    => $this->deleted(),
            'completed_at'  => $this->completed(),
            'due_at'        => $this->due(),
            'defer_til'     => $this->defer(),
            'status'        => $this->status(),
        ]);
    }
}
