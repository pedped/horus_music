<?php

namespace App\Controller;

use App\Entity\Token;
use App\Entity\User;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Helpers\PasswordHelper;
use App\Helpers\StringHelper;
use App\Repository\TokenRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{

    #[Route('/', name: 'home_page', methods: ['GET'])]
    public function home_page(ManagerRegistry $doctrine)
    {
        // the template path is the relative file path from `templates/`
        return $this->render('index/home.html.twig', [

        ]);
    }


}
