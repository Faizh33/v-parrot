<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

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
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $cars = $this->carRepository->findAll();

        $pagination = $paginator->paginate(
            $cars,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('used_car.html.twig', [
            'pagination' => $pagination,
            
        ]);
    }
}
