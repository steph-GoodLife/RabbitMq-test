<?php

namespace App\Controller;

use App\Entity\Calcul;
use App\Form\CalculType;
use App\Message\AdditionNotification;
use App\Repository\CalculRepository;
use App\Service\Serializer\DTOSerializer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class AdditionController extends AbstractController
{
    #[Route('/addition', name: 'app_addition')]
    public function index(DTOSerializer $serializer, MessageBusInterface $bus, CalculRepository $result, Request $request, EntityManagerInterface $entityManager): Response
    {
        //creation et chargement du Form à la vue et persist DB
        $task = $serializer->deserialize($request->getContent(), Clacul::class, 'json');

        $task->setNombre1();
        $task->setNombre2();

        $responseContent = $serializer->serialize($task, 'json');

        //return new JsonResponse($task);

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
            //appel de la requete
            //remplacer par findAll() en cas de problème pour avoir un retour le temps de debugger
            'results' => $result->additionDeuxValeurs(),
        ]);
    }

   

    
}
