<?php

namespace App\Controller;

use App\Entity\Review;
use App\Entity\TemporaryReview;
use App\Entity\GarageState;
use App\Form\TemporaryReviewType;
use App\Repository\RepairRepository;
use App\Repository\ReviewRepository;
use App\Repository\TemporaryReviewRepository;
use App\Repository\GarageStateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $repairRepository;
    private $temporaryReviewRepository;
    private $reviewRepository;
    private $entityManager;

    public function __construct(RepairRepository $repairRepository, TemporaryReviewRepository $temporaryReviewRepository, ReviewRepository $reviewRepository, EntityManagerInterface $entityManager)
    {
        $this->repairRepository = $repairRepository;
        $this->temporaryReviewRepository = $temporaryReviewRepository;
        $this->reviewRepository = $reviewRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/home", name="homepage")
     */
    public function index(Request $request): Response
    {
        $temporaryReview = new TemporaryReview();
        $form = $this->createForm(TemporaryReviewType::class, $temporaryReview);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $selectedRate = $request->request->get('rating');
            $temporaryReview->setRate($selectedRate);

            $this->entityManager->persist($temporaryReview);
            $this->entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        $repairs = $this->repairRepository->findAll();
        $reviews = $this->reviewRepository->findAll();
        $repository = $this->entityManager->getRepository(GarageState::class);
        $status = $repository->find(1)->getStatus();

        return $this->render('home.html.twig', [
            'repairs' => $repairs,
            'reviews' => $reviews,
            'form' => $form->createView(),
            'status' => $status,
        ]);
    }
}
