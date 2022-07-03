<?php

namespace App\DTO\Api\Controller\Music;

use App\Entity\Music;

class MusicListItemDTO
{

    public int $id;
    public int $userId;
    public string $title;
    public string $genre;
    public string $lyrics;
    public string $fileLink;
    public int $status;
    public string $date;
    public string $userName;


    /**
     * @param Music $music
     */
    public function __construct(Music $music)
    {
        $this->id = $music->getId();
        $this->userId = $music->getUserId();
        $this->title = $music->getTitle();
        $this->genre = $music->getGenre();
        $this->lyrics = $music->getLyrics();
        $this->fileLink = $music->getFileLink();
        $this->status = $music->getStaus();
        $this->date = $music->getDate()->format("Y-m-d H:i:s");
        $this->userName = $music->getUser()->getFirstName() . " " . $music->getUser()->getLastName();

    }


}