<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewType;
use App\Repository\ReviewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardEmployeeNewReviewController extends AbstractController
{
    private $reviewRepository;
    private $entityManager;

    public function __construct(ReviewRepository $reviewRepository, EntityManagerInterface $entityManager)
    {
        $this->reviewRepository = $reviewRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/tableau-de-bord-employe/ajouter-un-avis", name="dashboard-employe-4")
     */
    public function index(Request $request): Response
    {
        $review = new Review();
        $form = $this->createForm(ReviewType::class, $review);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $selectedRate = $request->request->get('rating');
            $review->setRate($selectedRate);

            $this->entityManager->persist($review);
            $this->entityManager->flush();

            $this->addFlash('success', "L'avis a été enregistré avec succès.");

            return $this->redirectToRoute('dashboard-employe-4');
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Il y a des erreurs dans le formulaire. Veuillez le corriger.');
        }

        $reviews = $this->reviewRepository->findAll();

        return $this->render('dashboard_employee_new_review.html.twig', [
            'reviews' => $reviews,
            'form' => $form->createView(),
        ]);
    }
}
