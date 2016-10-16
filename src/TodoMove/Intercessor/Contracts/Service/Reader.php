<?php

namespace TodoMove\Intercessor\Contracts\Service;

interface Reader {
    /**
     * @return Tag[]
     */
    public function tags();

    /**
     * @param $tagID - tagId $tag->id()
     *
     * @return Tag
     */
    public function tag($tagId);

    /**
     * @return Task[]
     */
    public function tasks();

    /**
     * @param $taskId - taskId from OmniFocus's XML
     *
     * @return Task
     */
    public function task($taskId);

    /**
     * @return ProjectFolder[]
     */
    public function folders();

    /**
     * @param $folderId
     *
     * @return ProjectFolder
     */
    public function folder($folderId);

    /**
     * @return Project[]
     */
    public function projects();

    /**
     * @param $projectId
     *
     * @return Project
     */
    public function project($projectId);
}
