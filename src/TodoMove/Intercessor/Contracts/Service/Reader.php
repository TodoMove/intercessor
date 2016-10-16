<?php

namespace TodoMove\Intercessor\Contracts\Service;

interface Reader
{
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
     * @return Project[]
     */
    public function projects();

    /**
     * @param $projectId - projectId from $project->id().
     *
     * @return Project
     */
    public function project($projectId);
}
