<?php

namespace App\Controller\AdminAPI;

use App\Controller\BaseControllers\BaseUserController;
use App\DTO\Admin\AdminHomePageDTO;
use App\DTO\Api\Controller\Music\MusicListItemDTO;
use App\Factory\JsonResponseFactory;
use App\Repository\MusicRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends BaseUserController
{

    #[Route('/api/admin/index/index', name: 'admin_index_index', methods: ['POST'])]
    public function index()
    {
        // load music list
        $musicLists = $this->musicRepository->getLatestMusic(10);
        // send back a list of music to the client
        $musics = array();
        foreach ($musicLists as $music) {
            $musics[] = new MusicListItemDTO($music);
        }

        $data = new AdminHomePageDTO($this->musicRepository->count([]), $this->userRepository->count([]), $musics);
        return $this->jsonResponseFactory->create($data);
    }


}
