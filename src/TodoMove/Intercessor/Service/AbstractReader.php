<?php

namespace TodoMove\Intercessor\Service;

use TodoMove\Intercessor\Project;
use TodoMove\Intercessor\ProjectFolder;
use TodoMove\Intercessor\Tag;
use TodoMove\Intercessor\Task;

abstract class AbstractReader implements \TodoMove\Intercessor\Contracts\Service\Reader
{
    private $tags = [];
    private $folders = [];
    private $projects = [];
    private $tasks = [];

    /**
     * @return Tag[]
     */
    public function tags()
    {
        return $this->tags;
    }

    /**
     * @param $contextId - contextId from OmniFocus's XML
     *
     * @return Tag
     */
    public function tag($contextId)
    {
        return $this->tags[$contextId];
    }

    /**
     * @return Task[]
     */
    public function tasks()
    {
        return $this->tasks;
    }

    /**
     * @param $taskId - taskId from OmniFocus's XML
     *
     * @return Task
     */
    public function task($taskId)
    {
        return $this->tasks[$taskId];
    }

    /**
     * @return ProjectFolder[]
     */
    public function folders()
    {
        return $this->folders;
    }

    /**
     * @param $folderId
     *
     * @return ProjectFolder
     */
    public function folder($folderId)
    {
        return $this->folders[$folderId];
    }

    /**
     * @return Project[]
     */
    public function projects()
    {
        return $this->projects;
    }

    /**
     * @param $projectId
     *
     * @return Project
     */
    public function project($projectId)
    {
        return $this->projects[$projectId];
    }
}
