<?php

namespace App\Classes;

class StorageFile
{
    private string $filePath;
    private string $fileLink;

    public function __construct($filePath, $fileLink)
    {
        $this->filePath = $filePath;
        $this->fileLink = $fileLink;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @return string
     */
    public function getFileLink(): string
    {
        return $this->fileLink;
    }

}