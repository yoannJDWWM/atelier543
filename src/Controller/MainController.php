<?php

namespace App\Controller;

use App\Entity\Message;
use App\Repository\AboutRepository;
use App\Repository\HeaderRepository;
use App\Repository\ProjetRepository;
use App\Repository\ImpressRepository;
use App\Repository\MessageRepository;
use App\Repository\CompetenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CommentaireRepository;
use App\Repository\InformationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/', name: 'acceuil')]
    public function index(InformationRepository $infoRepository, ProjetRepository $projetsRepository, AboutRepository $aboutRepository ,HeaderRepository $headerRepository,CompetenceRepository $competenceRepository ,ImpressRepository $impressRepository, CommentaireRepository $commentaireRepository): Response
    {
        $impress = $impressRepository->findAll();
        $competence = $competenceRepository->findAll();
        $commentaire = $commentaireRepository->findAll();
        $about = $aboutRepository->findAll();
        $header = $headerRepository->findAll();
        $informations = $infoRepository->findAll();
        $projets = $projetsRepository->findAll();
        
        return $this->render('base.html.twig', [
            'impress' => $impress[0],
            'competence' => $competence[0],
            'about' => $about[0],
            'header' => $header[0],
            'commentaire' => $commentaire[0],
            'informations' => $informations,
            'projets' => $projets
        ]);

    }

    #[Route('/mail', name: 'mail')]

        function mail(ManagerRegistry $doctrine, Request $request)
        {
            // Créer une nouvelle instance de l'entité Message
            $message = new Message();
        
            // Récupérer les données du formulaire
            $formData = $request->request->all();
        
            // Assurez-vous d'avoir installé le service EntityManagerInterface
            $entityManager = $doctrine->getManager();
        
            // Remplir les propriétés de l'entité Message avec les données du formulaire
            $message->setNom($formData['name']);
            $message->setMail($formData['email']);
            $message->setSujet($formData['subject']);
            $message->settelephone($formData['phone']);
            $message->setContenu($formData['message']);
            $message->setEtat("non lu");
        
            // Enregistrer l'entité en base de données
            $entityManager->persist($message);
            $entityManager->flush();

            return new JsonResponse(['success' => true]);

        
        }

    }

    

