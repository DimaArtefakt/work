<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\Persistence\ManagerRegistry;

class ListController extends AbstractController
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine) {
        $this->doctrine = $doctrine;
    }

    #[Route('/listid', name: 'listid')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('list/index.html.twig', [
            'controller_name' => 'ListController','error' => $error
        ]);
    }


    #[Route('/list', name: 'list')]
    public function show(AuthenticationUtils $authenticationUtils): Response
    {
        $user = $this->doctrine->getRepository(User::class)->findAll();

        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('list/index.html.twig', [
            'users' => $user,'error' => $error
        ]);


    }
}
