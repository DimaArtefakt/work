<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $user = new User();
        $error = $authenticationUtils->getLastAuthenticationError();
        $form = $this->createForm(EditUserType::class, $user);

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
}
