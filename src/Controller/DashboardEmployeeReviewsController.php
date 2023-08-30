<?php

namespace App\Controller;

use App\Entity\TemporaryReview;
use App\Entity\Review;
use App\Repository\TemporaryReviewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardEmployeeReviewsController extends AbstractController
{
    private $temporaryReviewRepository;
    private $entityManager;

    public function __construct(TemporaryReviewRepository $temporaryReviewRepository, EntityManagerInterface $entityManager)
    {
        $this->temporaryReviewRepository = $temporaryReviewRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/tableau-de-bord-employe/moderer-les-avis", name="app_dashboard_employee_reviews")
     */
    public function index(): Response
    {
        $temporaryReviews = $this->temporaryReviewRepository->findAll();

        return $this->render('dashboard_employee_reviews.html.twig', [
            'reviews' => $temporaryReviews,
        ]);
    }

    /**
     * @Route("/valider-avis/{id}", name="app_review_validate", methods={"POST"})
     */
    public function validateReview(Request $request, $id): Response
    {
        $review = $this->temporaryReviewRepository->find($id);

        if (!$review) {
            throw $this->createNotFoundException('Avis introuvable');
        }

        $newReview = new Review();
        $newReview->setName($review->getName());
        $newReview->setRate($review->getRate());
        $newReview->setComment($review->getComment());

        $this->entityManager->persist($newReview);
        $this->entityManager->remove($review);
        $this->entityManager->flush();

        return $this->redirectToRoute('app_dashboard_employee_reviews');
    }

    /**
     * @Route("/supprimer-avis/{id}", name="app_review_delete", methods={"POST"})
     */
    public function deleteReview(Request $request, $id): Response
    {
        $review = $this->temporaryReviewRepository->find($id);

        if ($review) {
            $this->entityManager->remove($review);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('app_dashboard_employee_reviews');
    }
}
