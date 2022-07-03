<?php

namespace App\Controller\FrontendAPI;

use App\Controller\BaseControllers\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends BaseController
{

    #[Route('/api/user/signup', name: 'signup', methods: ['POST'])]
    public function signup(): JsonResponse
    {

        // get parameters
        $request = Request::createFromGlobals();
        $request->getPathInfo();

        $email = $request->request->get('email');
        $firstName = $request->request->get('first_name');
        $lastName = $request->request->get('last_name');
        $plainPassword = $request->request->get('password');


        // add user to database
        try {
            $user = $this->userRepository->addUser($email, $firstName, $lastName, $plainPassword);
        } catch (\Exception $exception) {
            return $this->json([
                'error' => $exception->getMessage(),
            ]);
        }


        return $this->json([
            'message' => 'User created successfully',
            'userId' => $user->getId()
        ]);
    }


    #[Route('/api/user/sign_in', name: 'sign_in', methods: ['POST'])]
    public function sign_in(): JsonResponse
    {

        // get parameters
        $request = Request::createFromGlobals();
        $request->getPathInfo();
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        try {

            // generate a token
            $tokenValidPeriod = $this->getParameter('app.token_valid_period');
            $generatedToken = $this->tokenRepository->generateToken($email, $password, $tokenValidPeriod);

            $user = $this->userRepository->findOneBy([
                'email' => $email,
            ]);

            return $this->json([
                'message' => 'Token generated successfully',
                'userId' => $generatedToken->getUserId(),
                'userRole' => $user->getRole(),
                'token' => $generatedToken->getToken(),
                'firstName' => $user->getFirstName(),
            ]);

        } catch (\Exception $exception) {
            return $this->json([
                'error' => $exception->getMessage(),
            ]);
        }


    }


}
