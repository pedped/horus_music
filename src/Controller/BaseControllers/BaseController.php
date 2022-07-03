<?php

namespace App\Controller\BaseControllers;

use App\Repository\TokenRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    protected ManagerRegistry $doctrine;
    protected UserRepository $userRepository;
    protected TokenRepository $tokenRepository;

    public function __construct(ManagerRegistry $doctrine, UserRepository $userRepository , TokenRepository $tokenRepository)
    {
        $this->doctrine = $doctrine;
        $this->userRepository = $userRepository;
        $this->tokenRepository = $tokenRepository;
    }
}