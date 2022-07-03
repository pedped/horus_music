<?php

namespace App\DTO\Api\Controller\Music;

class MusicUploadDTO
{
    public string $musicId;
    public string $musicLink;

    public function __construct($musicId, $musicLink)
    {
        $this->musicId = $musicId;
        $this->musicLink = $musicLink;
    }

    /**
     * @return string
     */
    public function getMusicId(): string
    {
        return $this->musicId;
    }

    /**
     * @param string $musicId
     */
    public function setMusicId(string $musicId): void
    {
        $this->musicId = $musicId;
    }

    /**
     * @return string
     */
    public function getMusicLink(): string
    {
        return $this->musicLink;
    }

    /**
     * @param string $musicLink
     */
    public function setMusicLink(string $musicLink): void
    {
        $this->musicLink = $musicLink;
    }

}