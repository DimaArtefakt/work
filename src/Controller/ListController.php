<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\ORM\EntityManagerInterface;

class ListController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em) {

    }

    #[Route('/list', name: 'list')]
    public function show(AuthenticationUtils $authenticationUtils): Response
    {
        $user = $this->em->getRepository(User::class)->findAll();

        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('list/index.html.twig', [
            'users' => $user,'error' => $error
        ]);
    }
}
