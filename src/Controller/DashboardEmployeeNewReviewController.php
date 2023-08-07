<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardEmployeeNewReviewController extends AbstractController
{
    /**
     * @Route("/tableau-de-bord-employe/ajouter-un-avis", name="app_dashboard_employee_new_review")
     */
    public function index(): Response
    {
        return $this->render('dashboard_employee_new_review.html.twig', [
            'controller_name' => 'DashboardEmployeeNewReviewController',
        ]);
    }
}
