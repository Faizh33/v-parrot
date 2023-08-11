<?php

namespace App\Controller;

use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class UsedCarDescriptionController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/voitures-occasion/{id}", name="app_used_car_description")
     */
    public function index($id): Response
    {
        $carRepository = $this->entityManager->getRepository(Car::class);
        $car = $carRepository->find($id);

        return $this->render('used_car_description.html.twig', [
            'car' => $car,
        ]);
    }
}
