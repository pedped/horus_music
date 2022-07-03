<?php

namespace App\Controller\AdminAPI;

use App\Controller\BaseControllers\BaseUserController;
use App\DTO\Api\Controller\Music\MusicListItemDTO;
use App\Factory\JsonResponseFactory;
use App\Repository\MusicRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MusicController extends BaseUserController
{

    #[Route('/api/admin/music/view', name: 'admin_music_view', methods: ['POST'])]
    public function view()
    {

        // get parameters
        $request = Request::createFromGlobals();
        $request->getPathInfo();

        // get parameters
        $musicId = $request->request->get("musicId");

        // load music list
        $music = $this->musicRepository->getMusic($musicId);

        // send back a music dto
        $musicsDTO = new MusicListItemDTO($music);

        return $this->jsonResponseFactory->create($musicsDTO);

    }


    #[Route('/api/admin/music/list', name: 'admin_music_list', methods: ['POST'])]
    public function user_music_list(): Response
    {
        // load the music list
        $musics = $this->musicRepository->getLatestMusic(1000);

        // send back a list of music to the client
        $returnList = array();
        foreach ($musics as $music) {
            $returnList[] = new MusicListItemDTO($music);
        }

        // send back the list to client
        return $this->jsonResponseFactory->create($returnList);
    }



    #[Route('/api/admin/music/approve_music', name: 'approve_music', methods: ['POST'])]
    public function approve_music()
    {
        // get parameters
        $request = Request::createFromGlobals();
        $request->getPathInfo();

        // get parameters
        $musicId = $request->request->get("musicId");

        // load music list
        $music = $this->musicRepository->approveMusic($musicId);

        // send back a music dto
        $musicsDTO = new MusicListItemDTO($music);

        return $this->jsonResponseFactory->create($musicsDTO);

    }


    #[Route('/api/admin/music/reject_music', name: 'reject_music', methods: ['POST'])]
    public function reject_music()
    {

        // get parameters
        $request = Request::createFromGlobals();
        $request->getPathInfo();

        // get parameters
        $musicId = $request->request->get("musicId");

        // load music list
        $music = $this->musicRepository->rejectMusic($musicId);

        // send back a music dto
        $musicsDTO = new MusicListItemDTO($music);

        return $this->jsonResponseFactory->create($musicsDTO);

    }


}
