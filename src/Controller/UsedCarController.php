<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsedCarController extends AbstractController
{
    private $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    /**
     * @Route("/used/car", name="app_used_car")
     */
    public function index(): Response
    {
        $cars = $this->carRepository->findAll();

        return $this->render('used_car.html.twig', [
            'cars' => $cars,
        ]);
    }
}
