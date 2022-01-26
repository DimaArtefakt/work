<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HpmePageController extends AbstractController
{
    #[Route('/', name: 'hоme_page')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('hpme_page/index.html.twig', [
            'controller_name' => 'HоmePageController','error' => $error
        ]);
    }
}
