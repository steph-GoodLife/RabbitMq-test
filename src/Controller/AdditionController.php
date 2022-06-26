<?php

namespace App\Controller;

use App\Entity\Calcul;
use App\Form\CalculType;
use App\Message\AdditionNotification;
use App\Repository\CalculRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdditionController extends AbstractController
{
    #[Route('/addition', name: 'app_addition')]
    public function index(MessageBusInterface $bus, CalculRepository $result, Request $request, EntityManagerInterface $entityManager): Response
    {
        //creation et chargement du Form à la vue et persist DB
        $task = new Calcul();

        $form = $this->createForm(CalculType::class, $task);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $entityManager->persist($task);
            $entityManager->flush();

            //dd($task);

            //Envoie du message en queue
            $bus->dispatch(new AdditionNotification('test'));

            return $this->redirectToRoute('app_addition');
        }

        return $this->render('addition/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result->findAll(),
        ]);
    }

   

    
}
