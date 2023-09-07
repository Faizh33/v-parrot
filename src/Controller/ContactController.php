<?php

namespace App\Controller;

use App\Entity\GarageState;
use App\Repository\GarageStateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ContactController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(): Response
    {
        $repository = $this->entityManager->getRepository(GarageState::class);
        $status = $repository->find(1)->getStatus();

        return $this->render('contact.html.twig', [
            'status' => $status,
        ]);
    }
}
