<?php

namespace App\Controller;

use App\Entity\ItemCollection;
use App\Entity\Topic;
use App\Form\ItemCollectionFormType;
use App\Form\TopicFormType;
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

    #[Route('/topic', name: 'topic')]
    public function Topic(Request $request,EntityManagerInterface $em): Response
    {
        $topic = new Topic();
        $form = $this->createForm(TopicFormType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($topic);
            $em->flush();
        }
        return $this->render('collection/topic.html.twig', [
            'topicForm' => $form->createView(),
        ]);
    }
}
