<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class UsedCarController extends AbstractController
{
    private $carRepository;
    private $entityManager;

    public function __construct(CarRepository $carRepository, EntityManagerInterface $entityManager)
    {
        $this->carRepository = $carRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/used-car", name="app_used_car")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cars = $this->carRepository->findAll();

        $repository = $entityManager->getRepository(Car::class);
        $minPrice = $repository->createQueryBuilder('c')
            ->select('MIN(c.price)')
            ->getQuery()
            ->getSingleScalarResult();

        $maxPrice = $repository->createQueryBuilder('c')
            ->select('MAX(c.price)')
            ->getQuery()
            ->getSingleScalarResult();  
            
        $minMilage = $repository->createQueryBuilder('c')
            ->select('MIN(c.milage)')
            ->getQuery()
            ->getSingleScalarResult();

        $maxMilage = $repository->createQueryBuilder('c')
            ->select('MAX(c.milage)')
            ->getQuery()
            ->getSingleScalarResult();  

        $years = [];
        foreach ($cars as $car) {
            $entryIntoService = $car->getEntryIntoService();
            if ($entryIntoService instanceof \DateTimeInterface) {
                $years[] = $entryIntoService->format('Y');
            }
        }    
        $minYear = min($years);
        $maxYear = max($years);

        return $this->render('used_car.html.twig', [
            'cars' => $cars,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'minMilage' => $minMilage,
            'maxMilage' => $maxMilage,
            'minYear' => $minYear,
            'maxYear' => $maxYear,
        ]);
    }
}
