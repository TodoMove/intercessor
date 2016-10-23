<?php

namespace TodoMove\Intercessor\Contracts\Service;

use TodoMove\Intercessor\Folder;
use TodoMove\Intercessor\Project;
use TodoMove\Intercessor\Tag;
use TodoMove\Intercessor\Task;

interface Reader
{
    /**
     * @param null|string $name
     * @return string|$this
     */
    public function name($name = null);

    /**
     * @return Tag[]
     */
    public function tags();

    /**
     * @param $tagID - tagId from $tag->id().
     *
     * @return Tag
     */
    public function tag($tagId);

    /**
     * @param Tag $tag
     *
     * @return $this
     */
    public function addTag(Tag $tag);

    /**
     * @return Task[]
     */
    public function tasks();

    /**
     * @param $taskId - taskId from $task->id().
     *
     * @return Task
     */
    public function task($taskId);

    /**
     * @param Task $task
     *
     * @return $this
     */
    public function addTask(Task $task);

    /**
     * @return ProjectFolder[]
     */
    public function folders();

    /**
     * @param $folderId - folderId from $folder->id().
     *
     * @return ProjectFolder
     */
    public function folder($folderId);

    /**
     * @param Folders $folder
     *
     * @return $this
     */
    public function addFolder(Folder $folder);

    /**
     * @return Project[]
     */
    public function projects();

    /**
     * @param $projectId - projectId from $project->id().
     *
     * @return Project
     */
    public function project($projectId);

    /**
     * @param Project $project
     *
     * @return $this
     */
    public function addProject(Project $project);
}
