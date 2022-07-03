<?php

namespace App\Controller\BaseControllers;

use App\Entity\User;
use App\Factory\JsonResponseFactory;
use App\Repository\MusicRepository;
use App\Repository\TokenRepository;
use App\Repository\UserRepository;
use App\Service\StorageManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseUserController extends AbstractController
{
    protected ?User $loggedInUser;
    protected TokenRepository $tokenRepository;
    protected UserRepository $userRepository;
    protected ManagerRegistry $doctrine;
    protected StorageManager $storageManager;
    protected MusicRepository $musicRepository;
    protected JsonResponseFactory $jsonResponseFactory;

    public function __construct(TokenRepository $tokenRepository, UserRepository $userRepository , ManagerRegistry $doctrine, StorageManager $storageManager, MusicRepository $musicRepository, JsonResponseFactory $jsonResponseFactory)
    {

        $request = Request::createFromGlobals();
        $request->getPathInfo();

        // retrieves $_GET and $_POST variables respectively
        $authUserId = $request->request->get('auth_user_id');
        $authUserToken = $request->request->get('auth_user_token');

        // get model from database
        $tokenModel = $tokenRepository->findOneBy([
            "userId" => $authUserId,
            "token" => $authUserToken
        ]);

        if (!$tokenModel) {
            $result = new \stdClass();
            $result->message = 'Invalid user/token provided';
            $response = new Response(json_encode($result));
            $response->headers->set('Content-Type', 'application/json');
            echo $response;
            die();
        }

        // user has valid token, try to load the user
        $this->loggedInUser = $userRepository->findOneBy([
            "id" => $authUserId
        ]);



        // set internal repositories
        $this->tokenRepository  = $tokenRepository;
        $this->userRepository  = $userRepository;
        $this->doctrine  = $doctrine;
        $this->storageManager  = $storageManager;
        $this->musicRepository  = $musicRepository;
        $this->jsonResponseFactory  = $jsonResponseFactory;
    }
}