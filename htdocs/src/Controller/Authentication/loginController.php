<?php

namespace App\Controller\Authentication;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class loginController extends AbstractController
{
    #[Route('/login', name: 'app_authentication_login')]
    public function index(): Response
    {
        return $this->render('authentication/login/index.html.twig', [
            'controller_name' => 'loginController',
        ]);
    }
    #[Route('/logout', name: 'app_authentication_logout')]
    public function logout()
    {

    }
}
