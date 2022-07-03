<?php

namespace App\Service;

use App\Classes\StorageFile;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\KernelInterface;

class StorageManager
{


    /**
     * the path where the files should be uploaded to
     * @var string
     */
    private string $uploadPath;

    /**
     * this item will be used to generate random string
     * @var StringManager
     */
    private StringManager $stringManager;

    /**
     * base link of the uploaded file
     * @var string
     */
    private string $uploadBaseLink;

    public function __construct(ParameterBagInterface $parameterBag, StringManager $stringManager, KernelInterface $appKernel)
    {
        $this->uploadPath = $appKernel->getProjectDir() . $parameterBag->get('app.music_upload_folder');
        $this->uploadBaseLink = $parameterBag->get('app.domain_name') . "music/";
        $this->stringManager = $stringManager;

    }

    /**
     * upload a file to storage and send back the link
     * @param UploadedFile $file
     * @return StorageFile
     */
    public function uploadFile(UploadedFile $file): StorageFile
    {
        // it is better to make random directors, but as this project is simple, we skip that
        // generate a random name for this file
        $name = $this->stringManager->generateRandomString(36) . "." . $file->getClientOriginalExtension();
        $file->move($this->uploadPath, $name);

        // send back the storage file info
        return new StorageFile($this->uploadPath . $name, $this->uploadBaseLink . $name);
    }
}