<?php

namespace TodoMove\Intercessor\Contracts\Service;

use TodoMove\Intercessor\Folder;
use TodoMove\Intercessor\Project;
use TodoMove\Intercessor\Tag;
use TodoMove\Intercessor\Task;

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

    public function syncFolder(Folder $folder);

    public function syncProject(Project $project);

    public function syncTask(Task $task);

    public function syncTag(Tag $tag);
}
