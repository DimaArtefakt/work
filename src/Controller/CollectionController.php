<?php

namespace App\Controller;

use App\Entity\ItemCollection;
use App\Form\ItemCollectionFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CollectionController extends AbstractController
{
    #[Route('/collection', name: 'collection')]
    public function index(Request $request,EntityManagerInterface $em): Response
    {
        $collection = new ItemCollection();
        $form = $this->createForm(ItemCollectionFormType::class, $collection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($collection);
            $em->flush();
        }
        return $this->render('collection/index.html.twig', [
            'collectionForm' => $form->createView(),
        ]);
    }
}
