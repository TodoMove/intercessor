<?php namespace TodoMove\Intercessor;

class Tag
{
    protected $title;

    public function __construct($title=null)
    {
        $this->title($title);
    }

    /**
     * @param null|string $title - Pass null to get the title, pass a string to set it
     * @return $this
     */
    public function title($title=null)
    {
        if (is_null($title)) {
            return $this->title;
        }

        $this->title = $title;

        return $this;
    }
}
