<?php

namespace App\Controller\FrontendAPI;

use App\Controller\BaseControllers\BaseUserController;
use App\DTO\Api\Controller\Music\MusicListItemDTO;
use App\DTO\Api\Controller\Music\MusicUploadDTO;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MusicController extends BaseUserController
{

    #[Route('/api/music/upload', name: 'upload_music', methods: ['POST'])]
    public function upload_music(): Response
    {
        // get parameters
        $request = Request::createFromGlobals();
        $request->getPathInfo();

        // get parameters
        $musicTitle = $request->request->get("music_title");
        $musicGenre = $request->request->get("music_genre");
        $musicLyrics = $request->request->get("music_lyrics");

        // get uploaded file
        $file = $request->files->get('music');

        try {
            $music = $this->musicRepository->uploadMusic($this->loggedInUser, $musicTitle, $musicGenre, $musicLyrics, $file);

        } catch (\Exception $exception) {
            return $this->json([
                'error' => $exception->getMessage(),
            ]);
        }

        $result = new MusicUploadDTO($music->getId(), $music->getFileLink());

        // send back the result
        return $this->jsonResponseFactory->create($result);

    }


    #[Route('/api/music/user_list', name: 'user_music_list', methods: ['POST'])]
    public function user_music_list(): Response
    {
        // load the music list
        $musics = $this->musicRepository->findBy(
            [
                "userId" => $this->loggedInUser->getId()
            ]
        );

        // send back a list of music to the client
        $returnList = array();
        foreach ($musics as $music) {
            $returnList[] = new MusicListItemDTO($music);
        }

        // send back the list to client
        return $this->jsonResponseFactory->create($returnList);
    }


}
