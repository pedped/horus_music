<?php

namespace App\DTO\Admin;

class AdminHomePageDTO
{
    public int $musicCount;
    public int $userCount;
    public array $musicList;

    /**
     * @param int $musicCount
     * @param int $userCount
     * @param array $musicList
     */
    public function __construct(int $musicCount, int $userCount, array $musicList)
    {
        $this->musicCount = $musicCount;
        $this->userCount = $userCount;
        $this->musicList = $musicList;
    }

}